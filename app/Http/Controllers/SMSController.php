<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Models\SMS;
use App\Repositories\SMSRepository;
use App\Rules\SmsRule;
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

        $request->validate([
            'phone_no' => 'required|array',
            'phone_no.*' => 'required|regex:/(0)[0-9]{10}/',
            'type' => 'required',
            'parameters' => ['required','array',new SmsRule($request)],
        ]);

        $sms = $this->smsRepository->getByType($request->type);

        if (!$sms->is_active) {
            return response()->json([
                'Error' => 'This sms is invalid'
            ]);
        }

        SendSmsJob::dispatch($sms->toArray(),$request->all());
    }
}
