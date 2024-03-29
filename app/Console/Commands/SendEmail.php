<?php

namespace App\Console\Commands;

use App\Mail\UserMailable;
use App\Models\Email;
use App\Repositories\EmailRepository;
use App\Services\EmailService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'to send emails';

    private EmailRepository $emailRepository;
    private EmailService $emailService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->emailRepository = new EmailRepository();
        $this->emailService = new EmailService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailInPending = $this->emailRepository->getPending(20);

        $emailInPending->each(function ($email, $updateParams) {


            Mail::to($email->email)->send(new UserMailable());
            if ($this->emailService->send($email->email, $email->subject, $email->body)) {

                $this->emailRepository->update($email, [
                    'status' => Email::STATUS_SENT,
                    'sent_at' => Carbon::now()
                ]);
            }
        });


    }
}
