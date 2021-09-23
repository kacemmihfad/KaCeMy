<?php

namespace App\Http\Controllers\Etudiant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Etudiant;
use App\Emploi;
use App\Matiere;
use App\anneeScolaire;
use App\Note;
use App\Remarque;

class NoteController extends Controller
{
    public function note()
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
        $semestre = 1;
        $r = null;
        if (isset($_GET['semestre'])) {
            $semestre = $_GET['semestre'];
        }
        if (isset($_GET['rem']))
            $r = $_GET['rem'];
        $ele = Etudiant::find($_SESSION['email']);
        $empl = Emploi::find($ele->groupe->emplois_id);
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
        $ex1 = array();
        $ex2 = array();
        $ex3 = array();
        $ex4 = array();
        $ex5 = array();
        $annee = anneeScolaire::where('active', 0)->first();
        foreach ($class as $c) {
            $mat = Matiere::find($c);
            // exam 1
            $note = Note::where([
                ['matiere_id', $mat->id],
                ['etudiant_id', $_SESSION['user_id']],
                ['semestre', $semestre],
                ['numeroExamen', 1],
                ['anneeScolaire_id', $annee->id],
            ])->first();
            $remarque = null;
            if ($note)
                $remarque = Remarque::where('note_id', $note->id)->first();
            $temp = array("mat" => $mat, "note" => $note, "rem" => $remarque);
            $ex1[] = $temp;

            // exam 2
            $note = Note::where([
                ['matiere_id', $mat->id],
                ['etudiant_id', $_SESSION['user_id']],
                ['semestre', $semestre],
                ['numeroExamen', 2],
                ['anneeScolaire_id', $annee->id],
            ])->first();
            $remarque = null;
            if ($note)
                $remarque = Remarque::where('note_id', $note->id)->first();
            $temp = array("mat" => $mat, "note" => $note, "rem" => $remarque);
            $ex2[] = $temp;

            // exam 3
            $note = Note::where([
                ['matiere_id', $mat->id],
                ['etudiant_id', $_SESSION['user_id']],
                ['semestre', $semestre],
                ['numeroExamen', 3],
                ['anneeScolaire_id', $annee->id],
            ])->first();
            $remarque = null;
            if ($note)
                $remarque = Remarque::where('note_id', $note->id)->first();
            $temp = array("mat" => $mat, "note" => $note, "rem" => $remarque);
            $ex3[] = $temp;

            // exam 4
            $note = Note::where([
                ['matiere_id', $mat->id],
                ['etudiant_id', $_SESSION['user_id']],
                ['semestre', $semestre],
                ['numeroExamen', 4],
                ['anneeScolaire_id', $annee->id],
            ])->first();
            $remarque = null;
            if ($note)
                $remarque = Remarque::where('note_id', $note->id)->first();
            $temp = array("mat" => $mat, "note" => $note, "rem" => $remarque);
            $ex4[] = $temp;

            // exam 5
            $note = Note::where([
                ['matiere_id', $mat->id],
                ['etudiant_id', $_SESSION['user_id']],
                ['semestre', $semestre],
                ['numeroExamen', 5],
                ['anneeScolaire_id', $annee->id],
            ])->first();
            $remarque = null;
            if ($note)
                $remarque = Remarque::where('note_id', $note->id)->first();
            $temp = array("mat" => $mat, "note" => $note, "rem" => $remarque);
            $ex5[] = $temp;
        }
        return view('Etudiant\pages\NoteTable', [
            'rem' => $r,
            'semestre' => $semestre,
            'ex1' => $ex1,
            'ex2' => $ex2,
            'ex3' => $ex3,
            'ex4' => $ex4,
            'ex5' => $ex5,
        ]);
    }
}