 <!-- BEGIN: Top Bar -->
 <div
     class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
     <div class="h-full flex items-center">
         <!-- BEGIN: Logo -->
         <a href="" class="-intro-x hidden md:flex">
             <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('backend/dist/images/logo.svg') }}">
             <span class="text-white text-lg ml-3"> SteadyStride</span>
         </a>
         <!-- END: Logo -->
         <!-- BEGIN: Breadcrumb -->
         <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
             <ol class="breadcrumb breadcrumb-light">
                 <li class="breadcrumb-item"><a href="#">Application</a></li>
                 <li class="breadcrumb-item active" aria-current="page">

                     @if (request()->routeIs('dashboard'))
                         Dashboard
                     @elseif (request()->routeIs('brands.all'))
                         Brands
                     @elseif (request()->routeIs('kategori.all'))
                         Kategori
                     @elseif (request()->routeIs('sepatu.all'))
                         Sepatu
                     @elseif (request()->routeIs('transaksi.all'))
                         Transaksi
                     @elseif (request()->routeIs('report.all'))
                         Report
                     @elseif (request()->routeIs('akun.pelanggan.all'))
                         Akun Pelanggan
                     @elseif (request()->routeIs('kontak.all'))
                         Kontak
                     @elseif (request()->routeIs('tim.all'))
                         Tim
                     @elseif (request()->routeIs('profile'))
                         Profile
                     @endif

                 </li>
             </ol>
         </nav>
         <!-- END: Breadcrumb -->

         <!-- BEGIN: Notifications -->
         <div class="intro-x dropdown mr-4 sm:mr-6">
             <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                 aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell"
                     class="notification__icon dark:text-slate-500"></i> </div>
             <div class="notification-content pt-2 dropdown-menu">
                 <div class="notification-content__box dropdown-content">
                     <div class="notification-content__title">Notifications</div>
                     <div class="cursor-pointer relative flex items-center ">
                         <div class="w-12 h-12 flex-none image-fit mr-1">
                             <img alt="Midone - HTML Admin Template" class="rounded-full"
                                 src="{{ asset('backend/dist/images/profile-1.jpg') }}">
                             <div
                                 class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                             </div>
                         </div>
                         <div class="ml-2 overflow-hidden">
                             <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Russell Crowe</a>
                                 <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                             </div>
                             <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a
                                 reader will be distracted by the readable content of a page when looking at its layout.
                                 The point of using Lorem </div>
                         </div>
                     </div>
                     <div class="cursor-pointer relative flex items-center mt-5">
                         <div class="w-12 h-12 flex-none image-fit mr-1">
                             <img alt="Midone - HTML Admin Template" class="rounded-full"
                                 src="{{ asset('backend/dist/images/profile-11.jpg') }}">
                             <div
                                 class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                             </div>
                         </div>
                         <div class="ml-2 overflow-hidden">
                             <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Denzel Washington</a>
                                 <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                             </div>
                             <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem Ipsum
                                 is not simply random text. It has roots in a piece of classical Latin literature from
                                 45 BC, making it over 20</div>
                         </div>
                     </div>
                     <div class="cursor-pointer relative flex items-center mt-5">
                         <div class="w-12 h-12 flex-none image-fit mr-1">
                             <img alt="Midone - HTML Admin Template" class="rounded-full"
                                 src="{{ asset('backend/dist/images/profile-3.jpg') }}">
                             <div
                                 class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                             </div>
                         </div>
                         <div class="ml-2 overflow-hidden">
                             <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Arnold Schwarzenegger</a>
                                 <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                             </div>
                             <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages
                                 of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                 injected humour, or randomi</div>
                         </div>
                     </div>
                     <div class="cursor-pointer relative flex items-center mt-5">
                         <div class="w-12 h-12 flex-none image-fit mr-1">
                             <img alt="Midone - HTML Admin Template" class="rounded-full"
                                 src="{{ asset('backend/dist/images/profile-11.jpg') }}">
                             <div
                                 class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                             </div>
                         </div>
                         <div class="ml-2 overflow-hidden">
                             <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                 <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                             </div>
                             <div class="w-full truncate text-slate-500 mt-0.5">There are many variations of passages
                                 of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                 injected humour, or randomi</div>
                         </div>
                     </div>
                     <div class="cursor-pointer relative flex items-center mt-5">
                         <div class="w-12 h-12 flex-none image-fit mr-1">
                             <img alt="Midone - HTML Admin Template" class="rounded-full"
                                 src="{{ asset('backend/dist/images/profile-4.jpg') }}">
                             <div
                                 class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                             </div>
                         </div>
                         <div class="ml-2 overflow-hidden">
                             <div class="flex items-center">
                                 <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                 <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                             </div>
                             <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a
                                 reader will be distracted by the readable content of a page when looking at its layout.
                                 The point of using Lorem </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- END: Notifications -->
         <!-- BEGIN: Account Menu -->
         <div class="intro-x dropdown w-8 h-8">
             <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                 role="button" aria-expanded="false" data-tw-toggle="dropdown">
                 <img alt="Midone - HTML Admin Template" src="{{ asset('storage/' . Auth::user()->foto) }}">
             </div>
             <div class="dropdown-menu w-56">
                 <ul
                     class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                     <li class="p-2">
                         <div class="font-medium">{{ Auth::user()->name }} </div>

                     </li>
                     <li>
                         <hr class="dropdown-divider border-white/[0.08]">
                     </li>
                     <li>
                         <a href="{{ route('profile') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                 class="w-4 h-4 mr-2"></i> Profile </a>
                     </li>

                     <li>
                         <hr class="dropdown-divider border-white/[0.08]">
                     </li>
                     <li>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf

                             <button type="submit" class="dropdown-item hover:bg-white/5"> <i
                                     data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </button>
                         </form>

                     </li>
                 </ul>
             </div>
         </div>
         <!-- END: Account Menu -->
     </div>
 </div>
 <!-- END: Top Bar -->
