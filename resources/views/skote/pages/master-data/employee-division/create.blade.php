@extends('layouts.skote.master')

@section('title') Employee Division @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
    @slot('li_1') Master Data @endslot
    @slot('title') Employee Division @endslot
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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create</h4>
                    {!! Form::open(['route' => 'api.private.master-data.employee-division.store', 'method' => 'POST', 'id' => 'form-master-data-employee-division-store']) !!}
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input name="name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Active Status</label>
                            <div class="col-sm-9">
                                <select name="active_status" class="form-select">
                                    @foreach (['no', 'yes'] as $item)
                                        <option selected>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <a class="btn btn-secondary w-md" href="{{ route('master-data.employee-divisions.index') }}">Back</a>
                                    <button id="btn-submit-form-master-data-employee-division-store" type="submit" class="btn btn-primary w-md">Save</button>
                                </div>
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
    <script src="{{ URL::asset('app/js/master-data/employee-division/store.js') }}"></script>
@endsection
