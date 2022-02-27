<?php

namespace App\Http\Controllers;

use App\Repositories\EmailRepository;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    private EmailRepository $emailRepository;

    public function __construct()
    {
        $this-> emailRepository = new EmailRepository();
    }

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
