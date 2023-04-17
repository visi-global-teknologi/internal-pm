@extends('layouts.skote.master')

@section('title') Edit Role @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') ACL @endslot
        @slot('title') Edit Role @endslot
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
                {!! Form::open(['route' => ['api.private.acl.role.update', $role->id], 'method' => 'POST', 'id' => 'form-acl-role-update']) !!}
                    <input type="hidden" name="_method" value="PUT" >
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input required name="name" type="text" class="form-control" placeholder="Enter Role Name" value="{{ $role->name }}">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <a class="btn btn-secondary w-md" href="{{ route('acl.roles.index') }}">Back</a>
                                <button id="btn-submit-form-acl-role-update" type="submit" class="btn btn-primary w-md">Save</button>
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
    <script src="{{ URL::asset('app/js/acl/role/update.js') }}"></script>
@endsection
