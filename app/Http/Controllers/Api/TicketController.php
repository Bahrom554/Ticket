<?php

namespace App\Http\Controllers\Api;

use App\Order;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;

class TicketController extends Controller
{
    public function allregion()
    {
        $regions=Region::all();
        return response()->json(['regions'=>$regions])->setStatusCode(200);
    }

    public function allticket()
    {
        $tickets = Ticket::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return response()->json(['orders' => $tickets])->setStatusCode(200);
    }

    public function Order(Request $request)
    {
       $this->validate($request,[
          'ticket_id'=>['required'],
           'name'=>['required','string'],
           'phone'=>['required']
       ]);
       $ticket=Ticket::findOrFail($request->ticket_id);
       $order=new Order;
       $order->ticket_id=$ticket->id;
       $order->name=$request->name;
       $order->phone=$request->phone;
       $order->status='active';
       $order->save();
        return response()->json(['message'=>'Order is successfully taken'])->setStatusCode(201);
    }
    public function ticket(Request $request){
        $this->validate($request,[
            'date'=>'required',
            'from_id'=>'required',
            'to_id'=>'required'
            ]);
        $ticket=Ticket::where('date',$request->date)->where('from_id',$request->from_id)->where('to_id',$request->to_id)->get();
        return response()->json($ticket);

    }
}

