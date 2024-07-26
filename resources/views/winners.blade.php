@extends('layouts.app', [
    'activePage' => 'dashboard',
    'title' => 'Winners by Challenge',
    'navName' => 'Dashboard',
    'activeButton' => 'laravel'
])

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Top 2 Competition Winners by Challenge</h1>

        @foreach ($challengeWinners as $challengeId => $winners)
            <div class="mb-4">
                <h2>Challenge ID: {{ $challengeId }}</h2>
                <div class="row">
                    @foreach ($winners as $winner)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                @php
                                    // Normalize image path
                                    $imagePath = $winner['participant']->imagePath;
                                    // Prepend 'light-bootstrap/img/' to the stored path
                                    $fullImagePath = 'light-bootstrap/img/' . $imagePath;
                                @endphp

                                @if($imagePath && file_exists(public_path($fullImagePath)))
                                    <img 
                                        src="{{ asset($fullImagePath) }}" 
                                        class="card-img-top" 
                                        alt="{{ $winner['participant']->username }}"
                                    >
                                @else
                                    <img 
                                        src="https://via.placeholder.com/150" 
                                        class="card-img-top" 
                                        alt="Placeholder Image"
                                    >
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $winner['participant']->username }}</h5>
                                    <p class="card-text"><strong>Total Score:</strong> {{ $winner['total_score'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
