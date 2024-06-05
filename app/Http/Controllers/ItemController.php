<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;

class ItemController extends Controller
{
    public function manageItems()
    {
        $bajus = Baju::all(); // Fetch all baju from the database
        return view('admin.manageItems', compact('bajus')); // Pass the bajus to the view
    }
}