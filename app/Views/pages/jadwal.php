<?= $this->include('layouts/header') ?>


<?= $this->include('partials/navbar') ?>
<div class="w-full lg:h-screen overflow-hidden h-[40vh] relative">
    <img src="https://images.unsplash.com/photo-1542766788-a2f588f447ee?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-full w-full" alt="">
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-black/50 flex flex-col items-center justify-center">
        <h1 class="lg:text-5xl text-base font-bold text-yellow-300 text-center">Jadwal <span class="block text-white text-xs lg:text-sm font-normal">Lihat jadwal latihan sesuai lokasi dan tanggal</span></h1>

    </div>
</div>



<div class="w-full bg-white px-5 lg:px-20 py-10">
    <h1 class="text-black text-xl lg:text-3xl font-bold">Jadwal Latihan <span class="block text-sm font-normal">Temukan jadwal berdasarkan lokasi dan tanggal</span></h1>
    <form action="/jadwal#acara" method="get">
        <div class="mb-2 mt-3">
            <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kota</label>
            <select id="lokasi" name="lokasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php
                $lokasi = array_unique(array_column($tempat_latihan, 'lokasi'));
                foreach ($lokasi as $loc) :
                ?>
                    <option value="<?= $loc ?>" <?= ($loc == $lokasi_terpilih) ? 'selected' : '' ?>><?= $loc ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="flex items-center gap-2 w-full">
            <div class="max-w-sm">
            <input value="<?= $tanggal_terpilih ?>" type="date" id="tanggal" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

            </div>

            <button type="submit" class="text-sm font-medium text-white bg-blue-400 rounded px-3 py-2"><i class="fa fa-search"></i></button>
        </div>


    </form>

    <section id="acara" class="flex items-center flex-wrap gap-2 mt-5">
    <?php foreach ($jadwals as $jadwal) : ?>
        <div class="rounded-md bg-orange-500 p-4 w-full md:w-auto">
            <div class="flex items-center justify-between">
                <span class="w-4 h-4 p-3 flex bg-white rounded items-center justify-center">
                    <small>⚡</small>
                </span>
                <span class="text-xl font-semibold text-white">
                <?= date('H:i', strtotime($jadwal['jam_kegiatan'])) ?>

                </span>
            </div>
            <h1 class="text-sm font-bold text-white mt-2"><?= $jadwal['nama_latihan'] ?> 
            <span class="block text-xs font-normal"> By <?= $jadwal['trainer'] ?></span>
            <span class="block text-xs font-normal mt-2"> <?= $jadwal['lokasi'] ?> - <?= $jadwal['nama_fithub'] ?></span>
            <span class="block text-xs font-normal"> <?= $jadwal['alamat_fithub'] ?></span>
        </h1>

        <div class="flex items-center justify-between mt-2">
                <span class="flex items-center justify-center text-white">
                    <small>💪 <?= $jadwal['level_kesulitan'] ?></small>
                </span>
                <span class="text-sm bg-white px-3 py-2 rounded font-semibold text-orange-500">
                <?= $jadwal['durasi_latihan'] ?>

                </span>
            </div>
        </div>
        <?php endforeach; ?>

        
    </section>
</div>



<?= $this->include('partials/footerSection') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>


<?= $this->include('layouts/footer') ?>