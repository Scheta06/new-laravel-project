<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    protected $fillable = [
        'title',
        'description',
        'modules_count',
        'frequency',
        'memory_capacity_id',
        'type_of_memory_id',
        'vendor_id',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function memoryCapacity() {
        return $this->belongsTo(MemoryCapacity::class);
    }

    public function typeOfMemory() {
        return $this->belongsTo(TypeOfMemory::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
