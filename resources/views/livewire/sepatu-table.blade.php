  <section id="latest" class="flex flex-col w-full max-w-[1280px] gap-8 mx-auto px-10 mt-[120px]">
      <div class="flex items-center justify-between">
          <div class="flex flex-col gap-4">
              <h2 class="font-['ClashDisplay-SemiBold'] text-5xl leading-[59px] tracking-05">Latest Added</h2>
              <p class="leading-19 tracking-03 opacity-60">New Shoes</p>
          </div>

          <div class="">
              <form class="flex items-center w-[487px] rounded-[53px] p-2 pl-6 gap-6 bg-white ">
                  <input type="text" wire:model.live.debounce.150ms="search"
                      class="appearance-none outline-none !bg-white w-full leading-19 font-semibold placeholder:text-[#3F3F3F80]"
                      placeholder="Search Sepatu...">
                  <a href="{{ route('frontend') }}"
                      class="rounded-[48px] py-4 px-6  font-semibold leading-19 text-white"
                      style="background: red">Clear</a>
              </form>

          </div>
      </div>
      <div class="grid grid-cols-3 gap-6">
          @foreach ($sepatu as $item)
              <a wire:key="{{ $item->id }}" href="{{ route('frontend.detail', $item->slug) }}" class="card">
                  <div class="flex flex-col rounded-3xl p-8 gap-6 bg-white">
                      <div class="title flex flex-col gap-2">
                          <h3 class="font-['ClashDisplay-SemiBold'] leading-19 tracking-05">{{ $item->nama }}
                          </h3>

                      </div>
                      <div class="thumbnail flex rounded-3xl h-[200px] bg-[#06425E] overflow-hidden">
                          <img src="{{ asset('storage/' . $item->sepatuFoto->first()->foto) }}"
                              class="w-full h-full object-cover" alt="thumbnail">
                      </div>
                      <style>
                          @import url('https://fonts.googleapis.com/css2?family=Clash+Display:wght@600&display=swap');

                          .font-clash-display {
                              font-family: 'Clash Display', sans-serif;
                              font-weight: 600;
                              /* Semi-bold */
                          }
                      </style>
                      <div class="flex items-center justify-between">

                          <p class="font-clash-display">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>


                          <button class="font-semibold text-xs leading-14 tracking-05 text-fitcamp-royal-blue">View
                              all</button>
                      </div>
                      <div class="grid grid-cols-3 justify-between gap-3">
                          <div class="flex flex-col gap-3 items-center text-center">
                              <img src="{{ asset('storage/' . $item->brands->foto) }}" class="w-10 h-10" alt="icon">
                              <div class="flex flex-col gap-1">

                                  <p class="font-semibold text-sm leading-16 tracking-05"> {{ $item->brands->nama }}
                                  </p>
                              </div>
                          </div>
                          <div class="flex flex-col gap-3 items-center text-center">
                              <img src="{{ asset('storage/' . $item->kategoris->foto) }}" class="w-10 h-10"
                                  alt="icon">
                              <div class="flex flex-col gap-1">

                                  <p class="font-semibold text-sm leading-16 tracking-05"> {{ $item->kategoris->nama }}
                                  </p>
                              </div>
                          </div>
                          <div class="flex flex-col gap-3 items-center text-center">
                              <img src=" {{ asset('frontend/assets/images/icons/Locker.svg') }}" class="w-10 h-10"
                                  alt="icon">
                              <div class="flex flex-col gap-1">

                                  <p class="font-semibold text-sm leading-16 tracking-05">Stock: {{ $item->stock }}
                                  </p>
                              </div>
                          </div>
                      </div>

                  </div>
              </a>
          @endforeach

      </div>
      <div class="mt-4 text-center">
          @if ($sepatu->hasMorePages())
              <button wire:click="loadMore"
                  class="rounded-[48px] py-4 px-6 bg-[#606DE5] font-semibold leading-19 text-white">Load
                  More</button>
          @endif
      </div>

  </section>
