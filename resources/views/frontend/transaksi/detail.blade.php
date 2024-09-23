@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection
@section('frontend')
    <div class="relative flex justify-center w-full max-w-[1280px] gap-6 mx-auto px-10 mt-[96px]">
        <div class="flex flex-col w-full max-w-[665px] shrink-0 rounded-3xl px-[57.5px] py-[46px] gap-6 bg-white">

            <h1 class="font-['ClashDisplay-SemiBold'] text-[32px] leading-10 tracking-05 text-center">Transaction Detail</h1>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05"> {{ $transaksi->created_at }} </p>

            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Kode Transaksi</p>
                <p class="leading-19 tracking-05"> {{ $trx_id }} </p>
            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Sepatu</p>

                <p class="leading-19 tracking-05"> {{ $sepatu->nama }} </p>

            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Ukuran</p>
                @php
                    $size = App\Models\Size::where('sepatu_id', $transaksi->sepatu_id)->first();
                @endphp
                <p class="leading-19 tracking-05"> {{ $size->ukuran }} </p>
            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Harga Produk</p>
                <p class="leading-19 tracking-05"> Rp. {{ number_format($sepatu->harga, 0, ',', '.') }} </p>

            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Kuantitas</p>
                <p class="leading-19 tracking-05"> {{ $transaksi->total_sepatu }} </p>

            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Kode Promo</p>
                <p class="leading-19 tracking-05 text-[#EC0307]">-Rp.
                    {{ $transaksi->voucher ? number_format($transaksi->voucher->harga, 0, ',', '.') : '0' }}</p>
            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Ongkir</p>
                <p class="leading-19 tracking-05"> Rp. {{ number_format($transaksi->ongkir, 0, ',', '.') }} </p>

            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Total Payment</p>
                <p class="leading-19 tracking-05 font-bold">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                </p>
            </div>

            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Payment Status</p>

                @if ($transaksi->status == '1')
                    <p class="rounded-full py-3 px-6 bg-[#E56062] w-fit font-semibold leading-19 tracking-05 text-white">
                        Pending
                    </p>
                @elseif($transaksi->status == '5')
                    <p style="background: yellow"
                        class="rounded-full py-3 px-6  w-fit font-semibold leading-19 tracking-05 text-white">
                        Belum Bayar
                    </p>
                @elseif ($transaksi->status == '2')
                    <p style="background: black"
                        class="rounded-full py-3 px-6  w-fit font-semibold leading-19 tracking-05 text-white">
                        Ditolak
                    </p>
                @elseif ($transaksi->status == '3')
                    <p style="background: blue"
                        class="rounded-full py-3 px-6 bg-[#E56062] w-fit font-semibold leading-19 tracking-05 text-white">
                        Dikirim
                    </p>
                @elseif ($transaksi->status == '4')
                    <p style="background: green"
                        class="rounded-full py-3 px-6 bg-[#E56062] w-fit font-semibold leading-19 tracking-05 text-white">
                        Diterima
                    </p>
                @endif

            </div>
            @if ($transaksi->proof == null)
                <a href="{{ route('frontend.payment', $transaksi->trx_id) }}"
                    class="w-fit rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Bayar</a>
            @endif

        </div>

        <div class="flex flex-col w-full max-w-[356px] h-fit rounded-3xl p-8 gap-6 bg-white">
            <div class="flex w-full h-[200px] rounded-3xl overflow-hidden bg-[#606DE5]">
                <img src="{{ !empty($transaksi->proof) ? url('storage/' . $transaksi->proof) : url('backend/no_image.webp') }}"
                    class="w-full h-full object-cover" alt="icon">
            </div>
            <div class="flex flex-col gap-2">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Proof</p>
                @if ($transaksi->proof != 0)
                    <a href="{{ asset('storage/' . $transaksi->proof) }}" download>
                        Download
                    </a>
                @endif



            </div>

        </div>
    </div>
@endsection
