@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    <main id="content" class="relative flex w-full max-w-[1280px] gap-6 mx-auto px-10 mt-[96px]">
        <section id="details" class="flex flex-col gap-6 w-full max-w-[820px] flex-1">
            <div id="main-thumbnail" class="w-full h-[453px] rounded-3xl bg-[#06425E] overflow-hidden">
                <img src="{{ asset('storage/' . $sepatu->sepatuFoto->first()->foto) }}" class="w-full h-full object-cover"
                    alt="main thumbnail">
            </div>
            <div id="gallery" class="grid grid-cols-4 gap-4">
                @foreach ($sepatufoto as $item)
                    <button
                        class="w-full rounded-2xl bg-[#D9D9D9] overflow-hidden transition-all duration-300 ring-[3px] {{ $loop->first ? 'ring-[#835DFE] ' : 'opacity-50' }}"
                        style="{{ $loop->first ? 'border-color: #835DFE !important;' : '' }}">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover" alt="thumbnail">
                    </button>
                @endforeach
            </div>

        </section>
        <form action="{{ route('frontend.detail.checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="slug" value="{{ $sepatu->slug }}">
            <aside class="flex flex-col gap-6">
                <div class="flex flex-col w-full rounded-3xl p-8 gap-6 bg-white">
                    <p class="text-box leading-19 tracking-05 text-bold" style="font-weight: bold;font-size:20px">
                        {{ $sepatu->nama }} </p>

                    <p class="leading-19 tracking-05 text-bold" style="font-weight: bold;font-size:20px"">Rp.
                        {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
                    <div class="flex items-center gap-4">

                        <p class="leading-19 tracking-05">Stok: {{ $sepatu->stock }} </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <p class="text-box leading-19 tracking-05"> {{ $sepatu->ket }} </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <p class="text-box leading-19 tracking-05"> Size </p>
                    </div>
                    <div class="flex items-center gap-4">
                        @foreach ($size as $item)
                            <label class="flex items-center gap-2">

                                <span style="padding:20px ;"
                                    class="rounded-full  bg-[#9FDDFF] font-semibold leading-19 tracking-05 text-white text-center peer-checked:bg-blue-600">
                                    <input type="radio" name="size_id" value="{{ $item->id }}" class="hidden peer"
                                        required>
                                    {{ $item->ukuran }}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex items-center gap-4">
                        <p class="text-box leading-19 tracking-05"> Kuantitas </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="button" onclick="decrementValue()" style="background: black"
                            class="rounded-full py-3 px-6  font-semibold leading-19 tracking-05 text-white">-</button>
                        <input name="total_sepatu" style="width: 200px;" type="number" id="quantity" value="1"
                            class="rounded-full py-3 px-6 bg-[#9FDDFF] font-semibold leading-19 tracking-05 text-white text-center"
                            readonly>
                        <button style="background: rgb(118, 215, 118)" type="button" onclick="incrementValue()"
                            class="rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white">+</button>
                    </div>
                    <button type="submit" onclick="checkStockAndSubmit()"
                        class="rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">
                        Beli Sekarang
                    </button>
                </div>

            </aside>
    </main>
    </form>


    <script>
        var stock = {{ $sepatu->stock }}; // Ambil nilai stok dari PHP

        function incrementValue() {
            var input = document.getElementById('quantity');
            var value = parseInt(input.value);
            if (value < stock) { // Cek apakah quantity lebih kecil dari stok
                input.value = value + 1;
            } else {
                alert('Stok Tidak Mencukupi!');
            }
        }

        function decrementValue() {
            var input = document.getElementById('quantity');
            var value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        }

        function checkStockAndSubmit() {
            var quantity = parseInt(document.getElementById('quantity').value);
            if (stock === 0) { // Jika stok 0
                alert('Stok habis! Tidak bisa melakukan pembelian.');
            } else if (quantity > stock) { // Jika jumlah lebih dari stok
                alert('Jumlah pembelian melebihi stok yang tersedia!');
            }
        }
    </script>
@endsection
