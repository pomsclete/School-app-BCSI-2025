<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesseurController extends Controller
{
    // Afficher la liste des professeurs
    public function index(){

         $professeurs = Professeur::orderBy('nomComplet','asc')->paginate(2);

        return view('professeur.index',[
            'professeurs' => $professeurs,
        ]);
    }

// Affiche le formulaire pour ajouter un professeur
    public function create(){
        return view('professeur.create');
    }

    //  Ajouter un professeur
    public function store(Request $request){
        
        $request->validate([
            'nom_complet' =>'required|min:5|max:255',
            'telephone' =>'required|numeric',
            'matiere' =>'required'
        ]);

        try {
            Professeur::create([
                    'nomComplet' => $request->input('nom_complet'),
                    'telephone' => $request->input('telephone'),
                    'matiere' => $request->input('matiere')
                ]);
        return redirect()->route('professeur.create')
                         ->with('success', 'Professeur enregistré avec succès');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
            
    }

    /**
    * Suppression
    * @param  int  $professeur
     */
    public function delete(Professeur $professeur){
          //$prof =  DB::table('professeurs')->where('id', $professeur)->first();
          $professeur->delete();
          return redirect()->route('professeur.index')->with('success', 'Professeur supprimé avec succès');
    }

    // Aficher les données à modifier
    public function edit(Professeur $professeur){
        return view('professeur.edit',compact('professeur'));
    }

    // Modifier les données et enregistrer au niveau du BD
    public function update(Request $request, Professeur $professeur){
        $request->validate([
            'nom_complet' =>'required|min:5|max:255',
            'telephone' =>'required|numeric',
            'matiere' =>'required'
        ]);
        $professeur->update([
            'nomComplet' => $request->input('nom_complet'),
            'telephone' => $request->input('telephone'),
            'matiere' => $request->input('matiere')
        ]);
        
        return redirect()->route('professeur.index')->with('success', 'Professeur modifié avec succès');
    }
}
