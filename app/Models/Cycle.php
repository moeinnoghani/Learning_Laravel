<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    const CYCLE_HOURLY = 'hourly';
    const CYCLE_MONTHLY = 'monthly';
    const CYCLE_YEARLY = 'yearly';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
