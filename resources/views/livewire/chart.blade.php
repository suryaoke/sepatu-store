  <div class="relative flex justify-center w-full max-w-[1280px] gap-6 mx-auto px-10 mt-[96px]">
      <div class="flex flex-col w-full max-w-[1280px] shrink-0 rounded-3xl px-[57.5px] py-[46px] gap-6 bg-white">
          <h1 class="font-['ClashDisplay-SemiBold'] text-[32px] leading-10 tracking-05 text-center">Transaction History
          </h1>
          <div style="margin-top: 10px " class=" flex items-center justify-between">
              <form class="flex items-center w-[487px] rounded-[53px] p-2 pl-6  bg-white">
                  <input type="hidden" wire:model.live.debounce.150ms="search"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-semibold placeholder:text-[#3F3F3F80]"
                      placeholder="Search Nama Sepatu...">
              </form>
              <form class="flex items-center w-[487px] rounded-[53px] p-2 pl-6  bg-white">
                  <input type="text" wire:model.live.debounce.150ms="searchnamasepatu"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-bold placeholder:text-[#00000080]"
                      placeholder="Search Nama Sepatu...">
              </form>
              <form style="" class="flex items-center w-[487px] rounded-[53px] p-2 pl-6  bg-white">
                  <input type="text" wire:model.live.debounce.150ms="search"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-bold placeholder:text-[#00000080]"
                      placeholder="Search Kode Transaksi...">
                  <a href="{{ route('frontend.cart') }}"
                      class="rounded-[48px] py-4 px-6  font-semibold leading-19 text-white"
                      style="background: red">Clear</a>
              </form>
          </div>

          <table style="">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Kode Transaksi</th>
                      <th>Sepatu</th>
                      <th>Ukuran</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Status</th>
                      <th>Detail</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($transaksi as $index => $item)
                      @php
                          $sepatu = App\Models\Sepatu::where('id', $item->sepatu_id)->first();
                          $size = App\Models\Size::where('sepatu_id', $sepatu->id)->first();
                      @endphp
                      <tr class="intro-x">
                          <td>
                              {{ ($transaksi->currentPage() - 1) * $transaksi->perPage() + $index + 1 }}

                          </td>
                          <td>
                              {{ $item->trx_id }}
                          </td>
                          <td>
                              {{ $sepatu->nama }}
                          </td>
                          <td>
                              {{ $size->ukuran }}
                          </td>
                          <td>
                              {{ $item->total_sepatu }}
                          </td>
                          <td>
                              Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                          </td>
                          <td>
                              @if ($item->status == '1')
                                  <p
                                      class="rounded-full py-3 px-6 bg-[#E56062] w-fit font-semibold leading-19 tracking-05 text-white">
                                      Pending
                                  </p>
                              @elseif($item->status == null)
                                  <p style="background: yellow"
                                      class="rounded-full py-3 px-6  w-fit font-semibold leading-19 tracking-05 text-white">
                                      Belum Bayar
                                  </p>
                              @elseif ($item->status == '2')
                                  <p style="background: black"
                                      class="rounded-full py-3 px-6  w-fit font-semibold leading-19 tracking-05 text-white">
                                      Ditolak
                                  </p>
                              @elseif ($item->status == '3')
                                  <p style="background: blue"
                                      class="rounded-full py-3 px-6 bg-[#E56062] w-fit font-semibold leading-19 tracking-05 text-white">
                                      Dikirim
                                  </p>
                              @elseif ($item->status == '4')
                                  <p style="background: green"
                                      class="rounded-full py-3 px-6 bg-[#E56062] w-fit font-semibold leading-19 tracking-05 text-white">
                                      Diterima
                                  </p>
                              @endif
                          </td>
                          <td>
                              <a class="btn btn-secondary" href="{{ route('frontend.payment.detail', $item->trx_id) }}">
                                  <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                      <g id="SVGRepo_iconCarrier">
                                          <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                                          <path
                                              d="M39 4H11C9.89543 4 9 4.89543 9 6V42C9 43.1046 9.89543 44 11 44H39C40.1046 44 41 43.1046 41 42V6C41 4.89543 40.1046 4 39 4Z"
                                              fill="#2F88FF" stroke="#ffffff" stroke-width="4" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                          <path d="M17 30L31 30" stroke="white" stroke-width="4" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                          <path d="M17 36H24" stroke="white" stroke-width="4" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                          <rect x="17" y="12" width="14" height="10" fill="#2F88FF"
                                              stroke="white" stroke-width="4" stroke-linecap="round"
                                              stroke-linejoin="round"></rect>
                                      </g>
                                  </svg></a>
                          </td>



                      </tr>
                  @endforeach

              </tbody>
          </table>
          <div class="d-flex float-right mt-2">
              {{ $transaksi->links() }}
          </div>
      </div>


  </div>
