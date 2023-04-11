@extends('layouts.skote.master')

@section('title') Employee | Create @endsection

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

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Details</h4>
                    <form>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input required type="text" class="form-control" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                              <input required type="text" class="form-control" placeholder="Enter Your Phone Number">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
