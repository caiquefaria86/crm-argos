<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\CampaignController;
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
    return redirect('https://argoseng.com.br');
});
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['auth:sanctum', 'verified'])->get('/bemvindo', function () {
        return view('bemvindo');
    })->name('bemvindo');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    Route::prefix('admin')->middleware('admin')->name('admin.')->namespace('Admin')->group(function(){
        Route::get('/usuarios', [UsersController::class, 'index'])->name('usuarios');
        Route::get('/usuario/{id}/editar', [UsersController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuario/editar', [UsersController::class, 'update'])->name('usuarios.update');
        Route::delete('/usuario/{id}/destroy', [UsersController::class, 'destroy'])->name('usuarios.destroy');
        Route::get('/usuario/{id}/permissoes', [UsersController::class, 'editPermission'])->name('usuarios.editPermission');
        Route::get('/etiquetas/grupos/', [TagController::class, 'allTags'])->name('tags.groups');
        Route::get('/etiquetas/nova', [TagController::class, 'newTag'])->name('tags.new');
        Route::post('/etiquetas/new', [TagController::class, 'store'])->name('tags.store');
        Route::get('/etiqueta/{id}/editar', [TagController::class, 'edit'])->name('tags.edit');
        Route::put('/etiqueta/update', [TagController::class, 'update'])->name('tags.update');
        Route::delete('/etiqueta/{id}/destroy', [TagController::class, 'destroy'])->name('tags.destroy');
        Route::put('usuario/editarPermissoes', [UsersController::class, 'updatePermission'])->name('usuarios.updatePermission');
        Route::get('/campanhas', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get('/campanha/nova', [CampaignController::class, 'create'])->name('campaign.new');
        Route::get('/campanha/{campaign_id}/editar', [CampaignController::class, 'edit'])->name('campaign.edit');
        Route::post('/campanha/store', [CampaignController::class, 'store'])->name('campaign.store');
        Route::post('/campanha/update', [CampaignController::class, 'update'])->name('campaign.update');
        Route::delete('/campanha/{id}/destroy', [CampaignController::class, 'destroy'])->name('campaign.destroy');
        Route::get('/contatos', [ContactController::class, 'painelAdmin'])->name('painelAdmin');
        Route::get('/painel', [ContactController::class, 'painelAllContacts'])->name('painelAllContacts');
        Route::post('/reloadcontacts', [ComercialController::class, 'reloadContactsAdmin'])->name('painel.reloadcontacts');
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
        Route::post('/contato/arquivarContato',[ContactController::class, 'toFile'])->name('contato.toFile');
        //retorna os dados da modal de contato.
        Route::post('/contato/datamodal', [ContactController::class, 'dataModal'])->name('contato.datamodal');
        Route::post('/contato/edit/contact', [ContactController::class, 'edit'])->name('contato.edit');
        Route::post('/contato/update/contact', [ContactController::class, 'update'])->name('contato.update');
        Route::post('/solicitar/orcamento', [BudgetController::class, 'store'])->name('contato.budget.new');
        Route::post('/enviar/orcamento', [BudgetController::class, 'budgetSent'])->name('contato.budget.sent');
        Route::post('/contato/movecard', [ContactController::class, 'moveCard'])->name('contato.moveCard');
        Route::post('/contato/updatename', [ContactController::class, 'updateName'])->name('contato.updateName');
        Route::post('/contato/checklistStore', [ContactController::class, 'checklistStore'])->name('contato.checklistStore');
        Route::post('/contato/checklistDestroy', [ContactController::class, 'checklistDestroy'])->name('contato.checklistDestroy');
        Route::post('/contato/enviacnh', [ContactController::class, 'uploadFilesContact'])->name('contato.uploadFilesContact');
        Route::post('/contato/updateDateRecontact', [ContactController::class, 'updateDateRecontact'])->name('contato.updateDateRecontact');


        Route::post('/contato/addComment', [CommentController::class, 'store'])->name('contato.comment.store');
        Route::post('/contato/deleteComment', [CommentController::class, 'destroy'])->name('contato.comment.destroy');
        Route::post('/contato/addTag', [TagContactController::class, 'store'])->name('contato.tag.store');
        Route::post('/contato/deleteTag', [TagContactController::class, 'destroy'])->name('contato.tag.destroy');

        Route::post('/contato/addFormPayments', [ContactController::class, 'addFormPayments'])->name('contato.addFormPayments');
        Route::post('/targetpeople/store', [ContactController::class, 'targetPeople'])->name('contato.targetpeople.store');
        Route::get('/dados', [ContactController::class, 'index'])->name('contato.index');

        Route::post('/comercial/search', [ComercialController::class, 'searchContacts'])->name('search');

        Route::get('/cliente/novo/{contact_id?}/{checkContact?}', [ClientController::class, 'createClient'])->name('client.new');
        Route::get('/cliente/{id}/ver', [ClientController::class, 'show'])->name('client.show');
        Route::get('/clientes/todos', [ClientController::class, 'index'])->name('client.index');
        Route::post('/cliente/new', [ClientController::class, 'store'])->name('client.store');
        Route::delete('/cliente/{id}/destroy', [ClientController::class, 'destroy'])->name('client.destroy');

        Route::get('/projeto/{client_id}/novo', [ProjectController::class, 'projectNew'])->name('project.new');
        Route::post('/project/new', [ProjectController::class, 'store'])->name('project.store');
    });
});
