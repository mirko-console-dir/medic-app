<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('guest.home');
    }

    public function search()
    {
        return view('guest.search');
    }

    public function doctors_api()
    {
        return view('spa.doctors');
    }

    public function checkout()
    {
        return view('payment.checkout');
    }
}
