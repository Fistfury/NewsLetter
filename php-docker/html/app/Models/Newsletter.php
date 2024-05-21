<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscribers() {
        return $this->hasManyThrough(
            User::class,
            Subscription::class,
            'newsletter_id', // Foreign key on the subscriptions table
            'id',            // Foreign key on the users table
            'id',            // Local key on newsletters table
            'user_id'        // Local key on users table
        );
    }
    
}
