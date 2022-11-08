<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Str;
use App\Models\City;
use App\Models\State;
use Session;
use App\Mail\EmailWelcomeOwner;
use Illuminate\Support\Facades\Mail;
class VendorRegister extends Component
{
    use WithFileUploads;
        public $currentStep = 1;
        public $salon_title, $mobile, $whatsapp_number,$email,$country,$state,$city,$pin_code,$term_conditions=1,$salon_description,$featured_image,$gst_number,$gst_certificate,$service_for,$password;
        public $successMessage = '';
        public $payment_method=[];
        public $facilities=[];
        public $service_type = [];
        public $states;
        public $cities;
        public $selectedState = NULL;
        public $full_address =null;
    public function mount()
    {
        $this->states = State::all();
        $this->cities = collect();
        if(session()->has('place')){
          $this->full_address =session()->get('place') ;  
        } else{
           $this->full_address = null ; 
        }
        
    }
    public function render()
    {
        return view('livewire.vendor-register');
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'salon_title' => 'required|string|max:255|unique:App\Models\Vendor,firm_address',
            'mobile' => 'required|digits:10|unique:App\Models\User',
            'whatsapp_number' => 'required|digits:10',
            'email' => 'required|email|unique:App\Models\User',
            'full_address' => 'required|string',
            'country' => 'nullable|string',
            'selectedState' => 'required|string',
            'city' => 'required|string',
            'pin_code' => 'required|digits:6',
            'term_conditions' => 'required',
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'salon_description' => 'required',
            'featured_image' => 'nullable|mimes:png,jpg,jpeg|max:12000',
            'gst_number' => 'nullable|min:15|max:15',
            'gst_certificate' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2000',
            'payment_method' => 'array',
        ]);
        $this->currentStep = 3;
    }

    public function submitForm()
    {
        // dd($this->email);
        $validatedData = $this->validate([
            'service_for' => 'required',
            'service_type' => 'nullable',
            'facilities' => 'nullable',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name=$this->salon_title;
        $user->mobile=$this->mobile;
        $user->email=$this->email;
        $user->user_type='vendor';
        $user->active=1;
        $user->password= Hash::make($this->password);
        if($user->save())
        {
            $vendor=new Vendor();
            $vendor->vendorId='SNM'.(10000+$user->id);
            $vendor->user_id=$user->id;
            $vendor->name=$this->salon_title;
            $vendor->firm_name=$this->salon_title;
            $vendor->state_id=$this->selectedState;
            $vendor->city_id=$this->city;
            $vendor->pincode=$this->pin_code;
            $vendor->firm_address=$this->full_address;
            $vendor->mobile=$this->mobile;
            $vendor->whatsapp_number=$this->whatsapp_number;
            $vendor->gst_number=$this->gst_number;
            $vendor->about_firm=$this->salon_description;
            $vendor->amenities=json_encode($this->facilities);
            $vendor->payment_methods=json_encode($this->payment_method);
            $vendor->services=json_encode($this->service_type);
            
            $vendor->feature_image = !empty($this->featured_image)? $this->featured_image->store('uploads/vendor/feature', 'public') : '';
            
            if($this->gst_certificate){
                $vendor->gst_file = $this->gst_certificate->store('uploads/vendor/gst', 'public');
            }
            
           
            // if($this->hasFile('gst_certificate')) {
            //      $file = $this->file('gst_certificate');
            //      $file_name = Str::random(5).'-'.time().'.'.$file->getClientOriginalExtension();
            //      $destinationPath = Storage::path('/public/uploads/vendor/gst');
            //      $file->move($destinationPath, $file_name);
            //      $vendor->gst_file = $file_name;
            //  }
            //  if($this->hasFile('feature_image')) {
            //       $file = $this->file('feature_image');
            //       $file_name = Str::random(5).'-'.time().'.'.$file->getClientOriginalExtension();
            //       $destinationPath = Storage::path('/public/uploads/vendor/feature');
            //       $file->move($destinationPath, $file_name);
            //       $vendor->feature_image = $file_name;
            // }
            $vendor->save();
            try {
                if (1) {
                    $vendor=Vendor::find($vendor->id);
                    $words = explode(" ", $vendor->firm_name);
                    $acronym = "";
                    foreach ($words as $w) {
                        $acronym .= $w[0];
                    }
                    $vendor->vendorId=$acronym.(10000+$vendor->id);
                    $vendor->update();
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            
        }


        $this->successMessage = 'You salon is registred successfully.';
        try {
            Mail::to($this->email)->send(new EmailWelcomeOwner());
        } catch (\Throwable $th) {
            //throw $th;
        }
       
        $this->clearForm();

        $this->currentStep = 1;
  
        return redirect()->route('vendor.login')->with('success','You salon is registred successfully.');
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function clearForm()
    {
        $this->salon_title='';
        $this->mobile='';
        $this->whatsapp_number='';
        $this->email='';
        $this->full_address='';
        $this->country='';
        $this->state='';
        $this->city='';
        $this->pin_code='';
        $this->term_conditions='';
        $this->salon_description='';
        $this->featured_image='';
        $this->gst_number='';
        $this->gst_certificate='';
        $this->payment_method='';
        $this->service_for='';
        $this->service_type=[];
        $this->facilities='';
        $this->password='';
    }
    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('state_id', $state)->get();
        }
        $this->dispatchBrowserEvent('stateUpdated');
    }
}
