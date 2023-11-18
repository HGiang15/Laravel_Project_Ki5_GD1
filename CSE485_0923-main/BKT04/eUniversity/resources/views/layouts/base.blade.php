<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="stylesheet" href="{{ asset('icon/font_awe/css/all.min.css') }}">
</head>
<body class="mx-5">
    
    @include('layouts.header')

    <div class="mx-5">
        <div class="mx-5">
            <div class="mx-5">
                @yield('main')
            </div>
        </div>
    </div>
    
    @include('layouts.footer')
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    var element = document.getElementById("@yield('header')");
    element.className = 'nav-link active';
</script>
<script src="{{asset('js/nofication.js') }}"></script>
<script>
    @if(session('success'))
        showNotification("{{ session('success') }}", "success");
    @endif
    @if(session('warning'))
        showNotification("{{ session('warning') }}", "warning");
    @endif

    @if(session('error'))
        showNotification("{{ session('error') }}", "error");
    @endif
    @if(session('infor'))
        showNotification("{{ session('infor') }}", "infor");
    @endif
</script>
</html>