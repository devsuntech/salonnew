<div class="sign__form">
    @if(!empty($successMessage))
    <div class="alert alert-success">
    {{ $successMessage }}
    </div>
    @endif

        {{-- Start From --}}
        <!-- PROGRESS BAR -->
        <div class="progressbar ">
            <div class="progress" id="progress"></div>
            <div class="progress-steps {{ $currentStep != 1 ? '' : ' progress-step-active' }}" data-title="Contact Info ">

            </div>
            <div class="progress-steps {{ $currentStep != 2 ? '' : ' progress-step-active' }}"" data-title="Salon Intro ">

            </div>
            <div class="progress-steps {{ $currentStep != 3 ? '' : ' progress-step-active' }}"" data-title="Salon Info ">

            </div>
        </div>
        <!-- PROGRESS BAR END -->

        <div class="col-lg-12 form-step {{ $currentStep != 1 ? '' : 'form-step-active' }} ">
            <div class="row ">
                <div class="col-lg-6 sign__input-wrapper mb-25 ">
                    <h5>Salon Title :</h5>
                    <div class="sign__input ">
                        <input type="text" wire:model="salon_title" name="salon_title"  placeholder="Name of your Salon ">
                        <i class="fal fa-user-alt "></i>
                    </div>
                    @error('salon_title')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>Contact Number :</h5>
                    <div class="sign__input ">
                        <input type="phone" wire:model="mobile"  placeholder="+91 8493749730 " maxlength="10">
                        <i class="fal fa-phone-alt "></i>
                    </div>
                    @error('mobile')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>Whatsapp Number :</h5>
                    <div class="sign__input ">
                        <input type="phone" wire:model="whatsapp_number" placeholder="+91 8493749730 " maxlength="10">
                        <i class="fab fa-whatsapp "></i>
                    </div>
                    @error('whatsapp_number')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>Email :</h5>
                    <div class="sign__input ">
                        <input type="email" wire:model="email" placeholder="example@mail.com ">
                        <i class="fal fa-envelope "></i>
                    </div>
                    @error('email')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-12 sign__input-wrapper mb-10 ">
                    <h5>Full Address :</h5>
                    <div class="sign__input ">
                        <input type="text" wire:model="full_address"  id="pac-input"   autocomplete="off" placeholder="Full Address ">
                        <a href="#" id="current-location" onClick="currentLocation()"><i class="fal fa-location "></i></a> 
                    </div>
                    @error('full_address')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>State :</h5>
                    <div class="sign__input ">
                        <select wire:model="selectedState" id="selected-state">
                            <option value="">Select Your State</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        <!-- i class="fal fa-location "></i -->
                    </div>
                    @error('selectedState')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>City :</h5>
                    <div class="sign__input ">
                        <select wire:model="city" id="selected-city">
                            <option value="">Select Your City</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>

                        <!-- i class="fal fa-location "></i -->
                    </div>
                    @error('city')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>Pincode :</h5>
                    <div class="sign__input ">
                        <input type="text" wire:model="pin_code" placeholder="Pincode " id="postal-code">
                        <i class="fal fa-location "></i>
                    </div>
                    @error('pin_code')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="sign__action d-sm-flex justify-content-between mb-30 ">
                    <div class="sign__agree d-flex align-items-center ">
                        <input class="m-check-input" wire:model="term_conditions" type="checkbox" id="m-agree " required>
                        <label class="m-check-label " for="m-agree ">I accept terms and
                            conditions
                        </label>
                    </div>
                    @error('term_conditions')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <button class="m-btn m-btn-4 w-50 ml-auto btn-next btn" type="button" wire:click="firstStepSubmit">
                    <span></span>Next</button>
            </div>
        </div>



        <div class="col-lg-12 form-step {{ $currentStep != 2 ? '' : 'form-step-active' }}">
            <div class="row ">
                <div class="col-lg-6 sign__input-wrapper mb-25 ">
                    <h5>Salon Description :</h5>
                    <div class="sign__input ">
                        <input type="text" wire:model="salon_description" placeholder="Describe your Salon">
                        <i class="far fa-info-circle"></i>
                    </div>
                    @error('salon_description')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>Featured Image : </h5>
                    <div class="sign__input ">
                        <input type="file" wire:model="featured_image" placeholder="Image" accept="image/png, image/gif, image/jpeg">
                        <i class="far fa-image"></i>
                    </div>
                    @error('featured_image')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>GST Number :</h5>
                    <div class="sign__input ">
                        <input type="text" wire:model="gst_number" placeholder="Enter you 15 Digit GST Number" >
                        <i class="far fa-info-circle"></i>
                    </div>
                    @error('gst_number')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>GST Certificate : </h5>
                    <div class="sign__input ">
                        <input type="file" wire:model="gst_certificate" placeholder="Image">
                        <i class="far fa-image"></i>
                    </div>
                    @error('gst_certificate')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-12 sign__input-wrapper mb-10 ">
                    <h5>We Accept :</h5>
                    <div class="checkbox-sec">
                        <label class="container"> Gpay
                            <input type="checkbox" wire:model="payment_method" id="paymentMethod1" value="Gpay">
                            <span class="checkmark" for="paymentMethod1"></span>
                        </label>
                        <label class="container">UPI
                            <input type="checkbox" wire:model="payment_method" id="paymentMethod2" checked="checked" value="UPI" >
                            <span class="checkmark" for="paymentMethod2"></span>
                        </label>
                        <label class="container">Paytm
                            <input type="checkbox" wire:model="payment_method" id="paymentMethod3" value="Paytm">
                            <span class="checkmark" for="paymentMethod3"></span>
                        </label>
                        <label class="container">Cards
                            <input type="checkbox" wire:model="payment_method" value="Cards">
                            <span class="checkmark" for="paymentMethod4"></span>
                        </label>
                    </div>
                     @error('payment_method')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>


                <div class="btns-group row ">
                    <button class="m-btn m-btn-4 w-100 btn-prev btn" type="button" wire:click="back(1)">
                        <span></span>Previous</button>
                    <button class="m-btn m-btn-4 w-100 btn-next btn" type="button" wire:click="secondStepSubmit"> <span></span>Next</button>
                </div>
            </div>
        </div>


        <div class="col-lg-12 form-step {{ $currentStep != 3 ? '' : 'form-step-active' }}">
            <div class="row ">
                <div class="col-lg-6 sign__input-wrapper mb-25 ">
                    <h5>Services for :</h5>
                    <div class="sign__input ">
                        <select  wire:model="service_for">
                            <option >Select :</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Unisex">Unisex</option>
                            <option value="Including Trans">Including Others</option>
                        </select>
                        <!-- i class="far fa-info-circle"></i -->
                    </div>
                    @error('service_for')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-6 sign__input-wrapper mb-10 ">
                    <h5>Service type :</h5>
                    <div class="sign__input ">
                        <select wire:model="service_type" placeholder="Select Service Type" multiple>
                            <option value="">Select Service Type:</option>
                            @foreach(App\Models\Category::orderBy('name')->get() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <!-- i class="far fa-info-circle"></i -->
                    </div>
                    @error('service_type')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-12 sign__input-wrapper mb-10 ">
                    <h5>Our Facilities Include :</h5>
                    <div class="checkbox-sec">
                        <label class="container"> Washroom
                            <input type="checkbox"  wire:model="facilities" value="Washroom">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Parking
                            <input type="checkbox" wire:model="facilities" value="Parking">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Pet Friendly
                            <input type="checkbox" wire:model="facilities" value="Pet Friendly">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Home Appointment
                            <input type="checkbox" wire:model="facilities" value="Home Appointment">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    @error('facilities')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-lg-12 sign__input-wrapper mb-10 ">
                    <h5>Password :</h5>
                    <div class="sign__input ">
                        <input type="password" wire:model="password" placeholder="Enter minimum 6 character password ">
                        <i class="far fa-lock"></i>
                    </div>
                    @error('password')
                        <label class="messages text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="btns-group row ">
                    <button class="m-btn m-btn-4 w-100 btn-prev btn" type="button" wire:click="back(2)">
                        Previous</button>
                    <button class="m-btn m-btn-4 w-100 btn" wire:click="submitForm" type="button">Register</button>
                </div>
            </div>
        </div>
    {{-- End From --}}
</div>
<script>
let city = [];
var  geocoder = new google.maps.Geocoder();
var center = '';

@if(session()->has('latitude') && session()->has('latitude'))
var latitude={{session()->get('latitude')}};
var longitude={{session()->get('longitude')}};
center = { lat: latitude, lng: longitude };
// Create a bounding box with sides ~20km away from the center point



@else
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
var lat = position.coords.latitude;
var lng = position.coords.longitude;
const center = { lat: lat, lng: lng };

codeLatLng(lat, lng)
}

