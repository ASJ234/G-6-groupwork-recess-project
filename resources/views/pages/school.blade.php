@extends('layouts.app', ['activePage' => 'school', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'School', 'activeButton' => 'laravel'])

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Card header --}}
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Schools</h4>
                    <p class="card-category">Manage your school records</p>
                </div>
                <div class="card-body">
                    {{-- Add new school button --}}
                    <a href="{{ route('schools.createSchool') }}" class="btn btn-success mb-3">
                        <i class="fa fa-plus"></i> Add School
                    </a>
                    {{-- Schools table --}}
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>District</th>
                                    <th>Registration Number</th>
                                    <th>Email</th>
                                    <th>Representative Name</th>
                                    <th>Validated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Loop through schools --}}
                                @foreach($schools as $index => $school)
                                    <tr>
                                        {{-- Row number --}}
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $school->name }}</td>
                                        <td>{{ $school->district }}</td>
                                        <td>{{ $school->registration_number }}</td>
                                        <td>{{ $school->representative_email }}</td>
                                        <td>{{ $school->representative_name }}</td>
                                        {{-- Validation status badge --}}
                                        <td>
                                            <span class="badge badge-{{ $school->validated ? 'success' : 'warning' }}">
                                                {{ $school->validated ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        {{-- Action buttons --}}
                                        <td class="td-actions">
                                            {{-- Edit button --}}
                                            <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            {{-- Delete button --}}
                                            <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this school?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Custom CSS --}}
@push('css')
<style>
    /* Card header styling */
    .card-header-primary {
        background: linear-gradient(60deg, #ab47bc, #8e24aa);
        box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
    }
    .card-header-primary .card-title,
    .card-header-primary .card-category {
        color: #fff;
    }
    
    /* Table row hover effect */
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }
    
    /* Badge styling */
    .badge {
        font-size: 0.8em;
        padding: 0.4em 0.7em;
    }
    
    /* Action buttons container */
    .td-actions {
        white-space: nowrap;
    }
</style>
@endpush