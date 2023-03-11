<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\MailRequest;
use App\Models\Mail;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    public function send(array $data, MailRequest $request)
    {
        $data['ip'] = $request->ip();
        $data['user_agent'] = $request->userAgent();
        $body = $data['body'];
        $subject = $data['subject'];
        $type = $data['type'];
        $this->composeAndSendMail($data);
        unset($data['type'], $data['body'], $data['subject']);
        $model = Mail::create($data);
        Storage::disk('public')->put($model->uuid.'_body.txt', $body);
        Storage::disk('public')->put($model->uuid.'_subject.txt', $subject);
        Storage::disk('public')->put($model->uuid.'_type.txt', $type);
        return $model->uuid;
    }

    protected function composeAndSendMail(array $data): void
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'mailhog';
            $mail->SMTPAuth = false;
            $mail->Port = 1025;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom($data['mail_from'], 'PHPMailer');
            $mail->addAddress($data['mail_to'], 'PHPMailer');

            if (isset($data['mail_copy'])) {
                $mail->addCC($data['mail_copy'], 'PHPMailer');
            }
            if (isset($data['type']) && $data['type'] === 'html') {
                $mail->isHTML();
            }

            if (isset($data['type']) && $data['type'] === 'text') {
                $mail->AltBody = $data['body'];
            }
            $mail->Subject = $data['subject'];
            $mail->Body = $data['body'];
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}


