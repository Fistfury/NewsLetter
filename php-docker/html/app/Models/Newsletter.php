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
            'newsletter_id', 
            'id',            
            'id',            
            'user_id'       
        );
    }
    
}
