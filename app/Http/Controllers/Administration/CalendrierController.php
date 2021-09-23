<?php

namespace App\Http\Controllers\Administration;

use App\Calendrier;
use App\Http\Controllers\Controller;

class CalendrierController extends Controller
{
    public function tout()
    {
        session_start();
        if (time() - $_SESSION['timeout'] > 300) {
            return redirect('logout');
        }
        if (!isset($_SESSION['Authenticated']) || $_SESSION['Authenticated'] == 0) {
            return redirect('Home');
        }
        $_SESSION['timeout'] = time();

        $cal = Calendrier::all()->where('active', 0);
        if ($_SESSION['type'] == 'A') {
            return view('Administration.pages.CalendrierTable', [
                'cal' => $cal,
            ]);
        }
        if ($_SESSION['type'] == 'P') {
            return view('Professeur.pages.CalendrierTable', [
                'cal' => $cal,
            ]);
        } 
        if ($_SESSION['type'] == 'E') {
            return view('Etudiant.pages.CalendrierTable', [
                'cal' => $cal,
            ]);
        }
    }

    public function delete($id)
    {
        Calendrier::find($id)->delete();
        $msg = 'L\'événement est bien supprimer';
        return redirect('calendrier')->with('successC', $msg);
    }

    public function save()
    {
        $c = Calendrier::where([
            ['evenement', request('evenement')],
            ['date_D', request('debut')],
            ['date_F', request('fin')],
        ])->get();
        if ($c != null) {
            if ($c->count()) {
                $msg = 'Cet événement existe déjà';
                return redirect('calendrier')->with('msg', $msg);
            }
        }
        $cal = new Calendrier();
        $debut[] = substr(request('debut'), 5, 2);
        $debut[] = substr(request('debut'), 8, 2);
        $debut[] = substr(request('debut'), 0, 4);

        $fin[] = substr(request('fin'), 5, 2);
        $fin[] = substr(request('fin'), 8, 2);
        $fin[] = substr(request('fin'), 0, 4);

        $d = mktime(0, 0, 0, $debut[0], $debut[1], $debut[2]);
        $f = mktime(0, 0, 0, $fin[0], $fin[1], $fin[2]);

        if ($f - $d <= 0) {
            $msg = 'La date de la fin doit être supérieur à la date du début';
            return redirect('calendrier')->with('msg', $msg);
        }
        $cal->evenement = request('evenement');
        $cal->date_D = request('debut');
        $cal->date_F = request('fin');
        $cal->active = 0;
        $cal->save();
        $msg = 'L\'événement "' . request('evenement') . '" est bien ajouter';
        return redirect('calendrier')->with('successC', $msg);
    }
 

    public function recherche()
    {
        if (request('nom') == '')
            return redirect('calendrier');

        $cal = Calendrier::where('evenement', 'like', '%' . request('nom') . '%')->get();
        return view('Administration.pages.CalendrierTable', [
            'cal' => $cal,
        ]);
    }
}