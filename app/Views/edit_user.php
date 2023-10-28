<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body> -->

<?= $this->extend('layouts/app.php') ?>

<?= $this->section('content') ?>

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

<div class="container mt-5">
    <h2>Edit User</h2>
    <?php if (isset($validation) || session()->has('npm_error')): ?>
        <div class="alert alert-danger">
            <?php
            if (isset($validation)) {
                echo $validation->listErrors();
            }
            if (session()->has('npm_error')) {
                echo session('npm_error');
            }
            ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('user/' . $user['id']) ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="foto">Foto</label>
            <img src="<?= $user['foto'] ?? base_url("assets/img/profile.jpg") ?>" style="width:150px;height:150px;margin:1rem">
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control <?php if (isset($validation) && $validation->hasError('nama'))
                echo 'is-invalid'; ?>" id="nama" value="<?= $user['nama'] ?>" name="nama" uploaded>
            <?php if (isset($validation) && $validation->hasError('nama')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="npm">NPM</label>
            <input type="text" class="form-control <?php if (isset($validation) && $validation->hasError('npm'))
                echo 'is-invalid'; ?>" id="npm" value="<?= $user['npm'] ?>" name="npm" uploaded>
            <?php if (isset($validation) && $validation->hasError('npm')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('npm') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select class="form-control <?php if (isset($validation) && $validation->hasError('kelas'))
                echo 'is-invalid'; ?>" name="kelas" id="kelas">
                <option value="" disabled selected>Pilih kelas</option>
                <?php foreach ($kelas as $item): ?>
                    <option value="<?= $item['id'] ?>" <?= $user['id_kelas'] == $item['id'] ? 'selected' : '' ?>>
                        <?= $item['nama_kelas'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($validation) && $validation->hasError('kelas')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('kelas') ?>
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html> -->