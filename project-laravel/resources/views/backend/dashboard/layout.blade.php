<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.component.head')
</head>

<body>
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('backend.dashboard.component.sidebar')

        <div id="page-wrapper" class="gray-bg">
            {{-- Nav header --}}
            @include('backend.dashboard.component.nav')
            
            {{-- Wrapper content --}}
            {{-- @include('backend.dashboard.home.index') --}}
            @include($template)

            {{-- Footer --}}
            @include('backend.dashboard.component.footer')
        </div>

        {{-- Right sidebar --}}
        @include('backend.dashboard.component.rightsidebar')
    </div>

    {{-- SCript --}}
    @include('backend.dashboard.component.script')
</body>
</html>
