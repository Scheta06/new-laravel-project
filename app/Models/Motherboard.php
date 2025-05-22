<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'chipset_id',
        'socket_id',
        'form_id',
        'vendor_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function chipset()
    {
        return $this->belongsTo(Chipset::class);
    }

    public function socket()
    {
        return $this->belongsTo(Socket::class);
    }

    public function form() {
        return $this->belongsTo(FormFactor::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
