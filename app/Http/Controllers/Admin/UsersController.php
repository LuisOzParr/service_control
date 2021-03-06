<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('rol', function ($query) {
            $query->where('rol','user');
        })->orderBy('id', 'asc')->get();

        return view('admin.users.index', compact('users'));
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
        $user = User::find($id);

        if (Auth::user()->can('changeState', $user)) {

            if($user->status){
                $user->status = false;
            }else{
                $user->status = true;
            }
            $user->save();

            return redirect()->route('admin.users.index');

        } else {
            return abort(401, 'Unauthorized action.');
        }


    }

}
