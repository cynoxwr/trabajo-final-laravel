<?php

namespace App\Http\Controllers;

use App\Models\bandaSonora;
use App\Models\pelicula;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;

class BandaSonoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['bandaSonoras']=bandaSonora::paginate(30);
        //$datos1['peliculaBSs']=pelicula::join("banda_sonoras","peliculas.id","=","banda_sonoras.pelicula_id")->where("peliculas.id","=","banda_sonoras.pelicula_id")->get();
        return view('bandaSonora.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos['peliculas']=Pelicula::all();
        return view('bandaSonora.create', $datos);
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

        $campos=[
            'Director' =>'required|string|max:100',
            'GrupoMusical' =>'required|string|max:100',
            'Canciones' =>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        //$datosEmpleado = request()->all();
        $datosBandaSonora = request()->except('_token');

      

        bandaSonora::insert($datosBandaSonora);

        // return response()->json($datosEmpleado);
        return redirect('bandaSonora')->with('mensaje','bandaSonora agregado con exito');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bandaSonora  $bandaSonora
     * @return \Illuminate\Http\Response
     */
    public function show(bandaSonora $bandaSonora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bandaSonora  $bandaSonora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bandaSonora=bandaSonora::findOrFail($id);
        return view('bandaSonora.edit', compact('bandaSonora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bandaSonora  $bandaSonora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Director' =>'required|string|max:100',
            'GrupoMusical' =>'required|string|max:100',
            'Canciones' =>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate( $request, $campos, $mensaje );
        //
        $datosBandaSonora = request()->except(['_token','_method']);


        bandaSonora::where('id','=',$id)->update($datosBandaSonora);
        $bandaSonora=bandaSonora::findOrFail($id);
        //return view('empleado.edit', compact('empleado') );

        return redirect('bandaSonora')->with('mensaje','bandaSonora Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bandaSonora  $bandaSonora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bandaSonora=bandaSonora::findOrFail($id);

        bandaSonora::destroy($id);
        return redirect('bandaSonora')->with('mensaje','bandaSonora Borrado');
    }
    
}
