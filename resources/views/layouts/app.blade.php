<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
        <link href="{{asset('/css/app.css')}}" rel="stylesheet"/>
        <title>@yield('title','Luany Store')</title>
</head>
<body>
    <!--header-->
    <nav class="navbar navbar-epand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{route('home.index')}}">Luany Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAtlMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>   
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{route('home.index')}}">Página Inicial</a>
                    <a class="nav-link active" href="{{route('home.index')}}">Sobre</a>
                </div>
            </div>
        </div>
    </nav>

<header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex aligin-items-center flex-column">
        <h2>@yield('subtitle','Loja Virtual')</h2>
    </div>
</header>
<!--header-->

<div class="container my-4">
    @yield('content')
</div>

<!--footer-->
<div class="copyright py-4 text-center text-white">
    <div class="container">
        <small>
            Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
            href="https://www.linkedin.com/in/luany-boneli-40a827230/">
            Luany Boneli
</a> - <b>Luany Boneli</b>
</small>
</div>
</div>
<!--footer-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>
</html>





