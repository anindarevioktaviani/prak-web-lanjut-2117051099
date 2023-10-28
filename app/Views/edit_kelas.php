<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>


<div  class="container-box">
        <div class="container mx-auto px-5 mt-1" style="margin-bottom: 100px !important;">
            <ul class="p-0 position-relative">
                <li style="display: inline-block;">
                    <h3 style="color: black;font-weight: bold;">Edit Kelas</h3>
                </li>
            </ul>
            <form action="<?=base_url('/kelas/'. $kelas['id'])?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <?= csrf_field() ?>
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Error</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                <input type="text" class="form-control <?=(empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>" name="nama_kelas" value="<?= $kelas['nama_kelas'] ?>" placeholder="nama kelas">
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama_kelas') ?>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
            </form>
        </div>
    </div>
<?= $this->endSection()?>


<!-- 
</body>

</html> -->