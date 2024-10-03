 @extends('backend.admin_master')
 @section('backend')
     <div class="content">

         <h2 class="intro-y text-lg font-medium mt-10">
             Data List Akun Pelanggan
         </h2>
         <div class="grid grid-cols-12 gap-6 mt-5">

             <!-- BEGIN: Data List -->
             <div class="intro-y col-span-12 overflow-x-auto">
                 <div class="min-w-max">
                     <table id="datatable" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th class="whitespace-nowrap">NO</th>
                                 <th class="whitespace-nowrap">Nama</th>
                                 <th class="whitespace-nowrap">Email</th>
                                 <th class="whitespace-nowrap">Hp</th>
                                 <th class="whitespace-nowrap">Alamat</th>
                                 <th class="whitespace-nowrap">Foto</th>
                                
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($akunpelanggan as $key => $item)
                                 <tr class="intro-x">
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $key + 1 }}
                                     </td>
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $item->name }}
                                     </td>
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $item->email }}
                                     </td>
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $item->hp }}
                                     </td>
                                     <td class="font-medium whitespace-nowrap">
                                         {{ $item->alamat }}
                                     </td>
                                     <td class="font-medium whitespace-nowrap">
                                         <img style="width: 75px" src="{{ asset('storage/' . $item->foto) }}"
                                             alt="">
                                     </td>
                                    

                                 </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>
                 <!-- END: Data List -->

             </div>

         </div>
     </div>
 @endsection
