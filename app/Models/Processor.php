<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cores',
        'streams',
        'base_frequency',
        'max_frequency',
        'processor_generation_id',
        'socket_id',
        'vendor_id',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function processorGeneration() {
        return $this->belongsTo(ProcessorGeneration::class);
    }

    public function socket() {
        return $this->belongsTo(Socket::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
