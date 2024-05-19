<?= $this->include('layouts/header') ?>



<!-- if userdata['logged_id'] nya ada maka tampilkan data user yang disimpan dalam session -->
<div class="relative bg-yellow-50 overflow-hidden max-h-screen">
    <?= $this->include('partials/topbar') ?>
    <?= $this->include('partials/aside') ?>

    

    <main class="lg:ml-60 ml-0 pt-16 max-h-screen overflow-auto">
        <div class="px-6 py-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 mb-5">
                    <h1 class="text-3xl font-bold mb-10">Selamat datang di Dashboard, Kelola data-data yang anda butuhkan</h1>
                    <p class="text-xs font-normal text-gray-700"><?= $configs['deskripsi_aplikasi'] ?></p>

                    <hr class="my-10">

                    <div class="w-full rounded-xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542766788-a2f588f447ee?q=80&w=1476&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="w-full h-full" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>




<?= $this->include('layouts/footer') ?>