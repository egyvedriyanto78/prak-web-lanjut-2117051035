<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
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
    <div class="id-card">
        <div class="text-center">
            <img src="<?= $user['foto'] ?? base_url("assets/img/profile.jpg") ?>" alt="Profil" class="profil-img">
        </div>
        <div class="text-center mt-3">
            <div class="info-box">
                <h5>
                    <?= $user['nama'] ?>
                </h5>
            </div>
            <div class="info-box">
                <h5>
                    <?= $user['npm'] ?>
                </h5>
            </div>
            <div class="info-box">
                <h5>
                    <?= $user['nama_kelas'] ?>
                </h5>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html> -->