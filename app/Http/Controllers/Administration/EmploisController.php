<?php

namespace App\Http\Controllers\Administration;

use App\Emploi;
use App\Professeur;
use App\Groupe;
use App\Matiere;
use App\Http\Controllers\Controller;

class EmploisController extends Controller
{
    public function empProf($id)
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
       
        $prof = Professeur::find($id);
        $an = $prof->matiere->annee ;
        $groupe = Groupe::where('annee', $an)->get();
        if (!$groupe->count()) {
            $msg = "Il y a aucun groupe contient votre module";
            return redirect('employers')->with('errorG', $msg);;
        }
        $empl = Emploi::find($prof->emplois_id);
        $fileName = $empl->nom;
        $tab = file('Emplois/' . $fileName);
        return view('Administration.pages.ProfEmploisTable', [
            'prof' => $prof,
            'groupe' => $groupe,
            'fileName' => $fileName,
            'content' => $tab,
        ]);
    }

    public function empList($id)
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

        $groupe = Groupe::find($id);
        $an = $groupe->annee;
        $mat = Matiere::where('annee', $an)->get();
        if (!$mat->count()) {
            return redirect('module');
        }
        $empl = Emploi::find($groupe->emplois_id);
        $fileName = $empl->nom;
        $tab = file('Emplois/' . $fileName);
        return view('Administration.pages.EmploisTable', [
            'annee'  =>$an,
            'groupe' => $groupe,
            'matieres' => $mat,
            'fileName' => $fileName,
            'content' => $tab,
        ]);
        ////////////////////////
        /*$emp = Emploi::find($id);
        $fileName = $emp->nom;
        $tab = file('Emplois/' . $fileName);
        $className = $emp->groupe_nom;
        return view('Administration.pages.EmploisTable', [
            'content' => $tab,
            'groupe' => $className,
            'fileName' => $fileName,
        ]);*/
    }
    public function empStore()
    {
        $file = fopen('Emplois/' . request('nom'), 'w+');
        $content = request('L1') . "\n"
            . request('L2') . "\n"
            . request('L3') . "\n"
            . request('L4') . "\n"
            . request('L5') . "\n"
            . request('L6') . "\n"
            . request('L7') . "\n"
            . request('L8') . "\n"
            . request('M1') . "\n"
            . request('M2') . "\n"
            . request('M3') . "\n"
            . request('M4') . "\n"
            . request('M5') . "\n"
            . request('M6') . "\n"
            . request('M7') . "\n"
            . request('M8') . "\n"
            . request('ME1') . "\n"
            . request('ME2') . "\n"
            . request('ME3') . "\n"
            . request('ME4') . "\n"
            . request('ME5') . "\n"
            . request('ME6') . "\n"
            . request('ME7') . "\n"
            . request('ME8') . "\n"
            . request('J1') . "\n"
            . request('J2') . "\n"
            . request('J3') . "\n"
            . request('J4') . "\n"
            . request('J5') . "\n"
            . request('J6') . "\n"
            . request('J7') . "\n"
            . request('J8') . "\n"
            . request('V1') . "\n"
            . request('V2') . "\n"
            . request('V3') . "\n"
            . request('V4') . "\n"
            . request('V5') . "\n"
            . request('V6') . "\n"
            . request('V7') . "\n"
            . request('V8') . "\n"
            . request('S1') . "\n"
            . request('S2') . "\n"
            . request('S3') . "\n"
            . request('S4') . "\n"
            . request('S5') . "\n"
            . request('S6') . "\n"
            . request('S7') . "\n"
            . request('S8') . "\n";
        fputs($file, $content);
        fclose($file);
        return back();
    }
}