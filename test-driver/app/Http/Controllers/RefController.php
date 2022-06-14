<?php

namespace App\Http\Controllers;

use App\Models\Referant;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
class RefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //On récupère tous les User
    $referants = Referant::latest()->get();

    // On transmet les Referant à la vue
    return view("referants.index", compact("referants"));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view("referants.edit");
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'infos' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'more_telephone' => [ 'nullable', 'string', 'max:255'],
        ]);

        $referant = Referant::create([
            'name' => $request->name,
            'infos' => $request->infos,
            'telephone' => $request->telephone,
            'more_telephone' => $request->more_telephone,
        ]);

        event(new Registered($referant));


        return redirect(route("referants.index"));
    
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referant  $referant
     * @return \Illuminate\Http\Response
     */
    public function show(Referant $referant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referant  $referant
     * @return \Illuminate\Http\Response
     */
    public function edit(Referant $referant)
    {
    return view("referants.edit", compact("referant"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referant  $referant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referant $referant)
    {
    // 1. La validation

    // Les règles de validation pour "title" et "content"
    $rules = [
            'name' => ['required', 'string', 'max:255'],
            'infos' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'more_telephone' => [ 'nullable', 'string', 'max:255'],
    ];

    // $this->validate($request, $rules);

        // dd('validation passed');
    // 3. On met à jour les informations du User
    $referant->update([
        "name" => $request->name,
        "infos" => $request->infos,
        "telephone" => $request->telephone,
        "more_telephone" => $request->more_telephone,
    ]);

    // 4. On affiche le Referant modifié : route("referants.index")
    return redirect(route("referants.index", $referant));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referant  $referant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referant $referant)
    {
    // On les informations du $referant de la table "referant"
    $referant->delete();

    // Redirection route "referant.index"
    return redirect(route('referants.index'));
        //
    }
}
