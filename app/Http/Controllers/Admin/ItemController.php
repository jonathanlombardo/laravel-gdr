<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
// use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::paginate();
        return view("admin.items",compact("items"));
        
    }

}
