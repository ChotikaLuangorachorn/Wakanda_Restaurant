<?php

namespace App\Http\Controllers\customer;

use App\Menu;
use App\Category;
use App\Dining_table;
use App\Receipt;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class MenusController extends Controller
{
    // public $table_id;
    /**
     * Display a listing of the resource.
     * @param  \App\Diner_table  $dining_table
     * @return \Illuminate\Http\Response
     */
    public function index(Dining_table $dining_table)
    {
        // $this->table_id = $dining_table->id;
        $menus = Menu::all()->keyBy('id');
        $categories = Category::all();
        // $categories = Category::all();
        // return $user;
        return view('customer.menu',['menus' => $menus, 'categories' => $categories, 'dining_table' => $dining_table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Dining_table $dining_table)
    {
        $table_id = $dining_table->id;
        $orders = json_decode($request['order'],true);
        $menus = Menu::all()->keyBy('id');
        // create new receipt
        $receipt= new Receipt;
        $receipt->table_id = $table_id;
        $receipt->save();
        $receipt_id = $receipt->id;
        // create new order
        foreach ($orders as $key => $value) {
            $order = new Order;
            $order->menu_id = $key;
            $order->amount = $value;
            $order->receipt_id = $receipt_id;
            $order->save();
        }
            // return redirect('/users/'.$user->id);
        return  redirect('/customer/'.$dining_table->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
