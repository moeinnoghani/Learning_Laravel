<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $emailTemplate;
    public array $parameters;

    public $subject = 'This is subject';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $params)
    {
        $this->emailTemplate = $template;
        $this->parameters = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("mail.{$this->emailTemplate}");
    }
}
