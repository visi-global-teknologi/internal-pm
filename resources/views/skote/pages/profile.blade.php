@extends('layouts.skote.master')

@section('title') @lang('translation.Profile') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Employee @endslot
        @slot('title') Profile @endslot
    @endcomponent

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-detail-tab" data-bs-toggle="pill" href="#v-pills-detail" role="tab" aria-controls="v-pills-detail" aria-selected="true">
                        <i class= "bx bxs-extension d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">My Profile</p>
                    </a>
                    <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-change-password" aria-selected="false">
                        <i class= "bx bx-key d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Change Password</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            @include('skote.pages.profile.detail', ['employee' => $employee])
                            @include('skote.pages.profile.change-password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
