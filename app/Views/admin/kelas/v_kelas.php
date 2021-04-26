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
                        <th>Nama Kelas</th>
                        <th>Progam Studi</th>
                        <th>Dosen PA</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Jumlah</th>
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $db = \Config\Database::connect();
                  $no = 1; 
                   foreach ($kelas as $key => $value) {
                    $jml = $db->table('tbl_mhs')
                    ->where('id_kelas', $value['id_kelas'])
                    ->countAllResults(); 
                     ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><b><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></b></td>
                        <td><?= $value['prodi'] ?></td>
                        <td><?= $value['nama_dosen'] ?></td>
                        <td class="text-center"><?= $value['tahun_angkatan'] ?></td>
                        <td class="text-center"> 
                        <span data-toggle="tooltip" title="<?= $jml ?> Mahasiswa"  class="badge bg-light-blue" ><?= $jml ?></span>
                        <br>
                        <a href="<?= base_url('kelas/rincian_kelas/' . $value['id_kelas']) ?>"><b>Mahasiswa</b></a>
                        </td>
                        <td class="text-center">
                            <button  title="Hapus <?= $title ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
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
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add <?= $title ?></h4>
              </div>
              <div class="modal-body">
                <?php echo form_open('kelas/add'); ?>
                    <div class="form-group">
                      <label>Nama Kelas</label>
                      <input name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                    </div>
                    <div class="form-group">
                      <label>Progam Studi</label>
                      <select name="id_prodi" class="form-control select2" style="width: 100%;">
                        <option value="">--Pilih Progam Studi--</option>
                        <?php foreach ($prodi as $key => $value) { ?>
                            <option value="<?= $value['id_prodi'] ?>"><?= $value['prodi'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dosen PA</label>
                      <select name="id_dosen" class="form-control select2" style="width:100%;">
                        <option value="">--Pilih Dosen PA--</option>
                        <?php foreach ($dosen as $key => $value) { ?>
                            <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                       <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tahun Angkatan</label>
                      <select name="tahun_angkatan" class="form-control select2" style="width:100%;">
                        <option value="">--Pilih Tahun--</option>
                        <?php for ($i = date('Y'); $i >= date('Y')-5; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                       <?php } ?>
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

<!-- modal delete -->
<?php foreach ($kelas as $key => $value) { ?>
   <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
                 Apakah Anda Yakin Ingin Menghapus <?= $title ?> <b><?= $value['nama_kelas'] ?> ..?</b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->
<?php } ?>