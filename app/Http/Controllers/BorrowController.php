<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new Inventory;
        $data = $data->orderBy('created_at', 'desc')->paginate(10);
        return view('borrows.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function borrow(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        if (Auth::user()->role == 'borrower') {
            Borrow::create([
                'user_id'       => Auth::user()->id,
                'inventory_id'  => $id,
                'status'        => 'request',
                'qty'           => $request->get('qty'),
                'desc'          => $request->get('desc')
        ]);
        } else {
            Borrow::create([
                'user_id'       => Auth::user()->id,
                'inventory_id'  => $id,
                'status'        => 'borrowed',
                'qty'           => $request->get('qty'),
                'desc'          => $request->get('desc')
            ]);
        }
        

        return redirect('/borrows');
    }

}
