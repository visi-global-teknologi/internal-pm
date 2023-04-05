@extends('layouts.skote.master')

@section('title') Employee Division @endsection

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
                    <h4 class="card-title mb-4">Edit</h4>
                    <form>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input name="name" type="text" class="form-control" value="{{ $employeeDivision->name }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Active Status</label>
                            <div class="col-sm-9">
                                <select name="active_status" class="form-select">
                                    @foreach (['no', 'yes'] as $item)
                                        @if ($employeeDivision->active_status == $item)
                                            <option selected>{{ $item }}</option>
                                        @else
                                            <option>{{ $item }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
