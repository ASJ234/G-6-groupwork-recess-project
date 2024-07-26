@extends('layouts.app', ['activePage' => 'Analytics', 'title' => 'Most Correctly Answered Questions', 'navName' => 'Analytics', 'activeButton' => 'laravel'])

@section('content')
<div class="container">
    <h1>Most Correctly Answered Questions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Question</th>
                <th>Number of Correct Answers</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mostCorrectlyAnsweredQuestions as $index => $attempt)
                <tr>
                    <td>{{ $mostCorrectlyAnsweredQuestions->firstItem() + $index }}</td>
                    <td>{{ $attempt->question ? $attempt->question->question : 'N/A' }}</td>
                    <td>{{ $attempt->total_correct }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($mostCorrectlyAnsweredQuestions->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $mostCorrectlyAnsweredQuestions->previousPageUrl() }}">Previous</a>
                </li>
            @endif

            {{-- Pagination Links --}}
            @for ($page = 1; $page <= $mostCorrectlyAnsweredQuestions->lastPage(); $page++)
                @if ($page == $mostCorrectlyAnsweredQuestions->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $mostCorrectlyAnsweredQuestions->url($page) }}">{{ $page }}</a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($mostCorrectlyAnsweredQuestions->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $mostCorrectlyAnsweredQuestions->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Next</span>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endsection
