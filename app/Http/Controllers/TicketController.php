<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Region;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::where('status',1)->orderBy('created_at','DESC')->get();

        return view('ticket.show',compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions=Region::all();
        return view('ticket.create',compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'price'=>['required','string','max:255'],
            'from_id'=>['required'],
            'to_id'=>['required'],
            'date'=>['required'],
            'time_go'=>['required'],
            'time_arrive'=>['required']


        ]);
        $ticket=Ticket::create($request->all());
        return redirect(route('ticket.index'));
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
    public function shown()
    {
        $tickets=Ticket::where('status',0)->orderBy('created_at','DESC')->get();

        return view('ticket.sho',compact('tickets'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket=Ticket::find($id);
        $regions=Region::all();
        return view('ticket.edit',compact('ticket','regions'));
    }

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
            'price'=>['required','string','max:255'],
            'from_id'=>['required'],
            'to_id'=>['required'],
            'date'=>['required'],
            'time_go'=>['required'],
            'time_arrive'=>['required']


        ]);
        $request->status ? : $request['status']=0;
        Ticket::where('id', $id)->update($request->except('_token', '_method'));
        return redirect(route('ticket.index'))->with('message', 'CHipta yangilandi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::where('id', $id)->delete();
        return redirect()->back()->with('message', 'ticket is deleted successfully');
    }
}
