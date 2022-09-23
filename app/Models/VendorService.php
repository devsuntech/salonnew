<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorService extends Model
{
    public function vendorservice()
    {
        return $this->belongsTo(SubService::class,'subservice_id');
    }
}
