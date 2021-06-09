<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandaSonoraController;
use App\Http\Controllers\PeliculaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});

/*
Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('empleado/create', [EmpleadoController::class,'create']);
*/


Auth::routes([]);//registrar

//////////////

Route::resource('bandaSonora',BandaSonoraController::class)->middleware('auth');


Route::get('/home', [BandaSonoraController::class, 'index'])->name('home');



Route::prefix(['middleware' => 'auth'],function () {
    
    Route::get('/home', [BandaSonoraController::class, 'index'])->name('home');
    //Route::get('/bandaSonora', 'BandaSonoraController@indexPersona')->name('bandaSonora.index');

});

//////////////////


Route::resource('pelicula',PeliculaController::class)->middleware('auth');


Route::get('/home', [PeliculaController::class, 'index'])->name('home');



Route::prefix(['middleware' => 'auth'],function () {
    
    Route::get('/home', [PeliculaController::class, 'index'])->name('home');


});


