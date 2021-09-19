<?php

namespace App\Mail;

use App\Models\Farmer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FarmerRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $farmer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Farmer $farmer)
    {
        $this->farmer=$farmer;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(config('app.name').' - Kullanıcı Kaydı')
            ->view('mail.registeruser');
    }
}
