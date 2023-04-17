@extends('layouts.skote.master')

@section('title') Employee | Create @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/@chenfengyuan/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Employee @endslot
        @slot('title') Create @endslot
    @endcomponent

    @if ($errors->any())
        @foreach ($errors->all() as $key => $error)
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    {!! Form::open(['route' => 'api.private.employee.store', 'method' => 'POST', 'id' => 'form-employee-store']) !!}
        <div class="row">
            @include('skote.pages.employee.component.form-create.div-group-form-personal-detail')
            @include('skote.pages.employee.component.form-create.div-group-form-employee-information')
            @include('skote.pages.employee.component.form-create.div-group-form-address-information')
            @include('skote.pages.employee.component.form-create.div-group-form-user-information')
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group row mb-4">
                    <div class="col-md-4">
                        <a class="btn btn-secondary waves-effect waves-light" href="{{ route('employees.index') }}">Cancel</a>
                        <button id="btn-submit-form-employee-store" type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-3 mb-2">
                    <div style="display: none" class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <input type="hidden" name="route_api_private_helper_dropdown_get_employee_position_by_division" value="{{ route('api.private.helper.dropdown.employee-position-by-division', 'xxx') }}"/>
    <input type="hidden" name="route_api_private_helper_selecttwo_get_indonesia_province" value="{{ route('api.private.helper.selecttwo.province') }}"/>
    <input type="hidden" name="route_api_private_helper_selecttwo_get_indonesia_city_by_province" value="{{ route('api.private.helper.selecttwo.city-by-province', 'xxx') }}"/>
    <input type="hidden" name="route_api_private_helper_selecttwo_get_indonesia_district_by_city" value="{{ route('api.private.helper.selecttwo.district-by-city', 'xxx') }}"/>
    <input type="hidden" name="route_api_private_helper_selecttwo_get_indonesia_village_by_district" value="{{ route('api.private.helper.selecttwo.village-by-district', 'xxx') }}"/>
    <input type="hidden" name="route_api_private_helper_selecttwo_country_without_indonesia" value="{{ route('api.private.helper.selecttwo.country-without-indonesia') }}"/>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('script-bottom')
    <script src="{{ URL::asset('app/js/employee/store.js') }}"></script>
    <script src="{{ URL::asset('app/js/employee/create/change-country.js') }}"></script>
    <script src="{{ URL::asset('app/js/helper/dropdown/get-employee-position-by-division.js') }}"></script>
    <script src="{{ URL::asset('app/js/helper/selecttwo/get-country-without-indonesia.js') }}"></script>
    <script src="{{ URL::asset('app/js/helper/selecttwo/get-province.js') }}"></script>
    <script src="{{ URL::asset('app/js/helper/selecttwo/get-city-by-province.js') }}"></script>
    <script src="{{ URL::asset('app/js/helper/selecttwo/get-district-by-city.js') }}"></script>
    <script src="{{ URL::asset('app/js/helper/selecttwo/get-village-by-district.js') }}"></script>
@endsection
