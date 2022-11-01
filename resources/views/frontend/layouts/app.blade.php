<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/SalonNme-01.png.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- All CSS -->
    <link rel="stylesheet" href="/storage/frontend/assets/css/animate.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/meanmenu.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/flaticon.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/magnafic-popup.min.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/slick.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/spacing.css">
    <link rel="stylesheet" href="/storage/frontend/assets/css/ratings.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/storage/frontend/assets/css/main.css">
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbx0TCodCww2q7RWzpKGsW6ZLI1-12Hwg&libraries=places&v=weekly&language=en">
    </script>
    <!--&callback=initMap-->
    @yield('style')
    <title>@yield('meta_title')</title>
</head>

<body>
    <div id="loading" class="loading-1">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>
            </div>
        </div>
    </div>
    {{-- @include('frontend.includes.header') --}}
    @yield('content')
    @include('frontend.includes.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script data-cfasync="false " src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js "></script>
    <script src="/storage/frontend/assets/js/jquery-3.6.0.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
    <script src="/storage/frontend/assets/js/meanmenu.min.js "></script>
    <script src="/storage/frontend/assets/js/back-to-top.min.js "></script>
    <script src="/storage/frontend/assets/js/popper.min.js "></script>
    <script src="/storage/frontend/assets/js/nice-select.min.js "></script>
    <script src="/storage/frontend/assets/js/bootstrap.min.js "></script>
    <script src="/storage/frontend/assets/js/slick.min.js "></script>
    <script src="/storage/frontend/assets/js/magnafic.popup.min.js "></script>
    <script src="/storage/frontend/assets/js/script.js "></script>
    <script src="/storage/frontend/assets/js/ratings.js "></script>
    @yield('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js "
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin=" anonymous " referrerpolicy="no-referrer "></script>
</body>
<script>
    var rating = '';
    $('.slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick "
            // instead of a settings object
        ]
    });
    $(".my-rating").starRating({
        strokeColor: '#894A00',
        strokeWidth: 10,
        starSize: 25,
        useFullStars: true,
        callback: function(currentRating, $el) {
            rating = currentRating;
        }
    });

    function submitReviewRating() {
        var bookingId = $('#inputBooking').val();
        var bookingText = $('#reviewtext').val()
        // console.log("here",rating,bookingId,bookingText);
        $.post("booking/review", {
                bookingid: bookingId,
                bookingText:bookingText,
                rating:rating,
                _token:$('meta[name="csrf-token"]').attr('content')
            },
            function(data, status) {
                // alert("Data: " + data + "\nStatus: " + status);
                if (status === 'success') {
                    window.location.reload();
                }
            });
    }
</script>


</html>
