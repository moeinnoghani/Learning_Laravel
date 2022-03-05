<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $casts =
        [
            'is_active' => 'boolean'
        ];
    protected $fillable = [
        'id',
        'template_name',
        'subject',
        'view_map',
        'is_active',
    ];

}
