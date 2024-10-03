   <header class="relative flex flex-col w-full h-[1044px] overflow-hidden -mb-[140px]">
       <img src="{{ asset('frontend/assets/images/backgrounds/Illustration BG.svg') }}"
           class="absolute w-full h-full object-cover" alt="backgrounds">
       <nav class="relative flex items-center justify-between w-full max-w-[1280px] mx-auto px-10 "
           style="margin-top: 27px">

           <div style="display: flex; align-items: center;">
               <img style="width: 60px;" src="{{ asset('backend/dist/images/logo.svg') }}">
               <a href="{{ route('frontend') }}">
                   <h2 style="margin-left: 10px; font-family: 'ClashDisplay-Bold';, text-transform: uppercase;  font-size: 30px;"
                       class="text-white">SteadyStride</h2>
               </a>
           </div>

           <ul class="flex items-center gap-6 justify-end">
               <li>
                   <a href="{{ route('frontend.sepatu') }}">
                       <h3 class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05"> See All </h3>
                   </a>
               </li>


               <li>
                   <a href="{{ route('frontend.cart') }}" class="leading-19 tracking-03 text-[#141414]"> <img
                           style="width: 50px" src="{{ asset('frontend/assets/images/icons/cart.svg') }}"> </a>
               </li>
               @guest
                   <li>
                       <a href="{{ route('frontend.login') }}"
                           class="leading-19 tracking-0.5 text-white font-semibold rounded-[22px] py-3 px-6 bg-[#606DE5]">
                           Login
                       </a>
                   </li>

               @endguest

               <!-- Tombol Logout hanya muncul jika pengguna sudah login -->
               @auth
                   @if (Auth::user()->hasRole('admin'))
                       <li>
                           <a href="{{ route('frontend.login') }}"
                               class="leading-19 tracking-0.5 text-white font-semibold rounded-[22px] py-3 px-6 bg-[#606DE5]">
                               Login
                           </a>
                       </li>
                   @endif

                   <!-- Cek apakah hasRole pengguna adalah 1 -->
                   @if (Auth::user()->hasRole('masyarakat'))
                       <li>
                           <a href="#" class="dropdown-toggle">
                               <h3 class="font-['ClashDisplay-SemiBold'] text-xl leading-6 tracking-05">
                                   {{ Auth::user()->name }}
                               </h3>
                           </a>
                           <ul class="rounded-[22px]">
                               <li><a href="{{ route('frontend.profile') }}">Edit Profile</a></li>
                               <li>
                                   <a href="#">
                                       <form method="POST" action="{{ route('frontend.logout') }}">
                                           @csrf
                                           <button type="submit">
                                               Logout
                                           </button>
                                       </form>
                                   </a>
                               </li>
                           </ul>
                       </li>
                   @endif
               @endauth


           </ul>
       </nav>
       <div id="hero-text" class="relative flex flex-col items-center mx-auto mt-4" c>

           <h1 style=" font-family: 'ClashDisplay-Bold';, sans-serif;  text-transform: uppercase;  font-size: 70px;"
               class="text-white ">Store Sepatu Terpercaya
           </h1>


           <div class="mt-16">
               <img style="width: 950px" src="{{ asset('frontend/assets/images/backgrounds/4058271.png') }}">
           </div>
       </div>
   </header>
