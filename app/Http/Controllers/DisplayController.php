<?php

namespace App\Http\Controllers;

use App\Models\ParticipantChallengeAttempt;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        // Get all challenges
        $challenges = ParticipantChallengeAttempt::select('challenge_id')
            ->distinct()
            ->get()
            ->pluck('challenge_id');

        // Initialize an empty array to hold the winners for each challenge
        $challengeWinners = [];

        foreach ($challenges as $challengeId) {
            // Get top 2 participants by total score for each challenge
            $winners = ParticipantChallengeAttempt::where('challenge_id', $challengeId)
                ->select('participant_id')
                ->selectRaw('SUM(score) as total_score')
                ->groupBy('participant_id')
                ->orderBy('total_score', 'desc')
                ->limit(2)
                ->get()
                ->map(function ($winner) {
                    return [
                        'participant' => $winner->participant,
                        'total_score' => $winner->total_score,
                    ];
                });

            // Add winners to the array
            $challengeWinners[$challengeId] = $winners;
        }

        return view('winners', ['challengeWinners' => $challengeWinners]);
    }
}
