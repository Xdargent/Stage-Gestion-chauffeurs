
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Liste des utilisateurs') }}
            </h2>
        </div>
    </x-slot>


	<p>
		<!-- Lien pour créer un nouvel article : "users.create" -->
		<a href="{{ route('users.create') }}" title="Créer un article" >Créer un nouveau user</a>
	</p>

	<!-- Le tableau pour lister les articles/users -->
	<table border="1" class="table_user" >
		<thead class="table_user">
			<tr class="table_user"	>
				<th class="table_user">Nom</th>
				<th class="table_user">Telephone</th>
				<th class="table_user">Role</th>
				<th colspan="2" class="table_user">Opérations</th>
			</tr>
		</thead>
		<tbody class="table_user">
			<!-- On parcourt la collection de User -->
			@foreach ($users as $user)
			<tr class="table_user">
				<td class="table_user">
					<p title="Lire l'article" >{{ $user->name  }}</p>
				</td>
				<td class="table_user">
					<p title="Lire l'article" >{{ $user->telephone  }}</p>
				</td>
				<td class="table_user">
					<p title="Lire l'article" >{{ $user->role  }}</p>
				</td>
				<td class="table_user table_modif">
					<!-- Lien pour modifier un User : "users.edit" -->
					<a href="{{ route('users.edit', $user) }}" title="Modifier l'article" >Modifier</a>
				</td class="table_user">
				<td class="table_user table_suppr">
					<!-- Lien pour modifier un User : "users.edit" -->
					<a href={{ route('users.suppr', $user) }}> Supprimer</a>
				</td>
				<td class="table_user table_modif">
					<!-- Lien pour modifier un User : "users.edit" -->
					<a href={{ route('users.images', $user) }}> Voir Images</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	

</x-app-layout>