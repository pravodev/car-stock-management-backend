<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Http\Requests\SaleRequest;
use App\Jobs\SendInvoiceToCustomer;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::with('car')->paginate();
        return response()->json($sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $sales = Sales::create($request->all());
        return response()->json($sales);
    }

    public function sendInvoice(Sales $sales)
    {
        SendInvoiceToCustomer::dispatch($sales);

        return response()->json([
            'success' => true
        ]);
    }

    public function summary()
    {
        $data = [];
        $today = Sales::getSummary(now());
        // $group = $today->duplicates('car_id');
        dd($today);
        $data['today'] = [
            'most_sold' => 0
        ];
        return response()->json($data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sale)
    {
        return response()->json($sale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales->delete();
        return response()->json([], 204);
    }
}
