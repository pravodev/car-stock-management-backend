<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Sales;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;
    public $sales = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sales $sales)
    {
        $this->sales = $sales;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@car-stock.id')
                    ->view('email.invoice');
    }
}
