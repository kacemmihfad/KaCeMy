<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Administration;
use App\Professeur; 
use App\Etudiant;
  
class HomeController extends Controller
{
    public function list()
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
            return view('Administration.pages.Home', [
                'user' => $adm,
            ]);
        }
        if ($_SESSION['type'] == 'P') {
            $prof = Professeur::find($_SESSION['email']);
            return view('Professeur.pages.Home', [
                'user' => $prof,
            ]);
        }
        if ($_SESSION['type'] == 'E') {
            $etudiant = Etudiant::find($_SESSION['email']);
            return view('Etudiant.pages.Home', [
                'user' => $etudiant,
            ]);
        }
        
    }
}