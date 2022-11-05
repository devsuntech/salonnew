<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubServiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorGalleryController;
use App\Http\Controllers\VendorStaffController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VendorServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;
use App\Mail\EmailBookingOwner;
use App\Mail\EmailBookingUser;
use App\Mail\EmailWelcomeOwner;
use App\Mail\EmailWelcomeUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('storage:link');
    \Artisan::call('route:clear');
    dd('clear');
});

Route::get('/sendemail', function () {
    
    Mail::to('sandeepdhabhai2016@gmail.com')->send(new EmailBookingOwner('Sunnny'));
    // Mail::to('innmsanil@gmail.com')->send(new EmailBookingUser());
    // Mail::to('sandeepdhabhai2016@gmail.com')->send(new EmailWelcomeOwner());
    // Mail::to('innmsanil@gmail.com')->send(new EmailWelcomeUser());
});




Route::get('simple',[CategoryController::class,'simple']);
// Frontend
Route::get('/', [HomeController::class,'index'])->name('home');


Route::post('logout', [HomeController::class,'logout'])->name('logout');

//User Related Work
Route::get('/login', function () {
    return view('frontend.login');
})->name('customer.login');
Route::get('register', function () {
    return view('frontend.register');
})->name('register');
Route::post('user/register',[RegisterController::class,'userRegister'])->name('user.register');
Route::group(['prefix' => 'user', 'as' => 'customer.', 'middleware' => ['customer']], function () {
    Route::get('dashboard',[HomeController::class,'customerDashboard'])->name('dashboard');
});

//Vendor Related Work
Route::get('salon/login', function () {
    return view('frontend.vendor-login');
})->name('vendor.login');
Route::get('salon/register', function () {
    return view('frontend.vendor-register');
})->name('vendor.register');
Route::post('vendor/register',[RegisterController::class,'vendorRegister'])->name('vendor.register.store');
Route::group(['prefix' => 'salon', 'as' => 'vendor.', 'middleware' => ['vendor']], function () {
    Route::get('dashboard',[HomeController::class,'vendorDashboard'])->name('dashboard');
});


Route::get('salons/{slug}',[HomeController::class,'listingPageByCategory'])->name('listing.page.category');
Route::get('top-discounted/{slug}',[HomeController::class,'topDiscountVendors'])->name('top_discount.vendors');
Route::get('searched/salons?{slug}',[HomeController::class,'salonSearchByKeywords'])->name('search.salon');
Route::get('searched/salons',[HomeController::class,'salonSearchByKeywords'])->name('search.salon');
Route::get('salon/{slug}',[HomeController::class,'vendorDetail'])->name('vendor.detail');
Route::get('booking/{slug}',[HomeController::class,'booking'])->middleware(['customer'])->name('booking');
Route::post('booking/pay-at-vendor',[BookingController::class,'createPayAtVendorBooking'])->middleware(['customer'])->name('booking.create.pay_at_vendor');
Route::post('booking/razorpay',[BookingController::class,'createRazorpayBooking'])->middleware(['customer'])->name('booking.create.razorpay');
Route::post('booking/razorpay/verify-payment',[BookingController::class,'verifyRazorpayPayment'])->middleware(['customer'])->name('booking.payment.razorpay.verify');

//Social Login
Route::get('login/{provider}', [SocialController::class,'redirect']);
Route::get('auth/{provider}/callback',[SocialController::class,'Callback']);


// Auth::routes();
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('admin/login',[HomeController::class,'adminLogin'])->name('admin.login');
Route::get('/home', [HomeController::class, 'index']);
// Route::get('vendor/login',[HomeController::class,'vendorLogin'])->name('vendor.login');
//admin

Route::post('getservice',[HomeController::class,'getService'])->name('getservice');
Route::post('getSubService',[HomeController::class,'getSubService'])->name('getSubService');
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['customer']], function () {
    Route::get('profile',[HomeController::class,'userProfile'])->name('profile');
    Route::post('profile',[HomeController::class,'userProfileupdate'])->name('userProfileupdate');
    Route::get('orders',[HomeController::class,'ordersProfile'])->name('orders');
    Route::post('booking/review',[HomeController::class,'review'])->name('reviews');

});

