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
            $this->mail->host = Facades\Config::get('MAIL_HOST');
            $this->mail->SMTPAuth = true;
            $this->mail->Username = Facades\Config::get('MAIL_USERNAME');
            $this->mail->Password = Facades\Config::get('MAIL_PASSWORD');
            $this->mail->SMTPSecure = Facades\Config::get('MAIL_ENCRYPTION');
            $this->mail->Port = Facades\Config::get('MAIL_PORT');
            $this->mail->setFrom(Facades\Config::get('MAIL_FROM_ADDRESS'),
                Facades\Config::get('MAIL_FROM_NAME'));


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
