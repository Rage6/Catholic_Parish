<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cemetery | Sacred Heart of Jesus Catholic Church</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/master/360.css') }}" rel="stylesheet">
        <link href="{{ asset('css/master/1000.css') }}" rel="stylesheet" media="screen and (min-width: 1000px)">
        <link rel="stylesheet" href="https://use.typekit.net/ooy8rdv.css">
        @if ($css)
          <link href="{{ asset('css/'.$css.'/360.css') }}" rel="stylesheet">
          <link href="{{ asset('css/'.$css.'/1000.css') }}" rel="stylesheet" media="screen and (min-width: 1000px)">
        @endif

        <!-- jQuery 3.6.0 -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- Due to Vue -->
        <script src="{{ mix('/js/app.js') }}"></script>

        <!-- Custom Javascript -->
        <script src="{{ asset('js/master.js') }}"></script>
    </head>
    <body>
      <div id="app">
      <div class="allContent">
        <div class="mainMenuBar primaryFont primaryBackground">
          <!-- <a href="{{ route('cemetery.index') }}"> -->
            <div class="logo">
            </div>
          <!-- </a> -->
          <div class="menuBox">
            <div id="mainMenuBttn" class="mainMenuBttn">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        <!-- @if (Route::has('login'))
          <div>
            @auth
              <a href="{{ url('/home') }}">My Account</a>
            @else
              <a href="{{ route('login') }}">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
              @endif
            @endauth
          </div>
        @endif -->
        </div>
        <div id="mainMenuTable" class="mainMenuTable">
          <div>
            <a href="{{ route('cemetery.index') }}">
              Home
            </a>
          </div>
          @if (Route::has('login'))
            <div>
              @auth
                <a href="{{ url('/home') }}">My Account</a>
              @else
                <a href="{{ route('login') }}">Log in</a></br>
                @if (Route::has('register'))
                  <a href="{{ route('register') }}">Register</a>
                @endif
              @endauth
            </div>
          @endif
        </div>

        @yield('content')

      </div>

      <!-- Footer -->
      <footer class="primaryBackground">
        <div class="primaryFont">
          <div>Sacred Heart of Jesus Catholic Church</div>
          <div>5742 State Route 61 S</div>
          <div>Shelby, Ohio 44875</div>
        </div>
        <!-- /.container -->
      </footer>
      </div>
    </body>
</html>
