<?php

namespace App\Http\Controllers;

use App\Order;
use App\Ticket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::where('status','active')->get();
        $a=1;
        return view('order.show',compact('orders','a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Order::where('status','<>','active')->get();
        $a=0;
        return view('order.show',compact('orders','a'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    public function edit($id){
        $order=Order::find($id);
        $ticket=Ticket::find($order->ticket_id);
        return view('order.edit',compact('order','ticket'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([
           'status'=>'required'
        ]);

        Order::where('id', $id)->update($request->except('_token', '_method'));
        return redirect(route('order.index'))->with('message', 'Buyurtma korip chiqildi' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Order is deleted successfully');
    }
}
