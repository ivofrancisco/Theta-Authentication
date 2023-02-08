<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/Admin.css') }}">
    
</head>
<body onload="@if (in_array(Route::currentRouteName(), ['admin.articles.create', 'admin.articles.edit', 'admin.placards.create', 'admin.placards.edit', 'admin.services.create', 'admin.services.edit', 'admin.galleries.create', 'admin.galleries.edit']))  editor.enableEditMode()  @endif">

    @include('admin.partials.topbar')

    @yield('content')

            <!-- Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
            <!-- App JS -->
            <script src="{{ asset('/js/app.js') }}"></script>

        @if(in_array(Route::currentRouteName(), ['admin.articles.create', 'admin.placards.create', 'admin.services.create', 'admin.galleries.create', 'admin.users.profile', 'admin.articles.edit', 'admin.services.create', 'admin.services.edit',  'admin.placards.edit', 'admin.galleries.edit', 'admin.settings']))
            <script src="{{ asset('/js/mdEditor.js') }}"></script>
            <script src="{{ asset('/js/editor.js') }}"></script>
            <script src="{{ asset('/js/setFont.js') }}"></script>
            <script src="{{ asset('/js/iframeToTextarea.js') }}"></script>
            <script src="{{ asset('/js/openUploader.js') }}"></script>
            <script src="{{ asset('/js/selectImage.js') }}"></script>
        @endif

        @if(in_array(Route::currentRouteName(), ['admin.headers.create', 'admin.headers.edit']))
            <script src="{{ asset('/js/mdEditor.js') }}"></script>
            <script src="{{ asset('/js/editor.js') }}"></script>
            <script src="{{ asset('/js/openUploader.js') }}"></script>
            <script src="{{ asset('/js/selectImage.js') }}"></script>
            <script src="{{ asset('/js/updateImage.js') }}"></script>
        @endif

        @if(in_array(Route::currentRouteName(), ['admin.articles.edit', 'admin.services.edit',  'admin.placards.edit', 'admin.galleries.edit', 'admin.users.profile', 'admin.settings']))
            <script src="{{ asset('/js/editItem.js') }}"></script>
            <script src="{{ asset('/js/updateImage.js') }}"></script>
        @endif

        @if(in_array(Route::currentRouteName(), ['admin.quotations.edit']))
            <script src="{{ asset('/js/quotation.js') }}"></script>
        @endif

        @if (in_array(Route::currentRouteName(), ['admin.galleries', 'admin.articles', 'admin.headers', 'admin.placards', 'admin.services', 'admin.quotations.show', 'admin.users.profile']))
            <script src="{{ asset('/js/confirm.js') }}"></script>
        @endif

        @if (in_array(Route::currentRouteName(), ['admin.settings']))
            <script src="{{ asset('/js/siteMapSlider.js') }}"></script>
        @endif

        @yield('scripts')
</body>
</html>

