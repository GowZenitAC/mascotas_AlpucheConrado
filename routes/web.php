<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});
Route::apiResource('apiMascota','MascotaController');

Route::apiResource('apiEspecie', 'EspecieController');

Route::apiResource('apiPropietario', 'PropietarioController');

Route::apiResource('apiRaza', 'RazaController');

Route::apiResource('apiProducto', 'ProductoController');

Route::get('prueba', function(){
    //return base64_encode('HOLA');
    return DB::select("SELECT * FROM usuarios");
});

Route::get('Desencriptar', function(){
    return base64_decode('SE9MQQ==');
});

Route::post('validar','AccesoController@validar');
 
Route::get('mascotas', function () {
    return view('mascotas');
});
Route::get('especies', function () {
    return view('especies');
});
Route::get('propietarios', function () {
    return view('propietarios');
});

Route::get('getRazas/{id_especie}', [
    'as' => 'getRazas',
    'uses' => 'EspecieController@getRazas'
]);

Route::get('ventas', function () {
    return view('ventas');
});

// app/Http/routes.php | app/routes/web.php

Route::get('pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit;

});
Route::get('prueba','PdfController@prueba');    


