<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MyEmail;
class SendEmailController extends Controller
{
    public function sendEmail(){
        $toMail = 'nghiaduc3901@gmail.com';
        $title = 'Contact';
        Mail::to($toMail)->send(new MyEmail($title));
    }
}
