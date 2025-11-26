<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'date',
        'image',
        'status',
        'solved_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
