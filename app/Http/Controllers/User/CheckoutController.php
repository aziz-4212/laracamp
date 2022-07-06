<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Camps;
use Illuminate\Http\Request;
use Auth;
class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function create(Camps $camps, Request $request)
    {
        return view('checkout.create', compact('camps'));
    }

    public function store(Request $request, Camps $camps)
    {
        // mapping request data
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camps->id;

        // update user data
        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        // create checkout
        $checkout = Checkout::create($data);

        return redirect(route('checkout.success'));
    }

    public function show(Checkout $checkout)
    {
        //
    }

    public function edit(Checkout $checkout)
    {
        //
    }

    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success(){
        return view('checkout.success');
    }
}
