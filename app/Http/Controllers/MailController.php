<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Mail;
use App\Services\MailService;

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
        return view('success', compact('mail'));
    }
}
