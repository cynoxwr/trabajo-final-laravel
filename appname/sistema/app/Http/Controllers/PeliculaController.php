<?php

namespace App\Http\Controllers;

use App\Models\pelicula;
use App\Models\bandaSonora;
use Illuminate\Http\Request;




use Illuminate\Support\Facades\Storage;


class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['peliculas']=pelicula::paginate(30);
        return view('pelicula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelicula.create');
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
            'Pelicula' =>'required|string|max:100',
            'Director' =>'required|string|max:100',
            'Duración' =>'required|string|max:500',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg' 
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        //$datosEmpleado = request()->all();
        $datosPelicula = request()->except('_token');

        if ($request->hasFile('Foto')) {
          //  $empleado=Empleado::findOrFail($id);
            $datosPelicula['Foto']=$request->file('Foto')->store('uploads','public');
        }

        pelicula::insert($datosPelicula);

        // return response()->json($datosEmpleado);
        return redirect('pelicula')->with('mensaje','pelicula agregada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pelicula=pelicula::findOrFail($id);
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Pelicula' =>'required|string|max:100',
            'Director' =>'required|string|max:100',
            'Duración' =>'required|string|max:500',
            'Foto' =>'required|max:10000|mimes:jpeg,png,jpg' 
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        if ($request->hasFile('Foto')) {
          $campos =['Foto' =>'required|max:10000|mimes:jpeg,png,jpg',];
         // $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate( $request, $campos, $mensaje );
        //
        $datosPelicula = request()->except(['_token','_method']);


        if ($request->hasFile('Foto')) {
            $pelicula=pelicula::findOrFail($id);

            Storage::delete('public/'.$pelicula->Foto);

            $datosPelicula['Foto']=$request->file('Foto')->store('uploads','public');
        }

        pelicula::where('id','=',$id)->update($datosPelicula);
        $empleado=pelicula::findOrFail($id);
        //return view('empleado.edit', compact('empleado') );

        return redirect('pelicula')->with('mensaje','pelicula Modificado');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pelicula=pelicula::findOrFail($id);

        if(Storage::delete('public/'.$pelicula->Foto)){

            pelicula::destroy($id);

        }
        pelicula::destroy($id);
        return redirect('pelicula')->with('mensaje','pelicula Borrado');
    
    }
}
