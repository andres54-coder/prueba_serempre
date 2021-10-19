<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $text=trim($request['search']);
        $cities=city::where('name','LIKE','%'.$text.'%')
            ->orWhere('cod','LIKE','%'.$text.'%')
            ->paginate(10);
        return view('city.index',compact('cities','text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);
       $request['cod']=uniqid();
        $client = city::create($request->all());
        return back()->with('success', 'Ciudad creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city=city::findOrFail($id);
        return view('city.show',compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=city::findOrFail($id);
        return view('city.edit',compact('city'));
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
        $request->validate([
            'name'=>'required|max:255',
        ]);
        $city=city::findOrFail($id);
        $city->fill($request->all())->save();
        return back()->with('success', 'Ciudad actualizada con exito');
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
}
