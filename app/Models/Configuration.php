<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'processor_id',
        'motherboard_id',
        'cooler_id',
        'ram_id',
        'storage_id',
        'videocard_id',
        'psu_id',
        'chassis_id',
    ];

    public function user() {
        return $this->belongsTo(User::class,);
    }

    public function processor() {
        return $this->belongsTo(Processor::class,);
    }

    public function motherboard() {
        return $this->belongsTo(Motherboard::class,);
    }

    public function cooler() {
        return $this->belongsTo(Cooler::class,);
    }

    public function storage() {
        return $this->belongsTo(Storage::class,);
    }

    public function ram() {
        return $this->belongsTo(Ram::class,);
    }

    public function videocard() {
        return $this->belongsTo(Videocard::class,);
    }

    public function psu() {
        return $this->belongsTo(Psu::class,);
    }

    public function chassis() {
        return $this->belongsTo(Chassis::class,);
    }
}
