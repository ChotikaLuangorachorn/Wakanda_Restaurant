<?php

namespace App\Http\Controllers\owner;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('owner.menu.index', ['menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        $status = [
            "sell" => "กำลังขาย",
            "not sell" => "ไม่เปิดขาย"
        ];
        return view('owner.menu.create', ['status'=>$status,
                                    'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'name' => 'required|unique:menus,name',
                'price' => 'required|numeric',
                'status' => 'required',
                'category' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000000'
                
            ]);
    
            $menu = new Menu;
            $menu->name = $request->input('name');
            $menu->price = $request->input('price');
            $menu->status = $request->input('status');
            $menu->category_id = $request->input('category');
            $mime = $request->image->getClientOriginalExtension();
            $menu->save();
            $file_name = ($menu->id).'.'.$mime;
            $path = $request->image->storeAs('menu', $file_name, 'public_images');
            $menu->image_path = $file_name;
            $menu->save();
            return redirect('/menus/' . $menu->id);
        }catch (Exception $e) {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('owner.menu.show', ['menu'=>$menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        
        $categories = \App\Category::all();
        $status = [
            "sell" => "กำลังขาย",
            "not sell" => "ไม่เปิดขาย"
        ];
        return view('owner.menu.edit', ['menu'=>$menu,
                                    'status'=>$status,
                                    'categories'=>$categories]);
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
        try{
            $validatedData = $request->validate([
                'name' => 'required|unique:menus,name,'.$menu->id,
                'price' => 'required|numeric',
                'status' => 'required',
                'category' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000000'
                
            ]);
    
            $menu->name = $request->input('name');
            $menu->price = $request->input('price');
            $menu->status = $request->input('status');
            $menu->category_id = $request->input('category');
            $menu->save();
            if ($request->hasFile('image')){
                \Storage::disk('public_images')->delete('menu/'.$menu->image_path);
                $mime = $request->image->getClientOriginalExtension();
                $file_name = ($menu->id).'.'.$mime;
                $path = $request->image->storeAs('menu', $file_name, 'public_images');
                $menu->image_path = $file_name;
                $menu->save();
            }
            return redirect('/menus/' . $menu->id);
        }catch (Exception $e) {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        \Storage::disk('public_images')->delete('menu/'.$menu->image_path);
        $menu->delete();
        return redirect('/menus');
    }
}
