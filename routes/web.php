<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Comercial\BudgetController;
use \App\Http\Controllers\Comercial\ContactController;
use \App\Http\Controllers\Comercial\ComercialController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    Route::prefix('admin')->middleware('admin')->name('admin.')->namespace('Admin')->group(function(){
        Route::get('/usuarios', [UsersController::class, 'index'])->name('usuarios');
        Route::get('/usuario/{id}/editar', [UsersController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuario/editar', [UsersController::class, 'update'])->name('usuarios.update');
        Route::get('/usuario/{id}/permissoes', [UsersController::class, 'editPermission'])->name('usuarios.editPermission');
        Route::put('usuario/editarPermissoes', [UsersController::class, 'updatePermission'])->name('usuarios.updatePermission');

    });

    Route::prefix('comercial')->middleware('comercial')->name('comercial.')->namespace('Comercial')->group(function(){
        Route::get('/', [ComercialController::class, 'index'])->name('painel');
        Route::post('/reloadcontacts', [ComercialController::class, 'reloadContacts'])->name('painel.reloadcontacts');
        Route::post('/contato/cadastrar',[ContactController::class, 'store'])->name('contato.store');
        //retorna os dados da modal de contato.
        Route::post('/contato/datamodal', [ContactController::class, 'dataModal'])->name('contato.datamodal');
        Route::post('/solicitar/orcamento', [BudgetController::class, 'store'])->name('contato.budget.new');
        Route::post('/enviar/orcamento', [BudgetController::class, 'budgetSent'])->name('contato.budget.sent');
        Route::post('/contato/movecard', [ContactController::class, 'moveCard'])->name('contato.moveCard');
    });
});
