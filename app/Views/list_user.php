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
                    <a class="nav-link active" aria-current="page" href="<?= base_url('user') ?>">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kelas') ?>">Class</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Judul -->
    <h1>List User</h1>

    <p>Data Mahasiswa jurusan Ilmu Komputer angkatan 2021</p>

    <a href="<?= base_url('user/create') ?>" class="btn btn-dark">
        Tambah User
    </a>
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
                    <td>
                        <a href="<?= base_url('user/' . $user['id']) ?>" class="btn btn-primary">
                            Detail
                        </a>
                        <a href="<?= base_url('user/' . $user['id'] . '/edit') ?>" class="btn btn-warning">
                            Edit
                        </a>
                        <!-- <a href="" class="btn btn-danger">
                            Delete
                        </a> -->
                        <form action="<?= base_url('user/' . $user['id']) ?>" method="post"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');">
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