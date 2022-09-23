@extends('frontend.layouts.app')
@section('meta_title',$page->meta_title)
@section('meta_description',$page->meta_description)
@section('content')
    @include('frontend.includes.other-header')
    <div class="container">
        <div class="row">
           <div class="col-md-12">
               <p>
                   {{$page->description}}
               </p>
           </div> 
        </div>
    </div>
@endsection