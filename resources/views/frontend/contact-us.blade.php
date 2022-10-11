@extends('frontend.layouts.app')
@section('meta_title', 'Listing')
@section('meta_description', 'Listing')
@section('content')
    @include('frontend.includes.other-header')
    <div class="container-fluid">
        <div class="row" style="margin:20px">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="sign__wrapper">
                    @if (session('success'))
                    <h4 style="text-align: center"><a class="text-success">{{ session('success') }}</a></h4>
                    @endif
                    <form method="post" action="{{ route('submit.contact') }}">
                        @csrf
                        <h3>Contact Us</h3>
                        <div class="col">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Name</label>
                                <input type="text" name="name" value="" id="input-username"
                                    class="form-control form-control-alternative" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-email">Email</label>
                                <input type="text" name="email" value="" id="input-email"
                                    class="form-control form-control-alternative" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-comment">Comment</label>
                                <textarea class="form-control" id="input-comment" rows="3" name="comment" placeholder="Comment ..." required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="m-btn m-btn-4">Submit</button>
                    </form>
                </div>
    
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


@endsection
