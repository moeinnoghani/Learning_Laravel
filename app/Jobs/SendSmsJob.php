<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    private $sms;
    private $parameters;
    private $smsBody;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sms,$request)
    {
        $this->request = $request;
        $this->sms = $sms;
        $this->parameters = $request->parameters;

        $this->smsBody = $request->body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }

    private function smsTextBuilder($body)
    {
        $smsBody = $this->sms['body'];

        collect($this->parameters)->each(function ($value, $key) use (&$smsBody) {
            $smsBody = Str::replace('{' . $key . '}', $value, $smsBody);
        });

        $this->smsBody = $smsBody;
    }
}
