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
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Harga Produk</p>
                <p class="leading-19">
                    Rp. {{ number_format($sepatu->harga, 0, ',', '.') }}
                </p>
            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Kuantitas</p>
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

                    Rp. {{ number_format($subtotal, 0, ',', '.') }}

                </p>
            </div>
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">Kode Promo</p>


                @if ($kodeid)
                    <p class="leading-19 tracking-05 text-[#EC0307]">-Rp. {{ number_format($harga, 0, ',', '.') }} </p>
                @else
                    <p class="leading-19 tracking-05 text-[#EC0307]">-Rp 0</p>
                @endif

            </div>

            <hr class="border-black border-dashed">
            <div class="flex items-center justify-between">
                <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">Total</p>
                <p class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">
                    Rp. {{ number_format($total, 0, ',', '.') }}</p>
                <input type="hidden" name="total_harga" value="{{ $total }}">
            </div>
            @if ($sepatu->stock != '0')
                <button type="submit"
                    class="rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Checkout</button>
            @endif
            <input type="hidden" name="voucher_id" value="{{ $kodeid }}">
</form>
<button type="button" class="w-full flex justify-between items-center rounded-lg p-4 bg-[#D0EEFF]">
    <div class="flex items-center gap-3">
        <img src="{{ asset('frontend/assets/images/icons/ticket-discount.svg') }}" class="w-8 h-8 flex shrink-0"
            alt="icon">

        <form class="flex items-center w-[47px] rounded-[53px] bg-white" style="height: 63px; padding: 10px;">
            <input type="text" wire:model.live.debounce.150ms="kode"
                class="appearance-none outline-none !bg-white w-full leading-19 font-semibold placeholder:text-[#3F3F3F80]"
                placeholder="Kode Promo...">



        </form>


</button>
@if ($voucherMessage == '1')
    <p style="color: green; display: flex; align-items: center;" class="leading-19 tracking-05">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-check-big">
            <path d="M21.801 10A10 10 0 1 1 17 3.335" />
            <path d="m9 11 3 3L22 4" />
        </svg>
        <span>Voucher Berhasil Dipasang</span>
    </p>
@elseif ($voucherMessage == '0')
    <p style="display: flex; align-items: center;" class="leading-19 tracking-05 text-[#EC0307]">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-x">
            <circle cx="12" cy="12" r="10" />
            <path d="m15 9-6 6" />
            <path d="m9 9 6 6" />
        </svg>
        <span>Voucher Tidak Ada</span>
    </p>
@endif

</div>


</div>
