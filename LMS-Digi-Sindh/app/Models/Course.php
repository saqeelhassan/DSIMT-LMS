<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_mode_id',
        'description',
        'thumbnail',
        'release_date',
        'total_hours',
        'certificate',
        'skills',
        'total_lectures',
        'language',
        'instructor_id',
        'live_class_url',
    ];

    protected $casts = [
        'release_date' => 'date',
        'certificate' => 'boolean',
    ];

    /**
     * Course thumbnail URL (uploaded image or placeholder).
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->thumbnail && Storage::disk('public')->exists($this->thumbnail)) {
            return Storage::disk('public')->url($this->thumbnail);
        }
        $num = ($this->id ?? 0) % 12;
        return '/images/courses/4by3/' . str_pad((string) ($num + 1), 2, '0', STR_PAD_LEFT) . '.jpg';
    }

    /**
     * Get the course mode that owns the course.
     */
    public function courseMode(): BelongsTo
    {
        return $this->belongsTo(CourseMode::class, 'course_mode_id');
    }

    /**
     * Get the instructor (user) that owns the course.
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * Get the enrollments for the course.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Get the exams for the course.
     */
    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }

    /**
     * Get the attendances for the course.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Get the batches for the course.
     */
    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class);
    }

    /**
     * Get the course contents (videos, PDFs, source code).
     */
    public function contents(): HasMany
    {
        return $this->hasMany(CourseContent::class, 'course_id')->orderBy('sort_order');
    }

    /**
     * Get the assignments for the course.
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the quizzes for the course.
     */
    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }
}
