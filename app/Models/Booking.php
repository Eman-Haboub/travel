<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'trip_id', 'booking_type'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function trip() {
        return $this->belongsTo(Trip::class);
    }

    public function ticket() {
        return $this->hasOne(Ticket::class);
    }

    public function hotelBooking() {
        return $this->hasOne(HotelBooking::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
