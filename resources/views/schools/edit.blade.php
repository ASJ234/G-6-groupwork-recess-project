@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Edit', 'activeButton' => 'laravel'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg">
                {{-- Card header --}}
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit School</h4>
                    <p class="card-category">Update the details of {{ $school->name }}</p>
                </div>
                {{-- Card body containing the form --}}
                <div class="card-body">
                    <form action="{{ route('schools.update', $school->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        

                        {{-- First row: School Name and District --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="bmd-label-floating">School Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $school->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district" class="bmd-label-floating">District</label>
                                    <input type="text" id="district" name="district" class="form-control" value="{{ $school->district }}" required>
                                </div>
                            </div>
                        </div>

                        {{-- Second row: Registration Number and Email --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_number" class="bmd-label-floating">Registration Number</label>
                                    <input type="text" id="registration_number" name="registration_number" class="form-control" value="{{ $school->registration_number }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="bmd-label-floating">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $school->email }}">
                                </div>
                            </div>
                        </div>

                        {{-- Representative Name field --}}
                        <div class="form-group">
                            <label for="representative_name" class="bmd-label-floating">Representative Name</label>
                            <input type="text" id="representative_name" name="representative_name" class="form-control" value="{{ $school->representative_name }}">
                        </div>

                        {{-- Validated checkbox --}}
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="validated" name="validated" value="1" {{ $school->validated ? 'checked' : '' }}>
                                Validated
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>

                        {{-- Submit button --}}
                        <button type="submit" class="btn btn-primary btn-round pull-right">
                            <i class="material-icons">update</i> Update School
                        </button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Custom CSS --}}
@push('css')
<style>
    body {
        background-color: #f5f5f5;
    }
    .card {
        margin-top: 50px;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-header-primary {
        background: linear-gradient(60deg, #7b1fa2, #913f9e);
        border-radius: 10px 10px 0 0;
        padding: 15px;
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
    }
    .card-header-primary .card-title {
        color: #fff;
        font-size: 1.5em;
        font-weight: 300;
    }
    .card-header-primary .card-category {
        color: rgba(255,255,255,.8);
        margin-top: 5px;
    }
    .card-body {
        padding: 30px;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-control {
        border: none;
        border-bottom: 1px solid #ced4da;
        border-radius: 0;
        padding-left: 0;
        padding-right: 0;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-control:focus {
        border-color: #7b1fa2;
        box-shadow: none;
    }
    .bmd-label-floating {
        color: #555;
    }
    .btn-primary {
        background-color: #7b1fa2;
        border-color: #7b1fa2;
        box-shadow: 0 2px 2px 0 rgba(156, 39, 176, 0.14), 0 3px 1px -2px rgba(156, 39, 176, 0.2), 0 1px 5px 0 rgba(156, 39, 176, 0.12);
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background-color: #913f9e;
        border-color: #913f9e;
        box-shadow: 0 14px 26px -12px rgba(156, 39, 176, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(156, 39, 176, 0.2);
    }
    .btn-round {
        border-radius: 30px;
        padding: 11px 23px;
    }
    .form-check .form-check-sign .check {
        border: 1px solid #7b1fa2;
    }
    .form-check .form-check-input:checked + .form-check-sign .check {
        background: #7b1fa2;
    }
</style>
@endpush