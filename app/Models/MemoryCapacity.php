<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemoryCapacity extends Model
{
    protected $fillable = [
        'title'
    ];

    public function ram() {
        return $this->hasMany(Ram::class, 'memory_capacity_id');
    }

    public function storage() {
        return $this->hasMany(Storage::class, 'memory_capacity_id');
    }

    public function videocard() {
        return $this->hasMany(Videocard::class, 'memory_capacity_id');
    }
}
