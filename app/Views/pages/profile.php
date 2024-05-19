<?= $this->include('layouts/header') ?>



<!-- if userdata['logged_id'] nya ada maka tampilkan data user yang disimpan dalam session -->
<div class="relative bg-yellow-50 overflow-hidden">
    <?= $this->include('partials/topbar') ?>
    <?= $this->include('partials/aside') ?>



    <main class="lg:ml-60 ml-0 pt-16">
        <div class="px-6 py-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 mb-5">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div id="toast-success" class="flex items-center w-full w-full mt-3 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="sr-only">Check icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal"><?= session()->getFlashdata('success') ?></div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div id="toast-danger" class="flex items-center w-full w-full mt-3 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <div class="ms-3 text-sm font-normal">
                                    <?= esc($error) ?>
                                </div>
                            <?php endforeach; ?>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                    <h1 class="text-sm font-bold text-black mb-5">Profile <span class="block text-sm font-normal">Perbarui informasi profil</span></h1>
                    <form action="/profile/update/<?= $userdata['id'] ?>" method="post">
                        <div class="">
                            <div class="mb-5">
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="nama" id="username" name="username" value="<?= $userdata['username'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>
                            <div class="mb-5">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <input type="hidden" name="role" value="<?= $userdata['role'] ?>">
                            <button class="w-full block text-center text-sm font-bold text-white bg-purple-500 py-4 rounded-md">Save</button>
                        </div>
                    </form>

                    <?php if ($userdata['role'] == 'mitra') : ?>
                        <h1 class="text-sm font-bold text-black mb-5 mt-10">Informasi Lainnya <span class="block text-sm font-normal">Perbarui informasi lainnya</span></h1>
                        <?php $index = 1; foreach($data_mitras as $data_mitra): ?>
                        <form action="/profile/mitra/update/<?= $data_mitra['id'] ?>" method="post">
                            <div class="">
                                <div class="mb-5">
                                    <input type="hidden" name="user_id" value="<?= $data_mitra['user_id'] ?>">
                                    <label for="nama_fithub<?= $data_mitra['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Fithub <?= $index ?></label>
                                    <input type="text" id="nama_fithub<?= $data_mitra['id'] ?>" name="nama_fithub" value="<?= $data_mitra['nama_fithub'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5">
                                    <label for="nama_pemilik<?= $data_mitra['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik <?= $index ?></label>
                                    <input type="text" id="nama_pemilik<?= $data_mitra['id'] ?>" name="nama_pemilik" value="<?= $data_mitra['nama_pemilik'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5">
                                    <label for="lokasi<?= $data_mitra['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi <?= $index ?></label>
                                    <input type="text" id="lokasi<?= $data_mitra['id'] ?>" name="lokasi" value="<?= $data_mitra['lokasi'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5">
                                    <label for="telepon<?= $data_mitra['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telepon <?= $index ?></label>
                                    <input type="text" id="telepon<?= $data_mitra['id'] ?>" name="telepon" value="<?= $data_mitra['telepon'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5">
                                    <label for="alamat_fithub<?= $data_mitra['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Fithub <?= $index ?></label>
                                    <input type="text" id="alamat_fithub<?= $data_mitra['id'] ?>" name="alamat_fithub" value="<?= $data_mitra['alamat_fithub'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5">
                                    <label for="email<?= $data_mitra['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email <?= $index ?></label>
                                    <input type="email" id="email<?= $data_mitra['id'] ?>" name="email" value="<?= $data_mitra['email'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>

                                <button type="submit" class="w-full block text-center text-sm font-bold text-white mb-5 <?= ($index % 2 == 0) ? 'bg-yellow-300' : 'bg-pink-500' ?> py-4 rounded-md mb-2">Save</button>
                            </div>
                        </form>
                        <?php $index++; endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>




<?= $this->include('layouts/footer') ?>