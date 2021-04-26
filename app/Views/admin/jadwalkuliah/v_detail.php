<ol class="breadcrumb">
   <li><a href="<?= base_url('jadwalkuliah') ?>"><i class="fa fa-dashboard"></i> <?= $title ?></a></li>
   <li class="active"><small><?= $prodi['prodi'] ?></small></li>
</ol>
<div class="row">
  <div class="col-sm-12">
    <div class="box box-danger box-solid">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Progam Studi</th>
                        <td width="40px">:</td>
                        <td><?= $prodi['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang'] ?></td>
                    </tr>
                    <tr>
                        <th>fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td><?= $ta_aktif['ta'] ?> - <b>Semester</b> : <?= $ta_aktif['semester'] ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>

  <div class="col-sm-12">
    <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $title ?></h3>
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
                        <th width="10px">No</th>
                        <th width="20px">Smtr</th>
                        <th class="text-center">Kode Matkul</th>
                        <th class="text-center">Mata kuliah</th>
                        <th class="text-center">SKS</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Dosen</th>
                        <th class="text-center">Hari</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Ruang</th>
                        <th class="text-center">Kuota</th>
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
               <?php $no=1; foreach ($jadwal as $key => $value) { ?>
                 <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $value['smt'] ?></td>
                  <td><?= $value['kode_matkul'] ?></td>
                  <td><?= $value['matkul'] ?></td>
                  <td class="text-center"><?= $value['sks'] ?></td>
                  <td class="text-center"><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></td>
                  <td><?= $value['nama_dosen'] ?></td>
                  <td><?= $value['hari'] ?></td>
                  <td class="text-center"><?= $value['waktu'] ?></td>
                  <td class="text-center"><?= $value['ruangan'] ?></td>
                  <td class="text-center"><?= $value['kuota'] ?></td>
                  <td class="text-center">
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
                  </td>
                 </tr>
              <?php } ?>
                    
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
                <?php echo form_open('jadwalkuliah/add/' . $prodi['id_prodi']); ?>
                    <div class="form-group">
                      <label>Mata Kuliah</label>
                      <select name="id_matkul" class="form-control select2" style="width: 100%;">
                        <option value="">--Pilih Mata Kuliah--</option>
                      <?php foreach ($matkul as $key => $value) { ?>
                          <?php if ($value['semester'] == $ta_aktif['semester']) { ?>
                            <option value="<?= $value['id_matkul'] ?>">Semester:<?= $value['smt'] ?> | <?= $value['kode_matkul'] ?> | <?= $value['matkul'] ?> | <?= $value['sks'] ?> <label>SKS</label> </option>
                         <?php } ?>
                         
                      <?php  } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Dosen</label>
                      <select name="id_dosen" class="form-control select2" style="width: 100%;">
                            <option value="">--Pilih Dosen--</option>
                              <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                             <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                        <select name="id_kelas" class="form-control select2" style="width: 100%;">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                              <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></option>
                            <?php } ?>                            
                        </select>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>Hari</label>
                          <select name="hari" class="form-control select2" style="width: 100%;">
                              <option value="">--Pilih Hari--</option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                          </select>
                       </div>       
                      </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                      <label>Waktu</label>
                        <input name="waktu" class="form-control" type="text" placeholder="Ex:08:00-10:30" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ruangan</label>
                          <select name="id_ruangan" class="form-control select2" style="width: 100%;">
                              <option value="">--Pilih Ruangan--</option>
                              <?php foreach ($ruangan as $key => $value) { ?>
                              <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?> | <?= $value['ruangan'] ?> </option>
                             <?php } ?>
                          </select>
                       </div>       
                      </div>
                      <div class="col-sm-6">
                      <div class="form-group">
                      <label>Kuota</label>
                        <input name="kuota" class="form-control" type="text" placeholder="Kuota" required>
                      </div>
                    </div>
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
  
<!-- modal delete -->
<?php foreach ($jadwal as $key => $value) { ?>
   <div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
                 Apakah Anda Yakin Ingin Menghapus <?= $title ?> <b><?= $value['kode_matkul'] ?>-<?= $value['matkul'] ?> ..?</b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('jadwalkuliah/delete/' . $value['id_jadwal']. '/' . $prodi['id_prodi']) ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->
<?php } ?>
 
