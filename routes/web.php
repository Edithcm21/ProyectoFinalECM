<?php

use App\Http\Controllers\ClasificacionesController;
use App\Http\Controllers\hallazgosController;
use App\Http\Controllers\IndexAdmin;
use App\Http\Controllers\IndexCapturista;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LocalidadesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\muestreosController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PlayasController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\tipo_residuosController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Pagina principal
Route::resource('/',IndexController::class);
//Ruta que funciona para la llamada AJAX de obtener los datos de filtros
Route::get('estados/{id_estado}', [MunicipioController::class, 'getMunicipios']);
//muestra el formulario
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//ruta para la logica del formulario
Route::post('login', [LoginController::class, 'login']);



//manejador de rutas con permisos 
Route::middleware(['auth'])->group(function () {
    Route::middleware(CheckRole::class . ':admin')->group(function () {
        //vista principal
        Route::get('/admin',[MenuController::class,'index'])->name('admin');
        //vistas para la gestion de usuarios
        Route::get('/admin/usuarios',[UsersController::class,'index'])->name('admin.usuarios');
        Route::post('/admin/usuarios/create',[UsersController::class,'store'])->name('admin.usuarios.store');
        Route::put('/admin/usuarios/update/{id}',[UsersController::class,'update'])->name('admin.usuarios.update');
        Route::post('/admin/usuarios/delete/{id}',[UsersController::class,'destroy'])->name('admin.usuarios.delete');
        //gestion de municipios
        Route::get('/admin/municipios',[MunicipioController::class,'index'])->name('admin.municipios');
        Route::post('/admin/municipios/create',[MunicipioController::class,'store'])->name('admin.municipios.store');
        Route::put('/admin/municipios/update/{id}',[MunicipioController::class,'update'])->name('admin.municipios.update');
        Route::post('/admin/municipios/delete/{id}',[MunicipioController::class,'destroy'])->name('admin.municipios.delete');
        //Gestion de localidades
        Route::get('/admin/localidades',[LocalidadesController::class,'index'])->name('admin.localidades');
        Route::post('/admin/localidades/create',[LocalidadesController::class,'store'])->name('admin.localidades.store');
        Route::put('/admin/localidades/update/{id}',[LocalidadesController::class,'update'])->name('admin.localidades.update');
        Route::post('/admin/localidades/delete/{id}',[LocalidadesController::class,'destroy'])->name('admin.localidades.delete');
        //Region Marina
        Route::get('/admin/RegionMarina',[RegionesController::class,'index'])->name('admin.RegionMarina');
        Route::post('/admin/RegionMarina/create',[RegionesController::class,'store'])->name('admin.RegionMarina.store');
        Route::put('/admin/RegionMarina/update/{id}',[RegionesController::class,'update'])->name('admin.RegionMarina.update');
        Route::post('/admin/RegionMarina/delete/{id}',[RegionesController::class,'destroy'])->name('admin.RegionMarina.delete');
        //Clasificacion de reisuos
        Route::get('/admin/Clasificacion',[ClasificacionesController::class,'index'])->name('admin.Clasificacion');
        Route::post('/admin/Clasificacion/create',[ClasificacionesController::class,'store'])->name('admin.Clasificacion.store');
        Route::put('/admin/Clasificacion/update/{id}',[ClasificacionesController::class,'update'])->name('admin.Clasificacion.update');
        Route::post('/admin/Clasificacion/delete/{id}',[ClasificacionesController::class,'destroy'])->name('admin.Clasificacion.delete');
        //Playas
        Route::get('/admin/Playas',[PlayasController::class,'index'])->name('admin.Playas');
        Route::post('/admin/Playas/create',[PlayasController::class,'store'])->name('admin.Playas.store');
        Route::put('/admin/Playas/update/{id}',[PlayasController::class,'update'])->name('admin.Playas.update');
        Route::post('/admin/Playas/delete/{id}',[PlayasController::class,'destroy'])->name('admin.Playas.delete');
        //
        Route::get('/admin/Tipo_residuos',[tipo_residuosController::class,'index'])->name('admin.Tipo_residuos');
        Route::post('/admin/Tipo_residuos/create',[tipo_residuosController::class,'store'])->name('admin.Tipo_residuos.store');
        Route::put('/admin/Tipo_residuos/update/{id}',[tipo_residuosController::class,'update'])->name('admin.Tipo_residuos.update');
        Route::post('/admin/Tipo_residuos/delete/{id}',[tipo_residuosController::class,'destroy'])->name('admin.Tipo_residuos.delete');

        Route::get('/admin/hallazgos',[hallazgosController::class,'index'])->name('admin.hallazgos');
        Route::get('/admin/hallazgos/create',[hallazgosController::class,'create'])->name('admin.hallazgos.create');
        Route::post('/admin/hallazgos/store',[hallazgosController::class,'store'])->name('admin.hallazgos.store');
        // Route::put('/admin/hallazgos/update/{id}',[tipo_residuosController::class,'update'])->name('admin.Tipo_residuos.update');
        // Route::post('/admin/hallazgos/delete/{id}',[tipo_residuosController::class,'destroy'])->name('admin.Tipo_residuos.delete');
        
        
        Route::get('/admin/muestreos',[muestreosController::class,'index'])->name('admin.muestreos');
        // Route::get('/admin/hallazgos/create',[hallazgosController::class,'create'])->name('admin.hallazgos.create');
        // Route::post('/admin/hallazgos/store',[hallazgosController::class,'store'])->name('admin.hallazgos.store');
        // // Route::put('/admin/hallazgos/update/{id}',[tipo_residuosController::class,'update'])->name('admin.Tipo_residuos.update');
        // // Route::post('/admin/hallazgos/delete/{id}',[tipo_residuosController::class,'destroy'])->name('admin.Tipo_residuos.delete');
        
        



       
        // Route::get('/admin/{opcion}', [IndexAdmin::class, 'index'])->name('admin');
        // Route::get('/admin/{opcion}',[MenuController::class,'index'])->name('admin');
        // Route::get('/admin1/usuarios',[UsersController::class,'index'])->name('admin.usuarios');
        // Route::post('/admin1/usuarios',[UsersController::class,'store'])->name('admin1.usuarios.store');

        // Route::get('/usuarios', function () {
        //     return view('views_admin.admin')->with('seleccion', 'usuarios');
        // })->name('usuarios');
    });
    Route::middleware(CheckRole::class . ':capturista')->group(function () {
        Route::get('/capturista', [IndexCapturista::class, 'index'])->name('capturista');
    });
});



// // Ruta para almacenar un nuevo usuario
// Route::get('users', [UsersController::class, 'store'])->name('user.tore');
// Route::get('users/create', [UsersController::class, 'create'])->name('user.create');



// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::middleware(['auth'])->group(function () {
//      Route::get('/admin', [IndexAdmin::class, 'index'])->name('admin');
//      Route::get('/capturista', [IndexCapturista::class, 'index'])->name('capturista');
//  });



