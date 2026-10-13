@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('heading', 'Detail Tugas')

@section('content')

<div class="mx-auto max-w-4xl">

    {{-- Top Navigation --}}
    <div class="mb-6 flex items-center justify-between">

        <a
            href="{{ route('todos.index') }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:-translate-x-0.5 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600"
        >
            ← Kembali
        </a>

        <div class="text-xs font-medium text-slate-400">
            Task #{{ $todo->id }}
        </div>

    </div>


    {{-- Main Card --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-200/60">

        {{-- Premium Header --}}
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-700 px-6 py-10 text-white md:px-10">

            {{-- Decorative circles --}}
            <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-24 -left-16 h-56 w-56 rounded-full bg-white/10"></div>

            <div class="relative">

                {{-- Status --}}
                @if ($todo->is_completed)

                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/15 px-4 py-2 text-sm font-semibold text-white backdrop-blur-md">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-400 text-xs text-white">
                            ✓
                        </span>

                        Tugas Selesai
                    </div>

                @else

                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/15 px-4 py-2 text-sm font-semibold text-white backdrop-blur-md">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-orange-400 text-xs text-white">
                            !
                        </span>

                        Belum Selesai
                    </div>

                @endif


                {{-- Title --}}
                <h1 class="max-w-3xl text-3xl font-extrabold leading-tight tracking-tight md:text-4xl">
                    {{ $todo->title }}
                </h1>

                <p class="mt-3 text-sm text-blue-100">
                    Detail tugas dan informasi pekerjaan
                </p>

            </div>

        </div>


        {{-- Content --}}
        <div class="p-6 md:p-10">

            {{-- Status Section --}}
            <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- Status Card --}}
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                    <div class="flex items-center gap-4">

                        @if ($todo->is_completed)

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-xl text-emerald-600">
                                ✓
                            </div>

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                                    Status
                                </p>

                                <p class="mt-1 font-bold text-emerald-600">
                                    Selesai
                                </p>
                            </div>

                        @else

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-xl text-orange-600">
                                ○
                            </div>

                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                                    Status
                                </p>

                                <p class="mt-1 font-bold text-orange-600">
                                    Belum Selesai
                                </p>
                            </div>

                        @endif

                    </div>

                </div>


                {{-- ID Card --}}
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-xl">
                            📋
                        </div>

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                                Task ID
                            </p>

                            <p class="mt-1 font-bold text-slate-800">
                                #{{ $todo->id }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Description --}}
            <div>

                <div class="mb-4 flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-lg">
                        📄
                    </div>

                    <div>
                        <h2 class="font-bold text-slate-800">
                            Deskripsi Tugas
                        </h2>

                        <p class="text-xs text-slate-400">
                            Informasi lengkap mengenai tugas ini
                        </p>
                    </div>

                </div>


                <div class="min-h-[160px] rounded-2xl border border-slate-200 bg-slate-50 p-6">

                    @if ($todo->description)

                        <p class="whitespace-pre-line text-sm leading-7 text-slate-600">
                            {{ $todo->description }}
                        </p>

                    @else

                        <div class="flex min-h-[110px] flex-col items-center justify-center text-center">

                            <div class="mb-3 text-3xl opacity-60">
                                📝
                            </div>

                            <p class="text-sm font-medium text-slate-500">
                                Tidak ada deskripsi
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                Tugas ini tidak memiliki deskripsi tambahan.
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- Actions --}}
            <div class="mt-8 flex flex-col gap-3 border-t border-slate-100 pt-8 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('todos.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-800"
                >
                    ← Kembali ke Daftar
                </a>

                <a
                    href="{{ route('todos.edit', $todo) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-0.5 hover:shadow-xl"
                >
                    ✏️
                    Edit Tugas
                </a>

            </div>

        </div>

    </div>


    {{-- Bottom Info --}}
    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-indigo-100 bg-gradient-to-r from-indigo-50 to-blue-50 p-5">

        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-lg shadow-sm">
            💡
        </div>

        <div>

            <p class="text-sm font-bold text-indigo-800">
                Tetap produktif!
            </p>

            <p class="mt-1 text-xs leading-relaxed text-indigo-600">
                Selesaikan satu tugas pada satu waktu. Konsistensi kecil
                setiap hari akan menghasilkan kemajuan besar.
            </p>

        </div>

    </div>

</div>

@endsection
