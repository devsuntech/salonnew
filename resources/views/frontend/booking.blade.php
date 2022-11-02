<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/SalonNme-01.png.png">

    <!-- All CSS -->
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/magnafic-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('storage/frontend/assets/css/main.css') }}">
    <title>Service Booking</title>
    <style>
        .book__select_time_date_box {
            padding: 0.6em;
            font-size: 1.5em;
            border: 1px solid #eee;
            text-align: center;
            border-radius: 0.3em;
            cursor: pointer;
        }

        .book__select_time_date_box.active {
            background: #f9c1b6;
            border-color: #f9c1b6;
            color: white;
        }

        .book__select_time_date_box:hover {
            border-color: #f9c1b6;
        }

        .book__select_time_date_box.next_button,
        .book__select_time_date_box.prev_button {
            align-self: center;
            border: none;
            opacity: .5;
            cursor: not-allowed;
        }

        .book__select_time_date_box.next_button.enabled,
        .book__select_time_date_box.prev_button.enabled {
            opacity: 1;
            cursor: pointer;
        }

        .book__select_time_date_box.prev_button {
            padding-left: 0;
        }

        .book__select_time_date_box.next_button {
            padding-right: 0;
        }

        .service-list label {
            display: block;
            color: #777777;
        }

        @media (min-width: 300px) {

            .toppostitoncustom {
                margin-top: 168px !important;
            }
        }


        @media (min-width: 768px) {

            .toppostitoncustom {
                margin-top: 168px !important;
            }
        }


        @media (min-width: 992px) {

            .toppostitoncustom {
                margin-top: 100px !important;
            }

            .toppostitoncustomdown {
                margin-top: 100px;
            }
        }


        @media (min-width: 1200px) {
            .toppostitoncustom {
                margin-top: 100px;
            }

            .toppostitoncustomdown {
                margin-top: 100px;
            }
        }
    </style>
</head>

