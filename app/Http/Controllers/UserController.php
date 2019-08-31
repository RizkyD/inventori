<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Services\UserService;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Illuminate\Support\Facades\Response;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('usersManagement.index', compact('users'));
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
            'username' => 'required'
        );

        $validator = Validator::make( Input::all (), $rules );

        if ($validator->fails ()){
            return Response::json ( array (
                'errors' => $validator->getMessageBag ()->toArray ()
            ) );  
        } else {
            $data = app(UserService::class)->store($request->toArray());
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
        $data = User::findOrFail($request->id);
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
        User::find($request->id)->delete();
        return response()->json();
    }
}
