<?php
// app/Models/Answer.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    
    protected $fillable = ['question_id', 'answer', 'score'];
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }


public function attempt()
{
    return $this->belongsTo(Attempt::class);
}
}

