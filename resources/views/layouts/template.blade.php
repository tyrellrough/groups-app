<!doctype html>
<html lang="en">
    <head>
      <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
      @livewireStyles
    </head>

    <header id="header">
    <nav id="nav-bar">
      <a href="{{ route('groups.index') }}" class="header-img"><img id="header-img" src="{{ asset('images/logo.png') }}" alt="logo"></a>    
      <label class="logo-text">@yield('title')</label>
      <ul>
        <li><a href="{{ route('groups.index') }}" class="nav-link">Groups</a></li>
        <li><a href="#information" class="nav-link">Users</a></li>
      </ul>
    </nav>
  </header>
  

    <body>

    <div id="content">
        @yield('content')
    </div>
    @livewireScripts
    </body>
</html>