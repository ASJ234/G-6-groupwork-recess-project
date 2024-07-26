<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use App\Mail\ParticipantReportMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected function sendReport($participant)
    {
        try {
            $attempts = $participant->attempts()->with(['challenge', 'question', 'answer'])->get();
            Log::info("Attempts for participant {$participant->id}: " . $attempts->toJson());

            Mail::to($participant->emailAddress)->send(new ParticipantReportMail($participant, $attempts));
            Log::info("Report sent to participant: {$participant->id}");
        } catch (\Exception $e) {
            Log::error("Failed to send report to participant {$participant->id}: " . $e->getMessage());
        }
    }

    public static function sendReports()
    {
        try {
            Log::info('Starting to send reports');
            $participants = Participant::all();
            $count = 0;
            foreach ($participants as $participant) {
                (new self)->sendReport($participant);
                $count++;
            }
            Log::info("Reports sent successfully to {$count} participants.");
            return response()->json(['message' => "Reports sent to {$count} participants."]);
        } catch (\Exception $e) {
            Log::error('Error in sendReports: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to send reports: ' . $e->getMessage()], 500);
        }
    }
}
