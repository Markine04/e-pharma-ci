<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DatePhcieGardeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datePhcieGarde = DB::table('date_phcie_gardes')->get();

        return view('dashboard.date-pharmacie-gardes.index', compact('datePhcieGarde'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.date-pharmacie-gardes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'nombre_semaines' => 'required',
        ]);

        // Conversion en objets Carbon
        $debut = Carbon::parse($request->date_debut);
        $fin   = Carbon::parse($request->date_fin);

        // Nombre de semaines à générer
        $nombre = $request->nombre_semaines;

        // Calcul de l'année
        $annee = $debut->year;

        // (Optionnel) On supprime toutes les semaines existantes pour cette année
        DB::table('date_phcie_gardes')->where('annee', $annee)->delete();

        $numero = 1;

        // --- 1️⃣ On ajoute la première semaine ---
        DB::table('date_phcie_gardes')->insert([
            'date_debut' => $debut->format('Y-m-d'),
            'date_fin'   => $fin->format('Y-m-d'),
            'annee'      => $annee,
            'numero_semaine' => $numero,
            'user_enreg' => Auth::user()->id,
        ]);

        // Préparation pour les suivantes
        $numero++;
        $currentStart = $fin->copy()->addDay();   // Début = lendemain de la première fin

        // --- 2️⃣ Génération automatique des autres semaines ---
        for ($i = 2; $i <= $nombre; $i++) {

            $currentEnd = $currentStart->copy()->addDays(6); // Durée = 7 jours

            DB::table('date_phcie_gardes')->insert([
                'date_debut' => $currentStart->format('Y-m-d'),
                'date_fin'   => $currentEnd->format('Y-m-d'),
                'annee'      => $annee,
                'numero_semaine' => $numero,
                'user_enreg' => Auth::user()->id,
            ]);

            $numero++;
            $currentStart = $currentEnd->copy()->addDay();
        }

        return redirect()->route('datephciegardes.index')->with('success', 'Date de pharmacie de garde ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datePhcieGarde = DB::table('date_phcie_gardes')->where('idatephciegardes', $id)->first();

        return view('dashboard.date-pharmacie-gardes.edit', compact('datePhcieGarde'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        DB::table('date_phcie_gardes')->where('idatephciegardes', $request->idatephciegardes)->update([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'user_enreg' => Auth::user()->id,
        ]);

        return redirect()->route('datephciegardes.index')->with('success', 'Date de pharmacie de garde mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
      $datePhcieGarde = DB::table('date_phcie_gardes')->where('idatephciegardes', $request->idatephciegardes)->first();

        return view('dashboard.date-pharmacie-gardes.delete', compact('datePhcieGarde'));

    }
    public function destroy(string $id)
    {
        DB::table('date_phcie_gardes')->where('idatephciegardes', $id)->delete();

        return redirect()->route('datephciegardes.index')->with('success', 'Date de pharmacie de garde supprimée avec succès.');    
    }
    
}
