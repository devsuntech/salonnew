<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/SalonNme-01.png.png">

    <!-- All CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="assets/css/emailWelcome-owner.css"> --}}
    <style>
        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
}


/* What it does: Stops email clients resizing small text. */

* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}


/* What it does: Centers email on Android 4.4 */

div[style*="margin: 16px 0"] {
    margin: 0 !important;
}


/* What it does: Stops Outlook from adding extra spacing to tables. */

table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

table table table {
    table-layout: auto;
}

img {
    -ms-interpolation-mode: bicubic;
}

*[x-apple-data-detectors],

/* iOS */

.x-gmail-data-detectors,

/* Gmail */

.x-gmail-data-detectors *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

img.g-img+div {
    display: none !important;
}


/* What it does: Prevents underlining the button text in Windows 10 */

.button-link {
    text-decoration: none !important;
}

@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    .email-container {
        min-width: 375px !important;
    }
}

.button-td,
.button-a {
    transition: all 100ms ease-in;
}

.button-td:hover,
.button-a:hover {
    background: #555555 !important;
    border-color: #555555 !important;
}

table.email-container {
    margin: 40px 0px !important;
}

.hurray {
    width: 100px;
    margin-bottom: 10px;
}

.message tr td {
    text-align: center;
}

img.logo {
    width: 20%;
}


/* Media Queries */

@media screen and (max-width: 480px) {
    .fluid {
        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }
    .stack-column,
    .stack-column-center {
        display: block !important;
        width: 100% !important;
        max-width: 100% !important;
        direction: ltr !important;
    }
    /* And center justify these ones. */
    .stack-column-center {
        text-align: center !important;
    }
    .center-on-narrow {
        text-align: center !important;
        display: block !important;
        margin-left: auto !important;
        margin-right: auto !important;
        float: none !important;
    }
    table.center-on-narrow {
        display: inline-block !important;
    }
    .email-container p {
        font-size: 17px !important;
        line-height: 22px !important;
    }
}
    </style>
    <title>Your received a confirmation of a session </title>
</head>

<body width="100%" bgcolor="#F1F1F1" style="margin: 0; mso-line-height-rule: exactly;">
    @yield('content')
</body>

</html>
