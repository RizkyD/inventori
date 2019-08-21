<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Services\InventoryService;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Inventory;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Support\Facades\Response;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataInventories = Inventory::with('type')->with('room')->orderBy('id','DESC')->get();
        $rooms = Room::all();
        $types = Type::all();

        return view('InventoryManagement.index', compact('dataInventories','types','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array (
            'name' => 'required',
            'qty' => 'required',
            'desc' => 'required',
            'type_id' => 'required',
            'room_id' => 'required'
        );

        $validator = Validator::make( Input::all (), $rules );

        if ($validator->fails ()){
            return Response::json ( array (
                'errors' => $validator->getMessageBag ()->toArray ()
            ) );  
        } else {
            $data = app(InventoryService::class)->store($request->toArray());
            return response ()->json ($data);
        }
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Inventory::find($request->id);
        $data->name =  $request->name;
        $data->qty = $request->qty;
        $data->desc = $request->desc;
        $data->type_id = $request->type_id;
        $data->room_id = $request->room_id;
        $data->save();
        return response ()->json ( $data );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Inventory::find ( $request->id )->delete();
        return response ()->json ();
    }
}
