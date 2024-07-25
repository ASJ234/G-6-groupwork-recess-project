@extends('layouts.app', ['activePage' => 'edit', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'edit', 'activeButton' => 'laravel'])

@section('content')
    <div class="container">
        <h1 class="mb-4">Top Winners</h1>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($winners as $index => $winner)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $winner->participant->firstname }}</td>
                        <td>{{ $winner->participant->lastname }}</td>
                        <td>{{ number_format($winner->score, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
