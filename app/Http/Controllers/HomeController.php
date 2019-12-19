<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class HomeController extends Controller
{
    public function view_welcome() 
    {
        return view('welcome');
    }
    // public function view_purchases() 
    // {

    //     return view('user.purchases');
    // }
    public function view_dashboard()
    {
        $data = Item::get();
        return view('admin.dashboard')->withData($data);
    }
    public function view_home()
    {
        $data = Item::get();
        return view('user.home')->withData($data);
    }
    public function view_history() 
    {
        return view('user.history');
    }
}
