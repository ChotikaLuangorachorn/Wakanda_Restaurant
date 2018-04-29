<?php

namespace App\Http\Controllers\home;

use App\Dining_table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiningTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dining_tables = Dining_table::all();
        return view('home.home',['dining_tables'=>$dining_tables]);
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
        //
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
}
