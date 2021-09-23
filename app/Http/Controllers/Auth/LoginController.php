<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utilisateur;
use App\Professeur;
use App\Administration;
use App\Etudiant; 
use App\anneeScolaire;

class LoginController extends Controller
{
    public function check()
    {
        session_start();
        if (isset($_SESSION['Authenticated'])) {
            if ($_SESSION['Authenticated'] == 1) {
                if ($_SESSION['type'] == 'P')
                    return redirect('prof');
                if ($_SESSION['type'] == 'A')
                    return redirect('admin');
                    if ($_SESSION['type'] == 'E')
                    return redirect('et'); 
            }
        }

        $user = Utilisateur::all();
        if ($user == null || !$user->count()) {
            $user = new Utilisateur();
            $user->id = '111111';
            $user->prenom = 'Admin';
            $user->nom = 'Admin';
            $user->email = 'admin@gmail.com';
            $user->adresse = 'MD1212';
            $user->GSM = 555555555;
            $user->pwd = '1234';
            $user->type = 'A';
            $user->active = 0;
            $user->save();
            $adm = new Administration();
            $adm->utilisateur_id = $user->id;
            
            $adm->save();
            
        }
        $annee = anneeScolaire::where('active', 0)->first();
        if ($annee == null || !$annee->count()) {
            $annee = new anneeScolaire();
            $annee->annee_debut = date('Y');
            $annee->annee_fin = date('Y') + 1;
            $annee->save();
        } else {
            if (date('m') >= 9 && date('m') <= 12) {
                if ($annee->annee_debut != date('Y')) {
                    $annee->active = 1;
                    $annee->save();
                    $annee = new anneeScolaire();
                    $annee->annee_debut = date('Y');
                    $annee->annee_fin = date('Y') + 1;
                    $annee->save();
                }
            }
        }

        return view('Authentication\login');
    }

    public function login()
    {
        session_start();
       
        $user = Utilisateur::where([
            ['email', request('login')],
            ['pwd', request('pwd')],
        ])->first();
       
        if ($user != null) {
            if ($user->count()) {
                $_SESSION['Authenticated'] = 1;
                $_SESSION['type'] = $user->type;
                $_SESSION['timeout'] = time();
                $_SESSION['user_id'] = $user->email;
                 
                if ($_SESSION['type'] == 'P') {
                    $prof = Professeur::where('utilisateur_id', $user->id)->first();
                    $_SESSION['email'] = $prof->id;
                    return redirect('prof');
                }
                if ($_SESSION['type'] == 'A') {
                    $adm = Administration::where('utilisateur_id', $user->id)->first();
                    $_SESSION['email'] = $adm->id; 
                    return redirect('admin');
                } 
                if ($_SESSION['type'] == 'E') {
                    $et = Etudiant::where('utilisateur_id', $user->id)->first();
                    $_SESSION['email'] = $et->id;
                    return redirect('et');
                }

            }
        }
        $_SESSION['Authenticated'] = 0;
        $msg = "Email ou Mot de passe est incorrect";
        return redirect('Home')->with('erreurAuth', $msg);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        return redirect('Home');
    }
}