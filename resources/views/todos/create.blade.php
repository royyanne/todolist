@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('heading', 'Tambah Tugas')

@section('content')

<div class="mx-auto max-w-3xl">

    {{-- Header --}}
    <div class="mb-8 text-center">

        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-3xl text-white shadow-xl shadow-blue-500/20">
            ✨
        </div>

        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">
            Buat Tugas Baru
        </h1>

        <p class="mx-auto mt-2 max-w-lg text-sm text-slate-500">
            Tambahkan tugas baru agar semua pekerjaanmu lebih terorganisir
            dan mudah diselesaikan.
        </p>

    </div>


    {{-- Form Card --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-200/50">

        {{-- Card Header --}}
        <div class="border-b border-slate-100 bg-gradient-to-r from-slate-50 to-blue-50/50 px-6 py-5 md:px-8">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    📝
                </div>

                <div>
                    <h2 class="font-bold text-slate-800">
                        Informasi Tugas
                    </h2>

                    <p class="text-xs text-slate-500">
                        Isi informasi tugas yang ingin kamu tambahkan.
                    </p>
                </div>

            </div>

        </div>


        {{-- Form --}}
        <form
            action="{{ route('todos.store') }}"
            method="POST"
            class="space-y-6 p-6 md:p-8"
        >

            @csrf


            {{-- Judul --}}
            <div>

                <label
                    for="title"
                    class="mb-2 block text-sm font-bold text-slate-700"
                >
                    Judul Tugas
                    <span class="text-red-500">*</span>
                </label>

                <div class="relative">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        📝
                    </div>

                    <input
                        id="title"
                        name="title"
                        type="text"
                        maxlength="255"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Belajar Laravel"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                    >

                </div>

                <div class="mt-2 flex items-center justify-between">

                    <p class="text-xs text-slate-400">
                        Buat judul yang singkat dan jelas.
                    </p>

                    <span class="text-xs text-slate-400">
                        Maks. 255 karakter
                    </span>

                </div>

            </div>


            {{-- Deskripsi --}}
            <div>

                <label
                    for="description"
                    class="mb-2 block text-sm font-bold text-slate-700"
                >
                    Deskripsi
                    <span class="font-normal text-slate-400">(opsional)</span>
                </label>

                <div class="relative">

                    <div class="pointer-events-none absolute left-4 top-4 text-slate-400">
                        📄
                    </div>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        maxlength="5000"
                        placeholder="Tuliskan detail tugas yang harus dikerjakan..."
                        class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                    >{{ old('description') }}</textarea>

                </div>

                <div class="mt-2 flex items-center justify-between">

                    <p class="text-xs text-slate-400">
                        Tambahkan detail agar tugas lebih mudah dipahami.
                    </p>

                    <span class="text-xs text-slate-400">
                        Maks. 5000 karakter
                    </span>

                </div>

            </div>


            {{-- Status --}}
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                <div class="flex items-start gap-4">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-xl">
                        ✓
                    </div>

                    <div class="flex-1">

                        <label
                            for="is_completed"
                            class="flex cursor-pointer items-start gap-3"
                        >

                            <input
                                id="is_completed"
                                type="checkbox"
                                name="is_completed"
                                value="1"
                                @checked(old('is_completed', false))
                                class="mt-1 h-5 w-5 cursor-pointer rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-500"
                            >

                            <div>

                                <span class="block text-sm font-bold text-slate-700">
                                    Tandai sebagai selesai
                                </span>

                                <span class="mt-1 block text-xs leading-relaxed text-slate-500">
                                    Centang jika tugas ini sudah selesai dikerjakan.
                                </span>

                            </div>

                        </label>

                    </div>

                </div>

            </div>


            {{-- Buttons --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('todos.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800"
                >
                    ← Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-500/20 transition hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/20"
                >
                    <span>✓</span>
                    Simpan Tugas
                </button>

            </div>

        </form>

    </div>


    {{-- Bottom Tip --}}
    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-blue-100 bg-blue-50 p-4">

        <div class="text-lg">
            💡
        </div>

        <div>

            <p class="text-sm font-bold text-blue-800">
                Tips produktivitas
            </p>

            <p class="mt-1 text-xs leading-relaxed text-blue-600">
                Pecah tugas besar menjadi beberapa tugas kecil agar lebih
                mudah dikerjakan dan diselesaikan.
            </p>

        </div>

    </div>

</div>

@endsection
