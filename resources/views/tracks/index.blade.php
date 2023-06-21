<x-app-layout>
	<x-slot name="header">
		<div class=" flex justify-between ">
			<h2 >
				Listado de canciones
			</h2>
				<!--tracks.create hace trabajar al TrackController en los controladores-->
				<a href="{{route('tracks.create')}}" class="bg-blue-500 rounded px-4 py-2">
					Nueva cancion
				</a>
		</div>
	</x-slot>
	<div>
		<div class="grid grid-cols-4 gap-2">
			@foreach($tracks as $track)
				<div class="rounded bg-blue-200 p-4">
					<h6>{{$track->title}}</h6>
					<audio controls>
						<source src="{{ $track->getUrl() }}" type="audio/mp3">
					</audio>
					<div class="grid grid-cols-2 gap-2 p-5">
						<form action="{{route('tracks.destroy',$track)}}" method="post">
							@csrf
							@method('delete')
							<button type="submit" class="bg-orange-400 rounded px-4 py-2">Eliminar</button>
						</form>
			
						<a href="{{ route('tracks.edit', ['track' => $track]) }}" class="bg-green-500 rounded px-4 py-2">
							{{ __('Editar') }}
						</a>
						
						</a>			
					</div>
				</div>
				
			@endforeach

		</div>
	</div>
</x-app-layout>