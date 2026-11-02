<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
            <div class="mb-4 rounded bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('products.create') }}"
                    class="rounded bg-blue-600 px-4 py-2 text-white">
                    + Tambah Produk
                </a>
            </div>

            <div class="overflow-x-auto rounded-lg bg-white shadow">

                <form method="GET" action="{{ route('products.index') }}" class="flex gap-3 mb-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama atau kode produk..."
                        class="flex-1 rounded-md border-gray-300 shadow-sm">

                    <select name="category_id" class="rounded-md border-gray-300">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category_id')==$category->id)>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Cari</button>
                    <a href="{{ route('products.index') }}" class="px-4 py-2 text-gray-500">Reset</a>
                </form>


                <table class="w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3">No.</th>
                            <th class="p-3">Kode</th>
                            <th class="p-3">Nama Produk</th>
                            <th class="p-3">Kategori</th>
                            <th class="p-3">Satuan</th>
                            <th class="p-3 text-right">Harga</th>
                            <th class="p-3 text-right">Total Nilai Stok</th>
                            <th class="p-3 text-center">Stok</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                        <tr class="border-t
                                @if ($product->stock == 0)
                                    bg-red-50
                                @elseif ($product->stock < 10)
                                    bg-yellow-50
                                @endif
                            ">
                            <td class="p-3">
                                {{ $products->firstItem() + $loop->index }}
                            </td>

                            <td class="p-3">
                                {{ $product->code }}
                            </td>

                            <td class="p-3">
                                {{ $product->name }}
                            </td>

                            <td class="p-3">
                                {{ $product->category->name ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $product->unit }}
                            </td>

                            <td class="p-3 text-right">
                                {{ $product->priceRupiah }}
                            </td>

                            <td class="p-3 text-right">
                                Rp {{ number_format(
                                        $product->price * $product->stock,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                            </td>

                            <td class="p-3 text-center font-semibold">
                                {{ $product->stock }}

                                @if ($product->stock == 0)
                                <span class="block text-xs text-red-600">
                                    Habis
                                </span>
                                @elseif ($product->stock < 10)
                                    <span class="block text-xs text-yellow-600">
                                    Menipis
                                    </span>
                                    @endif
                            </td>


                            <td class="p-3 text-center whitespace-nowrap">
                                <a href="{{ route('products.edit', $product) }}"
                                    class="text-indigo-600 hover:underline mr-2">
                                    Ubah
                                </a>
                                <a href="{{ route('products.show', $product) }}" class="text-gray-600">Detail</a>


                                <form action="{{ route('products.destroy', $product) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}?')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="9"
                                class="p-4 text-center text-gray-500">
                                Belum ada data produk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>