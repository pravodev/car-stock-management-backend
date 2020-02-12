<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Sales;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invoice;

class SendInvoiceToCustomer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sales = null;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Sales $sales)
    {
        $this->sales = $sales;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sales = $this->sales;
        $car = $sales->car;
        $message = "
        Hai $sales->name !, berikut ini rincian invoice Anda. \n
        INVOICE \n
        =============================
        Mobil: $car->name \n
        Harga: $car->phone \n
        Silahkan Bayar ke rekening berikut : \n
        111 2222 3333 4444
        ";
        
        $apiWhatsapp = \App::make('chat-api');
        $apiWhatsapp->sendPhoneMessage($sales->phone, $message);

        Mail::to($sales->email)->send(new Invoice($sales));
    }
}
