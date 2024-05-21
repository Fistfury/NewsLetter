<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'salt',
        'role',
        'agreement'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];

        
        
    }
     // Relationship With Newsletters
     public function newsletters() {
        return $this->hasMany(Newsletter::class);
    }

      // Relationship With Subscriptions
      public function subscriptions() {
        return $this->hasMany(Subscription::class);
    }

    public function isCustomer() {
        return $this->role === 'customer';
    }
    
    public function isSubscriber() {
        return $this->role === 'subscriber';
    }
    
    public function isBoth() {
        return $this->role === 'both';
    }
}

