<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\Email;
use App\Services\UploadManager;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.home');
    }

    public function sendEmail(EmailRequest $request)
    {
        $uploadManager = new UploadManager();

        $data = $request->validated();
        $data['attachment'] = $uploadManager->generatePath($request);

        Email::create($data);

        $uploadManager->storeFile($request);

        return redirect('/')
            ->with('email-success', 'Message sent with success');
    }
}

