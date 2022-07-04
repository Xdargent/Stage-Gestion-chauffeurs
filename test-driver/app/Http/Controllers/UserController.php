<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image_user;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //On récupère tous les User
    $users = User::latest()->get();

    // On transmet les User à la vue
    return view("users.index", compact("users"));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    // On retourne la vue "/resources/views/users/edit.blade.php"
    return view("users.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'cin' => [ 'nullable', 'string', 'max:255'],
            'role' => [ 'nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'cin' => $request->cin,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('image')) {
        foreach ($request->file('image') as $image) {
            $image_name= $request->name.'-image-'.time().rand(1, 1000).'.'.$image->extension();

    // $image_name->store("user_images");
            $image->move(public_path('user_images'),$image_name);
            Image_user::create([
            'user_id' =>$user->id,
            'image' =>$image_name,
            ]);
        }
        }
        event(new Registered($user));


        return redirect(route("users.index"));
    
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    return view("users.edit", compact("user"));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
    // 1. La validation

    // Les règles de validation pour "title" et "content"
    $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique::users'],
            'telephone' => ['required', 'string', 'max:255'],
            'cin' => [ 'nullable', 'string', 'max:255'],
            'role' => [ 'nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ];

    // $this->validate($request, $rules);

        // dd('validation passed');
    // 3. On met à jour les informations du User
    $user->update([
        "name" => $request->name,
        "email" => $request->email,
        "telephone" => $request->telephone,
        "cin" => $request->cin,
        "role" => $request->role,
    ]);

    // 4. On affiche le User modifié : route("users.index")
    return redirect(route("users.index", $user));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    // On les informations du $user de la table "user"
    $user->delete();

    // Redirection route "user.index"
    return redirect(route('users.index'));
        //
    }
    /**
     * Images the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function images(Request $request)
    {

		$input=$request->all();
		$firstKey = key($input);
		$user= User::find($firstKey);
		// dd($user->id);
		if (!isset($user->images)) {
			return view("users.images", compact("user"));
		} 
		else {
			$images= $user->images;
			return view("users.images", compact("user","images"));
		}
    }

    public function removeImages(Request $request,User $user)
    {
        $input=$request->all();
        // dd($input);
		$firstKey = key($input);
		$image= Image_user::find($firstKey);
		// dd($image);
		$user_name=$image->user_id;
		// dd($user_name);
		$user= User::find($user_name);
		// dd($user);
		if(is_file(public_path('user_images/'.$image->image))){
			unlink(public_path('user_images/'.$image->image) != null);
		}
		$image->delete();
		return redirect(route("users.images", $user));
    // return view("users.images", compact("user"));
    }
    
    
    public function addImages(Request $request,User $user){
    $input=$request->except('_token');
    $firstKey = key($input);
    $user= User::find($firstKey);
    // dd($user);
        if ($request->has('image')) {
        foreach ($request->file('image') as $image) {
            $image_name= $user->name.'-image-'.time().rand(1, 1000).'.'.$image->extension();

    // $image_name->store("user_images");
            $image->move(public_path('user_images'),$image_name);
            Image_user::create([
            'user_id' =>$user->id,
            'image' =>$image_name,
            ]);
        }
    return redirect(route("users.images", $user));
        }
    return abort(404);
    // return view("users.index", compact("users"));
    }
	
	/**
     * rediriger vers la page suppr
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     **/
    public function suppr(Request $request,User $user)
    {
	$input=$request->all();
	$firstKey = key($input);
	$user= User::find($firstKey);
		
    return view("users.suppr", compact("user"));
        //
    }
}
