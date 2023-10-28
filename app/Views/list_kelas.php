<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>


<div class="container-box">

    <a class="btn btn-primary custom-button-add" href="<?= base_url('/kelas/create')?>">Tambah Kelas</a>
    <table class="custom-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($kelas as $kelas): ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $kelas['nama_kelas'] ?></td>


                    <td>
                        <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="get" style="display: inline;">
                            <button class="custom-button detail-button">Detail</button>
                        </form>
                        <form action="<?= base_url('kelas/' . $kelas['id'] . '/edit') ?>" method="get" style="display: inline;">
                            <button  class="custom-button edit-button">Edit</button>
                        </form>
                        <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="post" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
                            <button type="submit" class="custom-button delete-button">Delete</button>
                        </form>
                    </td>

                    <!-- <td>

                    <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="get">
                    <button type=submit class="btn btn-primary">Detail</button>
                    </form>
                    <form action="<?= base_url('kelas/' . $kelas['id'] . '/edit') ?>" method="get">
                    <button type=submit class="btn btn-primary">Edit</button>
                    </form>
                    <form id="delete-form-<?= $kelas['id'] ?>" action="<?= base_url('kelas/' . $kelas['id']) ?>" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <?= csrf_field() ?>
                    <button type=submit class="btn btn-primary" onclick="confirmDelete(<?= $kelas['id'] ?>)">Hapus</button>
                </form>
                    </td> -->
                </tr>
                <?php $nomor++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection()?>