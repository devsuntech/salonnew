<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'firm_name','county_id','state_id','city_id','pincode','firm_address','serviceFor','mobile','whatsapp_number','email','gst_number','thumbnail','feature_image','gst_file','about_firm',
        'term_conditions', 'services'
    ];
    protected $casts = [
        'services' => 'array'
    ];
    protected static function boot() {
        parent::boot();

        static::creating(function ($data) {
            if ($data->salon_title) {
                 $data->slug = Str::slug($data->salon_title);
            } elseif($data->firm_name){
                $data->slug = Str::slug($data->firm_name);
            }

        });
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
     public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
     public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