function errorFunction(){
alert("Please allow location for this browser");
}

function codeLatLng(lat, lng) {
var latlng = new google.maps.LatLng(lat, lng);
geocoder.geocode({'latLng': latlng}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[1]) {
    //formatted address
    @this.set('full_address', results[0].formatted_address);
    // console.log(results[1]);
    //alert(results[0].formatted_address)
    $.post('{{ route('store.userLocation') }}', {_token:'{{ csrf_token() }}', latitude:lat,longitude:lng,place:results[0].formatted_address}, function(data){});     
    //find country name
    let state = '';
    let postal_code = '';
    for (var i=0; i<results[0].address_components.length; i++) {
        for (var b=0;b<results[0].address_components[i].types.length;b++) {
            if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                //this is the object you are looking for
                state = results[0].address_components[i].long_name;
            }
            if (results[0].address_components[i].types[b] == "postal_code") {
                //this is the object you are looking for
                postal_code = results[0].address_components[i].long_name;
            }
            if (typeof results[1].address_components[i] !== 'undefined' && results[1].address_components[i].types[b] == "locality") {
                //this is the object you are looking for
                city.push(results[1].address_components[i].long_name);
            }
            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
            if (results[0].address_components[i].types[b] == "administrative_area_level_2") {
                //this is the object you are looking for
                city.push(results[0].address_components[i].long_name);
                break;
            }
        }
    }
    //city data
    // alert(city.short_name + " " + city.long_name)
    $('#selected-state').find('option').each(function () {
        if ($(this).text() == state) {
            // $('#selected-state').val($(this).val()).trigger('change');
            @this.set('selectedState', $(this).val());
        }
    });
    // $('#postal-code').val(postal_code);
    @this.set('pin_code', postal_code);

    
    setTimeout(function(){
        $('#selected-city').find('option').each(function (index,value) {
            if (inArray( $(this).text(), city )) {
                // $('#selected-city').selectedIndex = index;
                @this.set('city', $(this).val());
                city=[];
            }
        });  
    },500);
} else {
    alert("No results found");
}
} else {
alert("Please allow location for this browser: " + status);
}
});
}
@endif
// sel.addEventListener('change', function (e) {
//     alert('changed');
// });
const input = document.getElementById("pac-input");
const options = {
componentRestrictions: { country: "in" },
fields: ["place_id", "geometry", "name", "formatted_address"],
origin: center,
strictBounds: false,
types: ["establishment"],
};
// const geocoder = new google.maps.Geocoder();
const autocomplete = new google.maps.places.Autocomplete(input, options);
autocomplete.addListener("place_changed", () => {
const place = autocomplete.getPlace();
    // console.log("=>"+place);
geocoder.geocode({ placeId: place.place_id }, (results, status) => {
if (status == google.maps.GeocoderStatus.OK) {
if(place){
    // var components = place.address_components;
    // console.log(results);
     $.post('{{ route('store.userLocation') }}', {_token:'{{ csrf_token() }}', latitude:lat,longitude:lng,place:results[0].formatted_address}, function(data){
        // if(data == 1){} else {}
    });
    var lat =place.geometry.location.lat();
    var lng = place.geometry.location.lng();
    @this.set('full_address', results[0].formatted_address);
    let state = '';
    let postal_code = '';
    $.each(results[0].address_components,function(index,value){
        if(inArray('administrative_area_level_1', value.types)) {
            // alert('administrative_area_level_1');
            state =value.long_name;
            // console.log(value['types']);
        }
        if(inArray('postal_code', value.types)) {
            // alert('administrative_area_level_1');
            postal_code =value.long_name;
            // console.log(value['types']);
        }
        if(inArray('administrative_area_level_2', value.types)) {
            // alert('administrative_area_level_2');
            city.push(value.long_name);
            // console.log(value['types']);
        }
        if(inArray('locality', value.types) && typeof value!=='undefined') {
            // alert('administrative_area_level_2');
            city.push(value.long_name);
            // console.log(value['types']);
        }
        // console.log();
    });
     

    // console.log(state+"  "+postal_code+"  "+city);
    $('#selected-state').find('option').each(function () {
        if ($(this).text() == state) {
            // $('#selected-state').val($(this).val()).change();
            @this.set('selectedState', $(this).val());
        }
    });
    // $('#postal-code').val(postal_code);
    
    @this.set('pin_code', postal_code);

    setTimeout(function(){
        $('#selected-city').find('option').each(function (index,value) {
            if (inArray( $(this).text(), city )) {
                // alert(index);
                // $('#selected-city').val($(this).val());
                @this.set('city', $(this).val());
                city=[];
            }
        });  
    },500);
   
}else{
    // window.alert("No address found ");
    // return;
}
}else{
window.alert("Please allow location for this browser: " + status);
return;
}    
});

//document.getElementById("latitude").value =place.geometry.location.lat();
// document.getElementById("longitude").value = place.geometry.location.lng();

});

