<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Throwable;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.home');
    }

    public function sendEmail(Request $request)
    {
        $data = $request->all();

        try {
            Email::create($data);

            return redirect('/')
                ->with('email-success', 'Message sent with success');

        } catch (Throwable $exception) {
            return redirect('/')
                ->with('email-fail', sprintf('Something is wrong. Error: %s', $exception->getMessage()));
        }
    }
}

