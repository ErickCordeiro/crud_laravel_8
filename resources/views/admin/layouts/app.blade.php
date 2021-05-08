<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{config('app.name')}}</title>
</head>
<header>
    <h1>Projeto Padrão do Laravel CRUD</h1>
</header>
<body>
    <div class="content">
        @yield('content')
    </div>
</body>

</html>
