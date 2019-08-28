<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Services\TypeService;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Type;
use Illuminate\Support\Facades\Response;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::get();

        return view('TypesManagement.index', compact('types'));
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
            $data = app(TypeService::class)->store($request->toArray());
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
        $data = Type::findOrFail($request->id);
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
        Type::find($request->id)->delete();
        return response()->json();
    }
}
