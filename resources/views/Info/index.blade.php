<x-layout>
  <h2>Files Index Page</h2>

  {{-- if blade directive --}}
  {{-- @if($grettings == "Hello There!!")
    <p>Files are available!</p>        
  @endif --}}

  <ul>
    @foreach($Files as $File)
      <li>
        <x-card href="{{ route('Files.show', $File->id) }}" :highlight="$File['size'] > 1">
          <div>
            <h3>{{ $File->filename }}</h3>
            <p>{{ $File->dojo->name }}</p>
          </div>
        </x-card>
      </li>
    @endforeach
  </ul>
 {{-- Pagination links for diff pages --}}
  {{ $Files->links()}}  
</x-layout>
