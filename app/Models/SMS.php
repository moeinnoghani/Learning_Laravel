<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Post
 *
 * @mixin Eloquent
 */
class SMS extends Model
{
    use HasFactory;

    protected $table = 'sms';

    protected $fillable = ['type', 'body', 'is_active'];

    protected $hidden = ['created_at', 'updated_at'];

}
