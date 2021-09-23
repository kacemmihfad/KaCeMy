<?php

namespace App\Http\Controllers\Etudiant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Absence;
use App\anneeScolaire;

class AbsenceController extends Controller
{
    public function list()
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
        if ($_SESSION['type'] == 'P')
            return redirect('prof');

        ///////////////////

        $annee = anneeScolaire::where('active', 0)->first();
        $abs = Absence::where([
            ['etudiant_id', $_SESSION['email']],
            ['annee_scolaire', $annee->id],
        ])->orderby('dat_abs', 'desc')->paginate(10);
        return view('Etudiant\pages\AbsenceTable', [
            'absences' => $abs,
        ]);
    }
}