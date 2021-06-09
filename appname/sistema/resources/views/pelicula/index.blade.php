@extends('layouts.app')
@section('content')


<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="clolse" data-diwiss="alert" aria-label="Close">
   <span aria-hidden="true"></span> 
</button>

</div>
@endif
  





<a href="{{ url('pelicula/create') }}" class="btn btn-success" >Registrar nueva pelicula</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th></th>
            <th>Pelicula</th>
            <th>Director</th>
            <th>Duración</th>
            <th></th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    
    <style>

body {
background-image: url('../img/inicio.webp');
background-repeat: repeat;
background-attachment: fixed;
background-size: cover;
    }

</style>

        @foreach( $peliculas as $pelicula)
        <tr>
            <td>{{ $pelicula->id }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->Foto }}" width="100"  alt="">
            </td>

            <td>{{ $pelicula->Pelicula }}</td>
            <td>{{ $pelicula->Director }}</td>
            <td>{{ $pelicula->Duración }}</td>

           <td  > <a href="{{ url('/bandaSonora/index'.$pelicula->id) }}"> Banda sonora</a></td>

            <td>
                
            <a href="{{ url('/pelicula/'.$pelicula->id.'/edit') }}" class="btn btn-warning" >
            Editar 

            </a>
            | 
            
            
            <form action="{{ url('/pelicula/'.$pelicula->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
           <input class="btn btn-warning" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            
             </td>
        </tr>
        @endforeach

    </tbody>

</table>

{!! $peliculas->links() !!}

</div>
@endsection


