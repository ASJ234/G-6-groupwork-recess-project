<!DOCTYPE html>
<html>
<head>
    <title>Challenge Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .participant-image img {
            max-width: 150px;
            height: auto;
            border-radius: 50%;
        }
        .container {
            margin: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Challenge Report for {{ $participant->username }}
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-4 participant-image">
                        @if($participant->imagePath && file_exists(public_path('light-bootstrap/img/' . $participant->imagePath)))
                            <img src="{{ asset('light-bootstrap/img/' . $participant->imagePath) }}" alt="{{ $participant->username }}" class="img-fluid">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><strong>Username:</strong> {{ $participant->username }}</p>
                        <p><strong>Email:</strong> {{ $participant->emailAddress }}</p>
                        <p><strong>School:</strong> {{ $participant->school->name ?? 'N/A' }}</p>
                    </div>
                </div>
                <h2 class="my-4">Attempts</h2>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Challenge ID</th>
                            <th>Challenge Title</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Score</th>
                            <th>Correct</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attempts as $attempt)
                            <tr>
                                <td>{{ $attempt->challenge_id ?? 'N/A' }}</td>
                                <td>{{ $attempt->challenge->title ?? 'N/A' }}</td>
                                <td>{{ $attempt->question->question ?? 'N/A' }}</td>
                                <td>{{ $attempt->answer->answer ?? 'N/A' }}</td>
                                <td>{{ $attempt->answer->score ?? 'N/A' }}</td>
                                <td>{{ $attempt->is_correct ? 'Yes' : 'No' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Generated on {{ now()->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </div>
</body>
</html>
