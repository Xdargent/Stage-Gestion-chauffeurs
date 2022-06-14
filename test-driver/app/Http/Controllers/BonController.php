<?php

namespace App\Http\Controllers;

use App\Models\Bon;
use Illuminate\Http\Request;

class BonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //On récupère tous les Bon
    $bons = Bon::latest()->get();

    // On transmet les Bon à la vue
    return view("bons.index", compact("bons"));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // On retourne la vue "/resources/views/bons/edit.blade.php"
        return view("bons.edit");

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. La validation
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ]);

        // 3. On enregistre les informations du Bon
        Bon::create([
            "title" => $request->title,
            "content" => $request->content,
        ]);

        // 4. On retourne vers tous les bons : route("bons.index")
        return redirect(route("bons.index"));



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function show(Bon $bon)
    {
    // Afficher un Bon
        return view("bons.show", compact("bon"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function edit(Bon $bon)
    {
        return view("bons.edit", compact("bon"));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bon $bon)
    {
        // 1. La validation

        // Les règles de validation pour "title" et "content"
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];

        $this->validate($request, $rules);

        // 3. On met à jour les informations du Bon
        $bon->update([
            "title" => $request->title,
            "content" => $request->content
        ]);

        // 4. On affiche le Bon modifié : route("bons.show")
        return redirect(route("bons.show", $bon));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bon  $bon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bon $bon)
    {

        // On les informations du $bon de la table "bons"
        $bon->delete();

        // Redirection route "bons.index"
        return redirect(route('bons.index'));
        //
    }
}

