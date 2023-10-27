<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E2BCAC !important;
        }
        .container {
            margin-top: 50px;
            background-color: #f7dfd4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            width: 60%;
        }

        .btn-custom {
            background-color: #874e4c; /* Ganti warna sesuai preferensi Anda */
            border-color: #E2BCAC;
            color: #ffffff; /* Warna teks */
        }
        .btn-custom:hover {
            background-color: #E2BCAC; /* Warna hover */
            border-color: #E2BCAC;
        }
    </style>
    <title>Create User</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Form Tambah Pengguna</h1>
        <center>
        <form action="<?= base_url('/user/store')?>" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control <?= (empty(validation_show_error('nama'))) ? '' : 'is-invalid' ?>" 
                id="nama" name="nama" style="width: 30%" value="<?= old('nama') ?>"><?= validation_show_error('nama'); ?>
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control <?= (empty(validation_show_error('npm'))) ? '' : 'is-invalid' ?>" 
                id="npm" name="npm" style="width: 30%" value="<?= old('npm') ?>"><?= validation_show_error('npm'); ?>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label" >Kelas</label>
                <select class="form-select" name="kelas" id="kelas" style="width: 30%">
                    <?php
                    foreach ($kelas as $item){
                        ?>
                        <option value="<?=$item['id']?>">
                            <?=$item['nama_kelas']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            </center>
            <div class="text-center">
                <button type="submit" class="btn btn-custom" style="width: 10%">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>