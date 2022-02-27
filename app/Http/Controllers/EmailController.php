<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|array',
            'email.*' => 'email',
            'subject' => 'required|string',
            'body' => 'required|string',

        ]);
    }
}