//Pages
Route::get('about-us',[HomeController::class,'aboutUs'])->name('about.us');
Route::get('terms-conditions',[HomeController::class,'termsAndConditions'])->name('terms.conditions');
Route::get('privacy-policy',[HomeController::class,'privacyPolicy'])->name('privacy.policy');
Route::get('faq-updates',[HomeController::class,'faqAndUpdates'])->name('faq.updates');
Route::get('refund-policy',[HomeController::class,'refundPolicy'])->name('refund.policy');
Route::get('news-feeds',[HomeController::class,'newsFeeds'])->name('news.feeds');
//Route::get('contact-us',[HomeController::class,'contactUs'])->name('contact.us');
Route::get('our-services',[HomeController::class,'ourServices'])->name('our.services');
Route::get('portfolio',[HomeController::class,'portfolio'])->name('portfolio');
Route::get('contact-us',[ContactController::class,'create'])->name('contact.us');
Route::post('contact-us/submit',[ContactController::class,'store'])->name('submit.contact');


Route::post('store/userLocation',[HomeController::class,'userLocation'])->name('store.userLocation');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::post('updatepassword',[AdminController::class,'adminChangePassword'])->name('updatepassword');
    Route::get('changepassword',[AdminController::class,'vendorChangePassword'])->name('changepassword');

    Route::get('categories',[CategoryController::class,'index'])->name('categories');
    Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');

    Route::get('services',[ServiceController::class,'index'])->name('services');
    Route::get('service/create',[ServiceController::class,'create'])->name('service.create');
    Route::post('service/store',[ServiceController::class,'store'])->name('service.store');
    Route::get('service/edit/{id}',[ServiceController::class,'edit'])->name('service.edit');
    Route::post('service/update/{id}',[ServiceController::class,'update'])->name('service.update');
    Route::get('service/delete/{id}',[ServiceController::class,'destroy'])->name('service.delete');

    Route::get('subservices',[SubServiceController::class,'index'])->name('subservices');
    Route::get('subservice/create',[SubServiceController::class,'create'])->name('subservice.create');
    Route::post('subservice/store',[SubServiceController::class,'store'])->name('subservice.store');
    Route::get('subservice/edit/{id}',[SubServiceController::class,'edit'])->name('subservice.edit');
    Route::post('subservice/update/{id}',[SubServiceController::class,'update'])->name('subservice.update');
    Route::get('subservice/delete/{id}',[SubServiceController::class,'destroy'])->name('subservice.delete');
    
    Route::get('membership/plans',[PackageController::class,'index'])->name('packages');
    Route::get('membership/plan/create',[PackageController::class,'create'])->name('package.create');
    Route::post('membership/plan/store',[PackageController::class,'store'])->name('package.store');
    Route::get('membership/plan/edit/{id}',[PackageController::class,'edit'])->name('package.edit');
    Route::post('membership/plan/update/{id}',[PackageController::class,'update'])->name('package.update');
    Route::get('membership/plan/delete/{id}',[PackageController::class,'destroy'])->name('package.delete');
    
    Route::get('amenities',[AmenityController::class,'index'])->name('amenities');
    Route::get('amenity/create',[AmenityController::class,'create'])->name('amenity.create');
    Route::post('amenity/store',[AmenityController::class,'store'])->name('amenity.store');
    Route::get('amenity/edit/{id}',[AmenityController::class,'edit'])->name('amenity.edit');
    Route::post('amenity/update/{id}',[AmenityController::class,'update'])->name('amenity.update');
    Route::get('amenity/delete/{id}',[AmenityController::class,'destroy'])->name('amenity.delete');

    Route::get('coupons',[CouponController::class,'index'])->name('coupons');
    Route::get('coupon/create',[CouponController::class,'create'])->name('coupon.create');
    Route::post('coupon/store',[CouponController::class,'store'])->name('coupon.store');
    Route::get('coupon/edit/{id}',[CouponController::class,'edit'])->name('coupon.edit');
    Route::post('coupon/update/{id}',[CouponController::class,'update'])->name('coupon.update');
    Route::get('coupon/delete/{id}',[CouponController::class,'destroy'])->name('coupon.delete');

    Route::get('vendors',[VendorController::class,'index'])->name('vendors');
    Route::get('vendor/create',[VendorController::class,'create'])->name('vendor.create');
    Route::post('vendor/store',[VendorController::class,'store'])->name('vendor.store');
    Route::get('vendor/edit/{id}',[VendorController::class,'edit'])->name('vendor.edit');
    Route::post('vendor/update/{id}',[VendorController::class,'update'])->name('vendor.update');
    Route::get('vendor/delete/{id}',[VendorController::class,'destroy'])->name('vendor.delete');
     Route::post('vendor/status',[VendorController::class,'updateStatus'])->name('vendor.status');
     Route::post('vendor/featured',[VendorController::class,'updateFeatured'])->name('vendor.featured');
     
    Route::get('pages',[PageController::class,'index'])->name('pages');
    Route::get('page/create',[PageController::class,'create'])->name('page.create');
    Route::post('page/store',[PageController::class,'store'])->name('page.store');
    Route::get('page/edit/{id}',[PageController::class,'edit'])->name('page.edit');
    Route::post('page/update/{id}',[PageController::class,'update'])->name('page.update');
    Route::get('page/delete/{id}',[PageController::class,'destroy'])->name('page.delete');


    Route::get('queries',[QueryController::class,'index'])->name('queries');

    Route::get('settings',[SettingController::class,'index'])->name('settings');
    Route::post('setting/update',[SettingController::class,'update'])->name('setting.update');
    Route::get('subscriptions',[SubscriptionController::class,'index'])->name('subscriptions');
});

Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => ['vendor']], function () {
    Route::get('dashboard',[AdminController::class,'vendorDashboard'])->name('dashboard');
    Route::get('changepassword',[AdminController::class,'vendorChangePassword'])->name('changepassword');
    Route::post('updatepassword',[AdminController::class,'vendorUpdatePassword'])->name('updatepassword');
    Route::get('/editprofile',[AdminController::class,'editprofile'])->name('editprofile');
    Route::post('/editprofile',[AdminController::class,'updateprofile'])->name('updateprofile');

    Route::get('staff',[VendorStaffController::class,'index'])->name('staff');
    Route::get('staff/create',[VendorStaffController::class,'create'])->name('staff.create');
    Route::post('staff/store',[VendorStaffController::class,'store'])->name('staff.store');
    Route::get('staff/edit/{id}',[VendorStaffController::class,'edit'])->name('staff.edit');
    Route::post('staff/update/{id}',[VendorStaffController::class,'update'])->name('staff.update');
    Route::get('staff/delete/{id}',[VendorStaffController::class,'destroy'])->name('staff.delete');

    Route::get('galleries',[VendorGalleryController::class,'index'])->name('galleries');
    Route::get('gallery/create',[VendorGalleryController::class,'create'])->name('gallery.create');
    Route::post('gallery/store',[VendorGalleryController::class,'store'])->name('gallery.store');
    Route::get('gallery/edit/{id}',[VendorGalleryController::class,'edit'])->name('gallery.edit');
    Route::post('gallery/update/{id}',[VendorGalleryController::class,'update'])->name('gallery.update');
    Route::get('gallery/delete/{id}',[VendorGalleryController::class,'destroy'])->name('gallery.delete');

    Route::get('services',[VendorServiceController::class,'index'])->name('services');
    Route::get('service/create',[VendorServiceController::class,'create'])->name('service.create');
    Route::post('service/store',[VendorServiceController::class,'store'])->name('service.store');
    Route::get('service/edit/{id}',[VendorServiceController::class,'edit'])->name('service.edit');
    Route::post('service/update/{id}',[VendorServiceController::class,'update'])->name('service.update');
    Route::get('service/delete/{id}',[VendorServiceController::class,'destroy'])->name('service.delete');

    Route::get('coupons', function () {
        return view('vendor.coupon.index');
    })->name('coupons');

    Route::get('ratings', function () {
        return view('vendor.rating.index');
    })->name('ratings');
    
    Route::post('active/coupon',[CouponController::class,'ActiveCoupon'])->name('active.coupon');
    
    Route::get('bookings',[BookingController::class,'vendorBookings'])->name('bookings');
    Route::get('queries/add',[QueryController::class,'vendorCreateQueries'])->name('queries.add');
    Route::post('queries/add',[QueryController::class,'vendorStoreQueries'])->name('queries.storequery');

    Route::get('allinvoices',[AdminController::class,'allinvoices'])->name('allinvoices');
    Route::get('addinvoice',[AdminController::class,'addinvoice'])->name('addinvoice');
    Route::post('saveinvoice',[AdminController::class,'saveinvoice'])->name('saveinvoice');


    Route::get('queries',[QueryController::class,'vendorQueries'])->name('queries');

});
