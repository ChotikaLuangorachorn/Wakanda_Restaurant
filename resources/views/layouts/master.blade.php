<!DOCTYPE html>
<html>
<head>
	<title>Wakanda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@stack('css')
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<!-- header   -->
  <header>
    <img src="/images/theme/header.png">
  </header>
<!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        @yield('menu-bar')
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<!-- content -->
	<div class="container">
		<div class="row">
			<div class='col-12' style="text-align: center; font-size: 1.5em;">
				@yield('page-title')
			</div>
		</div>

		<!-- <div class="row"> -->
		@yield('content')
		<!-- </div> -->
	</div>
  <script src="/js/app.js" charset="utf-8"></script>
  @stack("js")
<!-- footer -->
  <footer>ffew</footer>
</body>
</html>