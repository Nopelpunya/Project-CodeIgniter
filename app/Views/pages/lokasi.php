<?= $this->include('layouts/header') ?>


<?= $this->include('partials/navbar') ?>
<div class="w-full lg:h-screen overflow-hidden h-[40vh] relative">
    <img src="https://images.unsplash.com/photo-1542766788-a2f588f447ee?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-full w-full" alt="">
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-black/50 flex flex-col items-center justify-center">
        <h1 class="lg:text-5xl text-base font-bold text-yellow-300 text-center">Lokasi <span class="block text-white text-xs lg:text-sm font-normal">Lihat lokasi atau tempat latihan yang tersedia</span></h1>

    </div>
</div>



<div class="w-full bg-white px-5 lg:px-20 py-10">

    <div class="w-full grid lg:grid-cols-3 grid-cols-1 gap-2 mb-10">
        <div class="rounded-md overflow-hidden">

            <img src="https://raw.githubusercontent.com/junwatu/indonesia-map/master/indonesia.png" alt="">
        </div>
        <div class="lg:col-span-2">

            <!-- foreach disini -->
            <?php
            foreach ($tempat_latihan as $data) : ?>
                <button data-popover-target="target<?= $data['id'] ?>" type="button" class="text-white bg-teal-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?= $data['lokasi'] ?></button>

                <div data-popover id="target<?= $data['id'] ?>" role="tooltip" class="absolute z-50 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="p-3">
                        <div class="flex items-center justify-between mb-2">

                            <div>
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><?= $data['nama_fithub'] ?></button>
                            </div>
                        </div>
                        <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                            <a href="#"><?= $data['nama_pemilik'] ?></a>
                        </p>
                        <p class="mb-3 text-sm font-normal">
                            <a href="#" class="hover:underline"><?= $data['telepon'] ?></a>
                        </p>
                        <p class="mb-4 text-sm"><?= $data['alamat_fithub'] ?></p>
                        
                    </div>
                    <div data-popper-arrow></div>
                </div>

            <?php endforeach; ?>

        </div>



    </div>

</div>



    <?= $this->include('partials/footerSection') ?>



    <?= $this->include('layouts/footer') ?>