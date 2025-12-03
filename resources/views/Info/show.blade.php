<x-layout>
  <h2>
   {{ $files->filename }} 
  </h2>

  <div class="bg-gray-200 p-4 rounded">
    <p><strong>Size:</strong> {{ $files->size }} MB</p>
    <p><strong>Type:</strong> {{ $files->type }}</p>
    <p><strong>Uploaded At:</strong> {{ $files->created_at->format('d M Y, H:i') }}</p>
  </div>

  <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
    <h3>Associated Dojo:</h3>
    <p><strong>Name:</strong> {{ $files->dojo->name }}</p>
    <p><strong>Description:</strong> {{ $files->dojo->description }}</p>
  </div>

  <form action="{{ route('Files.destroy', $files->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?');">
      Delete File
    </button>
  </form>
</x-layout>