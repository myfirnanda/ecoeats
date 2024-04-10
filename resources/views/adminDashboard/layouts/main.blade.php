<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('pageTitle')</title>
</head>
<body class="min-h-screen text-gray-800 font-inter">
    @include('adminDashboard.partials.sidebar')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        @include('adminDashboard.partials.navbar')
        <div class="p-6">
            @yield('content')
        </div>
    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>