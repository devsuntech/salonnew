<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\VendorService;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Mail\EmailBookingOwner;
use App\Mail\EmailBookingUser;
use Illuminate\Support\Facades\Mail;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function vendorBookings(Request $request)
    {
        $datas=Booking::latest()->paginate(10);
        // dd($datas);
        return view('vendor.order.index',compact('datas'));
    }
    /**
     * Create a pay at vendor booking
     *
     * @return \Illuminate\Http\Response
     */
    public function createPayAtVendorBooking(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|integer',
            'vendor_staff_id' => 'required|integer',
            'date' => 'required',
            'time' => 'required',
            'services' => 'required|array'
        ]);
        $booking_data = [
            'vendor_id' => $validated['vendor_id'],
            'customer_id' => Auth::user()->id,
            'payment_type' => 'Cash',
            'payment_status' => 'Pending',
            'booking_date' => $validated['date'],
            'booking_time' => $validated['time'],
            'booking_status' => 'Confirmed',
            'total_amount' => $this->calculateTotalAmount($validated['services'])
        ];
        $booking->fill($booking_data)->save();
        $booking->bookingDetail()->saveMany($this->prepareBookingDetailArray($validated));
        try {
            Mail::to(Auth::user()->email)->send(new EmailBookingUser());
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return response()->json($booking);
    }

    private function calculateTotalAmount (array $services): int
    {
        $services_array =  (new VendorService())->whereIn('id', $services)->get();
        $total_amount = 0;

        foreach ($services_array as $service) {
            $total_amount += $service->price;
        }

        return $total_amount * 100;
    }

    private function prepareBookingDetailArray (array $validated_data): array
    {
        $services_array =  (new VendorService())->whereIn('id', $validated_data['services'])->get();
        $boking_detail_data = [];
        foreach ($services_array as $service) {
            $boking_detail_data[] = new BookingDetail([
                'sub_service_id' => $service->id,
                'vendor_staff_id' => $validated_data['vendor_staff_id'],
                'status' => 1
            ]);
        }

        return $boking_detail_data;
    }

    /**
     * Create a pay via razorpay booking
     *
     * @return \Illuminate\Http\Response
     */
    public function createRazorpayBooking(Request $request, Booking $booking) {
        $validated = $request->validate([
            'vendor_id' => 'required|integer',
            'vendor_staff_id' => 'required|integer',
            'date' => 'required|date_format:m/d/Y',
            'time' => 'required|date_format:H:i',
            'services' => 'required|array'
        ]);
        $total_amount = $this->calculateTotalAmount($validated['services']);
        $booking_data = [
            'vendor_id' => $validated['vendor_id'],
            'customer_id' => Auth::user()->id,
            'payment_type' => 'Online',
            'payment_status' => 'Pending',
            'booking_date' => Carbon::createFromFormat('m/d/Y', $validated['date']),
            'booking_time' => $validated['time'],
            'booking_status' => 'Pending',
            'online_payment_method' => 'razorpay',
            'total_amount' => $total_amount
        ];
        $booking->fill($booking_data)->save();
        $booking->online_payment_method_ref_id = $this->createRazorpayOrder([
            'amount' => $total_amount,
            'booking_id' => $booking->id
        ])->id;
        $booking->save();
        $booking->bookingDetail()->saveMany($this->prepareBookingDetailArray($validated));
        
        return response()->json($booking);
    }

    private function createRazorpayOrder(array $order_data)
    {
        $razorpay_api = new Api(config('app.razorpay.key'), config('app.razorpay.secret'));

        return $razorpay_api->order->create(array('receipt' => $order_data['booking_id'], 'amount' => $order_data['amount'], 'currency' => config('app.razorpay.currency')));
    }

    /**
     * Verify and validate payment made through razorpay
     *
     * @return \Illuminate\Http\Response
     */

    public function verifyRazorpayPayment(Request $request)
    {
        $validated = $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string'
        ]);

        try {
            $this->verifyRazorpayPaymentSignature($validated);
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Verification failed'], 402);
        }

        $booking = $this->confirmRazorpayPayment($validated);

        return response()->json(['booking_id' => $booking->id]);
    }

    private function verifyRazorpayPaymentSignature($razorpay_payment_data)
    {
        $razorpay_api = new Api(config('app.razorpay.key'), config('app.razorpay.secret'));
        return $razorpay_api->utility->verifyPaymentSignature($razorpay_payment_data);
    }

    private function confirmRazorpayPayment($razorpay_payment_data)
    {
        $booking = Booking::where('online_payment_method_ref_id', $razorpay_payment_data['razorpay_order_id'])
            ->first();
        $booking->payment_status = 'Paid';
        $booking->booking_status = 'Confirmed';
        $booking->online_payment_method_data = $razorpay_payment_data;
        $booking->save();
        // Mail::to('sandeepdhabhai2016@gmail.com')->send(new EmailBookingOwner('Sunnny'));
        Mail::to(Auth::user()->email)->send(new EmailBookingUser());
        return $booking;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
    
    
    
   
}
