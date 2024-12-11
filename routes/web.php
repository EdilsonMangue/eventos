<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PacoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\servicoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\UseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/auth-login', [AuthController::class, 'index']);
Route::post('/authlogin', [AuthController::class, 'login']);
Route::post('/auth-logout', [AuthController::class, 'Logout']);
Route::get('/registar', [AuthController::class, 'registar']);
Route::post('/client-registar', [AuthController::class, 'storeRegister']);

Route::get('/menu', [DashboardController::class, 'index']);

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente-create',[ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::put('/cliente/{id}/update', [ClienteController::class, 'update']);
Route::delete('/cliente/delete', [ClienteController::class, 'destroy']);

Route::get('/funcionario', [FuncionarioController::class, 'index'])->name('funcionario.index');
Route::get('/funcionario_create', [FuncionarioController::class, 'create'])->name('funcionario.create');
Route::post('/funcionario', [FuncionarioController::class, 'store']);
Route::get('/funcionario/{id}', [FuncionarioController::class, 'show']);
Route::put('/funcionario/{id}/update', [FuncionarioController::class, 'update']);
Route::delete('/funcionario/delete', [FuncionarioController::class, 'destroy']);

Route::get('/tipoevento', [TipoEventoController::class, 'index'])->name('tipoevento.index');
Route::get('/tipoevento-create', [TipoEventoController::class, 'create'])->name('tipoevento.create');
Route::post('/tipoevento', [TipoEventoController::class, 'store']);
Route::get('/tipoevento/{id}', [TipoEventoController::class, 'show']);
Route::put('/tipoevento/{id}/update', [TipoEventoController::class, 'update']);
Route::delete('/tipoevento/delete', [TipoEventoController::class, 'destroy']);

Route::get('/pacote', [PacoteController::class, 'index'])->name('pacote.index');
Route::get('/pacote-create', [PacoteController::class, 'create'])->name('pacote.create');
Route::post('/pacote', [PacoteController::class, 'store']);
Route::get('/pacote/{id}', [PacoteController::class, 'show']);
Route::put('/pacote/{id}/update', [PacoteController::class, 'update']);
Route::delete('/pacote/delete', [PacoteController::class, 'destroy']);


Route::get('/servico', [servicoController::class, 'index'])->name('servico.index');
Route::get('/servico-create', [servicoController::class, 'create'])->name('servico.create');
Route::post('/servico', [servicoController::class, 'store']);
Route::get('/servico/{id}', [servicoController::class, 'show']);
Route::put('/servico/{id}/update', [servicoController::class, 'update']);
Route::delete('/servico/delete', [servicoController::class, 'destroy']);


Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva.index');
Route::get('/reserva-create', [ReservaController::class, 'create'])->name('reserva.create');
Route::post('/reserva', [ReservaController::class, 'store']);
Route::get('/reserva/{id}', [ReservaController::class, 'show']);
Route::get('/detalhe/{id}', [ReservaController::class, 'detalhe']);
Route::get('/reserva-edit/{id}', [ReservaController::class, 'edit']);
Route::put('/reserva/{id}/update', [ReservaController::class, 'update']);
Route::delete('/reserva/delete', [ReservaController::class, 'destroy']);

Route::post('/payment', [ReservaController::class, 'payment']);


Route::get('/evento', [EventoController::class, 'index'])->name('evento.index');
Route::get('/evento-create', [EventoController::class, 'create']);
Route::post('/evento', [EventoController::class, 'store']);
Route::get('/evento/{id}', [EventoController::class, 'show']);
Route::put('/evento/{id}/update', [EventoController::class, 'update']);
Route::delete('/evento/delete', [EventoController::class, 'destroy']);

Route::get('/print/reserva/{id}', [ExportController::class, 'printReserva']);


Route::get('/users', [UseController::class, 'index'])->name('user.index');

require __DIR__.'/auth.php';
