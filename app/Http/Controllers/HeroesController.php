<?php

namespace App\Http\Controllers;

use App\heroe;

use Illuminate\Http\Request;

class HeroesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        //
        $heroes = Heroe::all()->sortByDesc('nombre');
        //$heroes = Heroe::all()->sortBy('nombre');
        return view('heroes.listado', compact('heroes'));

    }

    public function buscarNombre(Request $request){

       $nombre = $request->nombre;     

        $heroes = Heroe::where('nombre', 'LIKE', "%$nombre%")->get();
        return view('heroes.listado', compact('heroes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $heroe = new heroe();
        $heroe->nombre = $request->nombre;
        $heroe->poder = $request->poder;

        $heroe->save();
        return back()->with('heroeGuardado','Heroe guardado');
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
    public function editForm($id)
    {
        //
        $heroe = heroe::findOrFail($id);
        return view ('heroes.editheroe', compact('heroe'));


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
        // Modificar registo en BD
        $heroe = heroe::findOrFail($id);
        $heroe->nombre = $request->nombre;
        $heroe->poder = $request->poder;
        //$heroe->update($request->except('_token','_method'));
        $heroe->save();
        return back()->with('heroeModificado','Heroe Modificado');

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
        $heroe = heroe::findOrFail($id);
        $heroe->delete();

        return back()->with('heroeEliminado','Heroe Eliminado');
    }
}
