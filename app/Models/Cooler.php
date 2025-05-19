<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooler extends Model
{
    protected $fillable = [
        'title',
        'description',
        'power',
        'vendor_id',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
