<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'batch_id',
        'payment_method_id',
        'payment_status',
        'fees_collected',
        'fees_due',
        'monthly_fee',
        'enrollment_status',
        'completed_at',
    ];

    protected $casts = [
        'fees_collected' => 'decimal:2',
        'fees_due' => 'decimal:2',
        'monthly_fee' => 'decimal:2',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the user that owns the enrollment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course that owns the enrollment.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the batch for the enrollment.
     */
    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * Get the payment method for the enrollment.
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    /**
     * Get the invoices for this enrollment.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
