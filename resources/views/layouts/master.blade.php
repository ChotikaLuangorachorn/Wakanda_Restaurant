<!DOCTYPE html>
<html>
<head>
	<title>WAKANDA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@stack('css')
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>
<!-- header   -->
  <header>
    <img src="/images/theme/header.png" style="width: 100%;">
  </header>
<!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="">WAKANDA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        @yield('menu-bar')
      </ul>
    </div>
  </nav>
<!-- content -->
	<div class="container">
		<div class="row" style="text-align:center;display:block;padding:10px 0px;padding-top:20px;">
				@yield('page-title')
		</div>

		<div class="row" style="display:block">
		@yield('content')
		</div>
	</div>
  <script src="/js/app.js" charset="utf-8"></script>
  @stack("js")
<!-- footer -->
  <footer>Wakanda Restaurant</footer>
</body>
</html>