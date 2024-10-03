  <div class="grid grid-cols-12 gap-6 mt-5">
      <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
          {{--  <div class="items-center  rounded-[53px] bg-white" style="height: 63px; padding:10px;">
              <select wire:model.live.debounce.150ms="selectedStatus" style="height: 40px; padding:10px;">
                  <option value="">&nbsp;&nbsp &nbsp;&nbsp Pilih Status &nbsp;&nbsp &nbsp;&nbsp</option>
                  <option value="null">Belum Bayar</option>
                  <option value="1">Pending</option>
                  <option value="2">Ditolak</option>
                  <option value="3">Dikirim</option>
                  <option value="4">Diterima</option>
              </select>
          </div>  --}}
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
          {{--  <div class="ml-2">

              <form class="flex items-center w-[487px] rounded-[53px]  " style="height: 63px; padding:10px;">


                  <a data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                      class="btn btn-warning mr-1 mb-2">
                      <i data-lucide="printer" class="w-5 h-5"></i>
                  </a>
              </form>

          </div>  --}}
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
                          <th class="whitespace-nowrap">No Hp</th>
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
      <!-- BEGIN: Modal Tambah -->
      <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content"> <!-- BEGIN: Modal Header -->
                  <div class="modal-header">
                      <h2 class="font-medium text-base mr-auto">Report Transaksi</h2>

                  </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->

                  <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                      <form action="" method="POST" id="myForm">
                          <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-4 ml-4">

                              <div class="col-span-12 sm:col-span-12">
                                  <label for="tgl_mulai">Tanggal Mulai</label>
                                  <?php if (isset($_POST['tgl_mulai'])):  ?>

                                  <input type="date" value="<?php echo $_POST['tgl_mulai']; ?>" name="tgl_mulai"
                                      class="form-control" id="tgl_mulai">
                                  <?php else : ?>
                                  <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
                                  <?php endif ?>
                              </div>

                              <div class="col-span-12 sm:col-span-12 ml-2">
                                  <label for="tgl_sampai">Tanggal Sampai</label>
                                  <?php if (isset($_POST['tgl_sampai'])):  ?>

                                  <input type="date" value="<?php echo $_POST['tgl_sampai']; ?>" name="tgl_sampai"
                                      class="form-control" id="tgl_sampai">
                                  <?php else : ?>
                                  <input type="date" name="tgl_sampai" class="form-control" id="tgl_sampai">
                                  <?php endif ?>
                              </div>


                              <div class="col-span-12 sm:col-span-12 ml-2">
                                  <button class="btn btn-primary" type="submit" name="filter">
                                      <i class="w-5 h-5" data-lucide="search"></i>
                                  </button>
                                  <button onclick="cetak()" class="btn btn-dark">
                                      <i class="w-5 h-5" data-lucide="printer"></i>
                                  </button>
                              </div>

                          </div>
                      </form>
                      <script>
                          function cetak() {
                              // Ambil nilai dari input tanggal
                              var tglMulai = document.getElementById('tgl_mulai').value;
                              var tglSampai = document.getElementById('tgl_sampai').value;

                              // Cek apakah kedua tanggal sudah diisi
                              if (tglMulai === "" || tglSampai === "") {
                                  alert("Silakan isi kedua tanggal terlebih dahulu.");
                              } else {
                                  // Jika kedua tanggal sudah diisi, lakukan cetak
                                  $('#myForm').attr('action', 'laporan/print.php');
                                  $('#myForm').attr('target', '_blank');
                                  $('#myForm').submit();
                              }
                          }
                      </script>




                  </div>
              </div>
          </div> <!-- END: Modal Tambah -->
      </div>
