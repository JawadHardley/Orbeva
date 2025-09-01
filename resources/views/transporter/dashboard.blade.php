@extends('layouts.userlayout')
@section('content')
    @php
        $tile1 = asset('images/designer.svg');
        $tile2 = asset('images/team.svg');

        $completed = 0;
        $pending = 0;
        $draft = 0;
        $waiting = 0;
        $today = 0;
        $total = 0;

        if (!empty($feris)) {
            foreach ($feris as $feri) {
                if ($feri->status == 5) {
                    $completed++;
                } elseif ($feri->status == 4) {
                    $waiting++;
                } elseif ($feri->status == 3) {
                    $draft++;
                } elseif ($feri->status == 1 || $feri->status == 2) {
                    $pending++;
                }

                if ($feri->created_at->isToday()) {
                    $today++;
                }
                $total++;
            }
        }

        // Prevent division by zero
        $rate = $total > 0 ? ($completed / $total) * 100 : 0;
        $rate = number_format($rate, 0);

        if ($rate <= 50) {
            $bg = 'warning';
        } else {
            $bg = 'success';
    } @endphp
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>

    <div class="row fade-slide-in">
        <div class="col-sm-6 mb-xl-0 mb-4 order-4">
            <div class="card mb-2">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Accomplished Entries</p>
                            <h4 class="mb-0">{{ $completed }}</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="opacity-10 fa fa-circle-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-xl-0 mb-4 order-3">
            <div class="card mb-2">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Applications in Progress</p>
                            <h4 class="mb-0">{{ $pending }}</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="opacity-10 fa fa-spinner"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-xl-0 mb-4 order-2">
            <div class="card mb-2">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Awaiting Approval</p>
                            <h4 class="mb-0">{{ $draft }}</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="opacity-10 fa fa-user-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-xl-0 mb-4 order-1">
            <div class="card mb-2">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Pending Certificate</p>
                            <h4 class="mb-0">{{ $waiting }}</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="opacity-10 fa fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-xl-0 mb-4 order-5">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Today's System Rate</p>
                            <h4 class="mb-0">{{ $rates->amount }}</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="opacity-10 fa fa-cent-sign"></i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">{{ $rates->currency }} </span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="card-group mt-5">

            <div class="card border m-2" data-animation="true">
                <div class="card-header bg-primary p-0 position-relative mt-n4 mx-3 z-index-2 rounded"
                    style="height:200px; overflow:hidden;">
                    <a class="d-block blur-shadow-image">
                        <img src="{{ asset('images/post1.png') }}" alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-lg">
                    </a>
                </div>
                <a href="{{ route(Auth::user()->role . '.showApps') }}" class="">
                    <div class="card-body text-center">
                        <h5 class="fs-6 mt-3">
                            Show All Feri Entries
                        </h5>
                    </div>
                </a>
            </div>

            <div class="card border m-2" data-animation="true">
                <div class="card-header bg-primary p-0 position-relative mt-n4 mx-3 z-index-2 rounded"
                    style="height:200px; overflow:hidden;">
                    <a class="d-block blur-shadow-image">
                        <img src="{{ asset('images/post2.png') }}" alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-lg">
                    </a>
                </div>
                <a href="{{ route(Auth::user()->role . '.applyferi') }}" class="" data-bs-toggle="modal"
                    data-bs-target="#ask">
                    <div class="card-body text-center">
                        <h5 class="fs-6 mt-3">
                            Apply for Feri
                        </h5>
                    </div>
                </a>
            </div>

            <div class="card border m-2" data-animation="true">
                <div class="card-header bg-primary p-0 position-relative mt-n4 mx-3 z-index-2 rounded"
                    style="height:200px; overflow:hidden;">
                    <a class="d-block blur-shadow-image">
                        <img src="{{ asset('images/post3.png') }}" alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-lg">
                    </a>
                </div>
                <a href="{{ route(Auth::user()->role . '.sampcalculator') }}" class="">
                    <div class="card-body text-center">
                        <h5 class="fs-6 mt-3">
                            Orbeva Calculator
                        </h5>
                    </div>
                </a>
            </div>

        </div>
    </div>


    {{-- the old code starts here --}}

    {{-- <div class="row fade-slide-in">
        <div class="col-12 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-12 col-sm d-flex flex-column">
                            <h3 class="h2">Welcome back, {{ Auth::user()->name }}</h3>
                            <p class="text-muted">To speed up the application process, use templates</p>
                            <div class="row g-5 mt-auto">
                                <div class="col-auto">
                                    <div class="subheader">Today's Applications</div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h3 me-2">{{ $today }}</div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: {{ $today }}%"
                                            role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-auto d-flex justify-content-center">
                            <!-- here come  height="200" fill="none" viewBox="0 0 800 600" -->
                            <img src="{{ $tile1 }}" alt="stats illustrations" class="img-fluid"
                                style="width: 200px; height: 200px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 d-flex mb-3">
            <div class="card flex-fill">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Applications</div>
                    </div>
                    <div class="h1 mb-3 data-countup"><span data-countup>{{ $rate }}</span>%</div>
                    <div class="d-flex mb-2">
                        <div>Completion rate</div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-{{ $bg }}" style="width: {{ $rate }}%"
                            role="progressbar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="row fade-slide-in">
        <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
            <a href="{{ route(Auth::user()->role . '.applyferi') }}" class="card card-link" data-bs-toggle="modal"
                data-bs-target="#ask">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center p-5">
                            <i class="fa fa-train-subway display-2"></i>
                        </h3>
                        <p class="card-title text-center">Apply for Feri</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
            <a href="{{ route(Auth::user()->role . '.sampcalculator') }}" class="card card-link">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center p-5">
                            <i class="fa fa-calculator display-2"></i>
                        </h3>
                        <p class="card-title text-center">Cost Calculator</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
            <a href="{{ route(Auth::user()->role . '.showApps') }}" class="card card-link">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center p-5">
                            <i class="fa fa-list display-2"></i>
                        </h3>
                        <p class="card-title text-center">View All Applications</p>
                    </div>
                </div>
            </a>
        </div>
    </div> --}}



    <!-- Modal -->
    <div class="modal fade" id="ask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Type of Feri</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <a href="{{ route('transporter.applyferi') }}" class="card card-link">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <p class="card-title text-center text-success">Regional</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <a href="{{ route('transporter.continueferi') }}" class="card card-link">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <p class="card-title text-center text-primary">Continuance</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script>
        new DataTable('#linework', {
            initComplete: function() {
                // Use the existing advanced-table-search input for global search
                const api = this.api();
                const advInput = document.getElementById('advanced-table-search');
                if (advInput) {
                    advInput.addEventListener('keyup', function() {
                        api.search(this.value).draw();
                    });
                }

                // Always hide divs with class dt-layout-row
                document.querySelectorAll('.dt-search').forEach(function(el) {
                    el.style.display = 'none';
                });

                // Always hide divs with class dt-layout-row
                document.querySelectorAll('.dt-info').forEach(function(el) {
                    el.style.display = 'none';
                });

                // Move the dt-length dropdown into your card header if you want
                const dtLength = document.querySelector('.dt-length');
                const cardHeader = document.querySelector('.card-header .btn-list');
                if (dtLength && cardHeader) {
                    cardHeader.appendChild(dtLength);
                }

                // Move the DataTables pagination into the card-footer
                const dtPagination = document.querySelector('nav[aria-label="pagination"]');
                const cardFooter = document.querySelector('.card-footer.d-flex.align-items-center');
                if (dtPagination && cardFooter) {
                    cardFooter.appendChild(dtPagination);
                }
            }
        });
    </script>
@endsection
