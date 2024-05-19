<?= $this->include('layouts/header') ?>


<?= $this->include('partials/navbar') ?>
<div class="w-full lg:h-screen overflow-hidden h-[40vh] relative">
    <img src="https://images.unsplash.com/photo-1542766788-a2f588f447ee?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-full w-full" alt="">
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-black/50 flex flex-col items-center justify-center">
        <h1 class="lg:text-5xl text-base font-bold text-yellow-300 text-center">Membership <span class="block text-white text-xs lg:text-sm font-normal">Lihat paket kelas yang kami tawarkan</span></h1>
        <?php if (session()->getFlashdata('message')) : ?>
    <div id="alert-1" class="flex items-center mt-5 p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            <?= session()->getFlashdata('message') ?>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
<?php endif; ?>
    </div>
</div>



<div class="w-full bg-white px-5 lg:px-20 flex items-center flex-no-wrap lg:justify-center gap-5 py-10 overflow-x-auto lg:overflow-hidden">


    <?php foreach ($memberships as $paket) : ?>
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 ">
            <h5 class="mb-2 text-3xl font-bold text-teal-400 lg:w-auto w-[150px]"><?= $paket['jangka_waktu'] ?> </h5>
            <span class="block text-sm font-normal text-slate-600">Rp. <span class="text-black font-medium"><?= $paket['biaya_bulanan'] ?></span> /bulan</span>
            <ul role="list" class="space-y-5 my-7 border-t py-3">
                <li class="flex items-center max-w-[250px]">
                    <svg class="flex-shrink-0 w-4 h-4 text-teal-400 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <p class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Akses tak terbatas ke seluruh tempat di indonesia</p>
                </li>
                <li class="flex items-center max-w-[250px]">
                    <svg class="flex-shrink-0 w-4 h-4 text-teal-400 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <p class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Gratis kelas setiap harinya</p>
                </li>
                <?php if ($paket['keunggulan']) : ?>
                    <li class="flex items-center max-w-[250px]">
                        <svg class="flex-shrink-0 w-4 h-4 text-teal-400 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <p class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Gratis <?= $paket['keunggulan'] ?> sesi personal training</p>
                    </li>
                <?php endif; ?>

            </ul>
            <a href="/registration/<?= $paket['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Daftar Kelas</a>
        </div>

    <?php endforeach; ?>

</div>



<?= $this->include('partials/footerSection') ?>


<?= $this->include('layouts/footer') ?>