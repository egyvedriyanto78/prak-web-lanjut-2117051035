<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">My Project</a>
</nav>

<div class="container mt-4">
    <!-- Judul -->
    <h1>List User</h1>

    <p>Data Mahasiswa jurusan Ilmu Komputer angkatan 2021</p>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                ?>
                <tr>
                    <td>
                        <?= $user['id'] ?>
                    </td>
                    <td>
                        <?= $user['nama'] ?>
                    </td>
                    <td>
                        <?= $user['npm'] ?>
                    </td>
                    <td>
                        <?= $user['nama_kelas'] ?>
                    </td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>