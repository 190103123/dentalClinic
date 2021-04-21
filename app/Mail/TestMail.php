<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->data['name'];
        $surname = $this->data['surname'];
        $email = $this->data['email'];

        return $this->subject('Subject email')
            ->view('email_template', compact('name'))
            ->view('email_template', compact('surname'))
            ->view('email_template', compact('email'))
            ->attach($this->data['image']->getRealPath(), [
                'as' => $this->data['image']->getClientOriginalName()
            ]);
    }
}
