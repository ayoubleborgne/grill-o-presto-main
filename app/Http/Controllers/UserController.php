<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        return view('user/profile');
    }

    public function edit()
    {
        return view('user/update');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $userInfo = Auth::user()->client_information;

        $validatedUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);


        $validatedInfo = $request->validate([
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'city' => ['required', 'string', 'min:3', 'max:75'],
            'zip_code' => ['required', 'string', 'regex:/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i'],
            'phone_number' => ['required', 'string', 'regex:/^\d?[\s.-]?(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/']
        ]);


        $user->update($validatedUser);

        $userInfo->update($validatedInfo);

        return redirect()->route('profile')->with('success', 'Les informations ont été modifiées!');
    }

    public function orderHistory()
    {
        $orders = Auth::user()->orders;

        return view("user/history", ['orders' => $orders]);
    }
}