<body style="background-color: #f2f2f7;">
    <div class="booking-nav">

        <h2>Book Your Appointment</h2>

    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-7 col-lg-7 toppostitoncustom">
                <form class="" id="booking-form">
                    <input type="hidden" value="<?= $vendor->id ?>" name="vendor_id" />

                    <div class="col-xl-12 col-lg-12 form-step form-step-active">

                        <div class="service-progress ">

                            <div>
                                <p></p>
                                <h2>
                                    Review and Confirm
                                </h2>
                            </div>
                            <div>
                                <button type="button" class="ml-auto btn-next btn arrow-btn" wire:click="submitForm">
                                    {{-- <i class="fas fa-angle-right arrow"></i> --}}
                                </button>
                            </div>
                        </div>

                        <div class="book__wrapper white-bg">
                            <div class="service-list" >
                                <label for="pay-at-vendor">
                                    <div class="list-sec row">
                                        <div class="col-lg-9 service-name">
                                            <div class="staff-img2">
                                                <div class="img-avtar">
                                                    <i class="far fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>Pay at Salon</h4>
                                                <span>Book now pay later</span>
                                            </div>
                                        </div>
                                        <div class="checkbox col-lg-3 text-right">
                                            <input class="d-none" type="radio" name="payment_type" value="pay-at-vendor" id="pay-at-vendor" />
                                            <i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="service-list" >
                                <label for="razorpay">
                                    <div class="list-sec row">
                                        <div class="col-lg-9 service-name">
                                            <div class="staff-img2">
                                                <div class="img-avtar">
                                                    <i class="far fa-credit-card"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>Pay Online</h4>
                                                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 32"
                                                        class="paymentgateways Icon-sc-c98r68-0 dSuruW styled__CardIcon-sc-17tfpv0-2 kMurAP">
                                                        <rect width="45" height="32" fill="#FFF"
                                                            rx="4"></rect>
                                                        <g fill="#1A1876" fill-rule="nonzero">
                                                            <path
                                                                d="M16.318 21.78h2.839l1.777-10.534h-2.84zM36.743 11.256h-2.195a1.413 1.413 0 00-1.488.874l-4.218 9.65h2.983s.488-1.298.598-1.583h3.638c.084.37.346 1.579.346 1.579h2.635l-2.3-10.52zm-3.502 6.79c.117-.304 1.276-3.313 1.508-3.95.383 1.815.01.054.85 3.95H33.24zm-19.305-6.792l-2.782 7.183-.296-1.46-.996-4.84c-.15-.58-.7-.959-1.288-.89h-4.58l-.036.22c1.041.249 2.045.638 2.984 1.157l2.524 9.148h3.006l4.472-10.514-3.008-.004zm12.725 4.222c-.992-.487-1.6-.813-1.594-1.306 0-.44.515-.906 1.633-.906.823-.021 1.64.159 2.38.524l.385-2.282a7.27 7.27 0 00-2.547-.44c-2.806 0-4.788 1.43-4.8 3.476-.015 1.514 1.415 2.358 2.489 2.86 1.106.516 1.478.845 1.472 1.306-.007.706-.882 1.03-1.7 1.03a6.165 6.165 0 01-3.039-.721l-.398 2.357a8.886 8.886 0 003.163.562c2.986 0 4.924-1.412 4.946-3.598.006-1.199-.75-2.11-2.39-2.862z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 32"
                                                        class="paymentgateways Icon-sc-c98r68-0 dSuruW styled__CardIcon-sc-17tfpv0-2 kMurAP">
                                                        <rect width="45" height="32" fill="#FFF"
                                                            rx="4"></rect>
                                                        <g transform="translate(11 9)" fill-rule="nonzero">
                                                            <path fill="#F26622"
                                                                d="M11.47 1.519A6.96 6.96 0 008.789 7a6.96 6.96 0 002.683 5.481A6.96 6.96 0 0014.154 7a6.96 6.96 0 00-2.683-5.481z">
                                                            </path>
                                                            <ellipse cx="7.077" cy="7" fill="#E61C24"
                                                                rx="7.077" ry="7"></ellipse>
                                                            <ellipse cx="15.865" cy="7" fill="#F99F1B"
                                                                rx="7.077" ry="7"></ellipse>
                                                        </g>
                                                    </svg><svg width="142" height="141" viewBox="0 0 142 141"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class=" paymentgateways Icon-sc-c98r68-0 dSuruW styled__CardIcon-sc-17tfpv0-2 kMurAP">
                                                        <path
                                                            d="M141.134 0H0V141H141.16V94.465C141.752 93.5413 142.044 92.4571 141.995 91.361C141.995 89.921 141.719 89.025 141.159 88.273"
                                                            fill="url(#paint0_radial_6:14620)"></path>
                                                        <path
                                                            d="M12.67 60.648L9.963 54.08L7.277 60.648H12.67V60.648ZM72.226 58.035C71.618 58.3247 70.9419 58.4413 70.272 58.372H65.472V54.716H70.337C70.974 54.666 71.615 54.766 72.207 55.009C72.757 55.277 73.087 55.854 73.037 56.464C73.0594 56.7749 72.9956 57.0859 72.8527 57.3629C72.7098 57.6399 72.4933 57.8721 72.227 58.034L72.226 58.035ZM106.452 60.648L103.722 54.08L101.005 60.648H106.452ZM42.655 67.756H38.608V54.84L32.881 67.756H29.393L23.65 54.84V67.756H15.606L14.11 64.08H5.886L4.351 67.756H0.060997L7.133 51.284H13.005L19.708 66.877V51.284H26.153L31.323 62.456L36.073 51.284H42.646V67.756H42.656H42.655ZM58.795 67.756H45.59V51.284H58.784V54.716H49.544V57.696H58.564V61.076H49.544V64.363H58.784L58.794 67.756H58.795ZM77.409 55.72C77.4371 56.6466 77.1865 57.5603 76.6896 58.343C76.1928 59.1256 75.4725 59.7412 74.622 60.11C75.387 60.39 76.062 60.868 76.576 61.497C77.134 62.317 77.234 63.047 77.234 64.517V67.757H73.247V65.675C73.247 64.681 73.341 63.26 72.624 62.471C72.044 61.891 71.168 61.766 69.748 61.766H65.505V67.756H61.553V51.286H70.639C72.634 51.286 74.129 51.339 75.425 52.074C76.721 52.81 77.408 53.884 77.408 55.721L77.409 55.72ZM83.729 67.756H79.696V51.284H83.728V67.756H83.729ZM130.485 67.756H124.868L117.391 55.392V67.756H109.336L107.796 64.08H99.592L98.097 67.756H93.477C91.557 67.756 89.124 67.329 87.749 65.933C86.373 64.537 85.635 62.64 85.635 59.643C85.635 57.2 86.069 54.97 87.765 53.186C89.045 51.87 91.043 51.264 93.745 51.264H97.568V54.796H93.855C92.415 54.796 91.602 55.009 90.815 55.789C90.142 56.484 89.679 57.775 89.679 59.519C89.679 61.262 90.033 62.554 90.766 63.389C91.374 64.039 92.481 64.239 93.522 64.239H95.297L100.834 51.283H106.754L113.464 66.876V51.284H119.474L126.418 62.754V51.284H130.464V67.756H130.484H130.485ZM0.0199966 70.99H6.77L8.29 67.33H11.698L13.193 70.99H26.476V68.193L27.656 71H34.546L35.732 68.15V70.99H68.737V64.984H69.375C69.825 64.984 69.953 65.039 69.953 65.779V70.989H87.019V69.589C88.9876 70.5626 91.1634 71.043 93.359 70.989H100.539L102.075 67.329H105.485L106.98 70.989H120.817V67.512L122.915 70.989H134V48H123.035V50.712L121.475 48H110.215V50.712L108.81 48H93.598C91.051 48 88.813 48.353 87.004 49.34V48H76.507V49.34C75.361 48.323 73.791 48 72.047 48H33.703L31.131 53.96L28.491 48H16.414V50.712L15.107 48H4.785L0 58.93V70.98L0.0199966 70.99V70.99ZM140.995 82.785H133.765C133.214 82.7213 132.656 82.8251 132.165 83.083C131.97 83.2103 131.813 83.3879 131.711 83.5971C131.609 83.8062 131.566 84.0391 131.585 84.271C131.565 84.828 131.918 85.329 132.451 85.501C132.948 85.648 133.466 85.7099 133.983 85.684L136.129 85.744C138.295 85.798 139.745 86.166 140.631 87.071C140.771 87.191 140.896 87.328 141.001 87.479L140.996 82.786L140.995 82.785ZM141 93.655C140.035 95.053 138.16 95.765 135.617 95.765H127.964V92.23H135.587C136.343 92.23 136.873 92.13 137.193 91.822C137.493 91.542 137.663 91.152 137.658 90.742C137.664 90.5346 137.622 90.3286 137.535 90.1401C137.448 89.9516 137.319 89.7856 137.158 89.655C136.753 89.3625 136.254 89.2313 135.758 89.287C132.036 89.163 127.393 89.401 127.393 84.187C127.393 81.797 128.893 79.281 133.081 79.281H140.981V76H133.671C131.456 76 129.851 76.527 128.711 77.347V76H117.845C116.109 76 114.073 76.427 113.107 77.347V76H93.727V77.347C92.187 76.239 89.587 76 88.385 76H75.605V77.347C74.385 76.169 71.667 76 70.015 76H55.71L52.44 79.52L49.372 76H28V99H48.965L52.337 95.426L55.517 99H68.44V93.602H69.71C71.426 93.627 73.447 93.557 75.213 92.792V99H85.873V93.005H86.373C87.029 93.005 87.093 93.005 87.093 93.685V99H119.515C121.571 99 123.717 98.478 124.907 97.51V99H135.172C137.308 99 139.394 98.702 140.985 97.94V93.656H141V93.655ZM125.167 87.07C125.937 87.86 126.353 88.864 126.353 90.55C126.353 94.1 124.123 95.754 120.125 95.754H112.415V92.22H120.105C120.677 92.2874 121.253 92.1422 121.725 91.812C122.027 91.534 122.198 91.142 122.195 90.734C122.198 90.314 122.015 89.917 121.695 89.644C121.284 89.3564 120.784 89.2262 120.285 89.277C116.578 89.153 111.935 89.391 111.935 84.177C111.935 81.787 113.437 79.271 117.605 79.271H125.547V82.781H118.294C117.747 82.7158 117.192 82.8179 116.704 83.074C116.499 83.216 116.336 83.411 116.233 83.6381C116.13 83.8653 116.09 84.1161 116.119 84.3639C116.147 84.6118 116.241 84.8474 116.393 85.0456C116.544 85.2439 116.746 85.3975 116.978 85.49C117.478 85.64 117.998 85.704 118.518 85.678L120.655 85.733C122.805 85.797 124.282 86.165 125.167 87.07V87.07ZM89.395 86.05C88.7832 86.3347 88.1069 86.452 87.435 86.39H82.647V82.69H87.529C88.1735 82.6331 88.8222 82.734 89.419 82.984C89.961 83.28 90.281 83.862 90.239 84.474C90.2518 84.7867 90.1817 85.0972 90.036 85.3741C89.8902 85.651 89.6739 85.8845 89.409 86.051H89.394L89.395 86.05ZM91.785 88.104C92.552 88.374 93.227 88.854 93.732 89.486C94.287 90.291 94.372 91.042 94.387 92.493V95.763H90.385V93.701C90.385 92.708 90.48 91.241 89.745 90.476C89.165 89.886 88.285 89.746 86.839 89.746H82.646V95.766H78.644V79.28H87.794C89.794 79.28 91.264 79.365 92.564 80.056C93.2204 80.4045 93.762 80.9355 94.1235 81.5849C94.4849 82.2343 94.6507 82.9745 94.601 83.716C94.6297 84.6442 94.3778 85.5594 93.8783 86.3422C93.3788 87.125 92.6549 87.739 91.801 88.104H91.785V88.104ZM96.788 79.281H110.02V82.687H100.76V85.669H109.815V89.034H100.76V92.314H110.04V95.734H96.808L96.788 79.282V79.281ZM70.065 86.897H64.943V82.7H70.11C71.54 82.7 72.537 83.277 72.537 84.72C72.537 86.16 71.587 86.896 70.065 86.896V86.897ZM60.991 94.274L54.909 87.558L60.992 81.061V94.274H60.991ZM45.274 92.34H35.53V89.058H44.233V85.693H35.529V82.711H45.469L49.799 87.518L45.272 92.34H45.274ZM76.79 84.72C76.79 89.297 73.352 90.24 69.885 90.24H64.943V95.774H57.233L52.357 90.306L47.279 95.774H31.576V79.28H47.524L52.401 84.684L57.443 79.281H70.109C73.256 79.281 76.789 80.147 76.789 84.711V84.721L76.79 84.72Z"
                                                            fill="white"></path>
                                                        <defs>
                                                            <radialGradient id="paint0_radial_6:14620" cx="0"
                                                                cy="0" r="1"
                                                                gradientUnits="userSpaceOnUse"
                                                                gradientTransform="translate(24.7273 24.6369) scale(131.507 131.506)">
                                                                <stop stop-color="#9DD5F6"></stop>
                                                                <stop offset="0.07" stop-color="#98D3F5"></stop>
                                                                <stop offset="0.16" stop-color="#89CEF3"></stop>
                                                                <stop offset="0.25" stop-color="#70C6EF"></stop>
                                                                <stop offset="0.35" stop-color="#4EBBEA"></stop>
                                                                <stop offset="0.45" stop-color="#23ADE3"></stop>
                                                                <stop offset="0.5" stop-color="#0DA6E0"></stop>
                                                                <stop offset="1" stop-color="#2E77BC"></stop>
                                                            </radialGradient>
                                                        </defs>
                                                    </svg>
                                                    <svg width="29" height="19" viewBox="0 0 29 19"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="paymentgateways Icon-sc-c98r68-0 dSuruW styled__CardIcon-sc-17tfpv0-2 kMurAP">
                                                        <path
                                                            d="M10.4043 4.83252V13.8325C11.4042 13.5775 12.2908 12.9968 12.9239 12.1819C13.5571 11.367 13.9008 10.3645 13.9008 9.33252C13.9008 8.30058 13.5571 7.29803 12.9239 6.48315C12.2908 5.66828 11.4042 5.0875 10.4043 4.83252V4.83252Z"
                                                            fill="#0374B8"></path>
                                                        <path
                                                            d="M18.5714 0.000494863H9.23739C6.77872 0.0259446 4.42941 1.0205 2.6998 2.76811C0.970187 4.51571 0 6.8752 0 9.33399C0 11.7928 0.970187 14.1523 2.6998 15.8999C4.42941 17.6475 6.77872 18.642 9.23739 18.6675H18.5704C19.8042 18.6803 21.0283 18.4484 22.172 17.9851C23.3156 17.5219 24.356 16.8365 25.233 15.9686C26.1101 15.1006 26.8063 14.0674 27.2815 12.9287C27.7567 11.79 28.0014 10.5684 28.0015 9.3345C28.0016 8.10061 27.757 6.87896 27.2819 5.74019C26.8068 4.60143 26.1107 3.56816 25.2337 2.70015C24.3568 1.83214 23.3164 1.14661 22.1729 0.683228C21.0293 0.219842 19.8052 -0.0122102 18.5714 0.000494863V0.000494863ZM9.23739 16.3335C7.85292 16.3335 6.49954 15.923 5.3484 15.1538C4.19725 14.3846 3.30004 13.2914 2.77023 12.0123C2.24042 10.7332 2.10179 9.32573 2.37189 7.96786C2.64199 6.61 3.30867 5.36272 4.28764 4.38375C5.26661 3.40478 6.51389 2.73809 7.87176 2.468C9.22962 2.1979 10.6371 2.33652 11.9162 2.86634C13.1953 3.39615 14.2885 4.29336 15.0577 5.4445C15.8268 6.59565 16.2374 7.94903 16.2374 9.3335C16.2355 11.1894 15.4974 12.9688 14.1851 14.2812C12.8727 15.5935 11.0933 16.3316 9.23739 16.3335V16.3335Z"
                                                            fill="#0374B8"></path>
                                                        <path
                                                            d="M8.0717 4.83252C7.07176 5.0875 6.18523 5.66828 5.55207 6.48315C4.91891 7.29803 4.5752 8.30058 4.5752 9.33252C4.5752 10.3645 4.91891 11.367 5.55207 12.1819C6.18523 12.9968 7.07176 13.5775 8.0717 13.8325V4.83252Z"
                                                            fill="#0374B8"></path>
                                                    </svg><svg width="42" height="8" viewBox="0 0 42 8"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class=" paymentgateways Icon-sc-c98r68-0 dSuruW styled__CardIcon-sc-17tfpv0-2 kMurAP">
                                                        <path
                                                            d="M22.1992 0.0262121C21.269 0.00934738 20.3702 0.362561 19.7004 1.0082C19.0306 1.65383 18.6446 2.53904 18.6272 3.46921C18.6021 4.1798 18.7898 4.88168 19.1663 5.48487C19.5428 6.08805 20.0908 6.56505 20.7402 6.85468C21.3895 7.14432 22.1106 7.23339 22.8109 7.11048C23.5113 6.98758 24.1589 6.65829 24.6708 6.16485C25.1828 5.67141 25.5356 5.0363 25.6842 4.34097C25.8328 3.64564 25.7703 2.92178 25.5047 2.26221C25.2392 1.60264 24.7826 1.03742 24.1937 0.639034C23.6048 0.240648 22.9103 0.027253 22.1992 0.0262121V0.0262121Z"
                                                            fill="#FA7000"></path>
                                                        <path
                                                            d="M1.92 0.152264H0V6.85226H1.909C2.77457 6.89966 3.62682 6.62342 4.3 6.07726C4.67854 5.76336 4.98368 5.37031 5.19394 4.92577C5.4042 4.48123 5.51448 3.99601 5.517 3.50426C5.52201 3.04158 5.43044 2.58294 5.24817 2.15764C5.06589 1.73235 4.7969 1.34975 4.45839 1.0343C4.11988 0.718843 3.71928 0.477468 3.28221 0.325594C2.84513 0.173719 2.38118 0.114686 1.92 0.152264V0.152264ZM3.449 5.18426C2.94393 5.58789 2.30158 5.77905 1.658 5.71726H1.308V1.28626H1.659C1.97845 1.25407 2.30111 1.28528 2.60846 1.37812C2.91581 1.47096 3.2018 1.6236 3.45 1.82726C3.67876 2.04023 3.86086 2.29834 3.98479 2.58527C4.10871 2.8722 4.17178 3.18172 4.17 3.49426C4.17242 3.81038 4.10964 4.12361 3.98559 4.41439C3.86153 4.70516 3.67887 4.96724 3.449 5.18426V5.18426ZM6.119 0.152264H7.421V6.85226H6.119V0.152264ZM10.619 2.72026C9.833 2.43126 9.6 2.23926 9.6 1.87726C9.6 1.45626 10.011 1.13626 10.575 1.13626C10.7805 1.13997 10.9825 1.19043 11.1657 1.28382C11.3488 1.37721 11.5083 1.51107 11.632 1.67526L12.312 0.784263C11.7725 0.300849 11.0724 0.0356203 10.348 0.040264C10.0838 0.0237748 9.819 0.0607537 9.56942 0.148989C9.31985 0.237223 9.09065 0.3749 8.89552 0.553779C8.7004 0.732659 8.54336 0.949065 8.43382 1.19005C8.32428 1.43103 8.26448 1.69163 8.258 1.95626C8.258 2.88226 8.678 3.35626 9.904 3.79826C10.2176 3.89562 10.5208 4.02392 10.809 4.18126C10.9287 4.25245 11.0277 4.35364 11.0963 4.47483C11.1648 4.59603 11.2006 4.73302 11.2 4.87226C11.199 5.00222 11.1716 5.13061 11.1193 5.24958C11.067 5.36855 10.9909 5.47559 10.8958 5.56415C10.8007 5.65271 10.6885 5.72093 10.5661 5.76462C10.4437 5.80832 10.3137 5.82657 10.184 5.81826C9.88464 5.82265 9.59047 5.73992 9.33729 5.58012C9.08411 5.42033 8.88284 5.19038 8.758 4.91826L7.916 5.73526C8.15314 6.13631 8.49342 6.46648 8.90143 6.69142C9.30945 6.91635 9.77029 7.02783 10.236 7.01426C10.5354 7.03469 10.8358 6.99265 11.1181 6.89081C11.4004 6.78897 11.6584 6.62956 11.8758 6.42269C12.0932 6.21582 12.2652 5.96601 12.3809 5.68912C12.4967 5.41223 12.5535 5.11431 12.548 4.81426C12.55 3.74626 12.106 3.26326 10.619 2.72026V2.72026ZM12.959 3.50426C12.9549 3.96816 13.0439 4.42817 13.2206 4.85709C13.3974 5.28601 13.6584 5.67513 13.9881 6.00144C14.3179 6.32775 14.7097 6.58462 15.1405 6.75687C15.5712 6.92912 16.0322 7.01324 16.496 7.00426C17.0646 7.00495 17.6252 6.87096 18.132 6.61326V5.07026C17.9376 5.29954 17.6957 5.48391 17.4231 5.61063C17.1505 5.73735 16.8536 5.80342 16.553 5.80426C16.2501 5.81306 15.9488 5.75883 15.668 5.64502C15.3872 5.53121 15.1331 5.36029 14.9218 5.1431C14.7106 4.92592 14.5467 4.66721 14.4407 4.38337C14.3347 4.09953 14.2888 3.79676 14.306 3.49426C14.2964 3.19852 14.3458 2.90382 14.4514 2.62738C14.5569 2.35094 14.7164 2.09828 14.9207 1.88417C15.1249 1.67006 15.3698 1.49878 15.6409 1.38033C15.9121 1.26188 16.2041 1.19862 16.5 1.19426C16.8107 1.19598 17.1174 1.26415 17.3996 1.3942C17.6818 1.52425 17.9329 1.71316 18.136 1.94826V0.410263C17.6412 0.139722 17.086 -0.0013146 16.522 0.000263102C16.0575 -0.00541644 15.5964 0.0809079 15.1654 0.254259C14.7345 0.42761 14.342 0.684559 14.0108 1.01029C13.6796 1.33602 13.4161 1.7241 13.2356 2.15214C13.0551 2.58018 12.9611 3.03972 12.959 3.50426V3.50426ZM28.72 4.65026L26.934 0.152264H25.508L28.349 7.02126H29.049L31.949 0.152264H30.532L28.72 4.65026ZM32.538 6.85226H36.243V5.71726H33.843V3.90926H36.149V2.77326H33.846V1.28626H36.246V0.152264H32.538V6.85226ZM41.417 2.12826C41.417 0.873263 40.556 0.151262 39.047 0.151262H37.106V6.85126H38.416V4.15726H38.586L40.386 6.85126H42L39.892 4.02626C40.3398 3.96302 40.7468 3.73158 41.0301 3.37901C41.3133 3.02644 41.4517 2.57921 41.417 2.12826V2.12826ZM38.797 3.22826H38.418V1.20726H38.818C39.635 1.20726 40.072 1.55026 40.072 2.20726C40.071 2.87126 39.634 3.23326 38.8 3.23326L38.797 3.22826Z"
                                                            fill="#444444"></path>
                                                    </svg></span>
                                            </div>
                                        </div>
                                        <div class="checkbox col-lg-3 text-right">
                                            <input class="d-none" type="radio" name="payment_type" value="razorpay" id="razorpay" />
                                            <i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="service-list" onclick="cancelService()">
                                <label for="pay-at-vendor">
                                    <div class="list-sec row">
                                        <div class="col-lg-9 service-name">
                                            <div class="staff-img2">
                                                <div class="img-avtar">
                                                    <i class="far fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>Cancel Booking</h4>
                                                <span>Cancel Booking and Reselect Your Services</span>
                                            </div>
                                        </div>
                                        <div class="checkbox col-lg-3 text-right">
                                            {{-- <input class="d-none" type="radio" name="payment_type" value="pay-at-vendor" id="pay-at-vendor" /> --}}
                                            <i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-xl-5 col-lg-5 toppostitoncustomdown">
                <div class="book__wrapper white-bg ">
                    <div class="book__form">

                        <div class="salon-img-icon">
                            <div class="img-icon-box">
                                <img src="{{ asset('storage/' . $vendor->feature_image) }}" height="100" />
                            </div>
                        </div>

                        <div class="salon-info text-center">
                            <h4>{{ $vendor->firm_name }}</h4>
                            <p>{{ $vendor->firm_address }}</p>
                        </div>
                        <hr />
                        <div class="booking__cart__selected_services">
                        </div>
                        <div class="total">

                            <div class="list-sec row">
                                <div class="col-lg-9 total-amt text-left">
                                    <div>
                                        <h4>Total</h4>

                                    </div>
                                </div>
                                <div class="col-lg-3 text-right">
                                    <h4>₹<span class="booking__cart__total"></span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script data-cfasync="false " src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js "></script>
    <script src="{{ asset('storage/frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/meanmenu.min.js') }}"></script>
    {{-- <script src="{{ asset('storage/frontend/assets/js/back-to-top.min.js') }}"></script> --}}
    <script src="{{ asset('storage/frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/magnafic.popup.min.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/script.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/booking.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/registration.js') }}"></script>
    <script src="{{ asset('storage/frontend/assets/js/tab-scrollable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js "
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin=" anonymous " referrerpolicy="no-referrer "></script>
    <script src="{{ asset('storage/frontend/assets/js/date.js') }}"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function() {

            var allData = JSON.parse(localStorage.getItem('data'))

            var htmldata = ""
            var total = 0
            allData.items.forEach(element => {
                // console.log(element.price)
                // htmldata
                let tempElement = JSON.parse(element)
                total += parseInt(tempElement.price)
                htmldata += '<div class="list-sec row"><div class="col-lg-9 service-name"><div><h4>' +
                    tempElement.subservicename + '</h4><span>' + tempElement.subserviceminute +
                    'Min</span></div></div><div class="col-lg-3 service-amt"><h4>₹' + tempElement.price +
                    '</h4></div></div>'
            });
            // console.log(total)
            $('.booking__cart__selected_services').append(htmldata)
            $('.booking__cart__total').append('')
            $('.booking__cart__total').append(total)
            /* 
                Booking processing start
            */
     

            $('[name="payment_type"]').click(function (event) {
                let bookingData = allData;
                bookingData._token = '<?= csrf_token() ?>';
                let checkPaymentDetails= event.target.value;
                if (checkPaymentDetails == 'pay-at-vendor') {
                    let confirmBooking = confirm("Do you want to confirm the booking?")
                    if (confirmBooking) {
                        createPayAtVendorBooking(bookingData);
                    }
                    return;
                } else if(checkPaymentDetails == 'razorpay') {
                    createRazorpayBooking(bookingData);
                }
                // console.log("here")
            });


            let createPayAtVendorBooking = (bookingData) => {
                $.post("<?= route('booking.create.pay_at_vendor') ?>", bookingData)
                    .done(function(data) {
                        alert('Your booking is confirmed, booking ID is: ' + data.id);
                        localStorage.removeItem("data");
                        window.location = '<?= route('user.orders') ?>'
                    })
                    .fail(function() {
                        alert("error");
                    });
            }

            let razorpayHandler = (response) => {
                verifyRazorpayPayment(response);
            }

            let verifyRazorpayPayment = (response) => {
                response._token = '<?= csrf_token() ?>';
                $.post("<?= route('booking.payment.razorpay.verify') ?>", response)
                    .done(function(data) {
                        alert('Your booking is confirmed, booking ID is: ' + data.booking_id);
                        localStorage.removeItem("data");
                        window.location = '<?= route('user.orders') ?>'

                    })
                    .fail(function() {
                        alert("error");
                    });
            }

            let createRazorpayBooking = (bookingData) => {
                $.post("<?= route('booking.create.razorpay') ?>", bookingData)
                    .done(function(data) {
                        const options = {
                            "key": '<?= config('app.razorpay.key') ?>', // Enter the Key ID generated from the Dashboard
                            "name": '<?= config('app.razorpay.company_name') ?>',
                            "order_id": data
                                .online_payment_method_ref_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": razorpayHandler
                        };
                        var Razorpay = new window.Razorpay(options);
                        Razorpay.open();
                        Razorpay.on('payment.failed', function(response) {
                            alert(response.error.code);
                            alert(response.error.description);
                            alert(response.error.source);
                            alert(response.error.step);
                            alert(response.error.reason);
                            alert(response.error.metadata.order_id);
                            alert(response.error.metadata.payment_id);
                        });
                    })
                    .fail(function() {
                        alert("error");
                    });
            }

            /* 
                Booking prcessing end
            */

        });
        
        function cancelService(){
                localStorage.removeItem("data");
            }
        // $('body').on('click',
        //     '.book__select_time_date_box.next_button.enabled, .book__select_time_date_box.prev_button.enabled',
        //     function() {
        //         let dateBoxItems = '';
        //         let lastDay = $('.book__select_time_date_box').eq(5).data('day');
        //         let firstDay = $('.book__select_time_date_box').eq(1).data('day');
        //         let newFirstDay;

        //         if ($(this).hasClass('next_button')) {
        //             for (let itemNumber = 1; itemNumber <= 5; itemNumber++) {
        //                 dateBoxItems += `<div class="book__select_time_date_box col-md-2${ (itemNumber == 1) ? ' active' : ''}" data-day="${Date.parse(lastDay).add(itemNumber).day().toString('MM/dd/yyyy')}">
        //                                 <div>${Date.parse(lastDay).add(itemNumber).day().toString('ddd')}</div>
        //                                 <div>${Date.parse(lastDay).add(itemNumber).day().toString(' d')}</div>
        //                                 </div>`;
        //                 if (itemNumber == 1) {
        //                     newFirstDay = Date.parse(lastDay).add(itemNumber).day();
        //                 }
        //             }
        //         } else {
        //             for (let itemNumber = 5; itemNumber > 0; itemNumber--) {
        //                 dateBoxItems += `<div class="book__select_time_date_box col-md-2${ (itemNumber == 5) ? ' active' : ''}" data-day="${Date.parse(firstDay).add(-itemNumber).day().toString('MM/dd/yyyy')}">
        //                                 <div>${Date.parse(firstDay).add(-itemNumber).day().toString('ddd')}</div>
        //                                 <div>${Date.parse(firstDay).add(-itemNumber).day().toString(' d')}</div>
        //                                 </div>`;
        //                 if (itemNumber == 5) {
        //                     newFirstDay = Date.parse(firstDay).add(-itemNumber).day();
        //                 }
        //             }
        //         }

        //         $('.book__select_time_date_box').not('.next_button').not('.prev_button').remove();
        //         $('.book__select_time_date_box.prev_button').addClass('enabled').after(dateBoxItems);
        //         $('.book__select_time__month_name').text(newFirstDay.toString('MMMM'));
        //         if (Date.equals(newFirstDay, Date.today())) {
        //             $('.book__select_time_date_box.prev_button').removeClass('enabled')
        //         }
        //         $('input[name="date"]').val(newFirstDay.toString('MM/dd/yyyy'));
        //     });
        // var tabValidate = function(tabID) {
        //     if (tabID == 1) {
        //         var selectedservices = [];
        //         $('input[name="services[]"]:checked').each(function(index, item) {
        //             selectedservices.push($(this).val());
        //         });
        //         if (selectedservices == '') {
        //             $(".firsttabprev").click();
        //             alert("Please choose at least one service");
        //             return false;
        //         }
        //     } else if (tabID == 2) {
        //         var selectStaff = $('input[name=vendor_staff_id]:checked').val();
        //         if (typeof selectStaff === 'undefined') {
        //             $(".secondtabprev").click();
        //             alert("Please choose staff");
        //             return false;
        //         } else if (selectStaff == '') {
        //             $(".secondtabprev").click();
        //             alert("Please choose staff");
        //             return false;
        //         }
        //     } else if (tabID == 4) {
        //         var selectLocation = $('input[name=service_location_done]:checked').val();
        //         if (typeof selectLocation === 'undefined') {
        //             $(".fourthtabprev").click();
        //             alert("Please choose service location Between Showroom/Home ");
        //             return false;
        //         } else if (selectLocation == '') {
        //             $(".fourthtabprev").click();
        //             alert("Please choose service location Between Showroom/Home ");
        //             return false;
        //         }
        //     }
        //     // alert(tabID);
        // }

    </script>

    @livewireScripts
</body>

</html>
