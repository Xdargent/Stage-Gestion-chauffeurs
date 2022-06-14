
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Liste des utilisateurs') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>


	<p>
		<!-- Lien pour créer un nouvel article : "users.create" -->
		<a href="{{ route('users.create') }}" title="Créer un article" >Créer un nouveau user</a>
	</p>

	<!-- Le tableau pour lister les articles/users -->
	<table border="1" >
		<thead>
			<tr>
				<th>Name</th>
				<th>Telephone</th>
				<th>Role</th>
				<th colspan="2" >Opérations</th>
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de User -->
			@foreach ($users as $user)
			<tr>
				<td>
					<p title="Lire l'article" >{{ $user->name  }}</p>
				</td>
				<td>
					<p title="Lire l'article" >{{ $user->telephone  }}</p>
				</td>
				<td>
					<p title="Lire l'article" >{{ $user->role  }}</p>
				</td>
				<td>
					<!-- Lien pour modifier un User : "users.edit" -->
					<a href="{{ route('users.edit', $user) }}" title="Modifier l'article" >Modifier</a>
				</td>
				<td>
					<!-- Formulaire pour supprimer un User : "users.destroy" -->
					<form method="POST" action="{{ route('users.destroy', $user) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value=" Supprimer " >
					</form>
				</td>
				<td>
					<!-- Lien pour modifier un User : "users.edit" -->
					<a href={{ route('users.images', $user) }}> Voir Images</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	

</x-app-layout>