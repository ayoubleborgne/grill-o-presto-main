<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();

        return view('admin.meals.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allTags = Tag::all();
        return view('admin.meals.create', ['allTags' => $allTags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = new Meal;



        $validated = $request->validate([
            'name' => 'required|max:70',
            'description' => 'required|max:255',
            'price' => 'required|numeric|max:25',
        ]);
        
        $meal->image = $request->file('image')->store('imageMeal');
        $meal->name = $validated['name'];
        $meal->description = $validated['description'];
        $meal->price = $validated['price'];

        $meal->save();


        $meal->tags()->sync($request['tags']);

        return redirect()->route('admin.meals.index')->with('success', 'Le repas a été créé!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allTags = Tag::all();
        $meal = Meal::findOrFail($id);
        $image = Storage::url($meal->image);
        $mealTags = $meal->tags;

        return view('admin.meals.edit', ['meal' => $meal, 'mealTags' => $mealTags, 'allTags' => $allTags, 'image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $meal = Meal::findOrFail($id);
        $menu = Menu::firstWhere('meal_id', "$id");
        if ($menu) {
            $menu->delete();
        }

        $currentMeal = $meal->replicate();

        $meal->delete();

        $validated = $request->validate([

            'name' => 'required|max:70',
            'description' => 'required|max:255',
            'price' => 'required|numeric|max:25',
        ]);


        if ($request->file('image') != null) {
            $currentMeal->image = $request->file('image')->store('imageMeal');
        }
        $currentMeal->name = $validated['name'];
        $currentMeal->description = $validated['description'];
        $currentMeal->price = $validated['price'];

        $currentMeal->save();

        $currentMeal->tags()->sync($request['tags']);
        return redirect()->route('admin.meals.index')->with('success', 'Le repas a été modifié!');
    }

    /**
     * Remove the specified resource from storage and db.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);
        $menu = Menu::firstWhere('meal_id', "$id");
        if ($menu) {
            $menu->delete();
        }
        $meal->delete();

        return redirect()->route('admin.meals.index')->with('success', 'Le repas a été supprimé!');
    }

    public function addToMenu(Request $request, $id)
    {

        $meal = Meal::findOrFail($id);
        $meal->on_menu = '1';

        $meal->save();

        return redirect()->route('admin.meals.menu')->with('success', 'Le repas a été ajouté au menu!');
    }
}
