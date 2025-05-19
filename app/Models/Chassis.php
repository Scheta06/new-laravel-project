<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chassis extends Model
{
    protected $fillable = [
        'title',
        'description',
        'form_id',
        'vendor_id',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function formFactor() {
        return $this->belongsTo(FormFactor::class);
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
