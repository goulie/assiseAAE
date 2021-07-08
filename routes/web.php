 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inscriptionController;
use App\Http\Controllers\languagesController;
use App\Http\Controllers\statController;
use App\Http\Controllers\gestionController;
use App\Http\Controllers\traitementController;
use App\Http\Controllers\PresentController;
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


Route::get('/',[inscriptionController::class,'index']);
Route::post('/inscription.html',[inscriptionController::class, 'add'])->name('submit.form');


/**********************************************************************************************envoie de mail***********************************************************/
//==================Language=====================================================//

Route::get('/local',[languagesController::class,'lang_change'])->name('LangChange');

Route::get('/admin',[statController::class,'index'])->name('admin');


Route::get('/gestion-données-assises',[gestionController::class,'index'])->name('gestion');

//add gestion
Route::post('/gestion-assises',[gestionController::class,'add_assise'])->name('assise');

Route::post('/gestion-membre',[gestionController::class,'add_type_membre'])->name('add.membre');

Route::post('/gestion-organisation',[gestionController::class,'add_type_org'])->name('add.org');

Route::post('/gestion-cs',[gestionController::class,'add_cs'])->name('add.cs');

Route::get('/traitement-extraction',[traitementController::class,'index'])->name('extraction');

Route::get('/extraction',[traitementController::class,'all'])->name('extractall');


Route::post('/extract',[traitementController::class,'assise'])->name('extract');

// Statistiques d'admin par assise 
Route::post('/visualisation-par-assise',[statController::class,'by_assise'])->name('assise_id');

//import des presents
Route::post('import', [gestionController::class, 'import_present'])->name('import');

//Route::view('/liste','list');

Route::get('/liste-complete-des-inscrits',[traitementController::class,'liste_inscrits'])->name('inscrits');

Route::get('/edit_assise/{id}',[gestionController::class,'editer']);

Route::post('/edit_assise',[gestionController::class,'update_assise'])->name('edit_assise');

Route::get('/gestion_assise',[gestionController::class,'gestion']);

Route::post('/export-present',[PresentController::class,'export'])->name('export.present');

Route::post('/delete-present',[PresentController::class,'delete'])->name('delete.present');

Route::get('/statistique-present',[PresentController::class,'statistiques']);

Route::get('/gestion_presence',[PresentController::class,'gestion'])->name('gestion_presence');

