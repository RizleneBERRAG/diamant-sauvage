<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'preference' => ['nullable', 'string', 'max:80'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website' => ['nullable', 'string', 'max:0'],
        ], [
            'name.required' => 'Veuillez indiquer votre nom.',
            'email.required' => 'Veuillez indiquer votre adresse email.',
            'email.email' => 'Veuillez indiquer une adresse email valide.',
            'message.required' => 'Veuillez écrire votre message.',
            'message.min' => 'Votre message est trop court.',
        ]);

        Mail::send('emails.contact', ['data' => $data], function ($mail) use ($data) {
            $mail->to(config('mail.contact_to'))
                ->replyTo($data['email'], $data['name'])
                ->subject('Nouvelle demande depuis le site Diamant Sauvage');
        });

        return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
