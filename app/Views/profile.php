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

<div class="container mt-5">
    <div class="id-card">
        <div class="text-center">
            <img src="<?= base_url("assets/img/profile.jpg") ?>" alt="Profil" class="profil-img">
        </div>
        <div class="text-center mt-3">
            <div class="info-box">
                <h5>
                    <?= $nama ?>
                </h5>
            </div>
            <div class="info-box">
                <h5>
                    <?= $kelas ?>
                </h5>
            </div>
            <div class="info-box">
                <h5>
                    <?= $npm ?>
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