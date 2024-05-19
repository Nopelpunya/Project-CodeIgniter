<?= $this->include('layouts/header') ?>


<div class="px-5 py-4 lg:px-20">
    <a href="/" class="flex items-center space-x-3">
        <span class="self-center text-white text-base font-semibold whitespace-nowrap text-white bg-yellow-300 px-3 py-2 rounded capitalize"><?= $configs['nama_aplikasi']; ?></span>
        <span>Pendaftaran Kelas</span>
    </a>
</div>

<div class="w-full lg:px-20 mb-10 mt-4 relative">
    <h1 class="text-xl font-bold px-5 lg:px-0 mb-3 text-black">Daftar Kelas <span class="block text-xs font-normal text-slate-600">Silahkan lengkapi formulir dibawah ini untuk mendaftar kelas</span></h1>

    <div class="w-full lg:rounded-lg overflow-hidden lg:shadow grid lg:grid-cols-2 gap-2">
        <div class="lg:border-r p-4 bg-yellow-300">
            <span class="text-sm font-bold text-black">Deskripsi Paket</span>
            <div class="mt-2 p-4 bg-white/25 backdrop-blur-sm rounded-lg shadow sm:p-8 ">
                <h5 class="mb-2 text-3xl font-bold text-black lg:w-auto w-[150px]"><?= $paket['jangka_waktu'] ?> </h5>
                <span class="block text-sm font-normal text-slate-600">Rp. <span class="text-black font-medium"><?= $paket['biaya_bulanan'] ?></span> /bulan</span>
                <ul role="list" class="space-y-5 my-7 border-t border-black py-3">
                    <li class="flex items-center max-w-[250px]">
                        <svg class="flex-shrink-0 w-4 h-4 text-black dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <p class="text-xs font-normal leading-tight text-black dark:text-gray-400 ms-3">Akses tak terbatas ke seluruh tempat di indonesia</p>
                    </li>
                    <li class="flex items-center max-w-[250px]">
                        <svg class="flex-shrink-0 w-4 h-4 text-black dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <p class="text-xs font-normal leading-tight text-black dark:text-gray-400 ms-3">Gratis kelas setiap harinya</p>
                    </li>
                    <?php if ($paket['keunggulan']) : ?>
                        <li class="flex items-center max-w-[250px]">
                            <svg class="flex-shrink-0 w-4 h-4 text-black dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <p class="text-xs font-normal leading-tight text-black dark:text-gray-400 ms-3">Gratis <?= $paket['keunggulan'] ?> sesi personal training</p>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        <form action="/register/member" method="post" class="p-4 lg:pb-0 pb-10">
        
                <input type="hidden" name="id_paket_membership" value="<?= $paket['id'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama.." required />
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama.." required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email@gmail.com" required />
            </div>
            <div class="mb-5">
                <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                <input type="text" id="telepon" name="telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="mb-5">
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="pria">Laki-Laki</option>
                    <option value="wanita">Perempuan</option>
                </select>
            </div>


            <div class="fixed lg:block bg-white left-0 right-0 bottom-0 py-4 lg:px-20 px-5 flex items-center lg:text-end justify-end z-50 border-t lg:border-none border-yellow-300">
                <button type="submit" class="text-sm font-bold text-black bg-yellow-300 px-5 py-2 rounded">Lanjutkan</button>
            </div>
        </form>
    </div>
</div>






<?= $this->include('layouts/footer') ?>