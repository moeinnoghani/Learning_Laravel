<?php

namespace App\Http\Controllers;

use App\Models\SMS;
use App\Repositories\SMSRepository;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    private SMS $model;
    private SMSRepository $smsRepository;

    public function __construct()
    {
        $this->smsRepository = new SMSRepository();
    }

    public function send(Request $request)
    {
        dd($request);
    }
}
