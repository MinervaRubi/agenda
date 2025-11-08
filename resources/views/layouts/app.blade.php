<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CRUD Estudiantes')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between">
        <div class="font-bold">
            CRUD Estudiantes
        </div>
        <div class="space-x-4">
            <a href="{{ route('students.index') }}" class="hover:underline">Estudiantes</a>
            <a href="{{ route('careers.index') }}" class="hover:underline">Carreras</a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto mt-8">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
