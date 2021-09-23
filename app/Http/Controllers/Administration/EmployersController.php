<?php

namespace App\Http\Controllers\Administration;

use App\Utilisateur;
use App\Professeur;
use App\Administration; 
use App\Matiere;
use App\Emploi;
use App\Http\Controllers\Controller;

class EmployersController extends Controller
{
    public function employerList()
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
        if ($_SESSION['type'] == 'E')
                return redirect('et');

        $employers = Utilisateur::where([
            ['active', 0],
            ['type', '!=', 'E'],
        ])->paginate(10);

        $mat = Matiere::where('active', 0)->get();

        if (!$mat->count()) {
            return redirect('module');
        } else {
            return view('Administration.pages.EmployerTable', [
                'employers' => $employers,
                'matiere' => $mat,
            ]);
        }
    }

    public function Store()
    {
        $data = request()->validate([
            'gsm' => 'max:9|min:9',
        ]);
        $nom = strtoupper(request('nom'));
        $prenom = strtoupper(request('prenom'));
        $ElNom = $prenom . ' ' . $nom;

        $user = Utilisateur::where([
            ['active', 0],
            ['id', '!=', request('edit')],
            ['nom', request('nom')],
            ['prenom', request('prenom')],
            ['adresse', request('adresse')],
        ])->get();

        if ($user != null) {
            if ($user->count()) {
                $msg = "Le membre \"" . $ElNom . "\" éxiste déjà";
                return redirect('employers')->with('errorE', $msg);
            }
        }

        if (request('edit') == 0) {
            $user = new Utilisateur();
            $user->prenom = $prenom;
            $user->nom = $nom;
            $user->email = request('email');
            $user->adresse = request('adresse');
            $user->GSM = request('gsm');
            $user->pwd = request('adresse').'@'.$nom;
            $user->type = request('profession');
            $user->active = 0;
            $user->save();

            if (request('profession') == 'P') {
                $prof = new Professeur();
                $prof->utilisateur_id = $user->id;
                $prof->matiere_id = request('mat');

                $fileName = $nom .  '_' . $prenom . '_' . time() . '.txt';
                $emp = fopen('Emplois/' . $fileName, 'a+');
                $emplois = new Emploi();
                $emplois->nom = $fileName;
                $emplois->groupe_nom = $ElNom;
                $empTable = "0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0
0";
                fputs($emp, $empTable);
                fclose($emp);
                $emplois->save();
                $prof->emplois_id = $emplois->id;

                $prof->save();
                // la variable prof_id pour afficher l'emplois du prof
                $user->prof_id = $prof->id;
                $user->save();
            } else {
                if (request('profession') == 'A') {
                    $adm = new Administration();
                    $adm->utilisateur_id = $user->id;
                    $adm->save();
                } 
            }
            $msg =  $ElNom . " est bien Ajouter";
        } else {
            $user = Utilisateur::find(request('edit'));
            $user->prenom = $prenom;
            $user->nom = $nom;
            $user->email = request('email');
            $user->adresse = request('adresse');
            $user->GSM = request('gsm');
            $user->pwd = request('adresse').'@'.$nom;
            $user->type = request('pr');
            $user->save();
            $msg =  $ElNom . " est bien Modifier";
        }

        return redirect('employers')->with('successE', $msg);
    }

    public function delete($id)
    {
        $user = Utilisateur::find($id);
        $user->active = 1;
        $user->save();
        return back();
    }

    public function recherche()
    {
        $employers = Utilisateur::where([
            ['type', '!=', 'E'],
            ['active', 0],
        ])
            ->where(
                function ($query) {
                    $query->where('nom', 'like', '%' . strtoupper(request('nom')) . '%')
                        ->orWhere('prenom', 'like', '%' . strtoupper(request('nom')) . '%');
                }
            )->paginate(10);

        return view('Administration.pages.EmployerTable', [
            'employers' => $employers,
        ]);
    }
}