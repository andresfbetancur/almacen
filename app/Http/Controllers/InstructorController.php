<?php

namespace App\Http\Controllers;

use App\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::orderBy('id', 'desc')->paginate(5);
        return view('instructors.index', compact("instructors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("instructors.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instructors = new \App\Instructor();

        $instructors->documento = $request->input('documento');
        $instructors->nombre = $request->input('nombre');
        $instructors->telefono = $request->input('telefono');
        $instructors->correo = $request->input('correo');

        $instructors->save();

        return redirect()->route('instructors.index');
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
        $instructors = \App\Instructor::findOrFail($id);
        return view("instructors.edit", compact("instructors"));
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
        $instructors = \App\Instructor::findOrFail($id);
        $instructors->documento = $request->input('documento');
        $instructors->nombre = $request->input('nombre');
        $instructors->telefono = $request->input('telefono');
        $instructors->correo = $request->input('correo');


        $instructors->update();

        return redirect()->route('instructors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructors = \App\Instructor::findOrFail($id);

        $instructors->delete();

        return redirect()->route('instructors.index');
    }
}
