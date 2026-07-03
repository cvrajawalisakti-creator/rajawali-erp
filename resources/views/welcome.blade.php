<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-100">

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-2xl shadow-xl p-10 text-center w-[480px]">

        <h1 class="text-4xl font-bold text-slate-800">
            RSIS
        </h1>

        <p class="text-slate-500 mt-2">
            Rajawali Sakti Information System
        </p>

        <div class="mt-10">

            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
                Enter RSIS
            </a>

        </div>

        <div class="mt-12 text-sm text-slate-400">

            Version 0.1.0

        </div>

    </div>

</div>

</body>
</html>