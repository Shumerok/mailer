<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Mail;
use App\Services\MailService;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    private MailService $service;

    public function __construct(MailService $service)
    {
        $this->service = $service;
    }

    public function send(MailRequest $request)
    {
        $data = $request->validated();
        $uuid = $this->service->send($data, $request);

        return redirect()->route('success', $uuid);
    }

    public function success(string $uuid)
    {
        $mail = Mail::where('uuid', '=', $uuid)->firstOrFail();
        $body = Storage::disk('public')->get($mail->uuid.'_body.txt');
        $subject = Storage::disk('public')->get($mail->uuid.'_subject.txt');
        $type = Storage::disk('public')->get($mail->uuid.'_type.txt');
        return view('success', compact('mail', 'body', 'type','subject'));
    }
}
