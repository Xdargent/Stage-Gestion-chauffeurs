
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Liste des referants') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>


	<p>
		<!-- Lien pour créer un nouvel article : "referants.create" -->
		<a href="{{ route('referants.create') }}" title="Créer un article" >Créer un nouveau referant</a>
	</p>

	<!-- Le tableau pour lister les articles/referants -->
	<table border="1" >
		<thead>
			<tr>
				<th>Name</th>
				<th>Infos</th>
				<th>Telephone</th>
				<th>Telephones supplementaires</th>
				<th colspan="2" >Opérations</th>
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de Referant -->
			@foreach ($referants as $referant)
			<tr>
				<td>
					<p title="Lire l'article" >{{ $referant->name  }}</p>
				</td>
				<td>
					<p title="Lire l'article" >{{ $referant->infos  }}</p>
				</td>
				<td>
					<p title="Lire l'article" >{{ $referant->telephone  }}</p>
				</td>
				<td>
					<p title="Lire l'article" >{{ $referant->more_telephone  }}</p>
				</td>
				<td>
					<!-- Lien pour modifier un Referant : "referants.edit" -->
					<a href="{{ route('referants.edit', $referant) }}" title="Modifier l'article" >Modifier</a>
				</td>
				<td>
					<!-- Formulaire pour supprimer un Referant : "referants.destroy" -->
					<form method="POST" action="{{ route('referants.destroy', $referant) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value=" Supprimer" >
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	

</x-app-layout>