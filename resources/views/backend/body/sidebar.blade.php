  <!-- BEGIN: Side Menu -->
  <nav class="side-nav">
      <ul>

          <li>
              <a href="{{ route('dashboard') }}"
                  class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : (request()->routeIs('profile') ? 'side-menu--active' : '') }}">
                  <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                  <div class="side-menu__title"> Dashboard</div>
              </a>
          </li>

          <li>
              <a href="{{ route('brands.all') }}"
                  class="side-menu {{ request()->routeIs('brands.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trello">
                          <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                          <rect width="3" height="9" x="7" y="7" />
                          <rect width="3" height="5" x="14" y="7" />
                      </svg> </div>
                  <div class="side-menu__title"> Brands </div>
              </a>
          </li>

          <li>
              <a href="{{ route('kategori.all') }}"
                  class="side-menu {{ request()->routeIs('kategori.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                  <div class="side-menu__title"> Kategori </div>
              </a>
          </li>
          <li>
              <a href="{{ route('sepatu.all') }}"
                  class="side-menu {{ request()->routeIs('sepatu.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-footprints">
                          <path
                              d="M4 16v-2.38C4 11.5 2.97 10.5 3 8c.03-2.72 1.49-6 4.5-6C9.37 2 10 3.8 10 5.5c0 3.11-2 5.66-2 8.68V16a2 2 0 1 1-4 0Z" />
                          <path
                              d="M20 20v-2.38c0-2.12 1.03-3.12 1-5.62-.03-2.72-1.49-6-4.5-6C14.63 6 14 7.8 14 9.5c0 3.11 2 5.66 2 8.68V20a2 2 0 1 0 4 0Z" />
                          <path d="M16 17h4" />
                          <path d="M4 13h4" />
                      </svg> </div>
                  <div class="side-menu__title"> Sepatu </div>
              </a>
          </li>

          <li>
              <a href="{{ route('transaksi.all') }}"
                  class="side-menu {{ request()->routeIs('transaksi.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                  <div class="side-menu__title"> Transaksi </div>
              </a>
          </li>

          <li>
              <a href="{{ route('report.all') }}"
                  class="side-menu {{ request()->routeIs('report.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                  <div class="side-menu__title"> Report </div>
              </a>
          </li>


          <li>
              <a href="{{ route('akun.pelanggan.all') }}"
                  class="side-menu {{ request()->routeIs('akun.pelanggan.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                  <div class="side-menu__title"> Akun Pelanggan </div>
              </a>
          </li>


          <li>
              <a href="{{ route('kontak.all') }}"
                  class="side-menu {{ request()->routeIs('kontak.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="contact"></i> </div>
                  <div class="side-menu__title"> Kontak </div>
              </a>
          </li>

          <li>
              <a href="{{ route('tim.all') }}"
                  class="side-menu {{ request()->routeIs('tim.all') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                  <div class="side-menu__title"> Tim </div>
              </a>
          </li>



      </ul>
  </nav>
  <!-- END: Side Menu -->
