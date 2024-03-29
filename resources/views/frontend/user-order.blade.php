@extends('frontend.layouts.app')
@section('meta_title', 'Register')
@section('meta_description', 'Register')
@section('content')
    @include('frontend.includes.other-header')
    <!-- Page content -->
    <div class="container">
        <div class="row pt-80 pb-80">
            <div class="col-xl-4 order-xl-1 mb-5 mb-xl-0">
                <div class="profile__wrapper white-bg">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 profile-data">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('storage/frontend/assets/img/staff.jpeg') }}" class="rounded-circle">
                                </a>
                            </div>
                            <a href="">
                                <div class="edit-img">
                                    <i class="fas fa-pen"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{ Auth::user()->name }}
                        </h3>
                        <a href="#">Edit Basic Info</a>
                        <hr />
                    </div>
                    <div class="info">
                        @php
                            $splitName = explode(' ', Auth::user()->name, 2);
                        @endphp
                        <div class="pt-2">
                            <h4>First Name</h4>
                            <p>{{ $splitName[0] }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Last Name</h4>
                            <p>{{ !empty($splitName[1]) ? $splitName[1] : '' }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Contact number</h4>
                            <p>+91 {{ Auth::user()->mobile }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Email Address</h4>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Date of Birth</h4>
                            <p>{{ \Carbon\Carbon::parse(Auth::user()->customer->dob)->format('d-m-Y') }}</p>
                        </div>
                        <div class="pt-2">
                            <h4>Gender</h4>
                            <p>{{ Auth::user()->customer->gender }}</p>
                        </div>
                        <hr />
                    </div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="logout text-center">
                            <h3>
                                Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-8 order-xl-2">
                <div class="profile__wrapper white-bg">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Your Orders</h3>
                            </div>
                            <div class="col-4 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4"></h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">ID</th> --}}
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">Services</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Booking Time</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Type</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Ratings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td scope="col">{{ $order->id ?? '' }}</td>
                                        <td scope="col">{{ implode(',', $order->servicename) ?? '' }}</td>
                                        <td scope="col">{{ date('d-m-Y', strtotime($order->booking_date)) ?? '' }}</td>
                                        <td scope="col">{{ $order->booking_time ?? '' }}</td>
                                        <td scope="col">{{ $order->total_amount ?? '' }}</td>
                                        <td scope="col">{{ $order->payment_type ?? '' }}</td>
                                        <td scope="col">{{ $order->payment_status ?? '' }}</td>
                                        <td>
                                            @if ($order->rating_number > 0)
                                                Rating : {{$order->rating_number}}<br>
                                                Review : {{$order->rating_review ?? ''}}
                                            @else 
                                            <button type="button" class="btn btn-primary btn-sm"
                                                onclick="reviewRating('{{ $order->id }}')"
                                                style="    padding: 7px 14px;
                                                border-radius: 15px;
                                                font-weight: 300;"
                                                >
                                                Rate Salon
                                            </button>   
                                            @endif
                                            

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float: right;">{{ $orders->links() }}</div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate Your Services</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div
                        style="display: flex;
                flex-direction: column;
                align-items: center;
                min-height: 103px;
                justify-content: space-between;">
                        <input type="hidden" id="inputBooking" />
                        <div class="my-rating"></div>
                        <textarea style="width: 100%" placeholder="Write a Review ..." id="reviewtext"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: 7px 14px;
                    border-radius: 15px;
                    font-weight: 300;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitReviewRating()" style="padding: 7px 14px;
                    border-radius: 15px;
                    font-weight: 300;">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
  

        function reviewRating(id) {
          
            $('#inputBooking').val(id)
            $('#exampleModal').modal('show');
        }

   
    </script>
@endsection
