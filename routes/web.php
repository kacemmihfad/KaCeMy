<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    return redirect(('Home'));
});

///////////////////////////////////////////////////////////////
///////////////////////>> Login <</////////////////////////////
///////////////////////////////////////////////////////////////
Route::get('Home', 'Auth\LoginController@check');
Route::post('Home', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

///////////////////////////////////////////////////////////////
///////////////////>> Administration <<////////////////////////
///////////////////////////////////////////////////////////////
// Home Auth
Route::get('admin', 'Auth\HomeController@list');

// Employer Auth
Route::get('nvadmin', 'Administration\NouveauMembreController@nouveauadmin');
Route::get('nvprof', 'Administration\NouveauMembreController@nouveauprof');
Route::get('nvmembre', 'Administration\NouveauMembreController@nouveauetud');
Route::get('profil', 'Administration\NouveauMembreController@modif');
Route::get('employers', 'Administration\EmployersController@employerList');
Route::post('saveEmp', 'Administration\EmployersController@Store');
Route::get('deleteEmp/{id}', 'Administration\EmployersController@delete');
Route::post('employers', 'Administration\EmployersController@recherche');
Route::post('emploisProf/', 'Administration\EmployersController@recherche');

// Calendrier Auth
Route::get('calendrier', 'Administration\CalendrierController@tout');
Route::post('saveCal', 'Administration\CalendrierController@save'); 
Route::post('calendrier', 'Administration\CalendrierController@recherche');
Route::get('deleteCal/{id}', 'Administration\CalendrierController@delete');

// Etudiant Auth
Route::get('etudiants/{id}', 'Administration\EtudiantsController@etudiantsList');
Route::post('saveE', 'Administration\EtudiantsController@Store');
Route::get('Edelete/{id}', 'Administration\EtudiantsController@delete');
Route::post('etudiants', 'Administration\EtudiantsController@recherche');

// Groupe Auth
Route::get('Cdelete/{id}', 'Administration\GroupesController@delete');
Route::post('saveC', 'Administration\GroupesController@store');
Route::get('semestre/{id}', 'Administration\GroupesController@classL');
Route::post('semestre', 'Administration\GroupesController@recherche');
Route::get('semestre', function () {
    return redirect('Home');
});

// Emplois Auth
Route::get('emplois/{id}', 'Administration\EmploisController@empList');
Route::get('emploisProf/{id}', 'Administration\EmploisController@empProf');
Route::post('empStore', 'Administration\EmploisController@empStore');
 // Filiere Auth
Route::get('filiere', 'Administration\FilieresController@filiereList');
Route::get('Fildelete/{id}', 'Administration\FilieresController@delete');
Route::post('saveFil', 'Administration\FilieresController@store');

// Module Auth
Route::get('module', 'Administration\MatiereController@matireList');
Route::get('Matdelete/{id}', 'Administration\MatiereController@delete');
Route::post('saveMat', 'Administration\MatiereController@store');

///////////////////////////////////////////////////////////////
/////////////////////>> Professeur <<//////////////////////////
///////////////////////////////////////////////////////////////
// Home

Route::get('prof', 'Auth\HomeController@list');

Route::get('Pclass', 'Professeur\GroupesController@classList');
// Remarques
Route::get('Premarque', 'Professeur\NoteController@list');
Route::post('saveRemarque', 'Professeur\NoteController@save');
// Notes
Route::get('Pnote', 'Professeur\NoteController@list');
Route::post('saveNote', 'Professeur\NoteController@save');
// Absence
Route::get('Pabsence/{id}', 'Professeur\AbsenceController@list');
Route::get('etudiantes/{id}', 'Professeur\AbsenceController@listEt');
Route::post('saveAbsence', 'Professeur\AbsenceController@store');
// Emplois
Route::get('ProfEmplois', 'Professeur\EmploisController@empProf');
Route::get('cour','Professeur\CourController@cour');
Route::get('Nvless','Professeur\CourController@nvcour'); 
 

///////////////////////////////////////////////////////////////
////////////////////////>> Etudiant <<////////////////////////////
///////////////////////////////////////////////////////////////
// Home
Route::get('et', 'Auth\HomeController@list');

// Emplois
Route::get('EtudiantEmplois', 'Etudiant\EmploisController@emplois');

// Note
Route::get('EtNote', 'Etudiant\NoteController@note');

// Absence
Route::get('EtAbsence', 'Etudiant\AbsenceController@list');
 