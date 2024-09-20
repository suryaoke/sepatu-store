@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header2')
@endsection

@section('frontend')
    <form method="POST" action="{{ route('pelanggan.register') }}" enctype="multipart/form-data"
        class="relative flex flex-col items-center w-full max-w-[642px] text-center rounded-3xl p-8 py-[70px] gap-8 bg-white mx-auto "
        style="margin-top: 60px">
        @csrf
        <div class="flex flex-col items-center gap-4">
            <h1 class="font-['ClashDisplay-SemiBold'] text-[32px] leading-10 tracking-05">Register</h1>
        </div>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Nama</p>
            <input type="text" name="name" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan Nama" required>
        </label>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Email</p>
            <input type="email" name="email" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan Email" required>
        </label>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Alamat</p>
            <input type="text" name="alamat" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan Alamat" required>
        </label>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">No Hp</p>
            <input type="text" name="hp" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan No Hp" required>
        </label>

        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Password</p>
            <input type="password" name="password" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                placeholder="Masukkan Password" required>
        </label>
        <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
            <p class="font-semibold text-fitcamp-black">Foto</p>
            <input type="file" name="foto" id=""
                class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                required accept=".jpg, .jpeg, .png" id="image">
        </label>

        <button type="submit"
            class="w-fit rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Register</button>
        <a href="{{ route('frontend.login') }}" class="w-fit font-semibold leading-19 tracking-05 text-center"
            style="text-decoration: underline;">Login</a>
    </form>
@endsection
