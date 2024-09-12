@extends('backend.admin_master')
@section('backend')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Profile
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                <div class="intro-y box mt-5 lg:mt-0">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('backend/dist/images/profile-1.jpg') }}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base"> {{ Auth::user()->name }} </div>

                        </div>

                    </div>
                    <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <a class="flex items-center  font-medium" href=""> <i data-lucide="mail"
                                class="w-4 h-4 mr-2"></i>: {{ Auth::user()->email }} </a>
                        <a class="flex items-center mt-5" href=""> <i data-lucide="phone-call"
                                class="w-4 h-4 mr-2"></i>
                            : {{ Auth::user()->hp }} </a>

                    </div>

                </div>

            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Edit Profile -->
                    <div class="intro-y box col-span-12 2xl:col-span-6">
                        <div
                            class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Edit Profile
                            </h2>

                        </div>
                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="p-5">
                                <div class="col-span-12 sm:col-span-12">
                                    <label for="modal-form-1" class="form-label">Nama</label>
                                    <input id="modal-form-1" type="text" name="name" class="form-control"
                                        placeholder="Masukkan Nama" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="col-span-12 sm:col-span-12 mt-2">
                                    <label for="modal-form-2" class="form-label">Email</label>
                                    <input id="modal-form-2" type="email" name="email" class="form-control"
                                        placeholder="Masukkan Email" value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="col-span-12 sm:col-span-12 mt-2">
                                    <label for="modal-form-1" class="form-label">No Hp</label>
                                    <input id="modal-form-1" type="text" name="hp" class="form-control"
                                        placeholder="Masukkan No Hp" value="{{ Auth::user()->hp }}">
                                </div>
                                <div class="col-span-12 sm:col-span-12 mt-2"> <label for="modal-form-2"
                                        class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png"
                                        id="image">
                                </div>
                                <div class="col-span-12 sm:col-span-12 mt-2">
                                    <img width="100px auto" id="showImage" style="width: 100px"
                                        src="{{ !empty(Auth::user()->foto) ? url('storage/' . Auth::user()->foto) : url('backend/no_image.webp') }}"
                                        alt="Card image cap">
                                </div>
                                <div class="flex items-center mt-5">
                                    <button type="submit" class="btn btn-primary ml-auto">Save</button>
                                </div>
                            </div>
                        </form>


                    </div>
                    <!-- END: Edit Profile -->


                    <!-- BEGIN: Change Password -->
                    <div class="intro-y box col-span-12 2xl:col-span-6">
                        <div
                            class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Change Password
                            </h2>

                        </div>
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div class="p-5">
                                <div class="col-span-12 sm:col-span-12">
                                    <label for="update_password_current_password" class="form-label">Password Saat
                                        Ini</label>
                                    <input id="update_password_current_password" name="current_password" type="password"
                                        class="form-control" placeholder="" autocomplete="current-password" required>
                                </div>

                                <div class="col-span-12 sm:col-span-12 mt-2">
                                    <label for="update_password_password" class="form-label">Password Baru</label>
                                    <input id="update_password_password" name="password" type="password"
                                        class="form-control" placeholder="" autocomplete="new-password" required>
                                </div>

                                <div class="col-span-12 sm:col-span-12 mt-2">
                                    <label for="update_password_password_confirmation" class="form-label">Konfirmasi
                                        Password</label>
                                    <input id="update_password_password_confirmation" name="password_confirmation"
                                        type="password" class="form-control" placeholder="" autocomplete="new-password"
                                        required>
                                </div>


                                <div class="flex items-center mt-5">

                                    <button type="submit" class="btn btn-primary ml-auto">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- END: Change Password -->
                </div>
            </div>
        </div>
    </div>
@endsection
