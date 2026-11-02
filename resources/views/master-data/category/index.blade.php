
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-card>

                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">
                        Daftar Kategori
                    </h3>

                    <a href="{{ route('categories.create') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded-md">
                        + Tambah Kategori
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                @forelse ($categories as $category)

                    <div class="border-b py-3">
                        <p class="font-semibold">
                            {{ $category->name }}
                        </p>

                        <p class="text-sm text-gray-600">
                            {{ $category->description }}
                        </p>
                    </div>

                @empty

                    <p class="text-gray-500">
                        Belum ada kategori.
                    </p>

                @endforelse

            </x-card>

        </div>
    </div>

</x-app-layout>
