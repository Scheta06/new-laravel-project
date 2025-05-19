<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessorGeneration extends Model
{
    protected $fillable = [
        'title'
    ];

    public function processor() {
        return $this->hasMany(Processor::class, 'vendor_id');
    }
}
