<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 >
                Editar cancion
            </h2>
        </div>
    </x-slot>
        <div>
            <!--Trabaja el store-->
            <form action="{{route('tracks.store')}}" method="POST" enctype="multipart/form-data">    
                @csrf
                <input type="text" name="title"  value="{{ old('title', $track->title)}}">
                <a href="{{ route('tracks.index') }}" class="bg-green-300 py-2 px-4 rounded">
                    {{ __('Actualizar') }}
                </a>

                @error('name')
                    <div>{{$message}}</div>
                @enderror
                <input type="file" name="music">
                @error('music')
                <div>{{$message}}</div>
                @enderror
                <br>
               
            </form>   
        </div>
    </x-app-layout>
    