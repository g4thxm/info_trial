<x-layout>
  <form action="{{ route('Files.store') }}" method="POST">
      @csrf

      <h2>Create a New File</h2>

      <!-- File Name -->
      <label for="filename">File Name:</label>
      <input class="bg-gray-200 rounded-lg"
          type="text" 
          id="filename" 
          name="filename"
          value="{{ old('filename') }}" 
          required
      >

      <!-- File Size -->
      <label for="size">File Size (0–50):</label>
      <input class="bg-gray-200 rounded-lg"
          type="number" 
          id="size" 
          name="size" 
          value="{{ old('size')}}"
          required
      >

      <!-- File Type -->
      <label for="type">File Type:</label>
      <input class="bg-gray-200 rounded-lg"
          type="text" 
          id="type" 
          name="type" 
          value="{{ old('type')}}"
          required
      >

      <!-- Dojo Selection -->
      <label for="dojo_id">Dojo:</label>
      <select id="dojo_id" name="dojo_id" class="bg-gray-200 rounded-lg" required>
          <option value="" disabled selected>Select a dojo</option>
          @foreach($dojos as $dojo)
              <option value="{{ $dojo->id }}" {{ old('dojo_id') == $dojo->id ? 'selected' : '' }}>
                  {{ $dojo->name }}
              </option>
          @endforeach
      </select>

      <button type="submit" class="btn mt-4">Create File</button>

      @if ($errors->any())
          <div class="px-4 py-2 bg-red-100">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li class="my-2 text-red-500">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

  </form>
</x-layout>
