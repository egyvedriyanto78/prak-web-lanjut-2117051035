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
                    <a class="nav-link" href="<?= base_url('user') ?>">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('kelas') ?>">Class</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Edit Kelas</h2>

    <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nama">Kelas</label>
            <input type="text" class="form-control" id="kelas" value="<?= $kelas['nama_kelas'] ?>" name="kelas"
                uploaded>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?= $this->endSection() ?>