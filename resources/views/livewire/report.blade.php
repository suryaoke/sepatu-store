  <div class="grid grid-cols-12 gap-6 mt-5">
      <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
          <div class="items-center  rounded-[53px] bg-white" style="height: 63px; padding:10px;">
              <select wire:model.live.debounce.150ms="selectedStatus" style="height: 40px; padding:10px;">
                  <option value="">&nbsp;&nbsp &nbsp;&nbsp Pilih Status &nbsp;&nbsp &nbsp;&nbsp</option>
                  <option value="null">Belum Bayar</option>
                  <option value="1">Pending</option>
                  <option value="2">Ditolak</option>
                  <option value="3">Dikirim</option>
                  <option value="4">Diterima</option>
              </select>
          </div>
          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="search"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-semibold placeholder:text-[#3F3F3F80]"
                      placeholder="Search Kode Transaksi...">

              </form>

          </div>
          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="searchpelanggan"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-semibold placeholder:text-[#3F3F3F80]"
                      placeholder="Search Pelanggan...">

              </form>

          </div>

          <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  bg-white " style="height: 63px; padding:10px;">
                  <input type="text" wire:model.live.debounce.150ms="searchnamasepatu"
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
                          <th class="whitespace-nowrap">Kode Transaksi</th>
                          <th class="whitespace-nowrap">Sepatu</th>
                          <th class="whitespace-nowrap">Nama Pelanggan</th>
                          <th class="whitespace-nowrap">Ukuran</th>
                          <th class="whitespace-nowrap">Jumlah</th>
                          <th class="whitespace-nowrap">Total Harga</th>
                          <th class="whitespace-nowrap">Tanggal</th>
\
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
                                                   
                          </tr>

                        
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
