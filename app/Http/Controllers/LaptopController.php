<?php

namespace App\Http\Controllers;

use App\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laptops = Laptop::orderBy('id', 'desc')->paginate(5);
        return view("laptop.index", compact("laptops"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("laptop.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laptops = new \App\Laptop;

        $laptops->placa = $request->input('placa');
        $laptops->serial = $request->input('serial');

        $laptops->save();

        return redirect()->route('laptops.index');



        // $request->validate([
        //     'placa' => 'required|min:9|max:13',
        //     'serial' => 'required|min:12|max:18'
        // ]);
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
        $laptops = \App\Laptop::findOrFail($id);
        return view("laptop.edit", compact("laptops"));
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
        $laptops = \App\Laptop::findOrFail($id);
        $laptops->placa = $request->input('placa');
        $laptops->serial = $request->input('serial');

        $laptops->update();

        return redirect()->route('laptops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptops = \App\Laptop::findOrFail($id);

        $laptops->delete();

        return redirect()->route('laptops.index');
    }
}
