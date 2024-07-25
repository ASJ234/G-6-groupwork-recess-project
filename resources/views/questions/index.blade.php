@extends('layouts.app', ['activePage' => 'add school', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Add school', 'activeButton' => 'laravel'])

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Questions and Answers</h4>
        </div>
        <div class="card-body">
            @if ($questions->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->question->question }}</td>
                            <td>{{ $question->answer }}</td>
                            <td>{{ $question->score }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $questions->links() }} <!-- Pagination links -->
            @else
            <p>No questions and answers found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
