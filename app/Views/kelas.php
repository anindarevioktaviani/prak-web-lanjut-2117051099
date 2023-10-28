<?= $this->extend('layouts/app')?>

<?= $this->section('content')?>

<div class="container-box">

<a class="btn btn-primary custom-button-add" href="<?= base_url('/kelas/create')?>">Tambah Data</a>
<table class="custom-table">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Kelas</th>
            <th>NPM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($kelas as $kelas){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $kelas['nama_kelas'] ?></td>
            <td><?= $kelas['npm'] ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
<?= $this->endSection()?>