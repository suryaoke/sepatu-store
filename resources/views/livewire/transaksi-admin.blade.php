  <div class="grid grid-cols-12 gap-6 mt-5">
      <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
          <div class="items-center  rounded-[53px] bg-white" style="height: 63px; padding:10px;">
              <select wire:model.live.debounce.150ms="selectedStatus" style="height: 40px; padding:10px;">
                  <option value="">&nbsp;&nbsp &nbsp;&nbsp Pilih Status &nbsp;&nbsp &nbsp;&nbsp</option>
                  <option value="5">Belum Bayar</option>
                  <option value="1">Pending</option>
                  <option value="2">Ditolak</option>
                  <option value="3">Dikirim</option>
                  <option value="4">Diterima</option>
              </select>
          </div>
          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="search"
                      class="appearance-none outline-none !bg-white w-full leading-19  placeholder:text-[#3F3F3F80]"
                      placeholder="Search Kode Transaksi...">

              </form>

          </div>
          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="searchpelanggan"
                      class="appearance-none outline-none !bg-white w-full leading-19  placeholder:text-[#3F3F3F80]"
                      placeholder="Search Pelanggan...">

              </form>

          </div>

          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="searchnamasepatu"
                      class="appearance-none outline-none !bg-white w-full leading-19  placeholder:text-[#3F3F3F80]"
                      placeholder="Search Sepatu...">
                  <a href="{{ route('transaksi.all') }}" class="rounded-[48px] py-3 px-6   leading-19 text-white"
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
                          <th class="whitespace-nowrap">Kode Transaksi</th>
                          <th class="whitespace-nowrap">Sepatu</th>
                          <th class="whitespace-nowrap">Nama Pelanggan</th>
                          <th class="whitespace-nowrap">Ukuran</th>
                          <th class="whitespace-nowrap">Jumlah</th>
                          <th class="whitespace-nowrap">Total Harga</th>
                          <th class="whitespace-nowrap">Tanggal Pesan</th>
                          <th class="whitespace-nowrap">No Hp</th>
                          <th class="whitespace-nowrap">Status</th>
                          <th class="whitespace-nowrap">Detail</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($transaksi as $index => $item)
                          @php
                              $sepatu = App\Models\Sepatu::where('id', $item->sepatu_id)->first();
                              $size = App\Models\Size::where('sepatu_id', $sepatu->id)->first();
                          @endphp
                          <tr class="intro-x">
                              <td class="font-medium whitespace-nowrap">
                                  {{ ($transaksi->currentPage() - 1) * $transaksi->perPage() + $index + 1 }}

                              </td>

                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->trx_id }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->sepatus->nama }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->user->name }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $size->ukuran }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->total_sepatu }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->created_at }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  {{ $item->user->hp }}
                              </td>
                              <td class="font-medium whitespace-nowrap">
                                  @if ($item->status == '1')
                                      <button class="btn btn-pending">
                                          Pending
                                      </button>
                                  @elseif($item->status == 5)
                                      <button class="btn btn-danger">
                                          Belum Bayar
                                      </button>
                                  @elseif ($item->status == '2')
                                      <button class="btn btn-dark">
                                          Ditolak
                                      </button>
                                  @elseif ($item->status == '3')
                                      <button class="btn btn-primary">
                                          Dikirim
                                      </button>
                                  @elseif ($item->status == '4')
                                      <button class="btn btn-success">
                                          Diterima
                                      </button>
                                  @endif
                              </td>


                              <td class="font-medium whitespace-nowrap">
                                  @if ($item->status == 1 || $item->status == '3' || $item->status == '4')
                                      <a data-tw-toggle="modal"
                                          data-tw-target="#button-modal-preview-{{ $item->id }}"
                                          class="btn btn-primary mr-1 mb-2">
                                          <i data-lucide="file-text" class="w-4 h-4"></i> </a>
                                  @endif
                                  <a data-tw-toggle="modal"
                                      data-tw-target="#delete-confirmation-modal-{{ $item->id }}"
                                      class="btn btn-danger mr-1 mb-2">
                                      <i data-lucide="trash" class="w-4 h-4"></i> </a>
                              </td>
                          </tr>

                          <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
                          <div id="button-modal-preview-{{ $item->id }}" class="modal" tabindex="-1"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content"> <a data-tw-dismiss="modal" href="javascript:;"> <i
                                              data-lucide="x" class="w-8 h-8 text-slate-400"></i> </a>
                                      <div class="modal-body p-0">
                                          <form action="{{ route('transaksi.update.status') }}" method="POST ">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $item->id }}">
                                              <div class="p-5 text-center">
                                                  <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">

                                                      <div
                                                          class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-5 py-4">
                                                          <div class="w-10 h-10 flex-none image-fit">
                                                              <img alt="Midone - HTML Admin Template"
                                                                  class="rounded-full"
                                                                  src="{{ asset('storage/' . $item->user->foto) }}">
                                                          </div>
                                                          <div class="ml-3 mr-auto">
                                                              <a href="" class="font-medium">
                                                                  {{ $item->user->name }} </a>
                                                              <div class="flex text-slate-500 truncate text-xs mt-0.5">
                                                                  <a class="text-primary inline-block truncate"
                                                                      href=""> {{ $item->created_at }} </a>
                                                              </div>

                                                          </div>

                                                      </div>

                                                      <div class="p-5 ">
                                                          <div class="h-40 2xl:h-56 image-fit">
                                                              <img alt="Midone - HTML Admin Template"
                                                                  class="rounded-md"
                                                                  src="{{ asset('storage/' . $item->proof) }}">
                                                          </div>

                                                          <div
                                                              class="mt-2 float-right flex items-center px-5 py-3 border-t border-slate-200/60 dark:border-darkmode-400">
                                                              <!-- Tautan untuk mengunduh bukti pembayaran -->
                                                              <a href="{{ asset('storage/' . $item->proof) }}"
                                                                  download>
                                                                  Bukti Pembayaran
                                                              </a>

                                                              <!-- Tombol untuk mendownload gambar bukti pembayaran -->
                                                              <a href="{{ asset('storage/' . $item->proof) }}"
                                                                  class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip"
                                                                  title="Download Bukti Pembayaran" download>
                                                                  <i data-lucide="share" class="w-3 h-3"></i>
                                                              </a>
                                                          </div>

                                                      </div>
                                                      <div
                                                          class="px-5 pt-3 pb-5 border-t border-slate-200/60 dark:border-darkmode-400">
                                                          <div
                                                              class="flex flex-col w-full max-w-[665px] shrink-0 rounded-3xl px-[57.5px] py-[46px] gap-6 bg-white">


                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Kode Transaksi : {{ $item->trx_id }} </p>

                                                              </div>
                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Sepatu : {{ $item->sepatus->nama }} </p>

                                                              </div>
                                                              <div class="flex items-center justify-between">
                                                                  @php
                                                                      $size = App\Models\Size::where(
                                                                          'sepatu_id',
                                                                          $item->sepatu_id,
                                                                      )->first();
                                                                  @endphp
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Ukuran : {{ $size->ukuran }}</p>

                                                              </div>
                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Jumlah : {{ $item->total_sepatu }}</p>

                                                              </div>
                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Kode Promo :
                                                                  <p class="text-danger">
                                                                      -Rp.
                                                                      {{ $item->voucher ? number_format($item->voucher->harga, 0, ',', '.') : '0' }}
                                                                  </p>
                                                                  </p>

                                                              </div>
                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Ongkir : Rp.
                                                                      {{ number_format($item->ongkir, 0, ',', '.') }}
                                                                  </p>

                                                              </div>

                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Total Payment : Rp.
                                                                      {{ number_format($item->total_harga, 0, ',', '.') }}
                                                                  </p>

                                                              </div>

                                                              <div class="flex items-center justify-between">
                                                                  <p
                                                                      class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">
                                                                      Payment Status :
                                                                      @if ($item->status == '1')
                                                                          <button class="btn btn-pending">
                                                                              Pending
                                                                          </button>
                                                                      @elseif($item->status == 5)
                                                                          <button class="btn btn-danger">
                                                                              Belum Bayar
                                                                          </button>
                                                                      @elseif ($item->status == '2')
                                                                          <button class="btn btn-dark">
                                                                              Ditolak
                                                                          </button>
                                                                      @elseif ($item->status == '3')
                                                                          <button class="btn btn-primary">
                                                                              Dikirim
                                                                          </button>
                                                                      @elseif ($item->status == '4')
                                                                          <button class="btn btn-success">
                                                                              Diterima
                                                                          </button>
                                                                      @endif

                                                              </div>
                                                              <div class="flex items-center justify-between"> <label
                                                                      for="modal-form-6" class="form-label">Update
                                                                      Status
                                                                      :&nbsp;&nbsp; </label>
                                                                  <select name="status" required>
                                                                      <option value="">--Pilih Status--</option>
                                                                      <option value="2">Ditolak</option>
                                                                      <option value="3">Dikirim</option>
                                                                      <option value="4">Diterima</option>

                                                                  </select>
                                                              </div>

                                                          </div>

                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="modal-footer"> <button type="button"
                                                      data-tw-dismiss="modal"
                                                      class="btn btn-danger w-20 mr-1">Cancel</button> <button
                                                      type="submit" class="btn btn-primary w-20">Save</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div> <!-- END: Modal Content -->

                          <!-- BEGIN: Delete Confirmation Modal -->
                          <div id="delete-confirmation-modal-{{ $item->id }}" class="modal" tabindex="-1"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-body p-0">
                                          <div class="p-5 text-center">
                                              <i data-lucide="x-circle"
                                                  class="w-16 h-16 text-danger mx-auto mt-3"></i>
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
                                              <a href="{{ route('transaksi.delete', $item->id) }}" type="button"
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
              {{ $transaksi->links() }}
          </div>
          <!-- END: Data List -->

      </div>

  </div>
