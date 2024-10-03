     @extends('backend.admin_master')
     @section('backend')
         @php
             $brands = App\Models\Brands::count();
             $kategori = App\Models\Kategori::count();
             $sepatu = App\Models\Sepatu::count();
             $voucher = App\Models\Voucher::count();
             $transaksi = App\Models\Transaksi::count();
             $akunpelanggan = App\Models\User::where('role', '1')->count();
         @endphp
         <div class="grid grid-cols-12 gap-6">
             <div class="col-span-12 2xl:col-span-9">
                 <div class="grid grid-cols-12 gap-6">
                     <div class="col-span-12 mt-6 -mb-6 intro-y">
                         <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6"
                             role="alert">
                             <span>Silahkan gunakan aplikasi dengan sebaik-baiknya, dan jaga kerahasiaan username dan
                                 password Anda..!!!</span>
                             <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                                 <i data-lucide="x" class="w-4 h-4"></i>
                             </button>
                         </div>
                     </div>
                     <!-- BEGIN: General Report -->
                     <div class="col-span-12 mt-8">
                         <div class="intro-y flex items-center h-10">
                             <h2 class="text-lg font-medium truncate mr-5">
                                 General Report
                             </h2>
                             <a href="" class="ml-auto flex items-center text-primary">
                                 <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                             </a>
                         </div>
                         <div class="grid grid-cols-12 gap-6 mt-5">
                             <!-- Data Masyarakat -->
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="lucide lucide-trello">
                                                 <rect width="18" height="18" x="3" y="3" rx="2"
                                                     ry="2" />
                                                 <rect width="3" height="9" x="7" y="7" />
                                                 <rect width="3" height="5" x="14" y="7" />
                                             </svg>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{ $brands }} </div>
                                         <div class="text-base text-slate-500 mt-1">Brands</div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Data Barang -->
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <i data-lucide="list" class="report-box__icon text-pending"></i>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{ $kategori }} </div>
                                         <div class="text-base text-slate-500 mt-1">Kategori</div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Data Lelang -->
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="lucide lucide-footprints">
                                                 <path
                                                     d="M4 16v-2.38C4 11.5 2.97 10.5 3 8c.03-2.72 1.49-6 4.5-6C9.37 2 10 3.8 10 5.5c0 3.11-2 5.66-2 8.68V16a2 2 0 1 1-4 0Z" />
                                                 <path
                                                     d="M20 20v-2.38c0-2.12 1.03-3.12 1-5.62-.03-2.72-1.49-6-4.5-6C14.63 6 14 7.8 14 9.5c0 3.11 2 5.66 2 8.68V20a2 2 0 1 0 4 0Z" />
                                                 <path d="M16 17h4" />
                                                 <path d="M4 13h4" />
                                             </svg>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{ $sepatu }} </div>
                                         <div class="text-base text-slate-500 mt-1">Sepatu</div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Data Penawaran Lelang -->
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <i data-lucide="ticket" class="report-box__icon text-danger"></i>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{$voucher}} </div>
                                         <div class="text-base text-slate-500 mt-1">Voucher</div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <i data-lucide="shopping-bag" class="report-box__icon text-success"></i>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{$transaksi}} </div>
                                         <div class="text-base text-slate-500 mt-1">Transaksi</div>
                                     </div>
                                 </div>

                             </div>
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <i data-lucide="users" class="report-box__icon text-primary"></i>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{$akunpelanggan}} </div>
                                         <div class="text-base text-slate-500 mt-1">Akun Pelanggan</div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <!-- END: General Report -->
                 </div>
             </div>
         </div>
     @endsection
