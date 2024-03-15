<?php

namespace App\Http\Helpers;
use App\Mail\SampleMail;
use App\Models\User;
use Mail;

class MailsHelper
{
    public function newJob($to, $job) {

        $content = [
            'user' => $to,
            'body' => $job->id,
            'service_under' => $job->user->name .' '. $job->user->last_name,
            'job_date' => $job->deadline,
            'address' => $job->address,
            'phone' => $job->phone,
            'total' => $job->total,
            'serviceType' => $job->serviceType->name,
            'url' => \App::make('url')->to('/login')
        ];

        Mail::to($to)->send(new SampleMail($content, 'mails.mail'));
    }

    public function newCustomer(User $user) {

        $content = [
            'user' => $user->name ." ". $user->last_name,
            'first_name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'url' => \App::make('url')->to('/login')
        ];

        Mail::to($user->email)->send(new SampleMail($content, 'mails.newCustomer'));
    }
}