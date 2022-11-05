<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected static function boot() {
        parent::boot();

        static::creating(function ($data) {
            $data->slug = Str::slug($data->name);
        });
    }


}
