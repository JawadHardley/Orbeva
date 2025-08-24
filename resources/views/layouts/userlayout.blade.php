<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orbeva</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel=" stylesheet" href="{{ asset('css/ferixstyle.css') }}" />
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />

    <style>
        .sidebar.sidebar-mini {
            width: 70px !important;
        }

        .sidebar.sidebar-mini .nav-link-text {
            display: none !important;
        }

        .sidebar.sidebar-mini .nav-link {
            justify-content: center;
            padding-left: 0 !important;
            padding-right: 0 !important;
            text-align: center;
        }

        .sidebar.sidebar-mini .nav-link i {
            margin-right: 0 !important;
            font-size: 1.25rem;
        }

        .main-content {
            margin-left: 250px;
            transition: margin-left 0.2s;
        }

        .sidebar.sidebar-mini~.main-content,
        .main-content.main-mini {
            margin-left: 70px !important;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                left: -250px;
                width: 250px;
                transition: left 0.2s;
            }

            .sidebar.sidebar-mobile-open {
                left: 0;
            }

            .main-content {
                margin-left: 0 !important;
            }
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1039;
            transition: opacity 0.2s;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            z-index: 1040;
            transition: width 0.2s, left 0.2s;
            background: #212529 !important;
        }

        @media (max-width: 991.98px) {
            body {
                overflow-x: hidden;
            }

            .sidebar {
                left: -250px !important;
                width: 250px;
                transition: left 0.2s;
            }

            .sidebar.sidebar-mobile-open {
                left: 0 !important;
            }
        }

        /* Hide pseudo-element arrows in mini sidebar mode */
        .sidebar.sidebar-mini .nav-link::after,
        .sidebar.sidebar-mini .nav-link::before {
            display: none !important;
            opacity: 0 !important;
            content: none !important;
        }
    </style>

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

    <div class="page">

        {{-- start sidebar --}}
        {{-- <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-gradient-dark my-2"
            data-bs-theme="dark" id="sidenav-main">
            <div class="sidenav-header">
                <h1 class="navbar-brand navbar-brand-autodark text-center mt-2">
                    <a href="/" class="text-decoration-none text-white">
                        <i class="fa fa-layer-group fs-4 text-danger me-1"></i> ORBEVA
                    </a>
                </h1>
            </div>
            <hr class="horizontal dark mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active bg-gradient-dark"
                            href="{{ route(Auth::user()->role . '' . '.dashboard') }}">
                            <i class="fa fa-chart-line me-2 opacity-5"></i>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#applyferi" role="button"
                            aria-expanded="false" aria-controls="applyferi">
                            <i class="fa fa-compress me-2 opacity-5"></i>
                            <span class="nav-link-text ms-1">Apply for Feri</span>
                        </a>

                        <div class="collapse mx-3" id="applyferi">
                            <div class="m-2 p-2 rounded bg-dark">
                                <a class="dropdown-item mb-2" href="{{ route('transporter.importapply') }}">
                                    Quick Apply
                                </a>
                                <a class="dropdown-item mb-2" href="{{ route('transporter.applyferi') }}">
                                    Regional-Feri
                                </a>
                                <a class="dropdown-item mb-2" href="{{ route('transporter.continueferi') }}">
                                    Continuance-Feri
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ferientries" role="button"
                            aria-expanded="false" aria-controls="ferientries">
                            <i class="fa fa-bars me-2 opacity-5"></i>
                            <span class="nav-link-text ms-1">Feri Entries</span>
                        </a>

                        <div class="collapse mx-3" id="ferientries">
                            <div class="m-2 p-2 rounded bg-dark">
                                <a class="dropdown-item mb-2" href="{{ route('transporter.showApps') }}">
                                    All Entries
                                </a>
                                <a class="dropdown-item mb-2" href="{{ route('transporter.rejectedapps') }}">
                                    Rejected Entries
                                </a>
                                <a class="dropdown-item mb-2" href="{{ route('transporter.completedapps') }}">
                                    Completed Entries
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#assets" role="button"
                            aria-expanded="false" aria-controls="assets">
                            <i class="fa fa-compass-drafting me-2 opacity-5"></i>
                            <span class="nav-link-text ms-1">Assets</span>
                        </a>

                        <div class="collapse mx-3" id="assets">
                            <div class="m-2 p-2 rounded bg-dark">
                                <a class="dropdown-item mb-2" href="{{ route('transporter.sampcalculator') }}">
                                    Orbeva Calculator
                                </a>
                                <a class="dropdown-item mb-2" href="#">
                                    Coming soon
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-gears me-2 opacity-5"></i>
                            <span class="nav-link-text ms-1 ">
                                Automations <span class="small">(coming soon)</span>
                            </span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn bg-gradient-dark w-100" href="#" type="button">Updates soon</a>
                </div>
            </div>
        </aside> --}}
        {{-- end sidebar --}}

        <!-- Offcanvas Sidebar -->
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-gradient-dark my-2 sidebar"
            id="sidenav-main">
            <div class="sidenav-header text-center">
                <h1 class="navbar-brand navbar-brand-autodark mt-2 mx-auto">
                    <a href="/" class="text-decoration-none text-white">
                        <i class="fa fa-layer-group fs-4 text-danger"></i> <span class="ms-2 nav-link-text">
                            ORBEVA</span>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger ms-4 my-auto d-lg-none" id="sidebarCloseBtn">
                        <i class="fa fa-times"></i>
                    </button>
                </h1>
            </div>
            <hr class="horizontal dark mt-0 mb-2">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav text-white">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active bg-gradient-dark"
                                href="{{ route(Auth::user()->role . '' . '.dashboard') }}">
                                <i class="fa fa-chart-line me-2 opacity-5"></i>
                                <span class="nav-link-text ms-1">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#applyferi" role="button"
                                aria-expanded="false" aria-controls="applyferi">
                                <i class="fa fa-compress me-2 opacity-5"></i>
                                <span class="nav-link-text ms-1">Apply for Feri</span>
                            </a>

                            <div class="collapse mx-3" id="applyferi">
                                <div class="m-2 p-2 rounded bg-dark">
                                    <a class="dropdown-item small mb-2" href="{{ route('transporter.importapply') }}">
                                        Quick Apply
                                    </a>
                                    <a class="dropdown-item small mb-2" href="{{ route('transporter.applyferi') }}">
                                        Regional-Feri
                                    </a>
                                    <a class="dropdown-item small mb-2" href="{{ route('transporter.continueferi') }}">
                                        Continuance-Feri
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#ferientries" role="button"
                                aria-expanded="false" aria-controls="ferientries">
                                <i class="fa fa-bars me-2 opacity-5"></i>
                                <span class="nav-link-text ms-1">Feri Entries</span>
                            </a>

                            <div class="collapse mx-3" id="ferientries">
                                <div class="m-2 p-2 rounded bg-dark">
                                    <a class="dropdown-item small mb-2" href="{{ route('transporter.showApps') }}">
                                        All Entries
                                    </a>
                                    <a class="dropdown-item small mb-2" href="{{ route('transporter.rejectedapps') }}">
                                        Rejected Entries
                                    </a>
                                    <a class="dropdown-item small mb-2"
                                        href="{{ route('transporter.completedapps') }}">
                                        Completed Entries
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#assets" role="button"
                                aria-expanded="false" aria-controls="assets">
                                <i class="fa fa-compass-drafting me-2 opacity-5"></i>
                                <span class="nav-link-text ms-1">Assets</span>
                            </a>

                            <div class="collapse mx-3" id="assets">
                                <div class="m-2 p-2 rounded bg-dark">
                                    <a class="dropdown-item small mb-2"
                                        href="{{ route('transporter.sampcalculator') }}">
                                        Orbeva Calculator
                                    </a>
                                    <a class="dropdown-item small mb-2" href="#">
                                        Coming soon
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-gears me-2 opacity-5"></i>
                                <span class="nav-link-text ms-1 ">
                                    Automations <span class="small">(coming soon)</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </ul>
            </div>
        </aside>
        <div id="sidebarOverlay" class="sidebar-overlay"></div>

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar bg-gradient-dark mt-2 navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl sticky-top"
                id="navbarBlur" data-scroll="true">
                <div class="container-fluid py-1 px-3">

                    <!-- Sidebar Mini Toggle Button -->
                    <button class="btn btn-dark me-3 my-auto d-none d-lg-block" id="sidebarMiniToggle"
                        type="button">
                        <i class="fa fa-angle-left"></i>
                    </button>

                    <!-- Sidebar Toggle Button -->
                    <button class="bg-danger btn btn-dark me-3 my-auto d-lg-none" id="sidebarMobileToggle"
                        type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Add this before <div class="collapse navbar-collapse ..."> -->
                    <button class="bg-dark navbar-toggler d-lg-none p-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-ellipsis-vertical text-white"></i>
                    </button>

                    <nav class="d-none d-lg-block" aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">Pages</li>
                            <li class="breadcrumb-item text-sm" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item text-sm text-white" aria-current="page">
                                {{ Str::title(Auth::user()->role) }}</li>
                        </ol>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            {{-- keeps bar right --}}
                        </div>
                        <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                            <li class="nav-item d-flex align-items-center">

                                <div class="navbar-nav flex-row order-md-last dropdown">
                                    <div class="nav-item">
                                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0"
                                            data-bs-toggle="dropdown" aria-label="Open user menu"
                                            aria-expanded="false">
                                            <span class="avatar avatar-sm">
                                                <i class="fa fa-circle-user fs-4"></i>
                                            </span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-menu-arrow dropdown-menu-end flex-row order-md-last">
                                            <a
                                                class="dropdown-header text-decoration-none text-danger">{{ ucwords(Auth::user()->name) }}</a>
                                            <a href="{{ route('transporter.showProfile') }}"
                                                class="dropdown-item">Account</a>
                                            <a href="{{ route('transporter.dashboard') }}"
                                                class="dropdown-item">Home</a>
                                            <!-- <a href="#" class="dropdown-item">Feedback</a> -->
                                            <div class="dropdown-divider"></div>
                                            <!-- <a href="./settings.html" class="dropdown-item">Settings</a> -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="route('logout')" class="dropdown-item"
                                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                    Logout
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="container-fluid py-2">
                <div class="row">
                    <div class="ms-3">
                        <h3 class="mb-0 h5 font-weight-bolder">Hi, {{ ucwords(Auth::user()->name) }}</h3>
                        <p class="mb-4">
                            Check the your entries, query when something isn't a click.
                        </p>
                    </div>
                </div>

                @yield('content')


            </div>

            <footer class="footer mt-auto py-4">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">

                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="#" class="font-weight-bold" target="_blank">Orbeva Team</a>
                                for a better web.
                            </div>
                            <div class="d-none">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                    target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="#" class="nav-link pe-0 text-muted">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.6.2/dist/countUp.umd.js"></script>
    <script src="{{ asset('js/ferixstyle.js') }}"></script>






    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidenav-main');
            var toggleBtn = document.getElementById('sidebarMiniToggle');
            var mainContent = document.querySelector('.main-content');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('sidebar-mini');
                    if (mainContent) {
                        mainContent.classList.toggle('main-mini');
                    }
                    this.querySelector('i').classList.toggle('fa-angle-right');
                    this.querySelector('i').classList.toggle('fa-angle-left');
                });
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidenav-main');
            var mainContent = document.querySelector('.main-content');
            var navLinks = sidebar.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    // Only expand sidebar if in mini mode and on desktop
                    if (sidebar.classList.contains('sidebar-mini') && window.innerWidth >= 992) {
                        sidebar.classList.remove('sidebar-mini');
                        if (mainContent) mainContent.classList.remove('main-mini');
                        var toggleBtn = document.getElementById('sidebarMiniToggle');
                        if (toggleBtn) {
                            var icon = toggleBtn.querySelector('i');
                            icon.classList.remove('fa-angle-right');
                            icon.classList.add('fa-angle-left');
                        }
                    }
                });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidenav-main');
            var mobileToggle = document.getElementById('sidebarMobileToggle');
            var overlay = document.getElementById('sidebarOverlay');

            function openSidebar() {
                sidebar.classList.add('sidebar-mobile-open');
                overlay.classList.add('active');
            }

            function closeSidebar() {
                sidebar.classList.remove('sidebar-mobile-open');
                overlay.classList.remove('active');
            }

            if (mobileToggle && sidebar && overlay) {
                mobileToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    openSidebar();
                });
                overlay.addEventListener('click', function() {
                    closeSidebar();
                });
            }

            // Optional: close sidebar on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeSidebar();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.getElementById('sidenav-main');
            var overlay = document.getElementById('sidebarOverlay');
            var closeBtn = document.getElementById('sidebarCloseBtn');

            if (closeBtn && sidebar && overlay) {
                closeBtn.addEventListener('click', function() {
                    sidebar.classList.remove('sidebar-mobile-open');
                    overlay.classList.remove('active');
                });
            }
        });
    </script>



    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Views",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#43A047",
                    data: [50, 45, 22, 28, 50, 60, 76],
                    barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                            color: "#737373"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                datasets: [{
                    label: "Sales",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                const fullMonths = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];
                                return fullMonths[context[0].dataIndex];
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tasks",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#737373',
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
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
    <script src="{{ asset('assets/js/material-dashboard.min.js') }}"></script>

</body>

</html>
