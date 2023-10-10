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
                        <form action="<?= base_url('user/' . $user['id']) ?>" method="post">
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