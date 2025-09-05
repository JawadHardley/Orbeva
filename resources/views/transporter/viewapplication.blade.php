@extends('layouts.userlayout')
@section('content')
    @php
        $documents = json_decode($record->documents_upload ?? '[]', true);

        $unreadChats = $chats->filter(function ($chat) {
            return $chat->user_id != Auth::id() && $chat->read == 0;
        });

    @endphp

    <div class="row">
        <div class="col">
            <x-errorshow />
        </div>
    </div>

    <div class="row">
        <div class="col-12 p-2 mx-2 border rounded">
            <div class="mx-1">
                <div class="row align-items-center">

                    @if ($record->status == 1)
                        <div class="col-auto">
                            <i class="fa fa-clock fs-3 bg-gray-200 text-danger rounded p-3"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <h5 class="mb-0">Pending </h5>
                            <p class="small">{{ Str::title($record->feri_type) }} Feri</p>
                        </div>
                    @elseif ($record->status == 2)
                        <div class="col-auto">
                            <i class="fa fa-clock fs-3 bg-gray-200 text-warning rounded p-3"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <h5 class="mb-0">Pending </h5>
                            <p class="small">{{ Str::title($record->feri_type) }} Feri</p>
                        </div>
                    @elseif ($record->status == 3)
                        <div class="col-auto">
                            <i class="fa fa-spinner fs-3 bg-gray-200 text-info rounded p-3"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <h5 class="mb-0">Approve Drafts</h5>
                            <p class="small">{{ Str::title($record->feri_type) }} Feri</p>
                        </div>
                    @elseif ($record->status == 4)
                        <div class="col-auto">
                            <i class="fa fa-hourglass-end fs-3 bg-gray-200 text-info rounded p-3"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <h5 class="mb-0">In progress</h5>
                            <p class="small">{{ Str::title($record->feri_type) }} Feri</p>
                        </div>
                    @elseif ($record->status == 5)
                        <div class="col-auto">
                            <i class="fa fa-certificate fs-3 bg-gray-200 text-success rounded p-3"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <h5 class="mb-0">Complete</h5>
                            <p class="small">{{ Str::title($record->feri_type) }} Feri</p>
                        </div>
                    @elseif ($record->status == 6)
                        <div class="col-auto">
                            <i class="fa fa-circle-xmark fs-3 bg-gray-200 text-primary rounded p-3"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <h5 class="mb-0">Rejected</h5>
                            <p class="small">{{ Str::title($record->feri_type) }} Feri</p>
                        </div>
                    @endif

                    <div class="col-auto ms-auto">
                        <a href="#" class="position-relative" data-bs-toggle="modal" data-bs-target="#chat">
                            <i class="fa fa-bell fs-5 text-info"></i>
                            @if ($unreadChats->isNotEmpty())
                                <span
                                    class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            @endif
                        </a>
                    </div>
                    <div class="col-auto">
                        @if (is_numeric($record->po))
                            <a href="#" class="btn btn-outline-success my-auto" data-bs-toggle="modal"
                                data-bs-target="#poedit">{{ $record->po }}</a>
                        @else
                            <a href="#" class="btn btn-danger my-auto" data-bs-toggle="modal"
                                data-bs-target="#poedit">Add P.O</a>
                        @endif

                    </div>
                    <div class="col-auto">
                        @if ($record->status == 1)
                            <!-- do nothing as we are waiting -->
                        @elseif ($record->status == 2)
                            <!-- do nothing as we are waiting -->
                        @elseif ($record->status == 3)
                            <button class="btn btn-md btn-success me-2 my-auto" data-bs-toggle="modal"
                                data-bs-target="#a{{ $record->id }}">
                                <span class="d-none d-md-inline">Confirm Draft</span>
                            </button>

                            <button class="btn btn-md btn-danger my-auto" data-bs-toggle="modal"
                                data-bs-target="#ax{{ $record->id }}">
                                <span class="d-none d-md-inline">Reject</span>
                            </button>
                        @elseif ($record->status == 4)
                            <!-- 4 -->
                        @elseif ($record->status == 5)
                            <div class="ms-5 d-inline"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($record->feri_type == 'regional')
        <div class="row">
            <div class="col-12 mt-4">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#t1" role="tab"
                                aria-controls="t1" aria-selected="true">
                                Transport/Cargo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t2" role="tab"
                                aria-controls="t2" aria-selected="false">
                                Import Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t3" role="tab"
                                aria-controls="t3" aria-selected="false">
                                Export Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t4" role="tab"
                                aria-controls="t4" aria-selected="false">
                                Cargo Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t5" role="tab"
                                aria-controls="t5" aria-selected="false">
                                Shipping Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t6" role="tab"
                                aria-controls="t6" aria-selected="false">
                                Metrics/Values
                            </a>
                        </li>

                        @if ($record->applicationFile && !$record->certificateFile)
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t7" role="tab"
                                    aria-controls="t7" aria-selected="false">
                                    Draft
                                </a>
                            </li>
                        @endif

                        @if ($record->certificateFile)
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t8" role="tab"
                                    aria-controls="t8" aria-selected="false">
                                    Certificate
                                </a>
                            </li>
                        @endif

                    </ul>

                    <div class="row shadow-lg border rounded mt-3 mx-2">
                        <form action="{{ route('transporter.editApp', ['id' => $record->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 tab-content p-3">

                                <div class="tab-pane fade active show" id="t1" role="tabpanel">
                                    <div class="row m-2">
                                        <input type="hidden" name="feri_type" value="{{ $record->feri_type }}"
                                            require />

                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Applicant</label>
                                                <input type="text" name="user_id" class="form-control"
                                                    value="{{ $record->applicant }}" disabled>
                                            </div>
                                        </div>


                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Transport Mode</label>
                                                <input type="text" name="transport_mode" class="form-control"
                                                    value="{{ $record->transport_mode }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Transporter</label>
                                                <select class="form-control" name="transporter_company"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                                    <option value="">-- select --</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}"
                                                            {{ old('transporter_company', $record->transporter_company ?? '') == $company->id ? 'selected' : '' }}>
                                                            {{ $company->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">DRC Border</label>
                                                <select class="form-control" name="entry_border_drc"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value="0"
                                                        {{ $record->entry_border_drc == '0' || !$record->entry_border_drc ? 'selected' : '' }}>
                                                        -- select --</option>
                                                    <option value="Kasumbalesa"
                                                        {{ $record->entry_border_drc == 'Kasumbalesa' ? 'selected' : '' }}>
                                                        Kasumbalesa
                                                    </option>
                                                    <option value="Mokambo"
                                                        {{ $record->entry_border_drc == 'Mokambo' ? 'selected' : '' }}>
                                                        Mokambo</option>
                                                    <option value="Sakania"
                                                        {{ $record->entry_border_drc == 'Sakania' ? 'selected' : '' }}>
                                                        Sakania</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Border Date</label>
                                                <input type="date" class="form-control" name="arrival_date"
                                                    value="{{ $record->arrival_date }}" autocomplete="on"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required />
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Truck/Trailer Numbers</label>
                                                <input type="text" name="truck_details" class="form-control"
                                                    value="{{ $record->truck_details }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Arrival Station</label>
                                                <input type="text" name="arrival_station" class="form-control"
                                                    value="{{ $record->arrival_station }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Destination</label>
                                                <select class="form-control" name="final_destination"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->final_destination ? 'selected' : '' }}>--
                                                        select --
                                                    </option>
                                                    <option value="Likasi DRC"
                                                        {{ $record->final_destination == 'Likasi DRC' ? 'selected' : '' }}>
                                                        Likasi
                                                        DRC
                                                    </option>
                                                    <option value="Lubumbashi DRC"
                                                        {{ $record->final_destination == 'Lubumbashi DRC' ? 'selected' : '' }}>
                                                        Lubumbashi
                                                        DRC</option>
                                                    <option value="Kolwezi DRC"
                                                        {{ $record->final_destination == 'Kolwezi DRC' ? 'selected' : '' }}>
                                                        Kolwezi
                                                        DRC
                                                    </option>
                                                    <option value="Tenke DRC"
                                                        {{ $record->final_destination == 'Tenke DRC' ? 'selected' : '' }}>
                                                        Tenke
                                                        DRC
                                                    </option>
                                                    <option value="Kisanfu DRC"
                                                        {{ $record->final_destination == 'Kisanfu DRC' ? 'selected' : '' }}>
                                                        Kisanfu
                                                        DRC
                                                    </option>
                                                    <option value="Lualaba DRC"
                                                        {{ $record->final_destination == 'Lualaba DRC' ? 'selected' : '' }}>
                                                        Lualaba
                                                        DRC
                                                    </option>
                                                    <option value="Pumpi DRC"
                                                        {{ $record->final_destination == 'Pumpi DRC' ? 'selected' : '' }}>
                                                        Pumpi
                                                        DRC
                                                    </option>
                                                    <option value="Kambove DRC"
                                                        {{ $record->final_destination == 'Kambove DRC' ? 'selected' : '' }}>
                                                        Kambove
                                                        DRC
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="t2" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Importer Name</label>
                                                <input type="text" name="importer_name" class="form-control"
                                                    value="{{ $record->importer_name }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Importer Phone</label>
                                                <input type="text" name="importer_phone" class="form-control"
                                                    value="{{ $record->importer_phone }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Importer Email</label>
                                                <input type="text" name="importer_email" class="form-control"
                                                    value="{{ $record->importer_email }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Importer Address</label>
                                                <input type="text" name="importer_address" class="form-control"
                                                    value="{{ $record->importer_address }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Fix Number</label>
                                                <input type="text" name="fix_number" class="form-control"
                                                    value="{{ $record->fix_number }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="t3" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Exporter Name</label>
                                                <input type="text" name="exporter_name" class="form-control"
                                                    value="{{ $record->exporter_name }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Exporter Phone</label>
                                                <input type="text" name="exporter_phone" class="form-control"
                                                    value="{{ $record->exporter_phone }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Exporter Email</label>
                                                <input type="text" name="exporter_email" class="form-control"
                                                    value="{{ $record->exporter_email }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label class="ms-0">CF Agent</label>
                                                <select class="form-control" name="cf_agent"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value="" {{ !$record->cf_agent ? 'selected' : '' }}>--
                                                        select --
                                                    </option>
                                                    <option value="AGL"
                                                        {{ $record->cf_agent == 'AGL' ? 'selected' : '' }}>
                                                        AGL
                                                    </option>
                                                    <option value="CARGO CONGO"
                                                        {{ $record->cf_agent == 'CARGO CONGO' ? 'selected' : '' }}>CARGO
                                                        CONGO</option>
                                                    <option value="CONNEX"
                                                        {{ $record->cf_agent == 'CONNEX' ? 'selected' : '' }}>
                                                        CONNEX
                                                    </option>
                                                    <option value="African Logistics"
                                                        {{ $record->cf_agent == 'African Logistics' ? 'selected' : '' }}>
                                                        African
                                                        Logistics
                                                    </option>
                                                    <option value="Afritac"
                                                        {{ $record->cf_agent == 'Afritac' ? 'selected' : '' }}>
                                                        Afritac
                                                    </option>
                                                    <option value="Amicongo"
                                                        {{ $record->cf_agent == 'Amicongo' ? 'selected' : '' }}>
                                                        Amicongo
                                                    </option>
                                                    <option value="Aristote"
                                                        {{ $record->cf_agent == 'Aristote' ? 'selected' : '' }}>
                                                        Aristote
                                                    </option>
                                                    <option value="Bollore"
                                                        {{ $record->cf_agent == 'Bollore' ? 'selected' : '' }}>
                                                        Bollore
                                                    </option>
                                                    <option value="Brasimba"
                                                        {{ $record->cf_agent == 'Brasimba' ? 'selected' : '' }}>
                                                        Brasimba
                                                    </option>
                                                    <option value="Brasimba S.A"
                                                        {{ $record->cf_agent == 'Brasimba S.A' ? 'selected' : '' }}>
                                                        Brasimba S.A</option>
                                                    <option value="Chemaf"
                                                        {{ $record->cf_agent == 'Chemaf' ? 'selected' : '' }}>
                                                        Chemaf
                                                    </option>
                                                    <option value="Comexas Afrique"
                                                        {{ $record->cf_agent == 'Comexas Afrique' ? 'selected' : '' }}>
                                                        Comexas
                                                        Afrique
                                                    </option>
                                                    <option value="Comexas"
                                                        {{ $record->cf_agent == 'Comexas' ? 'selected' : '' }}>
                                                        Comexas
                                                    </option>
                                                    <option value="DCG"
                                                        {{ $record->cf_agent == 'DCG' ? 'selected' : '' }}>
                                                        DCG
                                                    </option>
                                                    <option value="Evele & Co"
                                                        {{ $record->cf_agent == 'Evele & Co' ? 'selected' : '' }}>
                                                        Evele &
                                                        Co</option>
                                                    <option value="Gecotrans"
                                                        {{ $record->cf_agent == 'Gecotrans' ? 'selected' : '' }}>
                                                        Gecotrans
                                                    </option>
                                                    <option value="Global Logistics"
                                                        {{ $record->cf_agent == 'Global Logistics' ? 'selected' : '' }}>
                                                        Global
                                                        Logistics
                                                    </option>
                                                    <option value="Malabar"
                                                        {{ $record->cf_agent == 'Malabar' ? 'selected' : '' }}>
                                                        Malabar
                                                    </option>
                                                    <option value="Polytra"
                                                        {{ $record->cf_agent == 'Polytra' ? 'selected' : '' }}>
                                                        Polytra
                                                    </option>
                                                    <option value="Spedag"
                                                        {{ $record->cf_agent == 'Spedag' ? 'selected' : '' }}>
                                                        Spedag
                                                    </option>
                                                    <option value="Tradecorp"
                                                        {{ $record->cf_agent == 'Tradecorp' ? 'selected' : '' }}>
                                                        Tradecorp
                                                    </option>
                                                    <option value="Trade Service"
                                                        {{ $record->cf_agent == 'Trade Service' ? 'selected' : '' }}>
                                                        Trade Service</option>
                                                    <option value="Transflot Ltd"
                                                        {{ $record->cf_agent == 'Transflot Ltd' ? 'selected' : '' }}>
                                                        Transflot
                                                        Ltd
                                                    </option>
                                                    <option value="TBA - Additional Comments"
                                                        {{ $record->cf_agent == 'TBA - Additional Comments' ? 'selected' : '' }}>
                                                        TBA - Additional Comments
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>CF Agent Contact</label>
                                                <input type="text" name="cf_agent_contact" class="form-control"
                                                    value="{{ $record->cf_agent_contact }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="t4" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Cargo Description</label>
                                                <input type="text" name="cargo_description" class="form-control"
                                                    value="{{ $record->cargo_description }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>HS Code</label>
                                                <input type="text" name="hs_code" class="form-control"
                                                    value="{{ $record->hs_code }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Package Type</label>
                                                <input type="text" name="package_type" class="form-control"
                                                    value="{{ $record->package_type }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Quantity</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    value="{{ $record->quantity }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="t5" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>PO Number</label>
                                                <input type="text" name="po" class="form-control"
                                                    value="{{ $record->po }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Company Ref</label>
                                                <input type="text" name="company_ref" class="form-control"
                                                    value="{{ $record->company_ref }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Cargo Origin</label>
                                                <input type="text" name="cargo_origin" class="form-control"
                                                    value="{{ $record->cargo_origin }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Customs Decl No</label>
                                                <input type="text" name="customs_decl_no" class="form-control"
                                                    value="{{ $record->customs_decl_no }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Manifest No</label>
                                                <input type="text" name="manifest_no" class="form-control"
                                                    value="{{ $record->manifest_no }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>OCC Bivac</label>
                                                <input type="text" name="occ_bivac" class="form-control"
                                                    value="{{ $record->occ_bivac }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Instructions</label>
                                                <input type="text" name="instructions" class="form-control"
                                                    value="{{ $record->instructions }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="t6" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">FOB Currency</label>
                                                <select class="form-control" name="fob_currency"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->fob_currency ? 'selected' : '' }}>--
                                                        select
                                                        --
                                                    </option>
                                                    <option value="USD"
                                                        {{ $record->fob_currency == 'USD' ? 'selected' : '' }}>USD
                                                    </option>
                                                    <option value="EUR"
                                                        {{ $record->fob_currency == 'EUR' ? 'selected' : '' }}>EUR
                                                    </option>
                                                    <option value="TZS"
                                                        {{ $record->fob_currency == 'TZS' ? 'selected' : '' }}>TZS
                                                    </option>
                                                    <option value="ZAR"
                                                        {{ $record->fob_currency == 'ZAR' ? 'selected' : '' }}>ZAR
                                                    </option>
                                                    <option value="AOA"
                                                        {{ $record->fob_currency == 'AOA' ? 'selected' : '' }}>AOA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>FOB Value</label>
                                                <input type="text" name="fob_value" class="form-control"
                                                    value="{{ $record->fob_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Incoterm</label>
                                                <select class="form-control" name="incoterm"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value="" {{ !$record->incoterm ? 'selected' : '' }}>--
                                                        select
                                                        --
                                                    </option>
                                                    <option value="CFR"
                                                        {{ $record->incoterm == 'CFR' ? 'selected' : '' }}>CFR
                                                    </option>
                                                    <option value="CIF"
                                                        {{ $record->incoterm == 'CIF' ? 'selected' : '' }}>CIF
                                                    </option>
                                                    <option value="CIP"
                                                        {{ $record->incoterm == 'CIP' ? 'selected' : '' }}>CIP
                                                    </option>
                                                    <option value="CPT"
                                                        {{ $record->incoterm == 'CPT' ? 'selected' : '' }}>CPT
                                                    </option>
                                                    <option value="DAF"
                                                        {{ $record->incoterm == 'DAF' ? 'selected' : '' }}>DAF
                                                    </option>
                                                    <option value="DAP"
                                                        {{ $record->incoterm == 'DAP' ? 'selected' : '' }}>DAP
                                                    </option>
                                                    <option value="DAT"
                                                        {{ $record->incoterm == 'DAT' ? 'selected' : '' }}>DAT
                                                    </option>
                                                    <option value="DDP"
                                                        {{ $record->incoterm == 'DDP' ? 'selected' : '' }}>DDP
                                                    </option>
                                                    <option value="DDU"
                                                        {{ $record->incoterm == 'DDU' ? 'selected' : '' }}>DDU
                                                    </option>
                                                    <option value="DEQ"
                                                        {{ $record->incoterm == 'DEQ' ? 'selected' : '' }}>DEQ
                                                    </option>
                                                    <option value="DES"
                                                        {{ $record->incoterm == 'DES' ? 'selected' : '' }}>DES
                                                    </option>
                                                    <option value="DPU"
                                                        {{ $record->incoterm == 'DPU' ? 'selected' : '' }}>DPU
                                                    </option>
                                                    <option value="EXW"
                                                        {{ $record->incoterm == 'EXW' ? 'selected' : '' }}>EXW
                                                    </option>
                                                    <option value="FAS"
                                                        {{ $record->incoterm == 'FAS' ? 'selected' : '' }}>FAS
                                                    </option>
                                                    <option value="FCA"
                                                        {{ $record->incoterm == 'FCA' ? 'selected' : '' }}>FCA
                                                    </option>
                                                    <option value="FOB"
                                                        {{ $record->incoterm == 'FOB' ? 'selected' : '' }}>FOB
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Freight
                                                    Currency</label>
                                                <select class="form-control" name="freight_currency"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->freight_currency ? 'selected' : '' }}>--
                                                        select
                                                        --</option>
                                                    <option value="USD"
                                                        {{ $record->freight_currency == 'USD' ? 'selected' : '' }}>USD
                                                    </option>
                                                    <option value="EUR"
                                                        {{ $record->freight_currency == 'EUR' ? 'selected' : '' }}>EUR
                                                    </option>
                                                    <option value="TZS"
                                                        {{ $record->freight_currency == 'TZS' ? 'selected' : '' }}>TZS
                                                    </option>
                                                    <option value="ZAR"
                                                        {{ $record->freight_currency == 'ZAR' ? 'selected' : '' }}>ZAR
                                                    </option>
                                                    <option value="AOA"
                                                        {{ $record->freight_currency == 'AOA' ? 'selected' : '' }}>AOA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Freight Value</label>
                                                <input type="text" name="freight_value" class="form-control"
                                                    value="{{ $record->freight_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Insurance
                                                    Currency</label>
                                                <select class="form-control" name="insurance_currency"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->insurance_currency ? 'selected' : '' }}>
                                                        --
                                                        select
                                                        --</option>
                                                    <option value="USD"
                                                        {{ $record->insurance_currency == 'USD' ? 'selected' : '' }}>
                                                        USD
                                                    </option>
                                                    <option value="EUR"
                                                        {{ $record->insurance_currency == 'EUR' ? 'selected' : '' }}>
                                                        EUR
                                                    </option>
                                                    <option value="TZS"
                                                        {{ $record->insurance_currency == 'TZS' ? 'selected' : '' }}>
                                                        TZS
                                                    </option>
                                                    <option value="ZAR"
                                                        {{ $record->insurance_currency == 'ZAR' ? 'selected' : '' }}>
                                                        ZAR
                                                    </option>
                                                    <option value="AOA"
                                                        {{ $record->insurance_currency == 'AOA' ? 'selected' : '' }}>
                                                        AOA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Insurance Value</label>
                                                <input type="text" name="insurance_value" class="form-control"
                                                    value="{{ $record->insurance_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Additional Fees
                                                    Currency</label>
                                                <select class="form-control" name="additional_fees_currency"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->additional_fees_currency ? 'selected' : '' }}>--
                                                        select --
                                                    </option>
                                                    <option value="USD"
                                                        {{ $record->additional_fees_currency == 'USD' ? 'selected' : '' }}>
                                                        USD
                                                    </option>
                                                    <option value="EUR"
                                                        {{ $record->additional_fees_currency == 'EUR' ? 'selected' : '' }}>
                                                        EUR
                                                    </option>
                                                    <option value="TZS"
                                                        {{ $record->additional_fees_currency == 'TZS' ? 'selected' : '' }}>
                                                        TZS
                                                    </option>
                                                    <option value="ZAR"
                                                        {{ $record->additional_fees_currency == 'ZAR' ? 'selected' : '' }}>
                                                        ZAR
                                                    </option>
                                                    <option value="AOA"
                                                        {{ $record->additional_fees_currency == 'AOA' ? 'selected' : '' }}>
                                                        AOA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Additional Fees Value</label>
                                                <input type="text" name="additional_fees_value" class="form-control"
                                                    value="{{ $record->additional_fees_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        @if ($documents)
                                            @foreach ($documents as $type => $path)
                                                <div
                                                    class="col-12 mb-3 col-lg-{{ $record->status == 1 ? '6' : ($record->status != 1 ? '4' : '') }}">
                                                    <label>{{ ucfirst(str_replace('_', ' ', $type)) }}
                                                    </label>
                                                    <a href="{{ route('file.downloadfile', ['id' => $record->id, 'type' => $type]) }}"
                                                        download>
                                                        <div class="card py-1">
                                                            <div class="row m-2">
                                                                <div class="col-auto">
                                                                    <i class="fa fa-file text-info"></i>
                                                                </div>
                                                                <div class="col-auto">Download File</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                @if ($record->status == 1)
                                                    <div
                                                        class="col-12 mb-3 col-lg-{{ $record->status == 1 ? '6' : ($record->status != 1 ? '4' : '') }}">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>Edit
                                                                {{ ucfirst(str_replace('_', ' ', $type)) }}</label>
                                                            <input type="file" name="{{ $type }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                @if ($record->applicationFile)
                                    <div class="tab-pane fade" id="t7" role="tabpanel">
                                        <div class="row m-2">

                                            <div class="col-12 mb-3 col-lg-12">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Document</label>
                                                    <input type="text" name="#" class="form-control"
                                                        value="{{ $record->type }}" disabled />
                                                </div>
                                            </div>

                                            <a href="{{ route('certificate.downloaddraft', ['id' => $record->id]) }}"
                                                class="text-decoration-none" download>
                                                <div class="card py-1">
                                                    <div class="row m-2">
                                                        <div class="col-auto">
                                                            <i class="fa fa-certificate text-info"></i>
                                                        </div>
                                                        <div class="col-auto" style="height: 5rem">
                                                            Download Feri Document
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                            @if ($invoice)
                                                <a href="{{ route('invoices.downloadinvoice', ['id' => $record->id]) }}"
                                                    target="_blanck" class="text-decoration-none">
                                                    <div class="card py-1">
                                                        <div class="row m-2">
                                                            <div class="col-auto">
                                                                <i class="fa fa-dollar-sign text-info"></i>
                                                            </div>
                                                            <div class="col-auto" style="height: 5rem">
                                                                Download Draft Invoice
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                @endif

                                @if ($record->certificateFile)
                                    <div class="tab-pane fade" id="t8" role="tabpanel">
                                        <div class="row m-2">

                                            <div class="col-12 mb-3 col-lg-12">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Document</label>
                                                    <input type="text" name="#" class="form-control"
                                                        value="{{ $record->type }}" disabled />
                                                </div>
                                            </div>

                                            <a href="{{ route('certificate.download', ['id' => $record->id]) }}"
                                                class="text-decoration-none" download>
                                                <div class="card py-1">
                                                    <div class="row m-2">
                                                        <div class="col-auto">
                                                            <i class="fa fa-certificate text-success"></i>
                                                        </div>
                                                        <div class="col-auto" style="height: 5rem">
                                                            Download Feri Certificate
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            @if ($invoice)
                                                <a href="{{ route('invoices.downloadinvoice', ['id' => $record->id]) }}"
                                                    target="_blank" class="text-decoration-none">
                                                    <div class="card py-1">
                                                        <div class="row m-2">
                                                            <div class="col-auto">
                                                                <i class="fa fa-dollar-sign text-success"></i>
                                                            </div>
                                                            <div class="col-auto" style="height: 5rem">
                                                                Download Feri Invoice
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                @endif


                                @if ($record->status == 1)
                                    <div class="row">
                                        <div class="col py-3 pt-5 text-end">
                                            <a href="{{ route(Auth::user()->role . '' . '.showApps') }}"
                                                class="btn btn-outline-secondary">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- end of if its regional --}}
        {{-- end of if its regional --}}
        {{-- end of if its regional --}}
        {{-- end of if its regional --}}
    @else
        <div class="row">
            <div class="col-12 mt-4">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t1" role="tab"
                                aria-controls="t1" aria-selected="false">
                                Freight Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t2" role="tab"
                                aria-controls="t2" aria-selected="false">
                                Cargo Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t3" role="tab"
                                aria-controls="t3" aria-selected="false">
                                Consignment Details
                            </a>
                        </li>

                        @if ($record->applicationFile && !$record->certificateFile)
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t4" role="tab"
                                    aria-controls="t4" aria-selected="false">
                                    Draft
                                </a>
                            </li>
                        @endif

                        @if ($record->certificateFile)
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#t5" role="tab"
                                    aria-controls="t5" aria-selected="false">
                                    Certificate
                                </a>
                            </li>
                        @endif
                    </ul>

                    <div class="row shadow-lg border mt-3 mx-2">
                        <form action="{{ route('transporter.editApp', ['id' => $record->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 tab-content">

                                <div class="card-body tab-pane fade active show" id="t1" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Applicant</label>
                                                <input type="text" name="user_id" class="form-control"
                                                    value="{{ $record->applicant }}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Company Ref</label>
                                                <input type="text" name="company_ref" class="form-control"
                                                    value="{{ $record->company_ref }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>PO Number</label>
                                                <input type="text" name="po" class="form-control"
                                                    value="{{ $record->po }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Entry Border
                                                    DRC</label>

                                                <select class="form-control" name="entry_border_drc"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value="0"
                                                        {{ $record->entry_border_drc == '0' || !$record->entry_border_drc ? 'selected' : '' }}>
                                                        -- select --</option>
                                                    <option value="Kasumbalesa"
                                                        {{ $record->entry_border_drc == 'Kasumbalesa' ? 'selected' : '' }}>
                                                        Kasumbalesa
                                                    </option>
                                                    <option value="Mokambo"
                                                        {{ $record->entry_border_drc == 'Mokambo' ? 'selected' : '' }}>
                                                        Mokambo</option>
                                                    <option value="Sakania"
                                                        {{ $record->entry_border_drc == 'Sakania' ? 'selected' : '' }}>
                                                        Sakania</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Final
                                                    Destination</label>
                                                <select class="form-control" name="final_destination"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->final_destination ? 'selected' : '' }}>--
                                                        select --
                                                    </option>
                                                    <option value="Likasi DRC"
                                                        {{ $record->final_destination == 'Likasi DRC' ? 'selected' : '' }}>
                                                        Likasi DRC
                                                    </option>
                                                    <option value="Lubumbashi DRC"
                                                        {{ $record->final_destination == 'Lubumbashi DRC' ? 'selected' : '' }}>
                                                        Lubumbashi
                                                        DRC</option>
                                                    <option value="Kolwezi DRC"
                                                        {{ $record->final_destination == 'Kolwezi DRC' ? 'selected' : '' }}>
                                                        Kolwezi
                                                        DRC
                                                    </option>
                                                    <option value="Tenke DRC"
                                                        {{ $record->final_destination == 'Tenke DRC' ? 'selected' : '' }}>
                                                        Tenke DRC
                                                    </option>
                                                    <option value="Kisanfu DRC"
                                                        {{ $record->final_destination == 'Kisanfu DRC' ? 'selected' : '' }}>
                                                        Kisanfu
                                                        DRC
                                                    </option>
                                                    <option value="Lualaba DRC"
                                                        {{ $record->final_destination == 'Lualaba DRC' ? 'selected' : '' }}>
                                                        Lualaba
                                                        DRC
                                                    </option>
                                                    <option value="Pumpi DRC"
                                                        {{ $record->final_destination == 'Pumpi DRC' ? 'selected' : '' }}>
                                                        Pumpi DRC
                                                    </option>
                                                    <option value="Kambove DRC"
                                                        {{ $record->final_destination == 'Kambove DRC' ? 'selected' : '' }}>
                                                        Kambove
                                                        DRC
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Border ETA</label>
                                                <input type="date" class="form-control" name="arrival_date"
                                                    value="{{ $record->arrival_date }}" autocomplete="on"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required />
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Customs Decl No</label>
                                                <input type="text" name="customs_decl_no" class="form-control"
                                                    value="{{ $record->customs_decl_no }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Arrival Station</label>
                                                <input type="text" name="arrival_station" class="form-control"
                                                    value="{{ $record->arrival_station }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Truck Details</label>
                                                <input type="text" name="truck_details" class="form-control"
                                                    value="{{ $record->truck_details }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body tab-pane fade" id="t2" role="tabpanel">
                                    <div class="row m-2">
                                        <input type="hidden" name="feri_type" value="{{ $record->feri_type }}"
                                            require />

                                        <div class="col-12 col-lg-3 mb-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Transporter
                                                    Company</label>
                                                <select class="form-control" name="transporter_company"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                                    <option value="">-- select --</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}"
                                                            {{ old('transporter_company', $record->transporter_company ?? '') == $company->id ? 'selected' : '' }}>
                                                            {{ $company->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" name="transporter_company"
                                                value="{{ $record->transporter_company }}">
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Quantity</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    value="{{ $record->quantity }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Weight</label>
                                                <input type="text" name="weight" class="form-control"
                                                    value="{{ $record->weight }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Volume</label>
                                                <input type="text" name="volume" class="form-control"
                                                    value="{{ $record->volume }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Importer Name</label>
                                                <input type="text" name="importer_name" class="form-control"
                                                    value="{{ $record->importer_name }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">CF Agent</label>
                                                <select class="form-control" name="cf_agent"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value="" {{ !$record->cf_agent ? 'selected' : '' }}>--
                                                        select --
                                                    </option>
                                                    <option value="AGL"
                                                        {{ $record->cf_agent == 'AGL' ? 'selected' : '' }}>AGL
                                                    </option>
                                                    <option value="CARGO CONGO"
                                                        {{ $record->cf_agent == 'CARGO CONGO' ? 'selected' : '' }}>CARGO
                                                        CONGO</option>
                                                    <option value="CONNEX"
                                                        {{ $record->cf_agent == 'CONNEX' ? 'selected' : '' }}>CONNEX
                                                    </option>
                                                    <option value="African Logistics"
                                                        {{ $record->cf_agent == 'African Logistics' ? 'selected' : '' }}>
                                                        African Logistics
                                                    </option>
                                                    <option value="Afritac"
                                                        {{ $record->cf_agent == 'Afritac' ? 'selected' : '' }}>
                                                        Afritac
                                                    </option>
                                                    <option value="Amicongo"
                                                        {{ $record->cf_agent == 'Amicongo' ? 'selected' : '' }}>
                                                        Amicongo
                                                    </option>
                                                    <option value="Aristote"
                                                        {{ $record->cf_agent == 'Aristote' ? 'selected' : '' }}>
                                                        Aristote
                                                    </option>
                                                    <option value="Bollore"
                                                        {{ $record->cf_agent == 'Bollore' ? 'selected' : '' }}>
                                                        Bollore
                                                    </option>
                                                    <option value="Brasimba"
                                                        {{ $record->cf_agent == 'Brasimba' ? 'selected' : '' }}>
                                                        Brasimba
                                                    </option>
                                                    <option value="Brasimba S.A"
                                                        {{ $record->cf_agent == 'Brasimba S.A' ? 'selected' : '' }}>
                                                        Brasimba S.A</option>
                                                    <option value="Chemaf"
                                                        {{ $record->cf_agent == 'Chemaf' ? 'selected' : '' }}>Chemaf
                                                    </option>
                                                    <option value="Comexas Afrique"
                                                        {{ $record->cf_agent == 'Comexas Afrique' ? 'selected' : '' }}>
                                                        Comexas
                                                        Afrique
                                                    </option>
                                                    <option value="Comexas"
                                                        {{ $record->cf_agent == 'Comexas' ? 'selected' : '' }}>
                                                        Comexas
                                                    </option>
                                                    <option value="DCG"
                                                        {{ $record->cf_agent == 'DCG' ? 'selected' : '' }}>DCG
                                                    </option>
                                                    <option value="Evele & Co"
                                                        {{ $record->cf_agent == 'Evele & Co' ? 'selected' : '' }}>
                                                        Evele &
                                                        Co</option>
                                                    <option value="Gecotrans"
                                                        {{ $record->cf_agent == 'Gecotrans' ? 'selected' : '' }}>
                                                        Gecotrans
                                                    </option>
                                                    <option value="Global Logistics"
                                                        {{ $record->cf_agent == 'Global Logistics' ? 'selected' : '' }}>
                                                        Global
                                                        Logistics
                                                    </option>
                                                    <option value="Malabar"
                                                        {{ $record->cf_agent == 'Malabar' ? 'selected' : '' }}>
                                                        Malabar
                                                    </option>
                                                    <option value="Polytra"
                                                        {{ $record->cf_agent == 'Polytra' ? 'selected' : '' }}>
                                                        Polytra
                                                    </option>
                                                    <option value="Spedag"
                                                        {{ $record->cf_agent == 'Spedag' ? 'selected' : '' }}>Spedag
                                                    </option>
                                                    <option value="Tradecorp"
                                                        {{ $record->cf_agent == 'Tradecorp' ? 'selected' : '' }}>
                                                        Tradecorp
                                                    </option>
                                                    <option value="Trade Service"
                                                        {{ $record->cf_agent == 'Trade Service' ? 'selected' : '' }}>
                                                        Trade Service</option>
                                                    <option value="Transflot Ltd"
                                                        {{ $record->cf_agent == 'Transflot Ltd' ? 'selected' : '' }}>
                                                        Transflot
                                                        Ltd
                                                    </option>
                                                    <option value="TBA - Additional Comments"
                                                        {{ $record->cf_agent == 'TBA - Additional Comments' ? 'selected' : '' }}>
                                                        TBA - Additional Comments
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body tab-pane fade" id="t3" role="tabpanel">
                                    <div class="row m-2">

                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Exporter Name</label>
                                                <input type="text" name="exporter_name" class="form-control"
                                                    value="{{ $record->exporter_name }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="exampleFormControlSelect1" class="ms-0">Freight
                                                    Currency</label>
                                                <select class="form-control" name="freight_currency"
                                                    {{ $record->status > 1 ? 'disabled' : '' }} required>
                                                    <option value=""
                                                        {{ !$record->freight_currency ? 'selected' : '' }}>-- select
                                                        --</option>
                                                    <option value="USD"
                                                        {{ $record->freight_currency == 'USD' ? 'selected' : '' }}>USD
                                                    </option>
                                                    <option value="EUR"
                                                        {{ $record->freight_currency == 'EUR' ? 'selected' : '' }}>EUR
                                                    </option>
                                                    <option value="TZS"
                                                        {{ $record->freight_currency == 'TZS' ? 'selected' : '' }}>TZS
                                                    </option>
                                                    <option value="ZAR"
                                                        {{ $record->freight_currency == 'ZAR' ? 'selected' : '' }}>ZAR
                                                    </option>
                                                    <option value="AOA"
                                                        {{ $record->freight_currency == 'AOA' ? 'selected' : '' }}>AOA
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Freight Value</label>
                                                <input type="text" name="freight_value" class="form-control"
                                                    value="{{ $record->freight_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>FOB Value</label>
                                                <input type="text" name="fob_value" class="form-control"
                                                    value="{{ $record->fob_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Insurance Value</label>
                                                <input type="text" name="insurance_value" class="form-control"
                                                    value="{{ $record->insurance_value }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 col-lg-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>
                                                    <div class="form-label">Instructions</div>
                                                </label>
                                                <input type="text" name="instructions" class="form-control"
                                                    value="{{ $record->instructions }}"
                                                    {{ $record->status > 1 ? 'disabled' : '' }}>
                                            </div>
                                        </div>


                                        @if ($documents)
                                            @foreach ($documents as $type => $path)
                                                <div
                                                    class="col-12 mb-3 col-lg-{{ $record->status == 1 ? '6' : ($record->status != 1 ? '4' : '') }}">
                                                    <div class="form-label">{{ ucfirst(str_replace('_', ' ', $type)) }}
                                                    </div>
                                                    <a href="{{ route('file.downloadfile', ['id' => $record->id, 'type' => $type]) }}"
                                                        download>
                                                        <div class="card py-1">
                                                            <div class="card-body p-1">
                                                                Download
                                                                File
                                                            </div>
                                                            <div class="ribbon ribbon-top">
                                                                <i class="fa fa-file"></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                @if ($record->status == 1)
                                                    <div
                                                        class="col-12 mb-3 col-lg-{{ $record->status == 1 ? '6' : ($record->status != 1 ? '4' : '') }}">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>Edit
                                                                {{ ucfirst(str_replace('_', ' ', $type)) }}</label>
                                                            <input type="file" name="{{ $type }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                @if ($record->applicationFile)
                                    <div class="card-body tab-pane fade" id="t4" role="tabpanel">
                                        <div class="row m-2">

                                            <div class="col-12 mb-3 col-lg-12">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Document</label>
                                                    <input type="text" name="#" class="form-control"
                                                        value="{{ $record->type }}" disabled />
                                                </div>
                                            </div>

                                            <a href="{{ route('certificate.downloaddraft', ['id' => $record->id]) }}"
                                                class="text-decoration-none" download>
                                                <div class="card col-12 card-link">
                                                    <div class="card-body pt-5" style="height: 5rem">
                                                        Download Feri Document
                                                    </div>
                                                    <div class="ribbon bg-danger ribbon-top ribbon-start">
                                                        <i class="fa fa-certificate text-success"></i>
                                                    </div>

                                                </div>
                                            </a>

                                            @if ($invoice)
                                                <a href="{{ route('invoices.downloadinvoice', ['id' => $record->id]) }}"
                                                    target="_blanck" class="text-decoration-none">
                                                    <div class="card col-12 card-link">
                                                        <div class="card-body pt-5" style="height: 5rem">
                                                            Download Draft Invoice
                                                        </div>
                                                        <div class="ribbon bg-danger ribbon-top ribbon-start">
                                                            <i class="fa fa-dollar-sign text-success"></i>
                                                        </div>

                                                    </div>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                @endif

                                @if ($record->certificateFile)
                                    <div class="card-body tab-pane fade" id="t5" role="tabpanel">
                                        <div class="row m-2">

                                            <div class="col-12 mb-3 col-lg-12">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Document</label>
                                                    <input type="text" name="#" class="form-control"
                                                        value="{{ $record->type }}" disabled />
                                                </div>
                                            </div>

                                            <a href="{{ route('certificate.download', ['id' => $record->id]) }}"
                                                class="text-decoration-none" download>
                                                <div class="card col-12 card-link">
                                                    <div class="card-body pt-5" style="height: 5rem">
                                                        Download Feri Certificate
                                                    </div>
                                                    <div class="ribbon bg-success ribbon-top ribbon-start">
                                                        <i class="fa fa-certificate fs-2 px-2"></i>
                                                    </div>

                                                </div>
                                            </a>
                                            @if ($invoice)
                                                <a href="{{ route('invoices.downloadinvoice', ['id' => $record->id]) }}"
                                                    target="_blank" class="text-decoration-none">
                                                    <div class="card col-12 card-link">
                                                        <div class="card-body pt-5" style="height: 5rem">
                                                            Download Feri Invoice
                                                        </div>
                                                        <div class="ribbon bg-success ribbon-top ribbon-start">
                                                            <i class="fa fa-dollar-sign fs-2 px-2"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                @endif


                                @if ($record->status == 1)
                                    <div class="row">
                                        <div class="col py-3 pt-5 text-end">
                                            <a href="{{ route(Auth::user()->role . '' . '.showApps') }}"
                                                class="btn btn-outline-secondary">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endif


    {{-- time for modals --}}
    {{-- time for modals --}}
    {{-- time for modals --}}
    {{-- time for modals --}}
    {{-- time for modals --}}
    {{-- time for modals --}}

    @if ($record->status == 3)
        <!-- Modal Rejection -->
        <form action="{{ route('transporter.sendchat', ['id' => $record->id]) }}" method="POST">
            @csrf
            <div class="modal fade" id="ax{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-status bg-danger"></div>
                        <div class="modal-body text-center py-4">
                            <i class="fa fa-circle-xmark text-danger display-2 pb-5"></i>
                            <!-- <h3>Are you sure?</h3> -->
                            <div class="text-secondary my-3">
                                Tell us the rejection reason

                            </div>
                            <div class="input-group input-group-flat">
                                <input type="text" name="message" class="form-control" autocomplete="off"
                                    placeholder="Type reason">
                                <input type="hidden" name="rejection" value="1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn w-100" data-bs-dismiss="modal"> Cancel </a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                            Reject </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal -->
        <form action="{{ route('transporter.process3', ['id' => $record->id]) }}" method="POST" class="d-inline">
            @csrf
            <div class="modal fade" id="a{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-status bg-success"></div>
                        <div class="modal-body text-center py-4">
                            <i class="fa fa-circle-check text-success display-2 pb-5"></i>
                            <!-- <h3>Are you sure?</h3> -->
                            <div class="text-secondary">
                                Do you want to approve this draft ?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn w-100" data-bs-dismiss="modal"> Cancel </a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success w-100" data-bs-dismiss="modal">
                                            Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif



    <!-- Modal -->
    {{-- <div class="modal fade" id="chat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Queries</h1>
                    <span class="fs-5 ms-auto">
                        <a href="{{ route('transporter.readchat', ['id' => $record->id]) }}">mark as read</a>
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body scrollable" style="height: 300px; overflow-y: auto;">
                            <div class="chat">
                                <div class="chat-bubbles">
                                    <form action="{{ route('transporter.sendchat', ['id' => $record->id]) }}"
                                        method="POST">
                                        @csrf

                                        @foreach ($chats as $chat)
                                            @if ($chat->user_id == Auth::user()->id)
                                                <div class="chat-item mb-3">
                                                    <div class="row align-items-end justify-content-end">
                                                        <div class="col col-lg-10">
                                                            <div class="chat-bubble chat-bubble-me">
                                                                @if ($chat->del == 0)
                                                                    <div class="chat-bubble-title">
                                                                        <div class="row">
                                                                            <div class="col chat-bubble-author">
                                                                                {{ Auth::user()->name }}
                                                                            </div>
                                                                            <div class="col-auto chat-bubble-date fs-4">
                                                                                {{ $chat->formatted_date }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chat-bubble-body">
                                                                        <p>{{ $chat->message }}</p>
                                                                    </div>
                                                                    <span class="fs-5">
                                                                        <a
                                                                            href="{{ route('transporter.deletechat', ['id' => $chat->id]) }}">delete</a>
                                                                    </span>
                                                                @else
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p>
                                                                                <i class="fa fa-ban"></i>
                                                                                Deleted message
                                                                            </p>
                                                                            <span
                                                                                class="fs-5">{{ $chat->formatted_date }}</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <span class="avatar avatar-1">
                                                                <i class="fa fa-user p-auto"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="chat-item mb-3">
                                                    <div class="row align-items-end">
                                                        <div class="col-auto">
                                                            <span class="avatar avatar-1">
                                                                <i class="fa fa-user-shield  p-auto"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col col-lg-10">
                                                            <div class="chat-bubble">
                                                                @if ($chat->del == 0)
                                                                    <div class="chat-bubble-title">
                                                                        <div class="row">
                                                                            <div class="col chat-bubble-author">Vendor
                                                                            </div>
                                                                            <div class="col-auto chat-bubble-date">
                                                                                {{ $chat->formatted_date }}</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="chat-bubble-body">
                                                                        <p>{{ $chat->message }}</p>
                                                                    </div>
                                                                @else
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p>
                                                                                <i class="fa fa-ban"></i>
                                                                                Deleted message
                                                                            </p>
                                                                            <span
                                                                                class="fs-5">{{ $chat->formatted_date }}</span>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer px-4 pb-4">
                    <div class="input-group input-group-flat">
                        <input type="text" name="message" class="form-control" autocomplete="off"
                            placeholder="Type message">
                        <span class="input-group-text">
                            <button type="submit" class="btn border-0">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modern Material Dashboard Chat Modal (Light Mode) -->
    <div class="modal fade" id="chat" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white text-dark rounded-4 shadow-lg border-0">
                <div class="modal-header border-0 pb-0">
                    <div class="d-flex align-items-center w-100">
                        <span class="avatar avatar-sm bg-gradient-primary text-white me-2">
                            <i class="fa fa-comments"></i>
                        </span>
                        <h5 class="modal-title fw-bold mb-0" id="chatModalLabel">Chat & Queries</h5>
                        <a href="{{ route('transporter.readchat', ['id' => $record->id]) }}"
                            class="ms-auto text-primary text-decoration-underline fs-6">Mark as read</a>
                        <button type="button" class="btn-close text-dark ms-2" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body px-3 pt-2 pb-0">
                    <div class="card bg-white border-0 shadow-sm mb-0">
                        <div class="card-body scrollable px-2 py-3" style="height: 320px; overflow-y: auto;">
                            <div class="chat">
                                <div class="chat-bubbles">
                                    <form action="{{ route('transporter.sendchat', ['id' => $record->id]) }}"
                                        method="POST">
                                        @csrf
                                        @foreach ($chats as $chat)
                                            @if ($chat->user_id == Auth::user()->id)
                                                <div class="d-flex justify-content-end mb-3">
                                                    <div class="me-2">
                                                        <div class="bg-primary text-white rounded-3 px-3 py-2 shadow-sm">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <span class="fw-bold">{{ Auth::user()->name }}</span>
                                                                <span
                                                                    class="ms-2 small text-white-50">{{ $chat->formatted_date }}</span>
                                                            </div>
                                                            <div>
                                                                @if ($chat->del == 0)
                                                                    <span>{{ $chat->message }}</span>
                                                                    <a href="{{ route('transporter.deletechat', ['id' => $chat->id]) }}"
                                                                        class="ms-2 text-info small text-decoration-underline">delete</a>
                                                                @else
                                                                    <span class="fst-italic text-warning"><i
                                                                            class="fa fa-ban"></i> Deleted message</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="avatar avatar-xs bg-primary text-white">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            @else
                                                <div class="d-flex justify-content-start mb-3">
                                                    <span class="avatar avatar-xs bg-info text-white me-2">
                                                        <i class="fa fa-user-shield"></i>
                                                    </span>
                                                    <div>
                                                        <div class="bg-info text-white rounded-3 px-3 py-2 shadow-sm">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <span class="fw-bold">Vendor</span>
                                                                <span
                                                                    class="ms-2 small text-white-50">{{ $chat->formatted_date }}</span>
                                                            </div>
                                                            <div>
                                                                @if ($chat->del == 0)
                                                                    <span>{{ $chat->message }}</span>
                                                                @else
                                                                    <span class="fst-italic text-warning"><i
                                                                            class="fa fa-ban"></i> Deleted message</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <form action="{{ route('transporter.sendchat', ['id' => $record->id]) }}" method="POST"
                        class="w-100">
                        @csrf
                        <div class="input-group input-group-flat">
                            <input type="text" name="message" class="form-control bg-white text-dark border-secondary"
                                autocomplete="off" placeholder="Type your message...">
                            <button type="submit" class="btn btn-primary px-3">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- this below is modal for editing and adding PO number -->
    <!-- this below is modal for editing and adding PO number -->
    <!-- this below is modal for editing and adding PO number -->

    <!-- Modal -->
    <div class="modal fade" id="poedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">PO Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <form action="{{ route('transporter.editpo', ['id' => $record->id]) }}" method="POST">
                            @csrf
                            <div class="col-12 mb-3 col-lg-12">
                                <label for="validationServer01" class="form-label">PO Numbers</label>
                                <input type="text" name="po"
                                    class="form-control is-{{ is_numeric($record->po) ? '' : 'in' }}valid"
                                    id="validationServer01" value="{{ $record->po }}" required>
                                <div class="{{ is_numeric($record->po) ? '' : 'in' }}valid-feedback">
                                    {{ is_numeric($record->po) ? 'Accepted Format' : 'Change P.O' }}
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let shouldScrollChat = false;

            // When the chat button is clicked, set the flag
            document.querySelectorAll('[data-bs-target="#chat"]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    shouldScrollChat = true;
                });
            });

            // When the modal is shown, scroll if the flag is set
            var chatModal = document.getElementById('chat');
            if (chatModal) {
                chatModal.addEventListener('shown.bs.modal', function() {
                    if (shouldScrollChat) {
                        var chatBody = chatModal.querySelector('.card-body.scrollable');
                        if (chatBody) {
                            chatBody.scrollTo({
                                top: chatBody.scrollHeight,
                                behavior: 'smooth'
                            });
                        }
                        shouldScrollChat = false;
                    }
                });
            }
        });
    </script>
@endsection
