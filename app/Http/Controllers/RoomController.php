<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Services\RoomService;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Room;
use Illuminate\Support\Facades\Response;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::get();

        return view('RoomsManagement.index', compact('rooms'));
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
            'desc' => 'required'
        );

        $validator = Validator::make( Input::all (), $rules );

        if ($validator->fails ()){
            return Response::json ( array (
                'errors' => $validator->getMessageBag ()->toArray ()
            ) );  
        } else {
            return response()->json(app(RoomService::class)->store($request->toArray()));
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
        $data = Room::findOrFail($request->id);
        $data->name =  $request->name;
        $data->desc = $request->desc;
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
        Room::find($request->id)->delete();
        return response()->json();
    }
}
