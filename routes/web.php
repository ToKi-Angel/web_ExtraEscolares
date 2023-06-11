<?php

use App\Http\Controllers\AltasBajas;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/archivos/{matricula}', [ArchivoController::class, 'mostrarArchivos'])->name('archivos');

Route::post('/eliminar-archivo', [ArchivoController::class, 'eliminarArchivo'])->name('eliminar-archivo');

Route::get('/generar-comprobante/{id}', [ArchivoController::class, 'generarComprobante'])->name('generar-comprobante');

Route::get('/formulario-evento/{id}', [ArchivoController::class, 'formularioEvento'])->name('formulario-evento');
Route::post('/generar-pdf-evento', [ArchivoController::class, 'generarPdfEvento'])->name('generar-pdf-evento');

Route::get('/constancia-deportiva/{id}', [ArchivoController::class, 'PdfConstanciaDeportiva'])->name('constancia-deportiva');
Route::get('/constancia-cultural/{id}', [ArchivoController::class, 'PdfConstanciaCultural'])->name('constancia-cultural');
Route::get('/constancia-civica/{id}', [ArchivoController::class, 'PdfConstanciaCivica'])->name('constancia-civica');



Route::get('/', [AuthController::class, 'login'])->name('auth-login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');
Route::post('/agregarNuevo', [AuthController::class, 'agregarNuevo']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registrarUsuario', [AuthController::class, 'registrarUsuario'])->name('registrarUsuario');

Route::get('/inicio', [AltasBajas::class, 'index'])->name('inicio');

Route::get('/crud', [AltasBajas::class, 'index']);
Route::get('/crud/create', [AltasBajas::class, 'create']);
Route::get('/crud/tabla', [AltasBajas::class, 'tabla']);
Route::post('/crud/store', [AltasBajas::class, 'store']);
Route::get('/crud/edit/{id}', [AltasBajas::class, 'edit'])->name('edit');
Route::put('/crud/update/{id}', [AltasBajas::class, 'update'])->name('update');
Route::get('/crud/show/{id}', [AltasBajas::class, 'show'])->name('show');
Route::delete('/crud/destroy/{id}', [AltasBajas::class, 'destroy'])->name('destroy');
