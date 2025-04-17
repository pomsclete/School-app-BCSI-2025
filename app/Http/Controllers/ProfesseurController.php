<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesseurController extends Controller
{
    public function index(){

         $professeurs = Professeur::orderBy('nomComplet','asc')->paginate(2);

        return view('professeur.index',[
            'professeurs' => $professeurs,
        ]);
    }


    public function create(){
        return view('professeur.create');
    }

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

    public function delete(Professeur $professeur){
          //$prof =  DB::table('professeurs')->where('id', $professeur)->first();
          $professeur->delete();
          return redirect()->route('professeur.index')->with('success', 'Professeur supprimé avec succès');
    }
}
