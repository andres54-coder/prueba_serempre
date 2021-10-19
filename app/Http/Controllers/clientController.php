<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $text=trim($request['search']);
        $clients=client::where('name','LIKE','%'.$text.'%')
            ->orWhere('cod','LIKE','%'.$text.'%')
            ->orWhereHas('city', function (Builder $query) use ($text) {
                $query->where('name','LIKE', '%'.$text.'%');
            })
            ->paginate(10);
        return view('client.index',compact('clients','text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = city::all();
        return view('client.create',compact('cities'));
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
            'city_id'=>'required'
        ]);
       $request['cod']=uniqid();
        $client = client::create($request->all());
        return back()->with('success', 'Cliente creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client=client::findOrFail($id);
        return view('client.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = city::all();
        $client=client::findOrFail($id);
        return view('client.edit',compact('client','cities'));
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
            'city_id'=>'required'
        ]);
        $client=client::findOrFail($id);
        $client->fill($request->all())->save();
        return back()->with('success', 'Cliente actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        client::findOrFail($id)->delete();
        return back()->with('success', 'Cliente eliminado con exito');
    }
}
