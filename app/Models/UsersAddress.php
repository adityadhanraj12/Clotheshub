<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersAddress extends Model
{
    protected $table = 'users_address';

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'street',
        'city',
        'postal_code',
        'state',
        'phone_number',
        'address_type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


