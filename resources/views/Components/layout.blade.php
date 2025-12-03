<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Files Info</title>

@vite('resources/css/app.css')

</head>
<body>
  @if (session('success'))
    <div id="flash" class="bg-green-200 text-green-800 p-4 mb-4 rounded">
      {{ session('success') }}
    </div>
  @endif

  <header>
    <nav>
      <h1> 
        <a href="{{ route('Files.index') }}" > Files Information System </a> </h1>
      {{-- <a href="{{ route('Files.index') }}">All Files</a> --}}
      
    @guest
      <a href="{{ route('show.login')}}" class="btn">Login </a>
      <a href="{{ route('show.register')}}" class="btn">Register </a>
    @endguest
    
    @auth
      <span class="border-r-2 pr-2">
         Hello, {{ Auth::user()->name }}
      </span>
      
      <a href="{{ route('Files.create') }}">Add new files</a>

      <form action="{{ route('logout') }}" method="POST" class="m-0">
        @csrf
        <button class="btn btn-danger">Logout</button>
      </form>
    @endauth
    </nav>
  </header>

  <main class="container">
    {{ $slot }}
  </main>

  
</body>
</html>