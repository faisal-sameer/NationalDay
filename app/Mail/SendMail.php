<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
$address = 'nd90thuquchallenge@nd90thuquchallenge.com';

$name = 'Saquib Rizwan';

$subject = 'Laravel Email';

return $this->view('emails.sendemail')

->from($address, $name) 

->subject($subject);
        //return $this->subject('Subject: A&&F eamil auto-replay  ')->view('emails.sendemail');
    }
}
