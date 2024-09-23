 <div class="">
     <form method="POST" action="{{ route('frontend.profile.update') }}" enctype="multipart/form-data"
         class="relative flex flex-col items-center w-full max-w-[642px] text-center rounded-3xl p-8 py-[70px] gap-8 bg-white mx-auto "
         style="margin-top: 60px">
         @csrf
         @method('patch')
         <div class="flex flex-col items-center gap-4">
             <h1 class="font-['ClashDisplay-SemiBold'] text-[32px] leading-10 tracking-05">Profile</h1>
         </div>

         <img width="100px auto" id="showImage" style="width: 100px"
             src="{{ !empty(Auth::user()->foto) ? url('storage/' . Auth::user()->foto) : url('backend/no_image.webp') }}"
             alt="Card image cap">

         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Nama</p>
             <input type="text" name="name" id=""
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 placeholder="Masukkan Nama" value="{{ Auth::user()->name }}" required required>
         </label>
         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Email</p>
             <input type="email" name="email" id=""
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 placeholder="Masukkan Email" value="{{ Auth::user()->email }}" required>
         </label>
         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Provinsi</p>
             <select
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 id="province" wire:model.live.debounce.150ms="selectedProvince" name="province_id" required>

                 @foreach ($provinces as $province)
                    
                     <option value="{{ $province->id }}"
                         {{ $province->id == Auth::user()->province_id ? 'selected' : '' }}>
                         {{ $province->name }}
                     </option>
                 @endforeach
             </select>
         </label>
         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Kota</p>
             <select
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 name="city_id" required>

                 @foreach ($cities as $city)
                     <option value="{{ $city->id }}"
                         {{ $city->id == Auth::user()->city_id || Auth::user()->id == $selectedCity ? 'selected' : '' }}>
                         {{ $city->name }}
                     </option>
                 @endforeach
             </select>
         </label>
         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">No Hp</p>
             <input type="text" name="hp" id=""
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 placeholder="Masukkan No Hp" value="{{ Auth::user()->hp }}" required>
         </label>

         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Alamat</p>
             <textarea
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 name="alamat" id="" cols="10" rows="5" required placeholder="Masukkan Alamat Lengkap">{{ Auth::user()->alamat }}
               </textarea>

         </label>


         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Foto</p>
             <input type="file" name="foto" id=""
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 accept=".jpg, .jpeg, .png" id="image">
         </label>



         <button type="submit"
             class="w-fit rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Save</button>

     </form>

     <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data"
         class="relative flex flex-col items-center w-full max-w-[642px] text-center rounded-3xl p-8 py-[70px] gap-8 bg-white mx-auto "
         style="margin-top: 60px">
         @csrf
         @method('put')

         <div class="flex flex-col items-center gap-4">
             <h1 class="font-['ClashDisplay-SemiBold'] text-[32px] leading-10 tracking-05">Change Password</h1>
         </div>

         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Password Saat Ini</p>
             <input type="password" id="update_password_current_password" name="current_password"
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 autocomplete="current-password" required>
         </label>

         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Password Baru</p>
             <input type="password" id="update_password_password" name="password"
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 autocomplete="new-password" required>
         </label>

         <label class="flex flex-col gap-1 font-['Poppins'] w-full items-start">
             <p class="font-semibold text-fitcamp-black">Konfirmasi Password</p>
             <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                 class="outline-none flex w-full rounded-xl px-3 py-4 border border-[#BFBFBF] bg-white font-['Poppins'] text-sm leading-[22px] tracking-03 placeholder:text-[#BFBFBF] transition-all duration-300 group-focus-within:border-black"
                 autocomplete="new-password" required>
         </label>

         <button type="submit"
             class="w-fit rounded-full py-3 px-6 bg-[#606DE5] font-semibold leading-19 tracking-05 text-white text-center">Change</button>

     </form>

 </div>
