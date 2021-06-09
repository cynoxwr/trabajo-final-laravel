<h1> {{ $modo }} bandaSonora</h1>

@if(count($errors)>0)

   <div class="alert alert-danger" role="alert">
    <ul>  
   @foreach( $errors->all() as $error)
   <li>{{ $error }}</li>
   @endforeach
   </ul>
   </div>
 
   

@endif


<style>

body {
    font-family: poppins;
    font-size: 16px;
    color: #fff;
}

body {
background-image: url('../img/joguards.jpg');
background-repeat: repeat;
background-attachment: fixed;
background-size: cover;
    }

</style>

<br>
<br>


<div class="form-group">


<label for="Director">Director</label>
<input type="text" class="form-control" name="Director" value="{{isset($bandaSonora->Director)?$bandaSonora->Director:old('Director')}}"  id="Director" >


</div>
<br>


<div class="form-group">


<label for="GrupoMusical">GrupoMusical</label>
<input type="text"  class="form-control" name="GrupoMusical" value="{{ isset($bandaSonora->GrupoMusical)? $bandaSonora->GrupoMusical: old('GrupoMusical')}}"  id="GrupoMusical" >


</div>
<br>


<div class="form-group">
<label for="peliculas"></label>
<select class="form-select" name="pelicula_id" id="pelicula_id">

@foreach ($peliculas as $pelicula)
  <option value="{{ isset($pelicula->id)?$pelicula->id:old('id') }}" id="pelicula_id">{{ isset($pelicula->Pelicula)?$pelicula->Pelicula:old('Pelicula') }}</option>
@endforeach

</select>
</div>

<br>


<div class="form-group">

<label for="Canciones">Canciones</label>
<input type="text"  class="form-control" name="Canciones" value="{{ isset($bandaSonora->Canciones)? $bandaSonora->Canciones:old('Canciones')}}"  id="Canciones" > 

</div>


<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('bandaSonora/') }}">Regresar</a>
