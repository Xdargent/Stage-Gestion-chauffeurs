
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                images for {{$user->name}}
            </h2>
        </div>
    </x-slot>

            <x-button  href="{{ route('users.index') }}" variant="black"
                class="justify-center max-w-xs gap-2">
                <span>Voir Index</span>
            </x-button>
	
<div class="row mt-4">
@if (!isset($images))

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                No images for {{$user->name}}
            </h2>
        </div>
@else
    
			@foreach ($images as $image)
			<div class="col md-2">
                <div class="card text-white bg-secondary mb-3"style="max-width: 20rem;">
                    <div class="card-body text-center">
                    <img src="/user_images/{{$image->image }}"class="card-img-top"> 
                    </div>
                </div>
                    <a  href={{ route('users.remove',$image->id ,$user) }}
                        class="btn btn-danger justify-center max-w-xs gap-2">
                        <span>Delete</span>
                    </a>
            </div>
            @endforeach
@endif
</div>
<div class="card mt-2">
    <form action="{{ route('users.add', $user) }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
                <label for="files" class="form-label mt-4 font-semibold">Upload More Images</label>
                <input type="file" name="image[]"
                id="image" placeholder="Image" multiple>
                <!-- Le message d'erreur pour "image" -->
                @error("image")
                <div>{{ $message }}</div>
                @enderror
        </div>
		
    <div class="py-6" >
                <x-button :variant="'black'" size="'base'" >
                    <span>Valider</span>
                </x-button>
        </div>
    </form>
</div>    
</x-app-layout>
