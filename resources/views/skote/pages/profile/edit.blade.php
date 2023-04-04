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
                    {!! Form::open(['route' => ['api.private.employee.update', $employee->uuid], 'method' => 'POST', 'id' => 'form-employee-update', 'files' => true]) !!}
                        <input name="_method" type="hidden" value="PUT"/>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input readonly type="text" class="form-control" name="name" value="{{ $employee->user->name }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Personal Email</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="personal_email" value="{{ $employee->personal_email }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="phone_number" value="{{ $employee->phone_number }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Birthday</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="birthday" value="{{ $employeeDto->birthday_ymd_formatted }}" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select required name="gender" class="form-select">
                                    @if ('male' == $employee->gender)
                                        <option selected value="male">Male</option>
                                    @else
                                        <option value="female">Female</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-4">
                                <a class="btn btn-secondary waves-effect waves-light" href="{{ route('profile') }}">Back</a>
                                <button id="btn-submit-form-employee-update" type="submit" class="btn btn-primary w-md">Update</button>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3 mb-2">
                            <div style="display: none" class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('script-bottom')
    <script src="{{ URL::asset('app/js/employee/update.js') }}"></script>
@endsection
