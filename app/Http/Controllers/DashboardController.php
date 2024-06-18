<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $bajus = Baju::orderBy('id', 'asc')->get();
        return view('homepage',compact('bajus'));
    }
}
