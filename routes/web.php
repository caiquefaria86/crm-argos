<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Comercial\BudgetController;
use App\Http\Controllers\Comercial\CommentController;
use \App\Http\Controllers\Comercial\ContactController;
use \App\Http\Controllers\Comercial\ComercialController;
use App\Http\Controllers\Comercial\TagContactController;
use App\Http\Controllers\comercial\TargetPeopleController;

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

    Route::post('/notifications/reload', [NotificationController::class, 'notifications'])->name('notification.reload');
    Route::post('/notifications/reloadBadge', [NotificationController::class, 'notificationsBadge'])->name('notification.reloadBadge');
    Route::post('/notifications/markRead', [NotificationController::class, 'notificationRead'])->name('notification.read');

    Route::prefix('comercial')->middleware('comercial')->name('comercial.')->namespace('Comercial')->group(function(){
        Route::get('/', [ComercialController::class, 'index'])->name('painel');
        Route::get('/cards/{cards}/time/{selectTime}', [ComercialController::class, 'filterCards'])->name('painel.filters');
        Route::post('/reloadcontacts', [ComercialController::class, 'reloadContacts'])->name('painel.reloadcontacts');
        Route::post('/addFilterSession', [ComercialController::class, 'addFilterSession'])->name('painel.addFilterSession');
        Route::get('/relatorio/{mes?}/{ano?}',[ComercialController::class, 'reportIndex'])->name('report');
        Route::post('/contato/cadastrar',[ContactController::class, 'store'])->name('contato.store');
        //retorna os dados da modal de contato.
        Route::post('/contato/datamodal', [ContactController::class, 'dataModal'])->name('contato.datamodal');
        Route::post('/solicitar/orcamento', [BudgetController::class, 'store'])->name('contato.budget.new');
        Route::post('/enviar/orcamento', [BudgetController::class, 'budgetSent'])->name('contato.budget.sent');
        Route::post('/contato/movecard', [ContactController::class, 'moveCard'])->name('contato.moveCard');
        Route::post('/contato/updatename', [ContactController::class, 'updateName'])->name('contato.updateName');
        Route::post('/contato/checklistStore', [ContactController::class, 'checklistStore'])->name('contato.checklistStore');

        Route::post('/contato/addComment', [CommentController::class, 'store'])->name('contato.comment.store');
        Route::post('/contato/deleteComment', [CommentController::class, 'destroy'])->name('contato.comment.destroy');
        Route::post('/contato/addTag', [TagContactController::class, 'store'])->name('contato.tag.store');
        Route::post('/contato/deleteTag', [TagContactController::class, 'destroy'])->name('contato.tag.destroy');

        Route::post('/targetpeople/store', [ContactController::class, 'targetPeople'])->name('contato.targetpeople.store');
        Route::get('/dados', [ContactController::class, 'index'])->name('contato.index');

        Route::post('/comercial/search', [ComercialController::class, 'searchContacts'])->name('search');

        Route::get('/cliente/novo/{contact_id?}', [ClientController::class, 'createClient'])->name('client.new');
        Route::get('/cliente/{id}/ver', [ClientController::class, 'show'])->name('client.show');
        Route::post('/cliente/new', [ClientController::class, 'store'])->name('client.store');

        Route::get('/projeto/{client_id}/novo', [ProjectController::class, 'projectNew'])->name('project.new');
        Route::post('/project/new', [ProjectController::class, 'store'])->name('project.store');
    });
});
