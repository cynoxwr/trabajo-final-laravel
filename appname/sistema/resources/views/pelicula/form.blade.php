

<h1> {{ $modo }} pelicula</h1>

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
background-image: url('../img/home.jpg');
background-repeat: repeat;
background-attachment: fixed;
background-size: cover;
    }

</style>


<br>

<div class="form-group">

<label for="Pelicula">Pelicula</label>
<input type="text" class="form-control" name="Pelicula" value="{{isset($pelicula->Nombre)?$pelicula->Nombre:old('Pelicula')}}"  id="Pelicula" >



</div>
<br>

<div class="form-group">


<label for="Director">Director</label>
<input type="text"  class="form-control" name="Director" value="{{ isset($pelicula->Director)? $pelicula->Director: old('Director')}}"  id="Director" >


</div>

<br>

<div class="form-group">

<label for="Duración">Duración</label>
<input type="text"  class="form-control" name="Duración" value="{{ isset($pelicula->Duración)? $pelicula->Duración:old('Duración')}}"  id="Duración" > 

</div>

<br>

<div class="form-group">

<label for="Foto"></label>
@if(isset($pelicula->Foto))
<img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->Foto }}" width="100" alt="">
 @endif
<input type="file"  class="form-control" name="Foto" value=""  id="Foto" >


</div>

<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >

<a class="btn btn-primary" href="{{ url('pelicula/') }}">Regresar</a>

