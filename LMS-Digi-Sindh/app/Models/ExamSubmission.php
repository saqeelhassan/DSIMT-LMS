<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamSubmission extends Model
{
    protected $fillable = [
        'exam_id',
        'user_id',
        'answer_content',
        'marks_obtained',
        'feedback',
        'submitted_at',
        'marked_at',
        'marked_by',
        'status',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'marked_at' => 'datetime',
    ];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function markedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'marked_by');
    }
}
