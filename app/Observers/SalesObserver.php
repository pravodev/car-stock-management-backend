<?php

namespace App\Observers;

use App\Models\Sales;
use App\Jobs\SendInvoiceToCustomer;


class SalesObserver
{
    /**
     * Handle the Sales "created" event.
     *
     * @param  \App\Models\Sales  $sales
     * @return void
     */
    public function created(Sales $sales)
    {
        $car = $sales->car;
        $car->stock -= 1;
        $car->save();

        
        SendInvoiceToCustomer::dispatch($sales);
    }

    /**
     * Handle the Sales "updated" event.
     *
     * @param  \App\Models\Sales  $sales
     * @return void
     */
    public function updated(Sales $sales)
    {
        //
    }

    /**
     * Handle the Sales "deleted" event.
     *
     * @param  \App\Models\Sales  $sales
     * @return void
     */
    public function deleted(Sales $sales)
    {
        //
    }

    /**
     * Handle the Sales "restored" event.
     *
     * @param  \App\Models\Sales  $sales
     * @return void
     */
    public function restored(Sales $sales)
    {
        //
    }

    /**
     * Handle the Sales "force deleted" event.
     *
     * @param  \App\Models\Sales  $sales
     * @return void
     */
    public function forceDeleted(Sales $sales)
    {
        //
    }
}
