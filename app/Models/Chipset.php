<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chipset extends Model
{
    protected $fillable = [
        'title',
        'type'
    ];

    public function motherboard() {
        return $this->hasMany(Motherboard::class, 'chipset_id');
    }
}
