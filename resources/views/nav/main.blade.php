<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @include('nav.app')

    <div class="container-fluid">
        <div class="row">
            @include('nav.sidebar')

            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>

@include('nav.footer')
</body>
</html>
