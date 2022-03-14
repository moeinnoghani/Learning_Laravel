<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function cycles()
    {
        return $this->hasMany(Cycle::class);
    }

}
