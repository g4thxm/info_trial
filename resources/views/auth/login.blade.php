<x-layout>
  <form action="{{ route('login') }}" method="POST">
    @csrf

    <h2>Log In to Your Account</h2>

    <label for="email">Email:</label>
    <input class="bg-gray-200 rounded-lg"
      type="email"
      name="email"
      required
      value="{{ old('email') }}"
    >

    <label for="password">Password:</label>
    <input class="bg-gray-200 rounded-lg"
      type="password"
      name="password"
      required
    >

    <button type="submit" class="btn mt-4">Log in</button>

    <!-- validation errors -->
  
    @if ($errors->any())
      <div class="bg-red-200 text-red-800 p-4 mt-4 rounded">
        <ul>
          @foreach ($errors->all() as $error)
            <li class="my-2 text-red-500">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </form>
</x-layout>