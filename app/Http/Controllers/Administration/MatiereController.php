<?php

namespace App\Http\Controllers\Administration;

use App\Matiere;
use App\Filiere;
use App\Http\Controllers\Controller;

class MatiereController extends Controller
{
    public function matireList()
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

        $mat = Matiere::where('active', 0)->paginate(30);
        $filiere = Filiere::all();
        if (!$filiere->count()) {
            return redirect('filiere');
        } else
            return view('Administration\pages\Matiere',[
               'matiere' => $mat,
               'filieres' => $filiere,
             ]);
    }
    public function delete($id)
    {
        /*$matiere = Matiere::find($id);
        $matiere->active = 1;
        $matiere->save();*/
        Matiere::find($id)->delete();
        return redirect('module');
    }
    public function store()
    {
        $nom = strtoupper(request('nom'));
        $mat = Matiere::where([
            ['active', 0],
            ['nom', $nom],
            ['annee', request('an')],
        ])->get();
        if ($mat->count()) {
            return redirect('module');
        }
        $matiere = new Matiere();
        $matiere->nom = $nom;
        $matiere->active = 0;
        $matiere->annee = request('an');
        $matiere->filiere_id = request('filiere');
        $matiere->save();
        return redirect('module');
    }
}