<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'location', 'stars', 'description', 'image'];

    public function hotelBookings() {
        return $this->hasMany(HotelBooking::class);
    }
}
