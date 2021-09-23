<?php

namespace App\Http\Controllers\Professeur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Note;
use App\Professeur;
use App\Groupe;
use App\Emploi; 
use App\Etudiant; 
use App\anneeScolaire;
use App\Utilisateur;
use App\Remarque;

class NoteController extends Controller
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
        if ($_SESSION['type'] == 'E')
            return redirect('et');

        ///////////////////
        $prof = Professeur::find($_SESSION['email']);
        $empl = Emploi::find($prof->emplois_id);
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

        ///////////////////
        $groupes = array();
        foreach ($class as $c) {
            $groupe = Groupe::find($c);
            $temp = array("id" => $groupe->id, "nom" => $groupe->nom, "annee" => $groupe->annee, "niveau" => $groupe->niveau);
            $groupes[] = $temp;
        }

        $etudiants = null;
        $semestre = 1;
        $cl = 1;
        $ex = 1;
        $tab = array();
        if (isset($_GET['class'])) { 
            $cl = $_GET['class'];
            $ex = $_GET['exam'];

            $user = Utilisateur::where([
                ['type', 'E'],
                ['active', 0],
            ]);
            $etudiants = Etudiant::where('etudiants.groupe_id', '=', $cl)
                ->joinSub($user, 'utilisateurs', function ($join) {
                    $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id');
                })->get();

            $annee = anneeScolaire::where('active', 0)->first();

            foreach ($etudiants as $etudiant) {
                $note = Note::where([
                    ['etudiant_id', $etudiant->id],
                    ['anneeScolaire_id', $annee->id],
                    ['matiere_id', $prof->matiere->id],
                    ['semestre', $semestre],
                    ['numeroExamen', $ex],
                ])->first();
                if ($note != null && $note->count()) {
                    $rem = Remarque::where([
                        ['note_id', $note->id],
                    ])->first();
                    $temp = array($etudiant, $note, $rem);
                    $tab[] = $temp;
                } else {
                    $note = null;
                    $temp = array($etudiant, $note);
                    $tab[] = $temp;
                }
            }
        }
        return view('Professeur.pages.NoteTable', [
            'prof' => $prof,
            'groupes' => $groupes,
            'etudiants' => $tab,
            'semestre' => $semestre,
            'class' => $cl,
            'exam' => $ex,
        ]);
    }

    public function save()
    {
        $user = Utilisateur::where([
            ['type', 'E'],
            ['active', 0],
        ]);
        $etudiants = Etudiant::where('etudiants.groupe_id', '=', request('class'))
            ->joinSub($user, 'utilisateurs', function ($join) {
                $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id');
            })->get();
        $annee = anneeScolaire::where('active', 0)->first();
        foreach ($etudiants as $etudiant) {
            $noteValue = request($etudiant->id);
            $note = Note::where([
                ['matiere_id', request('matiere')],
                ['etudiant_id', $etudiant->id],
                ['semestre', request('semestre')],
                ['numeroExamen', request('exam')],
                ['anneeScolaire_id', $annee->id],
            ])->first();
            if (!$note) {
                $note = new Note();
                $note->note = $noteValue;
                $note->matiere_id = request('matiere');
                $note->etudiant_id = $etudiant->id;
                $note->semestre = request('semestre');
                $note->numeroExamen = request('exam');
                $note->anneeScolaire_id = $annee->id;
                $note->save();
                $rem = new Remarque();
                $rem->remarque = request('remarque' . $etudiant->id);
                $rem->note_id = $note->id;
                $rem->save();
            } else {
                $note->note = $noteValue;
                $note->save();
                $rem = Remarque::where('note_id', $note->id)->first();
                $rem->remarque = request('remarque' . $etudiant->id);
                $rem->note_id = $note->id;
                $rem->save();
            }
        }
        return back();
    }
}