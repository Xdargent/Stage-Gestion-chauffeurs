

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Créer un referant') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star Github</span>
            </x-button>
        </div>
    </x-slot>


    <div>
	<!-- Si nous avons un Referant $referant -->
	@if (isset($referant))

	<!-- Le formulaire est géré par la route "referants.update" -->
	<form method="POST" action="{{ route('referants.update', $referant) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')
		
	@else

	<!-- Le formulaire est géré par la route "referants.store" -->
	<form method="POST" action="{{ route('referants.store') }}" enctype="multipart/form-data" >

	@endif
	
		<!-- Le token CSRF -->
		@csrf
		
		<p>

			<label for="name" >Name</label><br/>
			<!-- S'il y a un $post->title, on complète la valeur de l'input -->
			<input type="text" name="name" 		
			value="{{ isset($referant->name) ? $referant->name : old('name') }}"
			  id="name" placeholder="Le nom de la personne" >

			<!-- Le message d'erreur pour "name" -->
			@error("name")
			<div>{{ $message }}</div>
			@enderror
		</p> 
		
		<p>
			<label for="infos" >Infos</label><br/>
			<input type="text" name="infos"
			
			value="{{ isset($referant->infos) ? $referant->infos : old('infos') }}"
			  id="infos" placeholder="Le role de la personne" >

			<!-- Le message d'erreur pour "infos" -->
			@error("infos")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="telephone" >Telephone</label><br/>
			<input type="text" name="telephone" 
			
			value="{{ isset($referant->telephone) ? $referant->telephone : old('telephone') }}"
			  id="telephone" placeholder="Le telephone de la personne" >

			<!-- Le message d'erreur pour "telephone" -->
			@error("telephone")
			<div>{{ $message }}</div>
			@enderror
		</p>
		
		<p>
			<label for="more_telephone" >Telephones supplementaires</label><br/>
			<input type="text" name="more_telephone" 
			
			value="{{ isset($referant->more_telephone) ? $referant->more_telephone : old('more_telephone') }}"
			  id="more_telephone" placeholder="Les autres telephones de la personne" >

			<!-- Le message d'erreur pour "telephone" -->
			@error("telephone")
			<div>{{ $message }}</div>
			@enderror
		</p>

		
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



