<?=$this->extend('layouts/app')?>

<?=$this->section('content')?>
<?php $id = 1; ?>
<center>
    <h1>List User</h1>
 

    <div class="mask d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">

                <table class="table table-dark mb-0">
            
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user){
                        ?>
                        <tr>
                            <td><?php echo $id++ ?></td>
                            <td><?= $user['nama']?></td>
                            <td><?= $user['npm']?></td>
                            <td><?= $user['nama_kelas']?></td>
                            <td><button type="button" class="btn btn-warning">Edit</button><button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody> 
                </table>
              </div>
            </div>
        </div>
    </div>

</div>
</section>
</center>
<?=$this->endSection()?>