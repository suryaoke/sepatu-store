 @extends('frontend.frontend_master')

 @section('header')
     @include('frontend.body.header')
 @endsection

 @section('frontend')
     <section id="features" class="relative w-full max-w-[1280px] h-[280px] mx-auto px-10">
         <div
             class="flex items-center justify-center w-full rounded-3xl p-10 gap-16 bg-white shadow-[8px_12px_28px_0_#0000000D]">
             @foreach ($kategori as $item)
                 <a href="{{ route('frontend.kategori', $item->slug) }}">
                     <div class="flex flex-col items-center w-[282px] gap-4 text-center">
                         <img src="{{ asset('storage/' . $item->foto) }}" class="w-[72px] h-[72px] flex shrink-0"
                             alt="icon">
                         <h3 class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05"> {{ $item->nama }} </h3>
                         <p class="tracking-03"> {{ $item->ket }} </p>
                     </div>
                 </a>
             @endforeach


         </div>
     </section>
     <section id="location" class="flex flex-col w-full max-w-[1280px] gap-8 mx-auto px-10 " style="margin-top:100px;">
         <div class="flex items-center justify-between">
             <div class="flex flex-col gap-4">
                 <h2 class="font-['ClashDisplay-SemiBold'] text-5xl leading-[59px] tracking-05">Brands</h2>
                 <p class="leading-19 tracking-03 opacity-60">Discover our wide selection of top brands that offer
                     high-quality products to meet all your shopping needs.</p>
             </div>
         </div>
         <div class="flex items-center gap-4 flex-wrap">
             @foreach ($brands as $item)
                 <a href="{{ route('frontend.brand', $item->slug) }}">
                     <div class="flex items-center rounded-full p-3 pr-6 gap-3 bg-white">
                         <div class="w-10 h-10 flex shrink-0 rounded-full overflow-hidden">
                             <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover"
                                 alt="icon">
                         </div>
                         <span class="leading-19 tracking-03"> {{ $item->nama }} </span>
                     </div>
                 </a>
             @endforeach

         </div>
     </section>


     @livewire('sepatu-table')


     <section id="benefits" class="flex flex-col w-full max-w-[1280px] gap-8 mx-auto px-10 " style="margin-top: 120px ">
         <div class="flex items-center justify-between">
             <div class="flex flex-col gap-4 text-center mx-auto">
                 <h2 class="font-['ClashDisplay-SemiBold'] text-5xl leading-[59px] tracking-05">Popular</h2>
                 <p class="leading-19 tracking-03 opacity-60">These shoes have become incredibly popular for their stylish
                     design and <br> unmatched comfort, making them a top choice among all groups of people.</p>
             </div>
         </div>
         <div class="grid grid-cols-3 gap-6">
             @foreach ($sepatupopular as $item)
                 <a href="{{ route('frontend.detail', $item->slug) }}" class="card">
                     <div class="flex flex-col rounded-3xl p-8 gap-6 bg-white">
                         <div class="title flex flex-col gap-2">
                             <h3 class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">{{ $item->nama }}
                             </h3>

                         </div>
                         <div class="thumbnail flex rounded-3xl h-[200px] bg-[#06425E] overflow-hidden">
                             <img src="{{ asset('storage/' . $item->sepatuFoto->first()->foto) }}"
                                 class="w-full h-full object-cover" alt="thumbnail">
                         </div>
                         <style>
                             @import url('https://fonts.googleapis.com/css2?family=Clash+Display:wght@600&display=swap');

                             .font-clash-display {
                                 font-family: 'Clash Display', sans-serif;
                                 font-weight: 600;
                                 /* Semi-bold */
                             }
                         </style>
                         <div class="flex items-center justify-between">

                             <p class="font-clash-display">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>


                             <button class="font-semibold text-xs leading-14 tracking-05 text-fitcamp-royal-blue">View
                                 all</button>
                         </div>
                         <div class="grid grid-cols-3 justify-between gap-3">
                             <div class="flex flex-col gap-3 items-center text-center">
                                 <img src="{{ asset('storage/' . $item->brands->foto) }}" class="w-10 h-10" alt="icon">
                                 <div class="flex flex-col gap-1">

                                     <p class="font-semibold text-sm leading-16 tracking-05"> {{ $item->brands->nama }}
                                     </p>
                                 </div>
                             </div>
                             <div class="flex flex-col gap-3 items-center text-center">
                                 <img src="{{ asset('storage/' . $item->kategoris->foto) }}" class="w-10 h-10"
                                     alt="icon">
                                 <div class="flex flex-col gap-1">

                                     <p class="font-semibold text-sm leading-16 tracking-05"> {{ $item->kategoris->nama }}
                                     </p>
                                 </div>
                             </div>
                             <div class="flex flex-col gap-3 items-center text-center">
                                 <img src=" {{ asset('frontend/assets/images/icons/Locker.svg') }}" class="w-10 h-10"
                                     alt="icon">
                                 <div class="flex flex-col gap-1">

                                     <p class="font-semibold text-sm leading-16 tracking-05">Stock: {{ $item->stock }}
                                     </p>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </a>
             @endforeach

         </div>
     </section>

     <section id="testi" class="flex flex-col gap-8 mt-16">
         <div class="flex items-center justify-center w-full max-w-[1280px] mx-auto px-10 h-screen">
             <div class="flex flex-col items-center gap-4">
                 <h2 class="font-['ClashDisplay-SemiBold'] text-5xl leading-[59px] tracking-[-0.05em]">
                     Team
                 </h2>
             </div>
         </div>
         <div class="swiper w-full">
             <div class="swiper-wrapper">
                 @foreach ($tim as $item)
                     <div class="swiper-slide w-full">
                         <div
                             class="flex flex-col items-center w-full max-w-[1069px] rounded-[32px] py-[56px] px-[72px] gap-12 mx-auto bg-white">
                             <p class="text-[32px] tracking-05 text-center">
                                 {{ $item->motivasi }}
                             </p>
                             <div class="flex items-center gap-3 w-fit">
                                 <div class="w-16 h-16 rounded-full overflow-hidden">
                                     <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover"
                                         alt="photos">
                                 </div>
                                 <div class="flex flex-col gap-2">
                                     <p class="font-['ClashDisplay-SemiBold'] text-2xl leading-[29.52px] tracking-05">
                                         {{ $item->nama }}</p>
                                     <p class="text-xl leading-6 tracking-05 opacity-50"> {{ $item->jabatan }} </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
             <div class="swiper-pagination !relative flex items-center justify-center gap-4 mt-[50px] h-[70px]"></div>
         </div>
     </section>
 @endsection
