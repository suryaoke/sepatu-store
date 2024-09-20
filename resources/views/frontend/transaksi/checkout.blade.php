@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    <form method="POST" action="{{ route('frontend.sepatu.checkout.store') }}" id="content"
        class="relative flex w-full max-w-[1280px] gap-6 mx-auto px-10 mt-[96px]">
        @csrf
        <input type="hidden" name="trx_id" value="1">
        <div class="flex flex-col gap-6 w-full max-w-[820px] shrink-0">
            <div id="account" class="flex flex-col w-full rounded-3xl p-8 gap-6 bg-white">
                <div class="flex flex-col gap-2">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Account Details</p>

                </div>
                <hr class="border-black opacity-10">
                <label class="group flex items-center">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Nama</p>
                    <input type="text" name="" id="" value="{{ Auth::user()->name }}"
                        class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                        placeholder="Input full name of yourself" readonly>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </label>
                <label class="group flex items-center">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">No Hp
                    </p>
                    <input type="tel" name="" id="" value="{{ Auth::user()->hp }}"
                        class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                        placeholder="Input valid phone number for validation " readonly>
                </label>
                <label class="group flex items-center">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Email</p>
                    <input type="email" name="" id="" value="{{ Auth::user()->email }}"
                        class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                        placeholder="Input your valid email address" readonly>
                </label>
                <label class="group flex items-center">
                    <p class="flex w-[162px] shrink-0 font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Alamat</p>
                    <input type="email" name="" id="" value="{{ Auth::user()->alamat }}"
                        class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                        placeholder="Input your valid email address" readonly>
                </label>
            </div>


        </div>
        <div class="flex flex-col gap-6 w-full">
            <div class="flex flex-col w-full rounded-3xl p-8 gap-6 bg-white">
                <div class="flex flex-col gap-2">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Summary</p>
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05"> {{ $sepatu->nama }} </p>
                    <input type="hidden" name="sepatu_id" value="{{ $sepatu->id }}">

                </div>
                <hr class="border-black opacity-10">
                <div class="flex items-center justify-between">
                    <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Harga Satuan</p>
                    <p class="leading-19">
                        {{ number_format($sepatu->harga, 0, ',', '.') }}
                    </p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Jumlah</p>
                    <p class="leading-19"> {{ $data['total_sepatu'] }} </p>
                    <input type="hidden" name="total_sepatu" value="{{ $data['total_sepatu'] }}" id="">
                </div>
                <div class="flex items-center justify-between">
                    <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Ukuran</p>
                    <p class="leading-19"> {{ $size->ukuran }} </p>
                    <input type="hidden" name="size_id" value="{{ $size->id }}" id="">
                </div>

                <div class="flex items-center justify-between">
                    <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Subtotal</p>
                    <p class="leading-19">
                        @php
                            $subtotal = $sepatu->harga * $data['total_sepatu'];
                        @endphp
                        {{ number_format($subtotal, 0, ',', '.') }}

                    </p>
                </div>

                <hr class="border-black border-dashed">
                <div class="flex items-center justify-between">
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Total</p>
                    <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">
                        {{ number_format($subtotal, 0, ',', '.') }}</p>
                    <input type="hidden" name="total_harga" value="{{ $subtotal }}">
                </div>
                @if ($sepatu->stock != '0')
                    <button type="submit"
                        class="rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Checkout</button>
                @endif

    </form>
    <button type="button" class="w-full flex justify-between items-center rounded-lg p-4 bg-[#D0EEFF]">
        <div class="flex items-center gap-3">
            <img src="{{ asset('frontend/assets/images/icons/ticket-discount.svg') }}" class="w-8 h-8 flex shrink-0"
                alt="icon">
            <p class="font-semibold leading-19 tracking-05">Use Promo Code</p>
        </div>
        <img src="{{ asset('frontend/assets/images/icons/Vector.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
    </button>
    </div>
    </div>
@endsection
