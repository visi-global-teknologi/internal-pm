@extends('layouts.skote.master')

@section('title') @lang('translation.Profile') @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Employee @endslot
        @slot('title') Profile @endslot
    @endcomponent

    @if ($errors->any())
        @foreach ($errors->all() as $key => $error)
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-detail-tab" data-bs-toggle="pill" href="#v-pills-detail" role="tab" aria-controls="v-pills-detail" aria-selected="true">
                        <i class= "bx bxs-extension d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">My Profile</p>
                    </a>
                    <a class="nav-link" id="v-pills-change-password-tab" data-bs-toggle="pill" href="#v-pills-change-password" role="tab" aria-controls="v-pills-change-password" aria-selected="false">
                        <i class= "bx bx-key d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Change Password</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            @include('skote.pages.profile.detail', ['employee' => $employee, 'employeeDto' => $employeeDto])
                            @include('skote.pages.profile.change-password', ['employee' => $employee, 'employeeDto' => $employeeDto])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('script-bottom')
    <script src="{{ URL::asset('app/js/user/change-password.js') }}"></script>
@endsection
