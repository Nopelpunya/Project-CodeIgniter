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
                    <h1 class="text-sm font-bold text-black mb-5">Data Members
                        <?php if (count($members) > 0) : ?>
                            (<span class="text-blue-500"><?= count($members) ?></span>)
                        <?php else : ?>
                            (<span class="text-blue-500">0</span>)
                        <?php endif; ?> <span class="block text-sm font-normal">Kelola data members yang mendaftar <span class="text-yellow-500 font-bold"><?= $configs['nama_aplikasi'] ?></span> App.</span></h1>

                    <div class="flex justify-end items-center w-full">
                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Tambahkan Member
                        </button>
                    </div>



                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Membership
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Telepon
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Mitra
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        tanggal Daftar
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Berakhir Pada
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1;
                                foreach ($members as $member) : ?>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            <button type="button" data-modal-target="edit<?= $member['id'] ?>" data-modal-toggle="edit<?= $member['id'] ?>" class="text-blue-700 hover:text-pink-500"><?= $member['nama'] ?> <i class="fa fa-pencil"></i></button>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?= $member['jangka_waktu'] ?>
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            <?= $member['telepon'] ?>
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            <?php if ($member['username']) : ?>
                                                @<?= $member['username'] ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            <?= $member['tanggal_daftar'] ?>
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            <?= $member['paket_berakhir'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/members/delete/<?= $member['id'] ?>" onclick="return confirm('Are you sure you want to delete this member?');" class="bg-red-500 font-medium py-2 px-3 rounded-md text-white"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <div id="edit<?= $member['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Edit <i class="fa fa-pencil"></i>
                                                    </h3>
                                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit<?= $member['id'] ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form action="/members/update/<?= $member['id'] ?>" method="post">
                                                    <div class="p-4 md:p-5">

                                                    <?php if($userdata['role'] == 'superadmin'): ?>
                                                        <div class="mb-5">
                                                            <label for="id_mitra<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Mitra</label>
                                                            <select id="id_mitra<?= $member['id'] ?>" name="id_mitra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <?php foreach ($users as $user) : ?>
                                                                    <option value="<?= $user['id'] ?>" <?= ($member['id_mitra'] == $user['id']) ? 'selected' : '' ?>><?= $user['id'] ?> - <?= $user['username'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <?php else: ?>
                                                            <input type="hidden" name="id_mitra" value="<?= $userdata['id'] ?>">
                                                        <?php endif; ?>

                                                        

                                                        <div class="mb-5">
                                                            <label for="nama<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                                            <input type="text" value="<?= $member['nama'] ?>" name="nama" id="nama<?= $member['id'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="id_paket_membership<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket Membership</label>
                                                            <select <?= ($userdata['role'] != 'superadmin') ? 'disabled' : '' ?> id="id_paket_membership<?= $member['id'] ?>" name="id_paket_membership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <?php foreach ($pakets as $paket) : ?>
                                                                    <option value="<?= $paket['id'] ?>" <?= ($member['id_paket_membership'] == $paket['id']) ? 'selected' : '' ?>><?= $paket['jangka_waktu'] ?> - Rp.<?= $paket['biaya_bulanan'] ?>/bln</option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="jenis_kelamin <?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                                            <select id="jenis_kelamin <?= $member['id'] ?>" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option value="pria" <?= ($member['jenis_kelamin'] == 'pria') ? 'selected' : '' ?>>Laki-Laki</option>
                                                                <option value="wanita" <?= ($member['jenis_kelamin'] == 'wanita') ? 'selected' : '' ?>>Perempuan</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-5">
                                                            <label for="telepon<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                                                            <input type="text" value="<?= $member['telepon'] ?>" name="telepon" id="telepon<?= $member['id'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="email<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                            <input type="email" name="email" id="email<?= $member['id'] ?>" value="<?= $member['email'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="tanggal_daftar<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Daftar</label>
                                                            <input type="date" name="tanggal_daftar" id="tanggal_daftar<?= $member['id'] ?>" value="<?= $member['tanggal_daftar'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                                        </div>
                                                        <div class="mb-5">
                                                            <label for="paket_berakhir<?= $member['id'] ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berakhir Pada</label>
                                                            <input type="date" name="paket_berakhir" id="paket_berakhir<?= $member['id'] ?>" value="<?= $member['paket_berakhir'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                                                        </div>




                                                        <button type="submit" class="w-full block text-center text-sm font-bold text-white mb-5 <?= ($index % 2 == 0) ? 'bg-yellow-300' : 'bg-pink-500' ?> py-4 rounded-md mb-2">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php $index++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </main>
</div>



<!-- tambah data mitra -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Buat
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="/members/add" method="post">
                    <?php if ($userdata['role'] == 'superadmin') : ?>
                        <div>
                            <label for="id_mitra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Mitra</label>
                            <select id="id_mitra" name="id_mitra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['id'] ?> - <?= $user['username'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="id_paket_membership" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket Membership</label>
                        <select id="id_paket_membership" name="id_paket_membership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($pakets as $paket) : ?>
                                <option value="<?= $paket['id'] ?>"><?= $paket['jangka_waktu'] ?> - Rp.<?= $paket['biaya_bulanan'] ?>/bln</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="pria">Laki-Laki</option>
                            <option value="wanita">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="tanggal_daftar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Daftar</label>
                        <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>
                    <div>
                        <label for="paket_berakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berakhir Pada</label>
                        <input type="date" name="paket_berakhir" id="paket_berakhir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                    </div>



                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>

                </form>
            </div>
        </div>
    </div>
</div>




<?= $this->include('layouts/footer') ?>