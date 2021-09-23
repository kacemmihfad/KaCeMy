<?php
namespace App\Http\Controllers\Administration;

use App\Etudiant;
use App\Utilisateur;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    
    public function etudiantsList($id)
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

        $g_id = $id;
        $user = Utilisateur::where([
            ['type', 'E'],
            ['active', 0],
        ]);
        $etudiants = Etudiant::where('etudiants.groupe_id', '=', $g_id)
            ->joinSub($user, 'utilisateurs', function ($join) {
                $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id');
            })
            ->paginate(10);
        return view('Administration.pages.EtudiantsTable', [
            'g_id' => $g_id,
            'etudiants' => $etudiants,
        ]);
    }

    public function recherche()
    {
        if (request('nom') == '')
            return redirect('etudiants/' . request('groupe'));

        $user = Utilisateur::where([
            ['type', 'E'],
            ['active', 0],
        ])
            ->where(
                function ($query) {
                    $query->where('utilisateurs.nom', 'like', '%' . strtoupper(request('nom')) . '%')
                        ->orWhere('utilisateurs.prenom', 'like', '%' . strtoupper(request('nom')) . '%');
                }
            );
        $etudiants = Etudiant::where('etudiants.groupe_id', '=', request('groupe'))
            ->joinSub($user, 'utilisateurs', function ($join) {
                $join->on('utilisateurs.id', '=', 'etudiants.utilisateur_id')
                    ->where('groupe_id', '=', request('groupe'));
            })
            ->paginate(10);


        return view('Administration.pages.EtudiantsTable', [
            'g_id' => request('groupe'),
            'etudiants' => $etudiants,
        ]);
    }

    public function Store()
    {
        $data = request()->validate([
            'gsm' => 'max:9|min:9',
        ]);

        $nom = strtoupper(request('nom'));
        $prenom = strtoupper(request('prenom'));
        $EtNom = $prenom . ' ' . $nom;

        $etudiant = Utilisateur::where([
            ['active', 0],
            ['type', 'E'],
            ['nom', $nom],
            ['prenom', $prenom],
            ['adresse', request('adresse')],
            ['pwd', request('adresse')],
        ])->first();
        if ($etudiant != null) {
            $msg = "L'Etudiant \"" . $EtNom . "\" déjà éxiste ";
            return redirect('etudiants/' . request('id'))->with('errorE', $msg);
        }

        if (request('edit') == 0) {
            $user = new Utilisateur();
            $user->prenom = $prenom;
            $user->nom = $nom;
            $user->email = request('email');
            $user->adresse = request('adresse');
            $user->GSM = request('gsm');
            $user->pwd = request('adresse').'@'.$nom;
            $user->type = 'E';
            $user->active = 0;
            $user->save();

            $etudiant = new Etudiant();
            $etudiant->groupe_id = request('id');
            $etudiant->utilisateur_id = $user->id;
            $etudiant->save();
            $msg = "L'étudiant(e) " . $EtNom . " est bien Ajouter";
        } else {
            $etudiant = Etudiant::find(request('edit'));
            $user = Utilisateur::find($etudiant->utilisateur_id);
            $user->prenom = $prenom;
            $user->nom = $nom;
            $user->email = request('email');
            $user->adresse = request('adresse');
            $user->GSM = request('gsm');
            $user->pwd = request('pwd');
            $user->active = 0;
            $user->save();
            $etudiant->save();
            $msg = "L'etudiant(e) " . $EtNom . " est bien Modifier";
        }

        return redirect('etudiants/' . request('id'))->with('successE', $msg);
    }

    public function delete($id)
    {    $user = Utilisateur::find($id);
        $user->active = 1;
        $user->save();
        Utilisateur::find($id)->delete();
        return back();
    }
}
