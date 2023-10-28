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
    <h2>Daftar Mahasiswa dalam Kelas</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-dark">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NPM</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $user): ?>
                    <tr>
                        <td>
                            <?= $user['nama'] ?>
                        </td>
                        <td>
                            <?= $user['npm'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>