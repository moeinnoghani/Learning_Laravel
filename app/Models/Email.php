<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_SENT = 'sent';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    public $timestamps = false;
    protected $table = 'mails';

    protected $fillable = ['email', 'subject', 'body', 'status', 'sent_at'];
}
