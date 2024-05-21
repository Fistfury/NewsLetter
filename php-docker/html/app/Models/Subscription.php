<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',      // Referencing the subscriber
        'newsletter_id',  // Referencing the newsletter
        'subscribed_at'  // Date of subscription
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function newsletter() {
        return $this->belongsTo(Newsletter::class, 'newsletter_id');
    }

    protected $casts = [
        'subscribed_at' => 'datetime',
    ];
}