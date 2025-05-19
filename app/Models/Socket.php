<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socket extends Model
{
    protected $fillable = [
        'title'
    ];

    public function motherboard() {
        return $this->hasMany(Motherboard::class, 'socket_id');
    }

    public function processor() {
        return $this->hasMany(Processor::class, 'socket_id');
    }
}
