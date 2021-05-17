<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\Email;
use Throwable;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.home');
    }

    public function sendEmail(EmailRequest $request)
    {
        $data = $request->validated();

        Email::create($data);

        return redirect('/')
            ->with('email-success', 'Message sent with success');

    }
}

