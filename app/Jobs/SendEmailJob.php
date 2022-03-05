<?php

namespace App\Jobs;

use App\Mail\UserMailable;

//use http\Env\Request;
use App\Models\Template;
use App\Repositories\TemplateRepository;
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
    private  $template;
    private $parameters;
    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $template, $request)
    {
        $this->email = $request['email'];
        $this->template = $template;
//        $this->parameters = $request->parameters;
        $this->request = $request;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new UserMailable($this->template, $this->request));

    }
}
