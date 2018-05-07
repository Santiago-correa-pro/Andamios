<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = Inventory::orderBy('units', 'asc')->paginate(5);
        return view('inventory.index')->with('inventory',$inventory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            ['name' => 'required', 'price' => 'required', 'units' => 'required']
        );

        $inventory = new Inventory;

        $inventory->name = $request->input('name');
        $inventory->price = $request->input('price');
        if($request->input('sold') >= 1) {
            $inventory->units = $request->input('units') - $request->input('sold');
            $inventory->sold = $request->input('sold') * $request->input('price');
        } else {
            $inventory->units = $request->input('units');
            $inventory->sold = $request->input('sold');
        }
        $inventory->user_id = auth()->user()->id;
        $inventory->save();

        return redirect('/inventario')->with('success', 'El Articulo fue Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.show')->with('inventory', $inventory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      
        $inventory = Inventory::find($id);

        // Check for correct user 

        if(auth()->user()->id !== $inventory->user_id) {
            return redirect('/inventario')->with('error', 'Unauthorized Page');
        }
        
        return view('inventory.edit')->with('inventory', $inventory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request,['name' => 'required', 'price' => 'required', 'units' => 'required']);

       $inventory = Inventory::find($id);
       $inventory->name = $request->input('name');
       $inventory->price = $request->input('price');
       if($request->input('sold') >= 1) {
            $inventory->units = $request->input('units') - $request->input('sold');
            $inventory->sold = $request->input('sold') * $request->input('price');
        } else {
            $inventory->units = $request->input('units');
            $inventory->sold = $request->input('sold');
        }
       $inventory->save();

       return redirect('/inventario')->with('success', 'El Articulo Fue Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->id !== $inventory->user_id) {
            return redirect('/inventario')->with('error', 'Unauthorized Page');
        }

        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect('/inventario')->with('success', 'El Articulo fue eliminado');
    }

    public function destroyAll()
    {
        $inventory = Inventory::truncate();
        return redirect('/inventario')->with('success', 'Los Articulos fueron eliminados');
    }
}
