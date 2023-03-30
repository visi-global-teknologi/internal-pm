@extends('layouts.skote.master')

@section('title') @lang('translation.Profile') @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Employee @endslot
        @slot('title') Edit @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Employee Form</h4>
                    <form>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input readonly type="text" class="form-control" name="name" value="{{ $employee->user->name }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Personal Email</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="personal_email" value="{{ $employee->personal_email }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="phone_number" value="{{ $employee->phone_number }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Birthday</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="birthday" value="{{ $employeeDto->birthday_formatted }}" >
                            </div>
                        </div>
                    </form>
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
