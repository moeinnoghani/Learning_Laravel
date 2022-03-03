<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|array',
            'fullname' => 'required|string',
            'parameter' => 'required|array',
            'template' => 'required|string'
        ]);
        SendEmailJob::dispatch();
    }
}
