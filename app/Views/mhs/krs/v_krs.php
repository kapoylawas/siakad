<ol class="breadcrumb">
   <li><a><i class="fa fa-calendar"></i> KRS</a></li>
   <li class="active"><label><b><?= $ta_aktif['ta'] ?> - Semester :<?= $ta_aktif['semester'] ?></b> </label></li>
</ol>

<div class="row">
<div class="col-sm-12">
<div class="box box-danger box-solid">
<div class="box-body">
<table class="table-striped">
  <tr>
    <th rowspan="7"><img src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']) ?>" height="130px" width="120px"></th>
    <th width="150px">Tahun Akademik</th>
    <th width="20px">:</th>
    <th><?= $ta_aktif['ta'] ?> - Semester :<?= $ta_aktif['semester'] ?></th>
    <th rowspan="7"></th>
  </tr>
  <tr>
    <td>NIM</td>
    <td>:</td>
    <td><?= $mhs['nim'] ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?= $mhs['nama_mhs'] ?></td>
  </tr>
  <tr>
    <td>Fakultas</td>
    <td>:</td>
    <td><?= $mhs['fakultas'] ?></td>
  </tr>
  <tr>
    <td>Progam Studi</td>
    <td>:</td>
    <td><?= $mhs['prodi'] ?></td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><?= $mhs['nama_kelas'] ?> - <?= $mhs['tahun_angkatan'] ?></td>
  </tr>
  <tr>
    <td>Dosen PA</td>
    <td>:</td>
    <td><?= $mhs['nama_dosen'] ?></td>
  </tr>
</table>
</div>
</div>
</div>
<div class="col-sm-12">
    <button data-toggle="modal" data-target="#add" class="fa fa-plus btn btn-primary"> Tambah Mata Kuliah</button>
    <a href="<?= base_url('krs/print') ?>" target="_blank" class="fa fa-print btn btn-success"> Cetak KRS</a>
</div>
  <div class="col-sm-12">
            <?php 
                if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success" role="alert">';
                  echo session()->getFlashdata('pesan');
                  echo '</div>';
                }
              ?>

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
  </div>
<div class="col-sm-12">
   <div class="box box-danger box-solid">
            <!-- /.box-header -->
 <div class="box-body">
  <table id="example1" class="table table-bordered table-hover">
  <thead>
    <tr class="label-danger">
        <th class="text-center">No</th>
        <th class="text-center">Kode</th>
        <th class="text-center">Mata Kuliah</th>
        <th class="text-center">SKS</th>
        <th class="text-center">SMT</th>
        <th class="text-center">Kelas</th>
        <th class="text-center">Ruangan</th>
        <th class="text-center">Dosen</th>
        <th class="text-center">Waktu</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; 
      $sks = 0;
      foreach ($data_matkul as $key => $value) { 
        $sks = $sks + $value['sks'];
    ?>
      <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-center"><?= $value['kode_matkul'] ?></td>
          <td><?= $value['matkul'] ?> </td>
          <td class="text-center"><?= $value['sks'] ?></td>
          <td class="text-center"><?= $value['smt'] ?></td>
          <td><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></td>
          <td><?= $value['ruangan'] ?></td>
          <td><?= $value['nama_dosen'] ?></td>
          <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
          <td class="text-center">
          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fa fa-trash"></i></button>
          </td>
      </tr>
    <?php } ?>
       
    </tbody>
  </table>
  <h4><b> Jumlah SKS : <?= $sks ?> </b></h4>
</div>
</div>
</div>
</div>


<!-- modal tambah data -->
<div class="modal fade" id="add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar Mata Kuliah</h4>
              </div>
              <div class="modal-body">
              <table id="example3" class="table table-bordered table-hover text-sm">
                <thead>
                    <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">kuota</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $db = \Config\Database::connect();
                     $no=1;
                     foreach ($jadwal as $key => $value) { 
                      $jml = $db->table('tbl_krs')
                      ->where('id_jadwal', $value['id_jadwal'])
                      ->countAllResults(); 
                    ?>
                     
                     <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['kode_matkul'] ?></td>
                        <td class="text-center"><?= $value['matkul'] ?>-<?= $value['kode_prodi'] ?></td>
                        <td class="text-center"><?= $value['sks'] ?></td>
                        <td class="text-center"><?= $value['smt'] ?></td>
                        <td class="text-center"><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></td>
                        <td class="text-center"><?= $value['ruangan'] ?></td>
                        <td class="text-center"><?= $value['nama_dosen'] ?></td>
                        <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                        <td class="text-center"><span class="label label-success"><?= $jml ?>/<?= $value['kuota'] ?></span></td>
                        <td class="text-center"> 
                        <?php if ($jml == $value['kuota']) { ?>
                          <span class="label label-danger">Full</span>
                       <?php }else { ?>
                        <a href="<?= base_url('krs/tambah_matkul/' . $value['id_jadwal']) ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a >
                      <?php } ?>
                        </td>
                     </tr>
                        
                    <?php } ?>
                </tbody>
            </table>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->

 <!-- modal delete -->
<?php foreach ($data_matkul as $key => $value) { ?>
   <div class="modal fade" id="delete<?= $value['id_krs'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title ?></h4>
              </div>
              <div class="modal-body">
                 Apakah Anda Yakin Ingin Menghapus Mata Kuliah <b><?= $value['kode_matkul'] ?>-<?= $value['matkul'] ?> ..?</b>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="<?= base_url('krs/delete/' . $value['id_krs']) ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
   <!-- /.modal -->
<?php } ?>
