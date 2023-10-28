<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('') ?>"><img src="<?= base_url("assets/img/vanntimes.png") ?>"
                alt="404">Vanntimes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mr-2">
                    <a class="nav-link" href="<?= base_url('') ?>">Home</a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="<?= base_url('user') ?>">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('kelas') ?>">Class</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Judul -->
    <h1>Daftar Kelas</h1>

    <p>Data Kelas Mahasiswa jurusan Ilmu Komputer angkatan 2021</p>

    <a href="<?= base_url('kelas/create') ?>" class="btn btn-dark">
        Tambah Kelas
    </a>

    <table class="table table-dark table-striped" style="max-width: 600px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kelas</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($kelas as $kelas) {
                ?>
                <tr>
                    <td>
                        <?= $kelas['id'] ?>
                    </td>
                    <td>
                        <?= $kelas['nama_kelas'] ?>
                    </td>
                    <td>
                        <a href="<?= base_url('kelas/' . $kelas['id']) ?>" class="btn btn-primary">
                            Detail
                        </a>
                        <a href="<?= base_url('kelas/' . $kelas['id'] . '/edit') ?>" class="btn btn-warning">
                            Edit
                        </a>
                        <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="post"
                            onsubmit="return confirm('Anda akan menghapus semua data user yang berada di kelas ini, apakah anda yakin??');">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>