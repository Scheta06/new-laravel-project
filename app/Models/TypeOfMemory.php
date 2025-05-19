<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfMemory extends Model
{
    protected $fillable = [
        'title'
    ];

    public function ram() {
        return $this->hasMany(Ram::class, 'type_of_memory_id');
    }

    public function videocard() {
        return $this->hasMany(Videocard::class, 'type_of_memory_id');
    }
}
