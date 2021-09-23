<?php

namespace App\Http\Controllers\Etudiant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Etudiant;
use App\Groupe;
use App\Matiere;
use App\Emploi;

class EmploisController extends Controller
{
    public function emplois()
    {
        session_start();
        if (time() - $_SESSION['timeout'] > 300) {
            return redirect('logout');
        }
        $_SESSION['timeout'] = time();

        if (!isset($_SESSION['Authenticated']) || $_SESSION['Authenticated'] == 0) {
            return redirect('Home');
        }
        if ($_SESSION['type'] == 'P')
            return redirect('prof'); 
        if ($_SESSION['type'] == 'P')
            return redirect('prof');

        $etudiant = Etudiant::find($_SESSION['email']);
        $groupe = Groupe::find($etudiant->groupe_id);
        $an = $groupe->niveau;
        $mat = Matiere::where('annee', $an)->get();
        if (!$mat->count()) {
            return redirect('matiere');
        }
        $empl = Emploi::find($groupe->emplois_id);
        $fileName = $empl->nom;
        $tab = file('Emplois/' . $fileName);
        return view('Etudiant.pages.EmploisTable', [
            'groupe' => $groupe,
            'matieres' => $mat,
            'content' => $tab,
        ]);
    }
}