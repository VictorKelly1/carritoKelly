<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'Default' }}</title>
    <meta name="description" content="{{ $metadescription ?? 'Default description ' }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/styles.css') }}">
</head>

<body>
    <x-navigation />
    <div class="container">
        {{ $slot }}
    </div>

    @isset($sidebar)
        <div id="sidebar">
            <h3 class="carrito-sidebar">Sidebar</h3>
            <div>{{ $sidebar }}</div>
        </div>
    @endisset
</body>

</html>
