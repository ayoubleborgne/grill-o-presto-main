<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menuItems = Menu::with('meal')->get();
        return view('home.index', ['menuItems' => $menuItems]);
    }

    public function store(Request $request)
    {
        $order = $request->menuItems;
        $request->session()->put('selectedMealsIds', $order);
        if (count($order) >= 6 || count($order) <= 2) {
            return redirect()->route('home.store')->with('Fail', "Vous devez choisir au minimum 3 items et maximum 5 items.");
        }

        return redirect()->route('orders.create')->with('Success', "Voici votre commande actuelle.");
    }
}
