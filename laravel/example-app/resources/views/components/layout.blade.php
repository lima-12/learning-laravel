<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>

            @auth
                <a href="{{ route('logout') }}">Sair</a>
            @endauth
            @guest
                <div>
                    <a class="btn btn-primary" href="{{ route('series.index') }}">Séries</a>
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                </div>
            @endguest
        </div>
    </nav>

    <div class="container">
        <h2 style="text-align: center"> {{ $title }} </h2>

        @isset($mensagemSucesso)
            <div class="mt-3 mb-4">
                <alert class="alert alert-info">
                    {{ $mensagemSucesso }}
                </alert>
            </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>

</body>
</html>
<?php
