<?php

namespace App\Http\Controllers\Professeur;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Cour;
use App\Matiere;
use App\Utilisateur; 
use App\Professeur;
class CourController extends Controller
{
    public function courList()
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

       $cour = Cour::where('active', 0)->paginate(30);
                return view('Professeur\pages\Cour')->with('cour', $cr);
    }
    public function delete($id)
    { 
        Cour::find($id)->delete();
        return redirect('cour');
    }
    public function store()
    {
        $nom = strtoupper(request('nom'));
        $cr = Cour::where([
            ['active', 0],
            ['nom', $nom],
            ['contenu', request('contenu')],
            ['fich', request('fich')],
        ])->get();
        if ($cr->count()) {
            return redirect('cour');
        }
        $cour = new Cour();
        $cour->nom = $nom;
        $cour->active = 0;
        $cour->contenu = request('contenu') ;
        $cour->fich = request('fich');
        $cour->save();
        return redirect('cour');
    } 
    public function nvcour(){
        
        $prof = Professeur::All(); 
        return view('Professeur.pages.AjouterCour') ;
    }
    
    
}
