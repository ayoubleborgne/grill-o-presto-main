<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Status;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allStatuses = Status::orderBy('id', 'asc')->get();

        $allOrders = Order::orderBy('created_at', 'desc')->get();
        //
        return view('admin.orders.index', [
            'allOrders' => $allOrders,
            'allStatuses' => $allStatuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request,  Order $order)
    {
        return view("admin.orders.details", ['order' => $order]);
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
      
        $validatedOrder = $request->validate([
            'statusSelect' => ['required', 'int'],
        ]);
        $order->status_id = $validatedOrder['statusSelect'];
    
        $order->save();
    
        
    
        return redirect()->route('admin.orders.index')->with('success', "La commande {$order->id} a été modifiée!");
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        Order::destroy($id);

        return redirect()->route('admin.orders.index')->with('OrderDel', "La commande numéro $id a été supprimée!");
    }
}
