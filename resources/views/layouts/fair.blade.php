<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <title>
        Orbeva
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/ferixstyle.css') }}" />
</head>

<body>
    <!-- Loading Spinner Overlay -->
    <div id="pageLoader"
        style="
    position: fixed;
    z-index: 9999;
    background: rgba(255,255,255,0.85);
    top: 0; left: 0; width: 100vw; height: 100vh;
    display: flex; align-items: center; justify-content: center;
">
        <div class="spinner-grow text-primary" style="width: 4rem; height: 4rem;" role="status"></div>
    </div>
    <!-- <div class="page">
        <div class="page-wrapper">
            <div class="page-body m-0">
                <div class="container-fluid"> -->
    @yield('content')
    <!-- </div>
            </div>
        </div>
    </div> -->


    <script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('pageLoader');
            if (loader) loader.style.display = 'none';
        });

        // Show loader on any form submit, but only if valid
        document.addEventListener('DOMContentLoaded', function() {
            var loader = document.getElementById('pageLoader');
            document.querySelectorAll('form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    if (form.checkValidity()) {
                        if (loader) loader.style.display = 'flex';
                    } else {
                        if (loader) loader.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/ferixstyle.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-dashboard.min.js?v=3.2.0') }}"></script>
</body>

</html>
