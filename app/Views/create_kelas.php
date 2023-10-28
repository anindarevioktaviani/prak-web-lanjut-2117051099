<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>

    <div class="container-box">
        <div style="width:600px;
            padding: 70px;
            margin: auto;
            border-radius: 20px;
            background-color: rgba(222, 184, 135, 0.1);">

            <figure class="text-center">
                <blockquote class="blockquote">
                    <b><p style="color: black;">Penambahan Data Kelas</p></b>
                </blockquote>
            </figure>

            <form method="post" action="<?=base_url('/kelas/store')?>" enctype="multipart/form-data">
                <div class="mb-3 gap-4 mt-5">
                    <input type="text" class="form-control <?=(empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>" name="nama_kelas" value="<?= old('nama_kelas') ?>" placeholder="nama kelas">
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama_kelas') ?>
                    </div>
                </div>
                
                <div class="d-grid gap-2 mx-auto" style="width: 50%;">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

                <div class="mt-5" style="margin-left: 20%;">
                    <a href="<?= base_url('/kelas') ?>" type="button" class="btn btn-danger">Kembali</a>
                </div>
            </form>

        </div>
    </div>
    
<?=$this->endSection()?>