```blade
@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('heading', 'Daftar Tugas')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <div class="mb-2 flex items-center gap-2 text-sm font-medium text-blue-600">
            <span>📋</span>
            <span>My Tasks</span>
        </div>

        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">
            Daftar Tugas
        </h1>

        <p class="mt-2 text-slate-500">
            Kelola semua tugasmu dan tetap produktif setiap hari.
        </p>
    </div>

    <a
        href="{{ route('todos.create') }}"
        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3 font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-0.5 hover:shadow-xl"
    >
        <span class="text-xl leading-none">+</span>
        Tambah Tugas
    </a>

</div>


{{-- ================= STATISTICS ================= --}}
<div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-3">

    {{-- Total --}}
    <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Total Tugas
                </p>

                <p class="mt-2 text-3xl font-extrabold text-slate-900">
                    {{ $todos->count() }}
                </p>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-2xl">
                📋
            </div>

        </div>

    </div>


    {{-- Belum Selesai --}}
    <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Belum Selesai
                </p>

                <p class="mt-2 text-3xl font-extrabold text-orange-500">
                    {{ $todos->where('completed', false)->count() }}
                </p>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-2xl">
                ⏳
            </div>

        </div>

    </div>


    {{-- Selesai --}}
    <div class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Selesai
                </p>

                <p class="mt-2 text-3xl font-extrabold text-emerald-500">
                    {{ $todos->where('completed', true)->count() }}
                </p>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-2xl">
                ✓
            </div>

        </div>

    </div>

</div>


{{-- ================= TASK LIST ================= --}}
<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    {{-- Card Header --}}
    <div class="flex flex-col gap-3 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h2 class="text-lg font-bold text-slate-900">
                Semua Tugas
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Daftar tugas yang perlu kamu kerjakan.
            </p>
        </div>

        <div class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
            {{ $todos->count() }} tugas
        </div>

    </div>


    {{-- ================= IF TASK EXISTS ================= --}}
    @if ($todos->count() > 0)

        <div class="divide-y divide-slate-100">

            @foreach ($todos as $todo)

                <div class="group p-5 transition hover:bg-slate-50">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        {{-- Task Info --}}
                        <div class="flex items-start gap-4">

                            {{-- Status Icon --}}
                            @if ($todo->completed)

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-lg text-emerald-600">
                                    ✓
                                </div>

                            @else

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-lg text-blue-600">
                                    ○
                                </div>

                            @endif


                            {{-- Title & Description --}}
                            <div>

                                <h3
                                    class="font-bold
                                    {{ $todo->completed
                                        ? 'text-slate-400 line-through'
                                        : 'text-slate-800' }}"
                                >
                                    {{ $todo->title }}
                                </h3>

                                @if ($todo->description)

                                    <p class="mt-1 max-w-xl text-sm text-slate-500">
                                        {{ $todo->description }}
                                    </p>

                                @endif


                                {{-- Status --}}
                                <div class="mt-3">

                                    @if ($todo->completed)

                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                                            ✓ Selesai
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1 rounded-full bg-orange-50 px-3 py-1 text-xs font-semibold text-orange-600">
                                            ● Belum selesai
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- Actions --}}
                        <div class="flex items-center gap-2 sm:shrink-0">

                            {{-- Edit --}}
                            <a
                                href="{{ route('todos.edit', $todo) }}"
                                class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-600 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600"
                            >
                                ✏️ Edit
                            </a>


                            {{-- Delete --}}
                            <form
                                action="{{ route('todos.destroy', $todo) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus tugas ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-600 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                >
                                    🗑️ Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


    {{-- ================= EMPTY STATE ================= --}}
    @else

        <div class="px-6 py-16 text-center">

            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-blue-50 text-4xl">
                📝
            </div>

            <h3 class="mt-5 text-xl font-bold text-slate-800">
                Belum ada tugas
            </h3>

            <p class="mx-auto mt-2 max-w-md text-sm text-slate-500">
                Kamu belum memiliki tugas. Yuk, tambahkan tugas pertamamu dan mulai menjadi lebih produktif!
            </p>

            <a
                href="{{ route('todos.create') }}"
                class="mt-6 inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-700 hover:shadow-xl"
            >
                <span class="text-xl">+</span>
                Tambah Tugas Pertama
            </a>

        </div>

    @endif

</div>


{{-- ================= MOTIVATION ================= --}}
<div class="mt-6 overflow-hidden rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-white shadow-lg">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <p class="text-sm font-medium text-blue-100">
                💡 Daily Reminder
            </p>

            <h3 class="mt-1 text-xl font-bold">
                Satu tugas selesai, satu langkah lebih dekat.
            </h3>

            <p class="mt-1 text-sm text-blue-100">
                Tetap konsisten dan selesaikan tugasmu hari ini.
            </p>

        </div>

        <div class="text-5xl opacity-80">
            🚀
        </div>

    </div>

</div>

@endsection
```
