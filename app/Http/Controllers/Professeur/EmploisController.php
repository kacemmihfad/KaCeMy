<?php

namespace App\Http\Controllers\Professeur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professeur;
use App\Groupe;
use App\Emploi;

class EmploisController extends Controller
{
    public function empProf()
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

        $prof = Professeur::find($_SESSION['email']);
        $an = $prof->matiere->annee;
        $groupe = Groupe::where('niveau', $an)->get();
        $empl = Emploi::find($prof->emplois_id);
        $fileName = $empl->nom;
        $tab = file('Emplois/' . $fileName);
        return view('Professeur.pages.EmploisTable', [
            'prof' => $prof,
            'groupe' => $groupe,
            'fileName' => $fileName,
            'content' => $tab,
        ]);
    }
}