<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingDetail;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'customer_id',
        'payment_type',
        'payment_status',
        'online_payment_method',
        'online_payment_method_ref_id',
        'online_payment_method_data',
        'total_amount',
        'total_discount',
        'coupon_id',
        'coupon_discount',
        'booking_date',
        'booking_time',
        'booking_status',
        'note'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'booking_date' => 'date',
        'online_payment_metod_data' => 'array'
    ];

    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function customerDetail()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}
