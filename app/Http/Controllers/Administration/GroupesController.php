<?php

namespace App\Http\Controllers\Administration;

use App\Groupe;
use App\Filiere; 
use App\Emploi;
use App\Http\Controllers\Controller;

class GroupesController extends Controller
{
    public function classL($id)
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

        $groupe = Groupe::where([
            ['active', 0],
            ['annee', $id],
        ])->paginate(10); 
        $filiere = Filiere::all();
        if (!$filiere->count()) {
            return redirect('filiere');
        } else
            return view('Administration.pages.ClassesTable', [
                'an' => $id,
                'groupes' => $groupe,
                'filieres' => $filiere,
            ]);
        
             
    }

    public function recherche()
    {
        if (request('nom') == '')
            return redirect('semestre/' . request('an'));

        $groupe = Groupe::where([
            ['active', 0],
            ['annee', request('an')],
            ['nom', 'like', '%' . request('nom') . '%'],
        ])->paginate(10);
        $filiere = Filiere::all();
        return view('Administration.pages.ClassesTable', [
            'an' => request('an'),
            'groupes' => $groupe,
            'filieres' => $filiere,
        ]);
        
    }

    public function delete($id)
    {
        
        $g = Groupe::find($id);
        $an = $g->annee;
        $msg = "Le Groupe \"" . $g->nom . "\" est supprimer";
        $g->active = 1;
        $g->save();
        Groupe::find($id)->delete();
        

        return redirect('semestre/' . $an)->with('successG', $msg);
    }

    public function store()
    {
        $grT = Groupe::where([
            ['active', 0],
            ['nom', request('nom')],
            ['annee', request('an')]
        ])->first();
        if ($grT != null) {
            if ($grT->count()) {
                $msg = "Le Groupe \"" . request('nom') . "\" éxiste déjà";
                return redirect('semestre/' . request('an'))->with('errorG', $msg);
            }
        }
        if (request('edit') == 0) {
            $groupe = new Groupe();
            $groupe->nom = request('nom');
            $groupe->annee = request('an');
            $groupe->active = 0; 
            $groupe->filiere_id = request('filiere');

            $fileName = request('nom') . '_' . request('an') . '_' . time() . '.txt';
            $emp = fopen('Emplois/' . $fileName, 'a+');
            $emplois = new Emploi();
            $emplois->nom = $fileName;
            $emplois->groupe_nom = request('nom');
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
            $groupe->emplois_id = $emplois->id;
            $groupe->niveau = (int)substr(request('an'), 0, 1);
            $groupe->save();
            $msg = "Le Groupe \"" . request('nom') . "\" est ajouter";
            return redirect('semestre/' . request('an'))->with('successG', $msg);
        } else {
            $groupe = Groupe::find(request('edit'));
            $groupe->nom = request('nom');
            $groupe->annee = request('an');
            $groupe->niveau = (int)substr(request('an'), 0, 1);
            $groupe->filiere_id = request('filiere'); 
            $groupe->active = 0;
            $groupe->save();
            $msg = "Le Groupe \"" . request('nom') . "\" est modifier";
            return redirect('semestre/' . request('an'))->with('successG', $msg);
        }
    }
}