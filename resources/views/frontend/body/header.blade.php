   <header class="relative flex flex-col w-full h-[1044px] overflow-hidden -mb-[140px]">
       <img src="{{ asset('frontend/assets/images/backgrounds/Illustration BG.svg') }}"
           class="absolute w-full h-full object-cover" alt="backgrounds">
       <nav class="relative flex items-center justify-between w-full max-w-[1280px] mx-auto px-10 "
           style="margin-top: 27px">
           {{--  <a href="index.html">
               <img src="{{ asset('frontend/assets/images/logos/Logo.svg') }}" class="flex shrink-0" alt="logo">
           </a>  --}}
           <div style="display: flex; align-items: center;">
               <a href="">
                   <img style="width: 60px;" src="{{ asset('backend/dist/images/logo.svg') }}">
               </a>
               <h2 style="margin-left: 10px; font-family: 'ClashDisplay-Bold';, text-transform: uppercase;  font-size: 30px;"
                   class="text-white">SteadyStride</h2>
           </div>

           <ul class="flex items-center gap-6 justify-end">
               <li>
                   <a href="#" class="leading-19 tracking-03 text-[#141414]">Subscribe Plan</a>
               </li>
               <li>
                   <a href="#" class="leading-19 tracking-03 text-[#141414]">Blog</a>
               </li>
               <li>
                   <a href="#" class="leading-19 tracking-03 text-[#141414]">Testimonial</a>
               </li>
               <li>
                   <a href="#" class="leading-19 tracking-03 text-[#141414]"> <img style="width: 50px"
                           src="{{ asset('frontend/assets/images/icons/cart.svg') }}"> </a>
               </li>
               <li>
                   <a href="#"
                       class="leading-19 tracking-0.5 text-white font-semibold rounded-[22px] py-3 px-6 bg-[#606DE5]">Login</a>
               </li>
           </ul>
       </nav>
       <div id="hero-text" class="relative flex flex-col items-center mx-auto ">

           <h1 style=" font-family: 'ClashDisplay-Bold';, sans-serif;  text-transform: uppercase;  font-size: 70px;"
               class="text-white ">Store Sepatu Terpercaya
           </h1>


           <div class="mt-16">
               <img style="width: 950px" src="{{ asset('frontend/assets/images/backgrounds/4058271.png') }}">
           </div>
       </div>
   </header>
