<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Create User</h2>
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

        <form action="<?= base_url('/user/store') ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control <?php if (isset($validation) && $validation->hasError('nama'))
                    echo 'is-invalid'; ?>" id="nama" name="nama" required>
                <?php if (isset($validation) && $validation->hasError('nama')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" class="form-control <?php if (isset($validation) && $validation->hasError('npm'))
                    echo 'is-invalid'; ?>" id="npm" name="npm" required>
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
                        <option value="<?= $item['id'] ?>">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>