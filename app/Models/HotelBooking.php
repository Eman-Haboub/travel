<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;
     protected $table = 'hotelbookings';

protected $fillable = ['user_id', 'hotel_id', 'room_type', 'check_in', 'check_out', 'status'];

    public function booking() {
        return $this->belongsTo(Booking::class);
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
