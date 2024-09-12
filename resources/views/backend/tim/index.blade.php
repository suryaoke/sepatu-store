 @extends('backend.admin_master')
 @section('backend')
     <div class="content">

         <h2 class="intro-y text-lg font-medium mt-10">
             Data List Tim
         </h2>
         <div class="grid grid-cols-12 gap-6 mt-5">
             <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

                 <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                     class="btn btn-primary shadow-md mr-2">Tambah Data</a>

             </div>
             <!-- BEGIN: Data List -->
             <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                 <table id="datatable" class="table table-bordered table-hover">
                     <thead>
                         <tr>
                             <th class="whitespace-nowrap">NO</th>
                             <th class="whitespace-nowrap">Nama</th>
                             <th class="whitespace-nowrap">Jabatan</th>
                             <th class="whitespace-nowrap">Foto</th>
                             <th class="whitespace-nowrap">Motivasi</th>
                             <th class="whitespace-nowrap">ACTIONS</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($tim as $key => $item)
                             <tr class="intro-x">
                                 <td class="font-medium whitespace-nowrap">
                                     {{ $key + 1 }}
                                 </td>
                                 <td class="font-medium whitespace-nowrap">
                                     {{ $item->nama }}
                                 </td>
                                 <td class="font-medium whitespace-nowrap">
                                     {{ $item->jabatan }}
                                 </td>
                                 <td class="font-medium whitespace-nowrap">
                                     <img style="width: 75px" src="{{ asset('storage/' . $item->foto) }}" alt="">
                                 </td>
                                 <td class="font-medium whitespace-nowrap">
                                     {{ \Illuminate\Support\Str::words($item->motivasi, 2, '...') }}
                                 </td>
                                 <td class="font-medium whitespace-nowrap">
                                     <a data-tw-toggle="modal"
                                         data-tw-target="#delete-confirmation-modal-{{ $item->id }}"
                                         class="btn btn-danger mr-1 mb-2">
                                         <i data-lucide="trash" class="w-4 h-4"></i> </a>
                                     <a data-tw-toggle="modal"
                                         data-tw-target="#update-header-footer-modal-preview-{{ $item->id }}"
                                         class="btn btn-warning mr-1 mb-2">
                                         <i data-lucide="edit" class="w-4 h-4"></i>
                                     </a>
                                 </td>

                             </tr>

                             <!-- BEGIN: Modal Update -->
                             <div id="update-header-footer-modal-preview-{{ $item->id }}" class="modal" tabindex="-1"
                                 aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                         <div class="modal-header">
                                             <h2 class="font-medium text-base mr-auto">Ubah Data Tim</h2>

                                         </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                         <form action="{{ route('tim.update') }}" method="POST"
                                             enctype="multipart/form-data">
                                             @csrf
                                             <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                 <input type="hidden" name="id" value="{{ $item->id }}">
                                                 <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                                         class="form-label">Nama</label>
                                                     <input id="modal-form-1" type="text" value="{{ $item->nama }}"
                                                         name="nama" class="form-control" placeholder="Masukkan Nama">
                                                 </div>
                                                 <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2"
                                                         class="form-label">Jabatan</label>
                                                     <input id="modal-form-2" type="text" name="jabatan"
                                                         value="{{ $item->jabatan }}" class="form-control"
                                                         placeholder="Masukkan Jabatan">
                                                 </div>

                                                 <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2"
                                                         class="form-label">Motivasi</label>
                                                     <textarea class="form-control" name="motivasi" id="" cols="20" rows="10"> {{ $item->motivasi }} </textarea>

                                                 </div>
                                                 <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2"
                                                         class="form-label">Foto</label>
                                                     <input type="file" name="foto" class="form-control"
                                                         accept=".jpg, .jpeg, .png" id="image2">
                                                 </div>
                                                 <div class="col-span-12 sm:col-span-12">
                                                     <img width="130px auto" id="showImage2" style="width: 50px"
                                                         src="{{ !empty($item->foto) ? url('storage/' . $item->foto) : url('backend/no_image.webp') }}"
                                                         alt="Card image cap">
                                                 </div>

                                             </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                                             <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                                                     class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                                                     class="btn btn-primary w-20">Save</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div> <!-- END: Modal Update -->

                             <!-- BEGIN: Delete Confirmation Modal -->
                             <div id="delete-confirmation-modal-{{ $item->id }}" class="modal" tabindex="-1"
                                 aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-body p-0">
                                             <div class="p-5 text-center">
                                                 <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                 <div class="text-3xl mt-5">Are you sure?</div>
                                                 <div class="text-slate-500 mt-2">
                                                     Do you really want to delete these records?
                                                     <br>
                                                     This process cannot be undone.
                                                 </div>
                                             </div>
                                             <div class="px-5 pb-8 text-center">
                                                 <button type="button" data-tw-dismiss="modal"
                                                     class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                 <a href="{{ route('tim.delete', $item->id) }}" type="button"
                                                     class="btn btn-danger w-24">Delete</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- END: Delete Confirmation Modal -->
                         @endforeach

                     </tbody>
                 </table>
             </div>
             <!-- END: Data List -->

         </div>

     </div>


     <!-- BEGIN: Modal Tambah -->
     <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content"> <!-- BEGIN: Modal Header -->
                 <div class="modal-header">
                     <h2 class="font-medium text-base mr-auto">Tambah Data Tim</h2>

                 </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                 <form action="{{ route('tim.create') }}" method="POST" id="myForm" enctype="multipart/form-data">
                     @csrf
                     <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1"
                                 class="form-label">Nama</label>
                             <input id="modal-form-1" type="text" name="nama" class="form-control"
                                 placeholder="Masukkan Nama" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2"
                                 class="form-label">Jabatan</label>
                             <input id="modal-form-2" type="text" name="jabatan" class="form-control"
                                 placeholder="Masukkan Jabatan" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2"
                                 class="form-label">Motivasi</label>
                             <textarea class="form-control" name="motivasi" id="" cols="20" rows="10"> </textarea>

                         </div>
                         <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2"
                                 class="form-label">Foto</label>
                             <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png"
                                 id="image" required>
                         </div>
                         <div class="col-span-12 sm:col-span-12">
                             <img width="130px auto" id="showImage" style="width: 50px"
                                 src="{{ asset('backend/no_image.webp') }}" alt="Card image cap">
                         </div>

                     </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                     <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                             class="btn btn-danger w-20 mr-1">Cancel</button> <button type="submit"
                             class="btn btn-primary w-20">Save</button>
                     </div>
                 </form>
             </div>
         </div>
     </div> <!-- END: Modal Tambah -->
 @endsection
