     @extends('backend.admin_master')
     @section('backend')
         <div class="content">
             <form action="{{ route('sepatu.create') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="intro-y flex items-center mt-8">
                     <h2 class="text-lg font-medium mr-auto">
                         Tambah Data Sepatu
                     </h2>
                 </div>
                 <div class="grid grid-cols-12 gap-6 mt-5">
                     <div class="intro-y col-span-12 lg:col-span-6">
                         <!-- BEGIN: Input -->
                         <div class="intro-y box">
                             <div
                                 class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                 <h2 class="font-medium text-base mr-auto">
                                     Detail
                                 </h2>

                             </div>
                             <div id="input" class="p-5">
                                 <div class="preview">
                                     <div>
                                         <label for="regular-form-1" class="form-label">Nama</label>
                                         <input id="regular-form-1" type="text" name="nama" class="form-control"
                                             placeholder="Masukkan Nama" required>
                                     </div>
                                     <div class="mt-2">
                                         <label class="form-label w-full flex flex-col sm:flex-row">
                                             Harga
                                         </label> <input type="number" name="harga" class="form-control"
                                             placeholder="Masukkan Harga" required>

                                     </div>
                                     <div class="mt-2">
                                         <label class="form-label w-full flex flex-col sm:flex-row">
                                             Size
                                         </label>
                                         <select name="ukuran[]" data-placeholder="Pilih Ukuran" class="tom-select w-full"
                                             multiple>
                                             <option value="38">38</option>
                                             <option value="39">39</option>
                                             <option value="40">40</option>
                                             <option value="41">41</option>
                                             <option value="42">42</option>
                                             <option value="43">43</option>
                                             <option value="44">44</option>
                                             <option value="45">45</option>
                                         </select>

                                     </div>
                                     <div class="mt-2">
                                         <label for="regular-form-1" class="form-label">Foto</label>

                                         <div class="input-group mb-2">
                                             <input name="foto[]" type="file" required multiple />

                                         </div>

                                     </div>
                                 </div>

                             </div>
                         </div>
                         <!-- END: Input -->

                     </div>

                     <div class="intro-y col-span-12 lg:col-span-6">
                         <!-- BEGIN: Vertical Form -->
                         <div class="intro-y box">
                             <div
                                 class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                 <h2 class="font-medium text-base mr-auto">
                                     Additional
                                 </h2>

                             </div>
                             <div id="vertical-form" class="p-5">
                                 <div class="preview">
                                     <div>
                                         <label for="vertical-form-1" class="form-label">Ket</label>
                                         <textarea class="form-control" name="ket" placeholder="Masukkan Ket" required></textarea>
                                     </div>
                                     <div class="mt-2">
                                         <label for="vertical-form-1" class="form-label">Kategori</label>
                                         <select data-placeholder="Select your favorite actors" class="tom-select w-full"
                                             name="kategori_id">
                                             @foreach ($kategori as $item)
                                                 <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <div class="mt-2">
                                         <label for="vertical-form-1" class="form-label">Brand</label>
                                         <select data-placeholder="Select your favorite actors" class="tom-select w-full"
                                             name="brands_id" required>
                                             @foreach ($brands as $item)
                                                 <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <div class="mt-2">
                                         <label class="form-label w-full flex flex-col sm:flex-row">
                                             Stock </label> <input type="number" name="stock" class="form-control"
                                             placeholder="Masukkan Stock" required>
                                     </div>
                                     <div class="mt-2">
                                         <label for="vertical-form-1" class="form-label">Popular</label>
                                         <select data-placeholder="Select your favorite actors" class="tom-select w-full"
                                             name="popular" required>
                                             <option value="2">Not Popular</option>
                                             <option value="1">Popular</option>

                                         </select>
                                     </div>
                                     <div class="mt-2">
                                         <label class="form-label w-full flex flex-col sm:flex-row">
                                             Berat (gram) </label> <input type="number" name="berat" class="form-control"
                                             placeholder="Masukkan Berat" required>
                                     </div>
                                 </div>

                             </div>
                         </div>
                         <!-- END: Vertical Form -->


                     </div>
                 </div>
                 <div class="modal-footer  mt-4"> <a href="{{ route('sepatu.all') }}"
                         class="btn btn-danger w-20 mr-1">Cancel</a> <button type="submit"
                         class="btn btn-primary w-20">Save</button>
                 </div>
             </form>

         </div>
     @endsection
