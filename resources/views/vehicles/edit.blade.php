@foreach($vehicle->images as $image)
    <div class="relative mb-4">
        <img src="{{ asset('storage/' . $image->url) }}" alt="Foto del vehículo" class="w-full h-40 object-cover rounded">
        <div class="absolute top-2 right-2 flex gap-2">
            <form method="POST" action="{{ route('vehicles.images.delete', [$vehicle, $image]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-xs">Eliminar</button>
            </form>
            <form method="POST" action="{{ route('vehicles.images.setMain', [$vehicle, $image]) }}">
                @csrf
                <button type="submit" class="bg-yellow-400 text-dark px-2 py-1 rounded text-xs">Principal</button>
            </form>
        </div>
        @if($vehicle->main_image == $image->url)
            <span class="absolute bottom-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs">Principal</span>
        @endif
    </div>
@endforeach