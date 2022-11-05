@extends('frontend.layouts.app')
@section('meta_title','Salon Register')
@section('meta_description','Salon Register')
@section('content')
    @include('frontend.includes.other-header')
    <main>
        <div class="breadcrumb-area" style="background-image: url(https://images.pexels.com/photos/705255/pexels-photo-705255.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)" data-overlay="dark" data-opacity="7">
            <div class="container pt-150 pb-150 position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title">
                            <h3 class="title">Salon Sign Up</h3>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-nav">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Sign Up</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- sign area start -->
        <div class="sign-up-area pb-100 pt-100 fix">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-6">
                    <div class="sign__wrapper">
                         <livewire:vendor-register />
                    </div>
                </div>
            </div>
        </div>
        <!-- sign area end -->
    </main>
@endsection
@section('style')

@endsection
@section('script')
    @livewireScripts
    <script src="{{ asset('storage/frontend/assets/js/registration.js') }}"></script>
@endsection
