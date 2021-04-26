<div class="row">
    <div class="col-sm-12">
    <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data <?= $title ?></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> add</button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php 
                if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success" role="alert">';
                  echo session()->getFlashdata('pesan');
                  echo '</div>';
                }
              ?>
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Tahun Akademik</th>
                        <th>Semester</th>
                        <th width="150px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 1; 
                   foreach ($ta as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['ta'] ?></td>
                        <td><?= $value['semester'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_ta'] ?>"><i class="fa fa-trash"></i></button>
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

<!-- modal tambah data -->
<div class="modal fade" id="add">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add <?= $title ?></h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('ta/add'); ?>
                    <div class="form-group">
                      <label>Tahun Akademik</label>
                      <input name="ta" class="form-control" placeholder="Ex: 2020/2021" required>
                    </div>
                    <div class="form-group">
                      <label>Semester</label>
                      <select name="semester" class="form-control">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                     </select>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->

   <!-- modal edit -->
   <?php foreach ($ta as $key => $value) { ?>
   <div class="modal fade" id="edit<?= $value['id_ta'] ?>">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit <?= $title ?></h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('ta/edit/' . $value['id_ta']); ?>
                    <div class="form-group">
                      <label>Fakultas</label>
                      <input name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Akademik" required>
                    </div>
                    <div class="form-group">
                      <label>Semester</label>
                      <select name="semester" class="form-control">
                        <option value="Ganjil"<?php if ($value['semester']=='Ganjil') {
                            echo 'Selected' ;
                        } ?>>Ganjil</option>
                        <option value="Genap"<?php if ($value['semester']=='Genap') {
                            echo 'Selected' ;
                        } ?>>Genap</option>
                     </select>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
              <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->
   <?php } ?>

 <!-- modal delete -->
<?php foreach ($ta as $key => $value) { ?>
   <div class="modal fade" id="delete<?= $value['id_ta'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
                 Apakah Anda Yakin Ingin Menghapus Tahun Akademik <b><?= $value['ta'] ?>/<?= $value['semester'] ?> ..?</b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('ta/delete/' . $value['id_ta']) ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->
<?php } ?>