<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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


Route::group(['middleware'=>['guest']], function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware' =>['auth']], function(){
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' =>['operador']], function(){
        Route::resource('cliente', 'ClienteController');
        Route::resource('venta', 'VentaController');
        Route::resource('gasto', 'GastoController');
        Route::resource('intercambio', 'IntercambioController');
        Route::resource('distancia', 'DistanciaController');
        Route::resource('calcular', 'MapsController');
        Route::get('/verdistancia', 'DistanciaController@verdistancias')->name('verdistancia');
    });

    Route::group(['middleware' =>['callcenter']], function(){
        Route::resource('cliente', 'ClienteController');
        Route::resource('distancia', 'DistanciaController');
        Route::get('/verdistancia', 'DistanciaController@verdistancias')->name('verdistancia');
        Route::resource('calcular', 'MapsController');
    });

    Route::group(['middleware' =>['administrador']], function(){
        Route::resource('marca', 'MarcaController');
        Route::resource('proveedor', 'ProveedorController');
        Route::resource('cliente', 'ClienteController');
        Route::resource('principio', 'PrincipioController');
        Route::resource('empleado', 'EmpleadoController');
        Route::resource('farmacia', 'FarmaciaController');
        Route::resource('medicamento', 'MedicamentoController');
        Route::resource('activo', 'ActivoController');
        Route::resource('rol', 'RolController');
        Route::resource('tipogasto', 'TipogastoController');
        Route::resource('usuario', 'UserController');
        Route::resource('compra', 'CompraController');
        Route::resource('venta', 'VentaController');
        Route::resource('responsabilidad', 'ResponsabilidadController');
        Route::resource('gasto', 'GastoController');
        Route::resource('intercambio', 'IntercambioController');
        Route::resource('distancia', 'DistanciaController');
        Route::resource('calcular', 'MapsController');

        ///////////reportes/////////
        Route::get('/planillapdf/{id}', 'GastoController@planillapdf')->name('planillapdf');//planilla de una farmacia
        Route::get('/repgasto', 'GastoController@repgasto')->name('gastos_pdf');
        Route::get('/planillastPdf', 'GastoController@planillastPdf')->name('planillasT');

        Route::get('/intercambios', 'IntercambioController@intercambios')->name('intercambios_pdf');
        Route::get('/intsPDF', 'IntercambioController@intsPDF')->name('intsPDF');
        Route::get('/intPDF/{id}', 'IntercambioController@intPDF')->name('intPDF');

        Route::get('/flujoe', 'FarmaciaController@flujoe')->name('flujo_pdf');
        Route::get('/flujototal', 'FarmaciaController@flujototal')->name('flujototal');
        Route::get('/flujopdf/{id}', 'FarmaciaController@flujopdf')->name('flujopdf');

        Route::get('/farmaciaspdf', 'FarmaciaController@farmaciaspdf')->name('farma_pdf');
        Route::get('/farmaPDF', 'FarmaciaController@farmaPDF')->name('farmaPDF');
        Route::get('/farmPDF/{id}', 'FarmaciaController@farmPDF')->name('farmPDF');


        Route::get('/repmed', 'MedicamentoController@rep')->name('medicamentos_pdf');
        Route::get('/listarMedicamentoPdf', 'MedicamentoController@listarPdf')->name('MXpdf');
        Route::get('/pdfMx/{id}', 'MedicamentoController@listarxfarPdf')->name('MxpdfE');

        Route::get('/activosrep', 'ResponsabilidadController@rep')->name('activos_pdf');
        Route::get('/listarActivosPdf', 'ResponsabilidadController@listarPdf')->name('Acpdf');
        Route::get('/pdfAc/{id}', 'ResponsabilidadController@listarxfarPdf')->name('AcpdfE');
        Route::get('/fichaPdf/{id}', 'ResponsabilidadController@fichaPdf')->name('fichaPdf');
        /////////fin reportes/////////////////////////////////
        Route::get('getempleado/{id}','EmpleadoController@getempleado');
        Route::get('/verdistancia', 'DistanciaController@verdistancias')->name('verdistancia');
    });

});









