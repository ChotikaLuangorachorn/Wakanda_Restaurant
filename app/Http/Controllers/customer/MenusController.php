<?php

namespace App\Http\Controllers\customer;

use App\Menu;
use App\Category;
use App\Dining_table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Diner_table  $dining_table
     * @return \Illuminate\Http\Response
     */
    public function index(Dining_table $dining_table)
    {
        $menus = Menu::all();
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
