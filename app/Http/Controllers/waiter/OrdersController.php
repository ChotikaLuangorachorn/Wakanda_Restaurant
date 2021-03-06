<?php

namespace App\Http\Controllers\waiter;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class OrdersController extends Controller
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
      $orders = Order::where('status','=','cooked')->orderBy('receipt_id')->get();
      $countOrder = Order::where('status','=','cooked')->count();
      return view('waiter.serve', ['orders' => $orders,
                                  'countOrder'=> $countOrder]);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $checkedOrders = $request->input("checkOrder");
      foreach ($checkedOrders as $checkedOrder) {
        if (!is_null($order = Order::where('id',$checkedOrder)->first() ) ){
          $order->status = "served";
          $order->save();
        }
      }
      return redirect('/waiter/serve');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
