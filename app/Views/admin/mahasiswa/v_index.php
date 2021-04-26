<div class="row">
    <div class="col-sm-12">
    <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data <?= $title ?></h3>
              <div class="box-tools pull-right">
                <a href="<?= base_url('mahasiswa/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> add</a>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
      <?php 
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible">
          <ul>
          <?php foreach ($errors as $key => $value) { ?>
              <li> <?= esc($value) ?> </li>
         <?php } ?>
         </ul>
        </div> 
      <?php } ?>

              <?php 
                if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success" role="alert">';
                  echo session()->getFlashdata('pesan');
                  echo '</div>';
                }
              ?>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th class="text-center">NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th class="text-center">Jenjang</th>
                        <th>Progam Studi</th>
                        <th>Password</th>
                        <th class="text-center">Foto</th>
                        <th width="150px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $no = 1;
                   foreach ($mhs as $key => $value) { ?> 
                        <tr>
                          <td><?= $no++ ?></td>
                          <td class="text-center"><?= $value['nim'] ?></td>
                          <td><?= $value['nama_mhs'] ?></td>
                          <td class="text-center"><?= $value['jenjang'] ?></td>
                          <td><?= $value['prodi'] ?></td>
                          <td><?= $value['password'] ?></td>
                          <td class="text-center"><img src="<?= base_url('foto_mhs/' . $value['foto_mhs']) ?>" class="img-circle" width="40px" height="40px"></td>
                          <td class="text-center">
                            <a href="<?= base_url('mahasiswa/edit/' . $value['id_mhs']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_mhs'] ?>"><i class="fa fa-trash"></i></button>
                        </td>
                        </tr>
               <?php  } ?>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
</div>

<!-- modal delete -->
<?php foreach ($mhs as $key => $value) { ?>
   <div class="modal fade" id="delete<?= $value['id_mhs'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
                 Apakah Anda Yakin Ingin Menghapus Data <?= $title ?> <b><?= $value['nama_mhs'] ?> ..?</b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('mahasiswa/delete/' . $value['id_mhs']) ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->
<?php } ?>