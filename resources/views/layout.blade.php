<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.3/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body data-theme="night" class="min-h-screen">
    <!-- navbar -->
   <div class="navbar bg-base-150">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
        <li><a href="/" class="font-semibold">Home</a></li>
        <li>
         <a href="/" class="font-semibold  border-sky-200">Siswa</a>
          
        </li>
        <li><a href="/pelajaran" class="font-semibold">Pelajaran</a></li>
      </ul>
    </div>
    @if($user)
    <a class="btn btn-ghost normal-case text-xl">{{ Auth::user()->name }}</a>
    @endif()
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a class="font-semibold hover:border-bottom-1 border-gray-800" href="/">Home</a></li>
      <li tabindex="0" class="font-semibold">
       <a class="font-semibold hover:border-bottom-1 border-gray-800" href="/pelajaran">Pelajaran</a>
        
      </li>
      <li><a class="font-semibold hover:border-bottom-1 border-gray-800" href="/">Siswa</a></li>
    
    </ul>
  </div>
  <div class="navbar-end">
      @if($user)
        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                    </button>
                        </form>
      @endif()
      @if(!$user)  
      <a href="/login" class="btn btn-primary btn-sm">Login</a>
      @endif()

  </div>
</div>
    <div class="content md:p-16 p-10 items-center">
        @yield('content')
    </div>
    <!-- <p class="text-center text-italic">Pramudita</p> -->
</body>
</html>