<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selectedMealsIds = $request->session()->get('selectedMealsIds');
        $orderItems = Meal::whereIn('id', $selectedMealsIds)->get();

        if (Auth::check() && auth()->user()) {
            $user = Auth::user();
            $userInfo = Auth::user()->client_information;

            return view('orders.create', [
                'orderItems' => $orderItems,
                'userInfo' => $userInfo,
                'user' => $user,
            ]);
        }

        return view('orders.create', [
            'orderItems' => $orderItems,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderInfos = new Order;
        $mytime = Carbon::now();

        if (Auth::check() && auth()->user()) {
            $validated = $request->validate([
                'portions' => ['required', 'in::1,2,4,5'],
                'restrictionText' => ['nullable', 'string', 'max:255'],
            ]);
            $user = Auth::user();
            $userInfo = Auth::user()->client_information;
            $orderInfos->user_id = $user->id;
            $orderInfos->name = $user->name;
            $orderInfos->email = $user->email;
            $orderInfos->address = $userInfo->address;
            $orderInfos->city = $userInfo->city;
            $orderInfos->zip_code = $userInfo->zip_code;
            $orderInfos->phone_number = $userInfo->phone_number;
            $orderInfos->portions = $validated['portions'];
            $orderInfos->restriction = strip_tags($validated['restrictionText']);
            $orderInfos->status_id = '1';
            $orderInfos->created_at = $mytime->toDateTimeString();
        } else {

            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'address' => ['required', 'string', 'min:5', 'max:255'],
                'city' => ['required', 'string', 'min:3', 'max:75'],
                'zip_code' => ['required', 'string', 'regex:/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i'],
                'phone_number' => ['required', 'string', 'regex:/^\d?[\s.-]?(\+0?1\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
                'portions' => ['required', 'in::1,2,4,5'],
                'restrictionText' => ['nullable', 'string', 'max:255'],
            ]);

            $orderInfos->name = $validated['name'];
            $orderInfos->email = $validated['email'];
            $orderInfos->address = $validated['address'];
            $orderInfos->city = $validated['city'];
            $orderInfos->zip_code = $validated['zip_code'];
            $orderInfos->phone_number = $validated['phone_number'];
            $orderInfos->portions = $validated['portions'];
            $orderInfos->restriction = strip_tags($validated['restrictionText']);
            $orderInfos->status_id = '1';
        }

        // Ce tableau contient les prix par portions des repas
        $priceTbl = [
            '1' => '1',
            '2' => '0.855',
            '4' => '0.750',
            '5' => '0.650'
        ];

        $selectedMealsIds = $request->session()->get('selectedMealsIds');

        if (session('selectedMealsIds') > 0) {
            $mealsOrder = Meal::whereIn('id', $selectedMealsIds)->get();
        } else {
            return redirect()->route('home.index');
        }

        //Cette variable détermine le prix par portion selon la nombre de portion choisi à la commande
        $percentDiscount = $priceTbl[$orderInfos->portions];

        //Boucle qui détermine le total selon le nombre de portions choisi à la commande
        foreach ($mealsOrder as $mealOrder) {
            $orderInfos->total += ($mealOrder->price) * $percentDiscount;
        }

        $orderInfos->save();
        $orderInfos->meals()->sync($selectedMealsIds);


        if (Auth::check() && auth()->user()) {

            if (session('selectedMealsIds') > 0) {
                $request->session()->forget('selectedMealsIds');
                return redirect()->route('orders.confirm')->with([
                    'Success' => "Votre commande maintenant est envoyée!",
                    'orderNumber' => $orderInfos->id,
                    'userInfo' => $userInfo,
                    'user' => $user,
                ]);
            } else {
                return redirect()->route('home.index');
            }
        } else {
            if (session('selectedMealsIds') > 0) {
                $request->session()->forget('selectedMealsIds');
                return redirect()->route('orders.confirm')->with([
                    'Success' => "Votre commande maintenant est envoyée!",
                    'orderNumber' => $orderInfos->id,
                ]);
            }
        }
    }

    public function confirm()
    {
        $orderId = session('orderNumber');
        $order = Order::findOrFail($orderId);

        if (Auth::check() && auth()->user()) {
            $user = Auth::user();
            $userInfo = Auth::user()->client_information;

            return view('orders.confirm', [
                'order' => $order,
                'userInfo' => $userInfo,
                'user' => $user,
            ]);
        }

        return view('orders.confirm', [
            'order' => $order,
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
