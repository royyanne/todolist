```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Daftar Tugas') — Todo App</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <!-- Background Decoration -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-40 h-96 w-96 rounded-full bg-blue-300/20 blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 h-96 w-96 rounded-full bg-indigo-300/20 blur-3xl"></div>
    </div>


    <!-- ================= NAVBAR ================= -->
    <header class="sticky top-0 z-50 border-b border-white/20 bg-white/80 backdrop-blur-xl shadow-sm">

        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">

            <!-- Logo -->
            <a
                href="{{ route('todos.index') }}"
                class="group flex items-center gap-3"
            >

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-xl text-white shadow-lg shadow-blue-500/30 transition group-hover:scale-105"
                >
                    ✓
                </div>

                <div>
                    <h1 class="text-lg font-extrabold tracking-tight text-slate-900">
                        Todo<span class="text-blue-600">App</span>
                    </h1>

                    <p class="text-xs text-slate-500">
                        Laravel Task Manager
                    </p>
                </div>

            </a>


            <!-- Navigation -->
            <nav class="flex items-center gap-2">

                <a
                    href="{{ route('todos.index') }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold text-slate-600 transition hover:bg-blue-50 hover:text-blue-600"
                >
                    Dashboard
                </a>

                <a
                    href="{{ route('todos.create') }}"
                    class="group flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-0.5 hover:shadow-xl"
                >
                    <span class="text-lg leading-none">+</span>
                    Tambah Tugas
                </a>

            </nav>

        </div>

    </header>


    <!-- ================= MAIN ================= -->
    <main class="mx-auto min-h-[calc(100vh-160px)] max-w-6xl px-6 py-10">


        <!-- Page Header -->
        <div class="mb-8">

            <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                <span class="h-2 w-2 rounded-full bg-blue-500"></span>
                Task Manager
            </div>

            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 md:text-4xl">
                @yield('heading', 'Kelola Tugasmu')
            </h2>

            <p class="mt-2 max-w-2xl text-slate-500">
                Atur tugas, pantau pekerjaan, dan selesaikan semuanya dengan lebih terorganisir.
            </p>

        </div>


        <!-- ================= SUCCESS ALERT ================= -->
        @if (session('success'))

            <div
                role="status"
                class="mb-6 flex items-start gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 p-5 shadow-sm"
            >

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-lg font-bold text-white">
                    ✓
                </div>

                <div>
                    <p class="font-bold text-emerald-800">
                        Berhasil!
                    </p>

                    <p class="mt-1 text-sm text-emerald-700">
                        {{ session('success') }}
                    </p>
                </div>

            </div>

        @endif


        <!-- ================= ERROR ALERT ================= -->
        @if ($errors->any())

            <div
                role="alert"
                class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 shadow-sm"
            >

                <div class="flex items-start gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-500 text-lg font-bold text-white">
                        !
                    </div>

                    <div class="flex-1">

                        <p class="font-bold text-red-800">
                            Periksa kembali isianmu
                        </p>

                        <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        <!-- ================= CONTENT CARD ================= -->
        <div
            class="rounded-3xl border border-slate-200 bg-white/90 p-6 shadow-xl shadow-slate-200/50 backdrop-blur md:p-8"
        >

            @yield('content')

        </div>

    </main>


    <!-- ================= FOOTER ================= -->
    <footer class="border-t border-slate-200 bg-white">

        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-3 px-6 py-6 text-center md:flex-row md:text-left">

            <div>

                <p class="text-sm font-semibold text-slate-700">
                    TodoApp
                </p>

                <p class="text-xs text-slate-400">
                    Simple task management for everyday productivity.
                </p>

            </div>

            <div class="text-xs text-slate-400">
                Laravel 13 · Blade · SQLite · Tailwind CSS
            </div>

        </div>

    </footer>

</body>

</html>
```
