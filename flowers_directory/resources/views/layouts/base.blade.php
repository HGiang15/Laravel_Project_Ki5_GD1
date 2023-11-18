<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/icon/font_awe/css/all.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>
<body>
     {{-- Header GN --}}
     <header>
        <div class="container-fluid">
            @yield('header')
        </div>
    </header>

    
    {{-- Main Content KN --}}
    <section>
        <div class="container-fluid">
            @yield('main')
        </div>
    </section>


    {{-- Footer GN --}}
    <footer>
        <div class="container-fluid">
            @include('layouts.footer')
        </div>
    </footer>
    <script src="{{ asset('/assets/js/bootstrap.bundle.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>
<script>
    document.getElementById('search_btn').addEventListener('click', function() {
        var regionsInput = document.getElementById('region_name').value;
        var regions = regionsInput.split(',');

        var resultContainer = document.getElementById('result_container');
        resultContainer.innerHTML = ''; // Xoá kết quả trước đó

        // Ví dụ: Lặp qua danh sách các vùng và hiển thị kết quả
        regions.forEach(function(region) {
            var resultElement = document.createElement('p');
            resultElement.textContent = region;
            resultContainer.appendChild(resultElement);
        });

        // Sau khi thực hiện tìm kiếm, có thể làm sạch ô nhập liệu
        document.getElementById('region_name').value = '';
    });
</script>
</html>