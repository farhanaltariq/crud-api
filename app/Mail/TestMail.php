<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminat\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details){
        $this->details = $details;
    }

    public function build(){
        $this->subject('Test Kirim Email');
        return $this->view('emails.testmail', $this->details);
                    // ->view('email.test_mail');
    }
}