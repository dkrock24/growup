<?php

namespace App\Http\Helpers;
use App\Mail\SampleMail;
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

        Mail::to($to)->send(new SampleMail($content));
    }
}