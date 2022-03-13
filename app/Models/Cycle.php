<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    const CYCLE_HORLY = 'hourly';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
