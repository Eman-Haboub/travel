<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
     protected $fillable = ['user_id', 'booking_id', 'rating', 'comment'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function booking() {
        return $this->belongsTo(Booking::class);
    }
    public function trip()
{
    return $this->belongsTo(Trip::class);
}
}
