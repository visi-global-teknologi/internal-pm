@extends('layouts.skote.master')

@section('title') User Activity @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Lists @endslot
        @slot('title') User Activity @endslot
    @endcomponent

    @if ($errors->any())
        @foreach ($errors->all() as $key => $error)
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lists</h4>
                    <table id="user-activity-datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Date Time</th>
                                <th>Ip Address</th>
                                <th>User Agent</th>
                                <th>Module Name</th>
                                <th>Activity</th>
                                <th>User</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="route_api_private_datatable_user_activity" value="{{ route('api.private.datatable.user-activity') }}"/>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('script-bottom')
    <script src="{{ URL::asset('app/js/datatable/user-activity.js') }}"></script>
@endsection
