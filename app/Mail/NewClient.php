<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewClient extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $message;
    public $address;
    public $site;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = 'Sayidazim Mahmudov';
        $this->phone = '+998977341197';
        $this->message = null;
        $this->address = 'Tashkent, Uzbekistan';
        $this->site = 'bctraining.uz';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Новый клиент от bctraining.uz')
                    ->markdown('emails.newclient');
    }
}
