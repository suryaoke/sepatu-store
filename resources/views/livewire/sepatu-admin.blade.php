  <div class="grid grid-cols-12 gap-6 mt-5">
      <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

          <a href="{{ route('sepatu.show.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data</a>

          <div class="items-center  rounded-[53px] bg-white" style="height: 63px; padding:10px;">
              <select wire:model.live.debounce.150ms="selectedKategori" style="height: 40px; padding:10px;">
                  <option value="">&nbsp;&nbsp &nbsp;&nbsp Kategori &nbsp;&nbsp &nbsp;&nbsp</option>
                  @foreach ($kategoris as $kategori)
                      <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                      <!-- Sesuaikan dengan atribut model Anda -->
                  @endforeach
              </select>
          </div>
          <div class="items-center  rounded-[53px] bg-white" style="height: 63px; padding:10px;">
              <select wire:model.live.debounce.150ms="selectedBrands" style="height: 40px; padding:10px;">
                  <option value="">&nbsp;&nbsp &nbsp;&nbsp Brand &nbsp;&nbsp &nbsp;&nbsp</option>
                  @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->nama }}</option>
                      <!-- Sesuaikan dengan atribut model Anda -->
                  @endforeach
              </select>
          </div>
          <div class="items-center  rounded-[53px] bg-white" style="height: 63px; padding:10px;">
              <select wire:model.live.debounce.150ms="selectedPopular" style="height: 40px; padding:10px;">
                  <option value="">&nbsp;&nbsp &nbsp;&nbsp Pilih Popular &nbsp;&nbsp &nbsp;&nbsp</option>
                  <option value="1">Popular</option>
              </select>
          </div>
          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="search"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-semibold placeholder:text-[#3F3F3F80]"
                      placeholder="Search Sepatu...">
                  <a href="{{ route('sepatu.all') }}"
                      class="rounded-[48px] py-3 px-6  font-semibold leading-19 text-white"
                      style="background: red">Clear</a>
              </form>

          </div>
      </div>
      <!-- BEGIN: Data List -->
      <div class="intro-y col-span-12 overflow-x-auto">
          <div class="min-w-max">
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th class="whitespace-nowrap">NO</th>
                          <th class="whitespace-nowrap">Nama</th>
                          <th class="whitespace-nowrap">Harga</th>
                          <th class="whitespace-nowrap">Brands</th>
                          <th class="whitespace-nowrap">Kategori</th>
                          <th class="whitespace-nowrap">Stok</th>
                          <th class="whitespace-nowrap">Berat (gram)</th>
                          <th class="whitespace-nowrap">Popular</th>
                          <th class="whitespace-nowrap">ACTIONS</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($sepatu as $index => $item)
                          <tr class="intro-x">
                              <td class="font-medium whitespace-nowrap">
                                  {{ ($sepatu->currentPage() - 1) * $sepatu->perPage() + $index + 1 }}

                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->nama }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  Rp. {{ number_format($item->harga, 0, ',', '.') }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  <img style="width: 75px" src="{{ asset('storage/' . $item->brands->foto) }}"
                                      alt="">
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->kategoris->nama }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->stock }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->berat }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  @if ($item->popular == 1)
                                      Popular
                                  @elseif ($item->popular == 2)
                                      Not Popular
                                  @endif
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  <a data-tw-toggle="modal"
                                      data-tw-target="#delete-confirmation-modal-{{ $item->id }}"
                                      class="btn btn-danger mr-1 mb-2">
                                      <i data-lucide="trash" class="w-4 h-4"></i> </a>
                                  <a href="{{ route('sepatu.show.edit', $item->slug) }}"
                                      class="btn btn-warning mr-1 mb-2">
                                      <i data-lucide="edit" class="w-4 h-4"></i>
                                  </a>
                              </td>

                          </tr>

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
                                              <a href="{{ route('sepatu.delete', $item->id) }}" type="button"
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
          <div class="d-flex float-right mt-2">
              {{ $sepatu->links() }}
          </div>
          <!-- END: Data List -->

      </div>

  </div>
