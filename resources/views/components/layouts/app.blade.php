<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Laravel - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Proyecto de aprendizaje hecho con Laravel' }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <style>
        .status {
            border: 1px solid silver;
            font-weight: bold;
            padding: 1rem;
            background-color: rgba(255,255,255, 0.7);
            backdrop-filter: blur(7px);
            position: sticky;
            top: 5px;
        }

        .status.success {
            border-color:green;
            color: #fff;
            background-color: rgba(0,128,0, 0.6) !important;
        }

        .status.updated {
            border-color:skyblue;
            color: #fff;
            background-color: rgba(135, 206, 235, 0.7) !important;
        }

        .status.deleted {
            border-color:gold;
            color: rgb(163, 139, 4);
            background-color: rgba(255, 215, 0, 0.5) !important;
        }
    </style>
</head>

<body class="antialiased bg-slate-100 dark:bg-slate-900">

    <x-layouts.navigation />
    
    @if ( session('success') )
        <div class="status success">
            {{ session('success') }}
        </div>
    @endif

    @if ( session('updated') )
        <div class="status updated">
            {{ session('updated') }}
        </div>
    @endif

    @if ( session('deleted') )
        <div class="status deleted">
            {{ session('deleted') }}
        </div>
    @endif

    {{ $slot }}
    
</body>
</html>