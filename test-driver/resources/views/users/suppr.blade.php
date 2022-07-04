
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __(' Supprimer un utilisateur ?') }}
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
	<p>Etes vous sur de vouloir supprimer {{ $user->name }} ?  </p>

	<table border="1" class="table_user" >
		<thead class="table_user">
			<tr class="table_user"	>
				<th class="table_user">Nom</th>
				<th class="table_user">Telephone</th>
				<th class="table_user">Role</th>
			</tr>
		</thead>
		<tbody class="table_user">
			<!-- On parcourt la collection de User -->
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
			</tr>
		</tbody>
	</table>

	<!-- Le formulaire est géré par la route "users.update" -->
	<form method="POST" action="{{ route('users.destroy', $user) }}" >
		<!-- CSRF token -->
		@csrf
		<!-- <input type="hidden" name="_method" value="DELETE"> -->
		@method("DELETE")
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

	@endif
    </div>

</x-app-layout>



