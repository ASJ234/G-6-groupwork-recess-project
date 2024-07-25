@extends('layouts.app', ['activePage' => 'show', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Challenges', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <h1>{{ $challenge->title }}</h1>
        <p>Description: {{ $challenge->description }}</p>
        <p>Starting Date: {{ $challenge->starting_date }}</p>
        <p>Closing Date: {{ $challenge->closing_date }}</p>
        <p>Duration (minutes): {{ $challenge->duration_minutes }}</p>

        <div>
            <a href="{{ route('challenges.edit', ['challenge' => $challenge->id]) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('challenges.destroy', ['challenge' => $challenge->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
