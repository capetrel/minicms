<?php

namespace App\Http\Controllers;

use App\Http\Request\ContactFormRequest;
use App\Models\Page;

class ContactController extends Controller
{
    public function contact()
    {
        $text = Page::choosePageText('contact');
        $head_title= Page::currentPageTitle('contact');

        return view('contact', compact('text', 'head_title'));
    }

    public function contactPost(ContactFormRequest $request)
    {

        \Mail::send('emails.contact', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ], function($message)
            {
                $message->from('hello@example.com');
                $message->to('capetrel@mailtrap.io', 'Admin')->subject('message venant de laravel-cms.fr');
            });

        return \Redirect::route('contact')
            ->with('message', 'Votre message a bien été envoyé. Merci, nous y répondrons rapidement.');

    }
}
