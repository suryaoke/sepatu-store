@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    <form method="POST" action="{{ route('frontend.login.store') }}"
        class="relative flex flex-col items-center w-full max-w-[642px] text-center rounded-3xl p-8 py-[70px] gap-8 bg-white mx-auto "
        style="margin-top: 60px">
        @csrf
        <div class="flex flex-col items-center gap-4">
            <h1 class="font-['ClashDisplay-SemiBold'] text-[32px] leading-10 tracking-05">Login</h1>
        </div>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Email</p>
            <input type="email" name="email" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan Nama" required>
        </label>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Password</p>
            <input type="password" name="password" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan Password" required>
        </label>
        <button type="submit"
            class="w-fit rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Login</button>
        <a href="{{ route('frontend.register') }}" class="w-fit font-semibold leading-19 tracking-05 text-center"
            style="text-decoration: underline;">Register</a>

    </form>
@endsection
