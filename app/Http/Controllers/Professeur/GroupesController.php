<?php

namespace App\Http\Controllers\Professeur;

use App\Http\Controllers\Controller;
use App\Professeur;
use App\Emploi;
use App\Groupe;

class GroupesController extends Controller
{
    public function classList()
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
        $empl = Emploi::find($prof->emplois_id);
        $fileName = $empl->nom;
        $tab = file('Emplois/' . $fileName);
        $class = array();
        foreach ($tab as $t) {
            $cpt = 0;
            if ($t != 0) {
                $str = substr($t, 0, strlen($t) - 1);
                foreach ($class as $c) {
                    if ($c == $str) {
                        $cpt = 1;
                    }
                }
                if ($cpt == 0) {
                    $class[] = $str;
                }
            }
        }

        ///////////////////
        $groupes = array();
        foreach ($class as $c) {
            $groupe = Groupe::find($c);
            $temp = array("id" => $groupe->id, "nom" => $groupe->nom, "annee" => $groupe->annee, "niveau" => $groupe->niveau);
            $groupes[] = $temp;
        }
        return view('Professeur.pages.GroupeTable', [
            'prof' => $prof,
            'groupes' => $groupes,
        ]);
    }
}