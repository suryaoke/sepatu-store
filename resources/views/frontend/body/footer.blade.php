   <footer class="flex flex-col w-full max-w-[1312px] mx-auto rounded-[32px] bg-black p-[120px] mt-[120px] mb-16">
       <div class="flex justify-between">
           <div class="flex flex-col gap-6 max-w-[306px] text-start">
               <div style="display: flex; align-items: center;">
                   <img style="width: 60px;" src="{{ asset('backend/dist/images/logo.svg') }}">
                   <a href="{{ route('frontend') }}">
                       <h2 style="margin-left: 10px; font-family: 'ClashDisplay-Bold';, text-transform: uppercase;  font-size: 30px;"
                           class="text-white">SteadyStride</h2>
                   </a>
               </div>
               <p class="tracking-03 text-white"> {{ $kontak->alamat }}, Kota {{ $kontak->city->name }}, Provinsi
                   {{ $kontak->province->name }} </p>
           </div>
           <nav class="flex gap-16 justify-end text-white">
               <ul class="flex flex-col gap-4">
                   <p class="font-semibold tracking-03">Kategori</p>
                   @foreach ($kategori as $item)
                       <li>
                           <a href="#" class="tracking-03"> {{ $item->nama }} </a>
                       </li>
                   @endforeach
               </ul>
               <ul class="flex flex-col gap-4">

                   <p class="font-semibold tracking-03">Contact Us</p>
                   <li>
                       <a href="#" class="tracking-03"> {{ $kontak->no_hp }} </a>
                   </li>
                   <li>
                       <a href="#" class="tracking-03"> {{ $kontak->email }} </a>
                   </li>
               </ul>
           </nav>
       </div>
       <hr class="border-white/50 mt-16">
       <div class="flex items-center justify-between mt-[30px]">
           <p class="font-semibold tracking-03 text-white">© 2024 SteadyStride</p>
           <ul class="flex items-center justify-end gap-6 text-white">
               <li>
                   <a href="#" class="tracking-03">Term of Services</a>
               </li>
               <li>
                   <a href="#" class="tracking-03">Privacy Policy</a>
               </li>
               <li>
                   <a href="#" class="tracking-03">Cookies</a>
               </li>
               <li>
                   <a href="#" class="tracking-03">Legal</a>
               </li>
           </ul>
       </div>
   </footer>
