<?php

namespace App\Http\Controllers\Administration;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Administration;
use App\Professeur;
use App\Etudiant;

class NouveauMembreController extends Controller
{
    public function nouveauetud()
    { 
        return view('Administration.pages.NouveauMembre');
    }
    public function nouveauadmin()
    { 
        return view('Administration.pages.Nv_admin');
    }
    public function nouveauprof()
    { 
        return view('Administration.pages.Nv_prof');
    }
    
    public function modif()
    { 
         
        session_start();
        if (time() - $_SESSION['timeout'] > 300) {
            return redirect('logout');
        }
        if (!isset($_SESSION['Authenticated']) || $_SESSION['Authenticated'] == 0) {
            return redirect('Home');
        }
        $_SESSION['timeout'] = time();
        if ($_SESSION['type'] == 'A') {
            $adm = Administration::find($_SESSION['email']);
            return view('Administration.pages.Modifier', [
                'user' => $adm,
            ]);
        } 
        
        if ($_SESSION['type'] == 'P') {
            $prof = Professeur::find($_SESSION['email']);
            return view('Professeur.pages.Modifier', [
                'user' => $prof,
            ]);
        }
        if ($_SESSION['type'] == 'E') {
            $etudiant = Etudiant::find($_SESSION['email']);
            return view('Administration.pages.Modifier', [
                'user' => $etudiant,
            ]);
        }
    }
}
