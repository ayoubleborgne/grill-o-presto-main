<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Meal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItemsCount = Menu::menuItemsCount();
        $menuIsFull = Menu::menuItemsFull();
        $databaseMeals = Meal::orderBy('name', 'asc')->get();
        $menuItems = Menu::with('meal')->get();
        return view('admin.menus.index', ['menuItems' => $menuItems, 'databaseMeals' => $databaseMeals, 'menuItemsCount' => $menuItemsCount, 'menuIsFull' => $menuIsFull]);
    }

    /** F
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Menu::menuItemsFull()) {
            return redirect()->route('admin.menus.index')->with('MenuChange', 'Vous avez déjà 10 repas au menu.');
        } else {
            $menu = new Menu;

            $validated = $request->validate([
                'meal_id' => 'required|unique:menus',

            ]);
            $menu->meal_id = $validated['meal_id'];


            $menu->save();

            return redirect()->route('admin.menus.index')->with('MenuChange', 'Le repas a été ajouté!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Menu::destroy($id);

        return redirect()->route('admin.menus.index')->with('MenuChange', 'Le repas a été retiré du menu!');
    }
    public function destroyAll(Request $request)
    {
        DB::table('menus')->truncate();

        return redirect()->route('admin.menus.index')->with('MenuChange', 'Le menu a été vidé!');
    }
}
