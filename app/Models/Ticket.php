<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'user_id', 'ticket_code', 'issue_date', 'valid_from', 'valid_to', 'qr_code_url'];

    public function booking() {
        return $this->belongsTo(Booking::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function trip() {
    return $this->belongsTo(Trip::class);
}

}
