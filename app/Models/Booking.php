<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['customer_name', 'customer_email', 'starts_at', 'ends_at', 'status', 'notes'];
    protected function casts(): array { return ['starts_at' => 'datetime', 'ends_at' => 'datetime']; }
}
