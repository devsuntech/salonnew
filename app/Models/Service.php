<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $casts = [
        'services' => 'array'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($data) {
            $data->slug = Str::slug($data->name);
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function scopeHavingCategories($query, $category_ids)
    {
        if ($category_ids == '') {
           return [];
        }
        return $query->whereIn('category_id', $category_ids);
    }
}
