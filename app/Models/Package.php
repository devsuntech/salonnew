<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
class Package extends Model
{
    use HasFactory;
    protected static function boot() {
        parent::boot();

        static::creating(function ($data) {
            $data->slug = Str::slug($data->name);
        });
    }
}
