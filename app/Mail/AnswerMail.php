<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact,$text)
    {
        $this->contact=$contact;
        $this->text=$text;
        $this->name=$contact->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this->subject('Re:'.$this->contact->objet.'')
            ->view('mail.index');
    }
}
