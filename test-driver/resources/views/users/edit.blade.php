
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Créer un utilisateur') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star Github</span>
            </x-button>
        </div>
    </x-slot>


    <div>
	<!-- Si nous avons un User $user -->
	@if (isset($user))

	<!-- Le formulaire est géré par la route "users.update" -->
	<form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')
		
	@else

	<!-- Le formulaire est géré par la route "users.store" -->
	<form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" >

	@endif
	
		<!-- Le token CSRF -->
		@csrf
		
		<p>

			<label for="name" >Name</label><br/>
			<!-- S'il y a un $post->title, on complète la valeur de l'input -->
			<input type="text" name="name" 		
			value="{{ isset($user->name) ? $user->name : old('name') }}"
			  id="name" placeholder="Le nom de l'utilisateur" >

			<!-- Le message d'erreur pour "name" -->
			@error("name")
			<div>{{ $message }}</div>
			@enderror
		</p> 
		
		<p>
			<label for="email" >Email</label><br/>
			<input type="text" name="email"
			
			value="{{ isset($user->email) ? $user->email : old('email') }}"
			  id="email" placeholder="L'email de l'utilisateur" >

			<!-- Le message d'erreur pour "email" -->
			@error("email")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="role" >Role</label><br/>
			<input type="text" name="role" 
			
			value="{{ isset($user->role) ? $user->role : old('role') }}"
			  id="role" placeholder="Le role de l'utilisateur" >

			<!-- Le message d'erreur pour "role" -->
			@error("role")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="telephone" >Telephone</label><br/>
			<input type="text" name="telephone" 
			
			value="{{ isset($user->telephone) ? $user->telephone : old('telephone') }}"
			  id="telephone" placeholder="Le telephone de l'utilisateur" >

			<!-- Le message d'erreur pour "telephone" -->
			@error("telephone")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="cin" >Cin</label><br/>
			<input type="text" name="cin" 
			
			value="{{ isset($user->cin) ? $user->cin : old('cin') }}"
			  id="cin" placeholder="Le cin de l'utilisateur" >

			<!-- Le message d'erreur pour "cin" -->
			@error("cin")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		@if (!isset($user))
		<p>
			<label for="files" >Image</label><br/>
			<input type="file" name="image[]"
			  id="image" placeholder="Image" multiple>

			<!-- Le message d'erreur pour "image" -->
			@error("image")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="password" >Password</label><br/>
			<input type="password" name="password" 
			
			value="{{ old('password') }}"
			  id="password" placeholder="Password" >

			<!-- Le message d'erreur pour "password" -->
			@error("password")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="password_confirmation" >password_confirmation</label><br/>
			<input type="password" name="password_confirmation" 
			
			value="{{  old('password_confirmation') }}" 
			 id="password_confirmation" placeholder="password_confirmation" >

			<!-- Le message d'erreur pour "password_confirmation" -->
			@error("password_confirmation")
			<div>{{ $message }}</div>
			@enderror
		</p>
		@endif

		
    <div class="py-6">
        <div class="grid items-center gap-4">
            <div class="grid items-start grid-cols-3 gap-4 justify-items-center">
                <x-button :variant="'black'" size="'base'" class="items-center gap-2">
                    <span>Valider</span>
                </x-button>
            </div>
        </div>
    </div>

	</form>
    </div>

</x-app-layout>



