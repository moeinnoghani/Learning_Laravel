<?php

namespace App\Services;


use League\Flysystem\Config;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades;

class EmailService
{

    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        try {
            $this->mail->SMTPDebug = false;
            $this->mail->isSMTP();
            $this->mail->Host = env('MAIL_HOST');
            $this->mail->SMTPAuth = true;
            $this->mail->Username = env('MAIL_USERNAME');
            $this->mail->Password = env('MAIL_PASSWORD');
            $this->mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $this->mail->Port = env('MAIL_PORT');
            $this->mail->setFrom('MAIL_FROM_ADDRESS','MAIL_FROM_NAME');


        } catch (\Exception $e) {
            die('connect error');
        }
    }

    public function send($to, $subject, $body)
    {
        $this->mail->addAddress($to);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        return $this->send($to, $subject, $body);
    }
}
