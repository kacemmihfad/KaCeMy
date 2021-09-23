<?php

namespace App\Http\Controllers\Administration;

use App\Filiere;
use App\Http\Controllers\Controller;

class FilieresController extends Controller
{
    public function filiereList()
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
        if ($_SESSION['type'] == 'C')
            return redirect('comp');
        if ($_SESSION['type'] == 'E')
            return redirect('el');

        $fil = Filiere::all();
        return view('Administration\pages\Filiere')->with('filiere', $fil);
    }
    public function delete($id)
    {
        Filiere::find($id)->delete();
        return redirect('filiere');
    }
    public function store()
    {
        $filiere = new Filiere();
        $nom = strtoupper(request('nom'));
        $filiere->nom = $nom;
        $filiere->save();
        return redirect('filiere');
    }
}