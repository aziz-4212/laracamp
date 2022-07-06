<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Checkout;

class HomeController extends Controller
{
    public function dashboard()
    {
        $checkouts = Checkout::with('Camp')->where('user_id', Auth::id())->get();
        // dd($checkouts);
        return view('user.dashboard', compact('checkouts'));
    }
}
