<?php

namespace App\Http\Controllers\chef;

use App\Order;
use App\Menu;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($orderby = 'created_at', $method = 'asc')
    {
        if(\Auth::user()->cant('isChef', User::class)){
            return redirect('/home');
        }
        $orders2 = DB::table('orders')
        ->join('receipts', 'orders.receipt_id', '=', 'receipts.id')
        ->join('menus', 'orders.menu_id', '=', 'menus.id')
        ->select('orders.*', 'receipts.table_id', 'menus.name')
        ->whereIn('orders.status',['wait', 'cooking'])
        ->orderBy($orderby, $method)
        ->get();        
        $orders = Order::hydrate( $orders2->toArray() );
        $categories = Category::all();
        // $orders = Order::whereIn('status',['wait', 'cooking'])->orderBy($orderby, $method)->get();

        $menus = Menu::all()->keyBy('id');
        return view('chef.order' , compact('orders', 'orders2','menus', 'orderby', 'method', 'categories'));
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
        $id = $request["id"];
        $order = Order::find($id);
        $order->status = "cooked";
        $order->save();
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
    public function update(Request $request, Order $order)
    {
        // $order->status = $request->status;
        if ($order->status == 'cooking') {
            $order->status = 'cooked';
        }
        else if ($order->status == 'wait') {
            $order->status = 'cooking';
        }
        $order->save();
        return $order;
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
