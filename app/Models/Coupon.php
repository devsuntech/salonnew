<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
class Coupon extends Model
{
    protected static function boot() {
        parent::boot();
        static::creating(function ($data) {
            $data->slug = Str::slug($data->title);
        });
    }
}
