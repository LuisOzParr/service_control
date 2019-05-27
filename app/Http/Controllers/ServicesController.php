<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Auth::user()->services;
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create_update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO DUDA STATUS
        $service = new Service($request->all());
        $service->user_id = Auth::user()->id;
        $service->status=1;
        $service->save();

        return redirect()->route('service.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $user = Auth::user();

        if ($user->can('modify', $service)) {
            return view('services.create_update', compact('service'));
        } else {
            return abort(401, 'Unauthorized action.');
        }
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
        $user = Auth::user();
        $service = Service::find($id);

        if ($user->can('modify', $service)) {

            $service->fill($request->all());
            $service->save();
            return redirect()->route('service.index');

        } else {
            return abort(401, 'Unauthorized action.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $service = Service::find($id);

        if ($user->can('modify', $service)) {
            $service->delete();
            return redirect()->route('service.index');

        } else {
            return abort(401, 'Unauthorized action.');
        }
    }
}
