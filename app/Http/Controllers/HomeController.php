<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Service;
use App\Models\SubService;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorCoupon;
use App\Models\VendorService;
use DB;
use App\Models\Coupon;
use App\Models\VendorStaff;
use Session;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
    //   $vendors=VendorCoupon::select('id', 'vendor_id','discount', DB::raw('MAX(discount)'))
    //                         ->groupBy('vendor_id')
    //                         ->get();
        $top_discout_vendors=Vendor::orderBy('firm_name','DESC')->take(8)->whereStatusId(4)->get();
        $top_discount_coupons=Coupon::whereDiscountType('percentage')->where('expiry_date','>=',date('Y-m-d'))->where('start_date','<=',date('Y-m-d'))->take(8)->get();
        $featured_salons=Vendor::whereFeatured(1)->orderBy('position')->orderBy('name')->whereStatusId(4)->take(4)->get();
        $all_review_salons=Vendor::whereFeatured(1)->orderBy('position')->orderBy('name')->whereStatusId(4)->take(8)->get();

        
        return view('frontend.home',compact('top_discout_vendors','top_discount_coupons','featured_salons','all_review_salons'));
    }

    public function topDiscountVendors($slug)
    {
        if($coupon=Coupon::whereSlug($slug)->first()){
            $vendor_id=VendorCoupon::whereCouponId($coupon->id)->pluck('vendor_id')->toArray();
            $vendors=Vendor::whereIn('id',$vendor_id)->whereStatusId(4)->paginate(9);
            return view('frontend.vendor-listing',compact('vendors'));
        } else{
            abort(404);
        }
        
        
    }
    public function salonSearchByKeywords(Request $request)
    {
       $keyword=$request->keyword;
        // if( ){
            $vendors=Vendor::where('firm_name', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orderBy('position')
                ->orderBy('firm_name')
                ->whereStatusId(4)
                ->paginate(9); 
          
        // } 
        // else{
        //     abort(404);
        // }
        return view('frontend.vendor-listing',compact('vendors'));
    }
    
    public function adminLogin()
    {
        if(Auth::user()){
            abort(404);
        } else{
          return view('admin.login');  
        }
        
    }

    public function vendorLogin()
    {
        if(Auth::user()){
             abort(404);
        } else{
          return view('admin.vendor_login'); 
        }
        
        
    }
    public function getService(Request $request)
    {
        return Service::whereCategoryId($request->id)->get();
    }
    public function getSubService(Request $request)
    {
        return SubService::whereServiceId($request->id)->get();
    }
    public function vendorDashboard()
    {
        # code...
    }
    public function listingPageByCategory($slug)
    {
        if ($category_id=Category::whereSlug($slug)->first()->id) {
          $vendors=Vendor::whereServices($category_id)->whereStatusId(4)->paginate(9);
          return view('frontend.vendor-listing',compact('vendors'));
        } else {
            abort(404);
        }

    }
    public function vendorDetail($slug)
    {
        if ($vendor=Vendor::whereSlug($slug)->first()) {
            // dd($vendor);;
            $vendorDetails = VendorService::where('vendor_id',$vendor->id)->get()->groupBy('service_id');
            $period = new CarbonPeriod('11:00', '30 minutes', '19:30'); // for create use 24 hours format later change format 
            $slots = [];
            foreach($period as $item){
                array_push($slots,$item->format("h:i A"));
            }
            $staff = VendorStaff::where('vendor_id',$vendor->id)->get();
            // dd($slots);
            // dd($vendorDetails);
            return view('frontend.vendor-details',compact('vendorDetails','vendor','slots','staff'));
        } else{
            abort(404);
        }
    }

    public function booking($slug)
    {
        if ($vendor=Vendor::whereSlug($slug)->first()) {
            return view('frontend.booking',compact('vendor'));
        } else{
            abort(404);
        }

    }

    public function userProfile()
    {
       return view('frontend.user-profile');
    }

    public function userProfileupdate(Request $request)
    {
        // dd($request->email);
        $id= Auth::user()->id;
        $userData = ["email"=>$request->email,"name"=>"$request->first_name $request->last_name"];
        $userQuery = User::where('id',$id)->update($userData);
        // dd($userQuery);
        $addressData = [
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
            "pincode" => $request->pin_code,
            "about_me" => $request->about_me
        ];
        $customerQuery= Customer::where('user_id',$id)->update($addressData);
        return redirect()->back();
    //    return view('frontend.user-profile');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
        if (Auth::user()->user_type=='customer') {
            auth()->logout();
            return redirect()->route('customer.login')->with('success','You are successfully logout');
        } elseif (Auth::user()->user_type=='vendor') {
            auth()->logout();
            return redirect()->route('vendor.login')->with('success','You are successfully logout');
        } elseif (Auth::user()->user_type=='super_admin') {
            auth()->logout();
           return redirect()->route('admin.login')->with('success','You are successfully logout');
        } elseif (Auth::user()->user_type=='employee') {
            auth()->logout();
            return redirect()->route('admin.login')->with('success','You are successfully logout');
        }
    }

    public function aboutUs()
    {
        $page=Page::find(1);
        return view('frontend.about-us',compact('page'));
    }
    public function termsAndConditions()
    {
        $page=Page::find(2);
        return view('frontend.about-us',compact('page'));
    }
    public function privacyPolicy()
    {
        $page=Page::find(3);
        return view('frontend.privacy-policy',compact('page'));
    }
    public function faqAndUpdates()
    {
        $page=Page::find(4);
        return view('frontend.faq-updates',compact('page'));
    }
    public function refundPolicy()
    {
        $page=Page::find(5);
        return view('frontend.refund-policy',compact('page'));
    }
    public function newsFeeds()
    {
        $page=Page::find(6);
        return view('frontend.news-feeds',compact('page'));
    }
    public function contactUs()
    {
        $page=Page::find(7);
        return view('frontend.contact-us',compact('page'));
    }
    public function ourServices()
    {
        $page=Page::find(8);
        return view('frontend.our-services',compact('page'));
    }
    public function portfolio()
    {
        $page=Page::find(9);
        return view('frontend.portfolio',compact('page'));
    }
    public function userLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        
        session(['latitude'=>$request->latitude]);
        session(['longitude'=>$request->longitude]);
        session(['place'=>$request->place]);
        if(!empty(session()->get('latitude')) && !empty(session()->get('longitude'))){
            return 1;
        } else {
            return 0;
        }
    }
   
}
