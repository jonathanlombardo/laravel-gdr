<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class _ItemController extends Controller
{
    public function index(){
        $items = Item::paginate();
        return view("items",compact("items"));
        
    }

}