function currentLocation(){
//Some codevar  geocoder = new google.maps.Geocoder();
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
var lat = position.coords.latitude;
var lng = position.coords.longitude;
codeLatLng(lat, lng)    
}
function errorFunction(){
alert("Please allow location for this browser");
}
function codeLatLng(lat, lng) {
var latlng = new google.maps.LatLng(lat, lng);
geocoder.geocode({'latLng': latlng}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
    if (results[1]) {
        //formatted address
        @this.set('full_address', results[0].formatted_address);
        // console.log(results[1]);
        //alert(results[0].formatted_address)
        //find country name
        let state = '';
        let postal_code = '';
        for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    state = results[0].address_components[i].long_name;
                }
                if (results[0].address_components[i].types[b] == "postal_code") {
                    //this is the object you are looking for
                    postal_code = results[0].address_components[i].long_name;
                }
                if (typeof results[1].address_components[i] !== 'undefined' && results[1].address_components[i].types[b] == "locality") {
                    //this is the object you are looking for
                    city.push(results[1].address_components[i].long_name);
                }
                //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_2") {
                    //this is the object you are looking for
                    city.push(results[0].address_components[i].long_name);
                    break;
                }
            }
        }
        $.post('{{ route('store.userLocation') }}', {_token:'{{ csrf_token() }}', latitude:lat,longitude:lng,place:results[0].formatted_address}, function(data){});     
        $('#selected-state').find('option').each(function() {
            if ($(this).text() == state) {
                // $('#selected-state').val($(this).val()).change();
                @this.set('selectedState', $(this).val())
            }
        });
        //city data
        //alert(city.short_name + " " + city.long_name)
        @this.set('pin_code', postal_code);
        setTimeout(function(){
            $('#selected-city').find('option').each(function (index,value) {
                if (inArray( $(this).text(), city )) {
                    
                    @this.set('city', $(this).val());
                    city=[];
                }
            });  
        },500);
    } else {
        alert("No results found");
    }
} else {
    alert("Please allow location for this browser: " + status);
}
});
}
}  
function inArray(needle, haystack) {
var length = haystack.length;
for(var i = 0; i < length; i++) {
if(haystack[i] == needle) return true;
}
return false;
}
</script>