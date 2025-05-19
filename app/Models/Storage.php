<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'title',
        'description',
        'reading_rate',
        'recording_rate',
        'max_resource',
        'memory_capacity_id',
        'vendor_id',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function memoryCapacity() {
        return $this->belongsTo(MemoryCapacity::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
