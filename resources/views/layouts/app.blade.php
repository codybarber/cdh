<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>CDH - @yield('title')</title>


      <script>
          window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
          ]) !!};
      </script>

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://daigofuji.github.io/bbclub-font/css/bbclub-font.css">
      <link rel="stylesheet" href="../../css/all.css">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/561739b63f.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>

      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">CDH</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teams <span class="caret"></span></a>
                <ul class="dropdown-menu team-list">
                  {{-- <li><a href="/teams">View All</a></li>
                  <li role="separator" class="divider"></li> --}}
                  <li>
                    <a href="/teams/angels"><i class="bb-LAA"></i><span> Angels</span></a>
                  </li>
                  <li>
                    <a href="/teams/bluejays"><i class="bb-TOR"></i><span> Blue Jays</span></a>
                  </li>
                  <li>
                    <a href="/teams/braves"><i class="bb-ATL"></i><span> Braves</span></a>
                  </li>
                  <li>
                    <a href="/teams/brewers"><i class="bb-MIL"></i><span> Brewers</span></a>
                  </li>
                  <li>
                    <a href="/teams/cubs"><i class="bb-CHC"></i><span> Cubs</span></a>
                  </li>
                  <li>
                    <a href="/teams/dodgers"><i class="bb-LAD"></i><span> Dodgers</span></a>
                  </li>
                  <li>
                    <a href="/teams/giants"><i class="bb-SF"></i><span> Giants</span></a>
                  </li>
                  <li>
                    <a href="/teams/indians"><i class="bb-CLE"></i><span> Indians</span></a>
                  </li>
                  <li>
                    <a href="/teams/mariners"><i class="bb-SEA"></i><span> Mariners</span></a>
                  </li>
                  <li>
                    <a href="/teams/marlins"><i class="bb-MIA"></i><span> Marlins</span></a>
                  </li>
                  <li>
                    <a href="/teams/mets"><i class="bb-NYM"></i><span> Mets</span></a>
                  </li>
                  <li>
                    <a href="/teams/orioles"><i class="bb-BAL"></i><span> Orioles</span></a>
                  </li>
                  <li>
                    <a href="/teams/phillies"><i class="bb-PHI"></i><span> Phillies</span></a>
                  </li>
                  <li>
                    <a href="/teams/pirates"><i class="bb-PIT"></i><span> Pirates</span></a>
                  </li>
                  <li>
                    <a href="/teams/tigers"><i class="bb-DET"></i><span> Tigers</span></a>
                  </li>
                  <li>
                    <a href="/teams/yankees"><i class="bb-NYY"></i><span> Yankees</span></a>
                  </li>
                </ul>
              </li>
              <li><a href="/leaders">League Leaders</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="container-fluid app-wrapper" id="app">
          @yield('content')
      </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
</html>
