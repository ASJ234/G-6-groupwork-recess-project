<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipantChallengeAttempt extends Model
{
    use HasFactory;

    protected $primaryKey = 'attempt_id'; // Assuming 'attempt_id' as the primary key

    protected $fillable = [
        'participant_id',
        'challenge_id',
        'score',
        'total_score',
    ];

    // Define relationships
   // In your ParticipantChallengeAttempt model
public function participant()
{
    return $this->belongsTo(Participant::class, 'participant_id', 'id');
}


    public function questionAnswerRecord()
    {
    return $this->belongsTo(QuestionAnswerRecord::class, 'question_id', 'id'); // Adjust based on your actual schema
    }

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class, 'challenge_id','id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'registration_number', 'registration_number');
    }
    
}
