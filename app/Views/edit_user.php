<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <center>
    <p>Ini Halaman Create User</p>
    <?php $validation = \Config\Services::validation();?>

    <form action="<?= base_url('/user/' . $user['id'])?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <?= csrf_field() ?>

        <img src="<?= $user['foto'] ?? base_url('/assets/img/IMG_2859.png')?>" alt="..." style = "width : 200px; border-radius: 50%;"><br>
        <label for="">foto</label>
        <input class="form-control" name="foto" type="file" id="formFile" style="width: 20%">
        <br>

        <label for="">Nama : </label>
        <input class="form-control <?= (empty(validation_show_error('nama'))) ? '' : 'is-invalid' ?>" type="text" placeholder="Default input" aria-label="default input example" type="text" name="nama" id="" style="width: 20%" value="<?= $user['nama'] ?>" ?>
        <?= validation_show_error('nama'); ?>
        <br>
        <br>
        
        <label for="">NPM  : </label>
        <input class="form-control <?= (empty(validation_show_error('npm'))) ? '' : 'is-invalid' ?>" type="text" placeholder="Default input" aria-label="default input example" type="text" name="npm" id="" style="width: 20%" value="<?= $user['npm'] ?>" ?>
        <?= validation_show_error('npm'); ?>
        <br>
        <br>
        
        <label for="">Kelas : </label>
        <select name="kelas" id="kelas">
            <?php
            foreach ($kelas as $item){
            ?>
                <option value="<?= $item['id']?>" <?=$user['id_kelas'] == $item['id']? 'selected' : ''?>> 
                    <?= $item['nama_kelas']?>
                </option>
            <?php
            }
            ?>
        </select>
        <!-- <input class="form-control" type="text" placeholder="Default input" aria-label="default input example" type="text" name="kelas" id="" style="width: 20%"> -->
        <br>
        
        <button type="submit" class="btn btn-secondary" >Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </center>
    <?= $this->endsection() ?>