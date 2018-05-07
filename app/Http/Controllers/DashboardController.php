<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\User;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $inventorySum = Inventory::sum('sold');
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $inventory_items = Inventory::all();
        return view('dashboard')->with(['inventorySum' => $inventorySum, 'inventory' => $user->inventory, 'inventory_items' => $inventory_items ]);
    }

}
