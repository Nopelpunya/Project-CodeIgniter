
<nav class="lg:px-20 px-5 fixed w-full z-50 backdrop-blur-sm bg-gradient-to-b from-black/50 to-transparent">
  <div class="flex flex-wrap items-center justify-between mx-auto py-4">
    <a href="/" class="flex items-center space-x-3">
        <span class="self-center text-white text-base font-semibold whitespace-nowrap text-white bg-yellow-300 px-3 py-2 rounded capitalize"><?= $configs['nama_aplikasi']; ?></span>
    </a>
    <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-white focus:text-yellow-300 " aria-controls="navbar-hamburger" aria-expanded="false">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full pb-10 transition" id="navbar-hamburger">
      <div class="lg:grid grid-cols-4 font-medium mt-4 text-white gap-5">
        <ul class="lg:border-r-2 lg:border-yellow-300 flex flex-col">
            <h1 class="border-b-2 border-yellow-300 lg:border-none py-3 lg:text-base font-bold">Pendaftaran</h1>
            <li><a href="/membership" class="text-sm font-medium hover:text-yellow-400 transition">Paket Membership</a></li>
            <li><a href="" class="text-sm font-medium hover:text-yellow-400 transition">Daftar Mitra</a></li>
            <li class="mt-2"><a href="/login" class="text-sm font-medium hover:text-black bg-teal-500 hover:bg-white px-7 py-2 rounded transition">Login</a></li>
        </ul>

        <ul class="lg:border-r-2 lg:border-yellow-300 flex flex-col">
            <h1 class="border-b-2 border-yellow-300 lg:border-none py-3 lg:text-base font-bold">Program Latihan</h1>
            <li><a href="/jadwal" class="text-sm font-medium hover:text-yellow-400 transition">Jadwal</a></li>
            <li><a href="/lokasi" class="text-sm font-medium hover:text-yellow-400 transition">Lokasi</a></li>
        </ul>

        <ul class="lg:border-r-2 lg:border-yellow-300 flex flex-col">
            <h1 class="border-b-2 border-yellow-300 lg:border-none py-3 lg:text-base font-bold">FAQ</h1>
            <li><a href="" class="text-sm font-medium hover:text-yellow-400 transition">Bagaimana cara mendaftar?</a></li>
            <li><a href="" class="text-sm font-medium hover:text-yellow-400 transition">Pembayaran</a></li>
            <li><a href="" class="text-sm font-medium hover:text-yellow-400 transition">Lainnya</a></li>
        </ul>

        <ul class="lg:border-r-2 lg:border-yellow-300 flex flex-col">
            <h1 class="border-b-2 border-yellow-300 lg:border-none py-3 lg:text-base font-bold">Tentang Kami</h1>
            <li><a href="" class="text-sm font-medium hover:text-yellow-400 transition">Kontak</a></li>
            <li><a href="" class="text-sm font-medium hover:text-yellow-400 transition">Selengkapnya</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
