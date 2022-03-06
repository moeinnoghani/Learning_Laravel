<?php

namespace App\Mail;

use App\Models\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class UserMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $emailTemplate;
    public array $parameters;

    public $subject;
    private $request;
    private $subject_parameters;

    private $templateView;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $request)
    {

        $this->emailTemplate = $template;
//        $this->subject = $template->subject;
        $this->parameters = $request['parameters'];
        $this->subject_parameters = $request['subject_parameters'];

        $this->templateView = $this->emailTemplate['view_map'] ?? 'mail' . $this->emailTemplate['name'];


        $this->subjectBuilder();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->templateView);
    }

    private function subjectBuilder()
    {
        $subject = $this->emailTemplate['subject'];

        collect($this->subject_parameters)->each(function ($value, $key) use (&$subject) {
            $subject = Str::replace('{' . $key . '}', $value, $subject);
        });

        $this->subject = $subject;
    }
}
