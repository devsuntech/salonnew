@extends('frontend.layouts.app')
@section('meta_title','Listing')
@section('meta_description','Listing')
@section('content')
    @include('frontend.includes.other-header')
    <form method="post" action="{{route('submit.contact')}}">
        @csrf
        <input name="name" placeholder="Your Name">
        <button type="submit">Submit</button>
    </form>
@endsection
