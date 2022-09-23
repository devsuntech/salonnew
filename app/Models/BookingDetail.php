<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class BookingDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'sub_service_id',
        'vendor_staff_id',
        'discount',
        'amount',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
