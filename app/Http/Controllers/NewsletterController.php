<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    //
    public function __invoke(Newsletter $newsletter){
        request()->validate([
            'email' => ['required', 'email']
        ]);


        try {

            $newsletter->suscribe(request('email'));

        } catch (\Exception $ex) {
            info($ex->getMessage());
            throw ValidationException::withMessages(
                [
                    'email' => $ex->getMessage()

                ]
            );
        }


        return redirect('/')->with('success', 'You are now suscribed');
    }
}
