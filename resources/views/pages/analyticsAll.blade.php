<!-- resources/views/pages/analyticsAll.blade.php -->

@extends('layouts.app', ['activePage' => 'analytics', 'title' => 'All Analytics', 'navName' => 'Analytics', 'activeButton' => 'analytics'])

@section('content')
<div class="container">
    <h2>All Analytics</h2>
    
    <h3>Challenges</h3>
    @foreach ($challenges as $challenge)
        <div>
            <h4>{{ $challenge->title }}</h4>
            <a href="{{ route('analytics.worstPerformingSchools', ['challengeId' => $challenge->id]) }}" class="btn btn-danger">
                View Worst Performing Schools
            </a>
        </div>
    @endforeach

    <h3>Average Scores per Challenge</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Challenge</th>
                <th>Average Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($averageScores as $score)
                <tr>
                    <td>{{ $score->challenge->title }}</td>
                    <td>{{ $score->average_score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add more analytics sections here -->
    
</div>
@endsection
