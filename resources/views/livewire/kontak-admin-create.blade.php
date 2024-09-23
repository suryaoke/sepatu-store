<div class="content">
    <form action="{{ route('kontak.create') }}" method="POST">
        @csrf
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Tambah Data Kontak
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
                                <label for="modal-form-1" class="form-label">No
                                    Hp</label>
                                <input id="modal-form-1" type="number" name="no_hp" class="form-control"
                                    placeholder="Masukkan No Hp">
                            </div>
                            <div class="mt-2">
                                <label for="modal-form-2" class="form-label">Email</label>
                                <input id="modal-form-2" type="email" name="email" class="form-control"
                                    placeholder="example@gmail.com">
                            </div>
                            <div class="mt-2">
                                <label for="modal-form-2" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="" cols="20" rows="5"></textarea>

                            </div>
                            <div class="mt-2">
                                <label class="form-label">Provinsi</label>
                                <select class="form-control tom-select" id="province"
                                    wire:model.live.debounce.150ms="selectedProvince" name="province_id" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-2">
                                <label class="form-label">Kota</label>
                                <select class="form-control tom-select" name="city_id" required>
                                    <option value="">Pilih Kota</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer  mt-4"> <a href="{{ route('kontak.all') }}"
                            class="btn btn-danger w-20 mr-1">Cancel</a> <button type="submit"
                            class="btn btn-primary w-20">Save</button>
                    </div>
                </div>
                <!-- END: Input -->

            </div>


        </div>

    </form>

</div>
