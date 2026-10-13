@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('heading', 'Edit Tugas')

@section('content')

<div class="mx-auto max-w-3xl">

    {{-- Header --}}
    <div class="mb-8 text-center">

        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 text-3xl text-white shadow-xl shadow-indigo-500/20">
            ✏️
        </div>

        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">
            Edit Tugas
        </h1>

        <p class="mx-auto mt-2 max-w-lg text-sm leading-relaxed text-slate-500">
            Perbarui informasi tugasmu dan pastikan semuanya sudah sesuai.
        </p>

    </div>


    {{-- Main Card --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl shadow-slate-200/50">

        {{-- Card Header --}}
        <div class="border-b border-slate-100 bg-gradient-to-r from-slate-50 via-indigo-50/40 to-purple-50/40 px-6 py-5 md:px-8">

            <div class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-100 text-xl">
                    📝
                </div>

                <div class="min-w-0">

                    <h2 class="font-bold text-slate-800">
                        Informasi Tugas
                    </h2>

                    <p class="truncate text-xs text-slate-500">
                        Mengedit: {{ $todo->title }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Form --}}
        <form
            action="{{ route('todos.update', $todo) }}"
            method="POST"
            class="space-y-6 p-6 md:p-8"
        >

            @csrf
            @method('PUT')


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
                        value="{{ old('title', $todo->title) }}"
                        placeholder="Masukkan judul tugas"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                    >

                </div>

                <p class="mt-2 text-xs text-slate-400">
                    Gunakan judul yang singkat dan mudah dipahami.
                </p>

            </div>


            {{-- Deskripsi --}}
            <div>

                <label
                    for="description"
                    class="mb-2 block text-sm font-bold text-slate-700"
                >
                    Deskripsi
                    <span class="font-normal text-slate-400">
                        (opsional)
                    </span>
                </label>

                <div class="relative">

                    <div class="pointer-events-none absolute left-4 top-4 text-slate-400">
                        📄
                    </div>

                    <textarea
                        id="description"
                        name="description"
                        rows="7"
                        maxlength="5000"
                        placeholder="Tuliskan detail tugas..."
                        class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm leading-6 text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
                    >{{ old('description', $todo->description) }}</textarea>

                </div>

                <p class="mt-2 text-xs text-slate-400">
                    Tambahkan informasi tambahan jika diperlukan.
                </p>

            </div>


            {{-- Status --}}
            <div class="rounded-2xl border border-slate-200 bg-gradient-to-br from-slate-50 to-indigo-50/40 p-5">

                <div class="flex items-start gap-4">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-xl">
                        ✓
                    </div>

                    <div class="flex-1">

                        <label
                            for="is_completed"
                            class="flex cursor-pointer items-start gap-3"
                        >

                            {{-- Default value --}}
                            <input
                                type="hidden"
                                name="is_completed"
                                value="0"
                            >

                            <input
                                id="is_completed"
                                type="checkbox"
                                name="is_completed"
                                value="1"
                                @checked(old('is_completed', $todo->is_completed))
                                class="mt-1 h-5 w-5 shrink-0 cursor-pointer rounded border-slate-300 text-indigo-600 focus:ring-2 focus:ring-indigo-500"
                            >

                            <div>

                                <span class="block text-sm font-bold text-slate-700">
                                    Tandai sebagai selesai
                                </span>

                                <span class="mt-1 block text-xs leading-relaxed text-slate-500">
                                    Aktifkan jika tugas ini sudah selesai dikerjakan.
                                </span>

                            </div>

                        </label>

                    </div>

                </div>

            </div>


            {{-- Current Status --}}
            <div class="rounded-xl border border-slate-100 bg-slate-50 px-4 py-3">

                <div class="flex items-center justify-between gap-3">

                    <span class="text-xs font-medium text-slate-500">
                        Status saat ini
                    </span>

                    @if ($todo->is_completed)

                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-600">
                            <span>✓</span>
                            Selesai
                        </span>

                    @else

                        <span class="inline-flex items-center gap-1.5 rounded-full bg-orange-100 px-3 py-1 text-xs font-bold text-orange-600">
                            <span>●</span>
                            Belum selesai
                        </span>

                    @endif

                </div>

            </div>


            {{-- Buttons --}}
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('todos.index') }}"
                    class="inline-flex min-h-[48px] items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-slate-800"
                >
                    ← Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex min-h-[48px] items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-500/20 transition hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
                >
                    <span>✓</span>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>


    {{-- Bottom Info --}}
    <div class="mt-6 flex items-start gap-3 rounded-2xl border border-indigo-100 bg-gradient-to-r from-indigo-50 to-purple-50 p-5">

        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-lg shadow-sm">
            💡
        </div>

        <div>

            <p class="text-sm font-bold text-indigo-800">
                Jangan lupa menyimpan perubahan
            </p>

            <p class="mt-1 text-xs leading-relaxed text-indigo-600">
                Setelah selesai mengedit, tekan tombol
                <strong>Simpan Perubahan</strong> agar data tugas diperbarui.
            </p>

        </div>

    </div>

</div>

@endsection
