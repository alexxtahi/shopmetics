<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Shopmetics extends Mailable
{
    use Queueable, SerializesModels;

    private $client;
    private $checkout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $checkout)
    {
        $this->client = $client;
        $this->checkout = $checkout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // View to display in the mail
        $this->view('emails.checkout-details')->with([
            'client' => $this->client,
            'checkout' => $this->checkout,
        ]);
        // Build the message
        return $this;
    }
}
