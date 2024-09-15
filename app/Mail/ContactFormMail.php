<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $TextMessage;
    public $phone;
    public $country;


    public function __construct($name, $email,$TMessage, $phone, $country)
    {
        $this->name = $name;
        $this->email = $email;
        $this->TextMessage = $TMessage;
        $this->phone = $phone;
        $this->country = $country;

        Log::info($this->TextMessage);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                //"Message" reseved word. thats why i used 'TextMsg'. And i escaped error.
                'TextMsg' => $this->TextMessage,
                'phone' => $this->phone,
                'country' => $this->country,
            ]);
    }
}
