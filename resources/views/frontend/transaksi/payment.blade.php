@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    <form action="{{ route('proof') }}" method="POST" enctype="multipart/form-data" id="content"
        class="relative flex w-full max-w-[1280px] gap-6 mx-auto px-10 mt-[96px]">
        @csrf
        <div class="flex flex-col gap-6 w-full max-w-[820px] shrink-0">
            <!-- Account Details -->
            <div id="account" class="flex flex-col w-full rounded-3xl p-8 gap-6 bg-white">
                <div class="flex flex-col gap-2">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Account Details</p>
                    <p class="text-sm leading-16 tracking-03 opacity-60">Confirm and make sure your contact before checkout
                    </p>
                    <p class="text-sm leading-16 tracking-03 opacity-60">{{ $transaksi->created_at }}
                    </p>
                </div>
                <hr class="border-black opacity-10">
                <div class="group flex items-center justify-between">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Nama</p>
                    <p class="leading-19 tracking-05">{{ Auth::user()->name }}</p>
                </div>
                <div class="group flex items-center justify-between">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">No Hp</p>
                    <p class="leading-19 tracking-05">{{ Auth::user()->hp }}</p>
                </div>
                <div class="group flex items-center justify-between">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Email</p>
                    <p class="leading-19 tracking-05">{{ Auth::user()->email }}</p>
                </div>
                <div class="group flex items-center justify-between">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Alamat</p>
                    <p class="leading-19 tracking-05">{{ Auth::user()->alamat }}</p>
                </div>
            </div>

            <!-- Booking Items -->
            <div id="booking-items" class="flex flex-col w-full rounded-3xl p-8 gap-6 bg-white">
                <div class="flex flex-col gap-2">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Kode Transaksi:
                        <span class="text-[#606DE5]">{{ $trx_id }}</span>
                    </p>
                </div>
                <div class="items flex flex-nowrap gap-4 w-full">
                    <img src="{{ asset('frontend/assets/images/icons/cart.svg') }}" class="w-10 h-10 flex shrink-0"
                        alt="icon">
                    <div class="flex flex-col gap-2 w-full">
                        <div class="flex justify-between">

                            <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">{{ $transaksi->sepatus->nama }}
                            </p>

                        </div>
                        <p class="text-sm leading-16 tracking-03 opacity-60">
                            Ukuran
                            @php
                                $size = App\Models\Size::where('sepatu_id', $transaksi->sepatu_id)->first();
                            @endphp
                            {{ $size->ukuran }} Kuantitas {{ $transaksi->total_sepatu }}
                        </p>
                    </div>
                </div>
                <div class="group flex items-center justify-between">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Subtotal</p>
                    <p class="leading-19 tracking-05">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                </div>
                <div class="group flex items-center justify-between">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Promo Code</p>
                    <p class="leading-19 tracking-05 text-[#EC0307]">-Rp 0</p>
                </div>
                <hr class="border-black border-dashed">
                <div class="w-full flex justify-between items-center rounded-2xl py-4 px-8 bg-[#D0EEFF]">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-[34px] tracking-05">Total Payment</p>
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-[34px] tracking-05 text-right">Rp.
                        {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Transfer Information and Proof Upload -->
        <div class="flex flex-col gap-6 w-full">
            <div class="flex flex-col w-full rounded-3xl p-8 gap-6 bg-white">
                <div class="flex flex-col gap-2">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Transfer to</p>
                </div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('frontend/assets/images/logos/BCA.svg') }}" class="w-12 flex shrink-0"
                        alt="logo">
                    <div class="flex flex-col gap-2">
                        <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">SteadyStride</p>
                        <p class="leading-19">129405960495</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('frontend/assets/images/logos/MANDIRI.svg') }}" class="w-12 flex shrink-0"
                        alt="logo">
                    <div class="flex flex-col gap-2">
                        <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">SteadyStride</p>
                        <p class="leading-19">129405960495</p>
                    </div>
                </div>
                <hr class="border-black opacity-10">
                @if (is_null($transaksi->proof))
                    <input type="hidden" name="trx_id" value="{{ $transaksi->trx_id }}">
                    <label id="upload-proof" class="flex flex-col gap-1 font-['Poppins']">
                        <p class="font-semibold text-fitcamp-black">Transfer Proof</p>
                        <div class="relative w-full rounded-xl border border-[#BFBFBF] py-4 px-3 bg-white">
                            <p id="file-name" class="text-sm leading-[22px] tracking-03 text-[#BFBFBF]">Upload transfer
                                proof</p>
                            <input type="file" name="proof" id="file-input" class="absolute top-0 -z-10">
                        </div>
                    </label>
                    <button type="submit"
                        class="rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Confirm</button>
                @endif
            </div>
        </div>
    </form>
@endsection
