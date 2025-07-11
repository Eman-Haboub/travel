<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
   protected $fillable = [
    'destination',
    'description',
    'start_date',
    'end_date',
    'image',
    'price', 
];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
}
