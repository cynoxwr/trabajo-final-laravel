@extends('layouts.app')
@section('content')
<div class="container">



@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="clolse" data-diwiss="alert" aria-label="Close">
   <span aria-hidden="true"> &times; </span> 
</button>

</div>
@endif
  





<a href="{{ url('bandaSonora/create') }}" class="btn btn-success" >Registrar nueva bandaSonora</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Director</th>
            <th>GrupoMusical</th>
            <th>Canciones</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <style>

body {
    font-family: poppins;
    font-size: 16px;
    color: #fff;
}

body {
background-image: url('../img/elfos.jpg');
background-repeat: repeat;
background-attachment: fixed;
background-size: cover;
    }

    

</style>


<div>

    <tbody>
        @foreach( $bandaSonoras as $bandaSonora)
       
      
        
        <tr>
            <td>{{ $bandaSonora->id }}</td>

           
            <td>{{ $bandaSonora->Director }}</td>
            <td>{{ $bandaSonora->GrupoMusical }}</td>
            <td>{{ $bandaSonora->Canciones }}</td>

            <td>
                
            <a href="{{ url('/bandaSonora/'.$bandaSonora->id.'/edit') }}" class="btn btn-warning" >
            Editar 

            </a>
            | 
            
            
            <form action="{{ url('/bandaSonora/'.$bandaSonora->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
           <input class="btn btn-warning" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            
             </td>
        </tr>
        
       
        @endforeach

    </tbody>

  </table> 

  {!! $bandaSonoras->links() !!}

  </div>
  @endsection
