<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
     protected $fillable = ['user_id', 'message', 'is_read'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
