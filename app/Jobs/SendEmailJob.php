<?php

namespace App\Jobs;

use App\Mail\UserMailable;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $template;
    private $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request->email;
        $this->template = $request->template;
        $this->params= $request->parameters;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new UserMailable());

    }
}
