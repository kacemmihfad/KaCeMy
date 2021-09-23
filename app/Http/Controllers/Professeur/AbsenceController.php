<?php

namespace App\Http\Controllers\Professeur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilisateur; 
use App\Professeur;
use App\Etudiant;
use App\Emploi;
use App\Groupe;
use App\Absence;
use App\anneeScolaire;

class AbsenceController extends Controller
{     public function listEt($id){
        session_start();
      if (time() - $_SESSION['timeout'] > 300) {
        return redirect('logout');
      }
      $_SESSION['timeout'] = time();

       if (!isset($_SESSION['Authenticated']) || $_SESSION['Authenticated'] == 0) {
        return redirect('Home');
       }
       if ($_SESSION['type'] == 'A')
         return redirect('admin'); 
       if ($_SESSION['type'] == 'E')
            return redirect('et');
      ///////////////////
  $prof = Professeur::find($_SESSION['email']);
  $user = Utilisateur::where([
    ['type', 'E'],
    ['active', 0],
]);
  $etudiants = Etudiant::where('etudiants.groupe_id', '=', $id)->select('Etudiants.*')
  ->joinSub($user, 'utilisateurs', function ($join) {
      $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id');
  })->get();
foreach ($etudiants as $etudiant) {
                
                $temp = array($etudiant);
                $tab[] = $temp;
            }
  return view('Professeur.pages.Etudiant', [
    'prof' => $prof,
    'groupe' => $id,
    'etudiants' => $tab,
    
]);

}
    public function list($id)
    {
        session_start();
        if (time() - $_SESSION['timeout'] > 300) {
            return redirect('logout');
        }
        $_SESSION['timeout'] = time();

        if (!isset($_SESSION['Authenticated']) || $_SESSION['Authenticated'] == 0) {
            return redirect('Home');
        }
        if ($_SESSION['type'] == 'A')
            return redirect('admin'); 
        if ($_SESSION['type'] == 'E')
                return redirect('et');

        ///////////////////
        $prof = Professeur::find($_SESSION['email']);

        $etudiants = null;
        $debut = '8:30';
        $fin = '10:00';
        $tab = array();
        $annee = anneeScolaire::where('active', 0)->first();

        if (isset($_GET['HeureD'])) {
            $date = date('Y-m-d');
            $debut = $_GET['HeureD'];
            $fin = $_GET['HeureF'];
            if ((int) $debut >= (int) $fin || (int) $debut + 2 < (int) $fin)
                return back();
            $user = Utilisateur::where([
                ['type', 'E'],
                ['active', 0],
            ]);
            $etudiants = Etudiant::where('etudiants.groupe_id', '=', $id)->select('Etudiants.*')
                ->joinSub($user, 'utilisateurs', function ($join) {
                    $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id');
                })->get();
            foreach ($etudiants as $etudiant) {
                $abs = Absence::where([
                    ['dat_abs', $date],
                    ['etudiant_id', $etudiant->id],
                    ['heureD', $debut],
                    ['heureF', $fin],
                    ['annee_scolaire', $annee->id],
                ])->first();
                $temp = array($etudiant, $abs);
                $tab[] = $temp;
            }
        }
        return view('Professeur.pages.AbsenceTable', [
            'prof' => $prof,
            'groupe' => $id,
            'etudiants' => $tab,
            'debut' => $debut,
            'fin' => $fin,
        ]);
    }

    public function store()
    {
        $annee = anneeScolaire::where('active', 0)->first();
        $user = Utilisateur::where([
            ['type', 'E'],
            ['active', 0],
        ]);
        $etudiants = Etudiant::where('etudiants.groupe_id', '=', request('groupe_id'))->select('Etudiants.*')
            ->joinSub($user, 'utilisateurs', function ($join) {
                $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id');
            })->get();
        foreach ($etudiants as $etudiant) {
            if (request($etudiant->id)) {
                $abs = new Absence();
                $abs->heureD = request('debut');
                $abs->heureF = request('fin');
                $abs->etudiant_id = $etudiant->id;
                $abs->dat_abs = date('Y-m-d');
                $abs->matiere_id = request('matiere');
                $abs->annee_scolaire = $annee->id;
                $abs->save();
            }
        }
        return back();
    }
}