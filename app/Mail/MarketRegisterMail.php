<?php

namespace App\Mail;

use App\Models\Farmer;
use App\Models\Market;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarketRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $market;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Market $market)
    {
        $this->market=$market;
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
            ->view('mail.registermarketmail');
    }
}
