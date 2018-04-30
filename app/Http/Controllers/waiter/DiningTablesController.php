<?php

namespace App\Http\Controllers\waiter;

use App\Dining_table;
use App\Order;
use App\Receipt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DiningTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->cant('isWaiter', User::class)){
            return redirect('/home');
        }
        $dining_tables = Dining_table::all();
        $receipts = Receipt::where('status','eating')->orderBy('table_id')->get();
        $countEmptyTable = Dining_table::where('status','=','empty')->count();
        return view('waiter.manageTable', ['dining_tables' => $dining_tables,
                                          'countEmptyTable'=> $countEmptyTable,
                                          'receipts' => $receipts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dining_table  $dining_table
     * @return \Illuminate\Http\Response
     */
    public function show(Dining_table $dining_table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dining_table  $dining_table
     * @return \Illuminate\Http\Response
     */
    public function edit(Dining_table $dining_table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dining_table  $dining_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dining_table $dining_table)
    {
      $dining_table = Dining_table::with(['receipts'])->where('id',$request->input('clearbtn'))->first();
      $dining_table->status = "empty";
      foreach ($dining_table->receipts as $receipt) {
        $orders = Order::where('receipt_id',$receipt->id)->get();
        foreach ($orders as $order) {
            $order->status = "served";
            $order->save();
        }
      }
      $dining_table->save();
      return redirect('/waiter/manageTable');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dining_table  $dining_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dining_table $dining_table)
    {
        //
    }

    // public function count(Dining_table $dining_table)
    // {
    //     $count = 0;
    //     foreach($dining_table->receipts as $receipt){
    //       foreach($receipt->orders as $order){
    //         $count = $count + 1;
    //       }
    //     }
    //     return $count;
    // }
}
