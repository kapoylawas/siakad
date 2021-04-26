<ol class="breadcrumb">
   <li><a href="<?= base_url('dsn/absen_kelas') ?>"><i class="fa fa-calendar"></i>  Absensi Mahasiswa</a></li>
   <li class="active"><label><b>Kelas : <?= $jadwal['nama_kelas'] ?> - <?= $jadwal['tahun_angkatan'] ?></b> </label></li>
</ol>
<div class="row">
 <div class="col-sm-12">
 <div class="box box-danger box-solid">
 <div class="box-body">
 <table class="table-striped">
        <tr>
          <td>Progam Studi </td>
          <td width="30px" class="text-center">: </td>
          <td> <?= $jadwal['prodi'] ?></td>
        </tr>
        <tr>
          <td>Fakultas</td>
          <td class="text-center">:</td>
          <td><?= $jadwal['fakultas'] ?></td>
        </tr>
        <tr>
          <td>Kode</td>
          <td class="text-center">:</td>
          <td><?= $jadwal['kode_matkul'] ?></td>
        </tr>
        <tr>
          <td>Mata Kuliah</td>
          <td class="text-center">:</td>
          <td><?= $jadwal['matkul'] ?></td>
        </tr>
        <tr>
          <td>Waktu</td>
          <td class="text-center">:</td>
          <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
        </tr>
        <tr>
          <td>Dosen</td>
          <td class="text-center">:</td>
          <td><?= $jadwal['nama_dosen'] ?></td>
        </tr>
  </table>
  </div>
</div>
<div class="col-sm-13">
<!-- <button data-toggle="modal" data-target="#add" class="fa fa-plus btn btn-primary"> Isi Absen</button> -->
    <a href="<?= base_url('dsn/print_absensi/' . $jadwal['id_jadwal']) ?>" target="_blank" class="fa fa-print btn btn-success"> Cetak Absensi</a>
</div>
  <div class="col-sm-13">
              <?php 
                if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success" role="alert">';
                  echo session()->getFlashdata('pesan');
                  echo '</div>';
                }
              ?>
<!-- <div class="box box-danger box-solid"> -->
<?php echo form_open('dsn/simpan_absen/' . $jadwal['id_jadwal']) ?>
<table  class="table table-striped table-bordered  table-responsive text-sm">
  <thead>
  <tr class="label-danger">
    <th rowspan="2" class="text-center">#</th>
    <th rowspan="2" class="text-center">NIM</th>
    <th rowspan="2" class="text-center">Mahasiswa</th>
    <th colspan="18" class="text-center">pertemuan</th>
    <th rowspan="2" class="text-center">%<br></th>
  </tr>
  <tr class="label-danger">
    <td class="text-center">1</td>
    <td class="text-center">2</td>
    <td class="text-center">3</td>
    <td class="text-center">4</td>
    <td class="text-center">5</td>
    <td class="text-center">6</td>
    <td class="text-center">7</td>
    <td class="text-center">8</td>
    <td class="text-center">9</td>
    <td class="text-center">10</td>
    <td class="text-center">11</td>
    <td class="text-center">12</td>
    <td class="text-center">13</td>
    <td class="text-center">14</td>
    <td class="text-center">15</td>
    <td class="text-center">16</td>
    <td class="text-center">17</td>
    <td class="text-center">18</td>
  </tr>
    </thead>
    <tbody>
    <?php $no=1; 
      foreach ($mhs as $key => $value) { 
          echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
    ?>
     <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-center"><?= $value['nim'] ?></td>
          <td><?= $value['nama_mhs'] ?></td>
          <td>
            <select name="<?= $value['id_krs'] ?>p1">
              <option value="0" <?php if ($value['p1']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p1']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p1']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p2">
              <option value="0" <?php if ($value['p2']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p2']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p2']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p3">
              <option value="0" <?php if ($value['p3']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p3']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p3']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p4">
              <option value="0" <?php if ($value['p4']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p4']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p4']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p5">
              <option value="0" <?php if ($value['p5']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p5']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p5']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p6">
              <option value="0" <?php if ($value['p6']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p6']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p6']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p7">
              <option value="0" <?php if ($value['p7']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p7']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p7']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p8">
              <option value="0" <?php if ($value['p8']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p8']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p8']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p9">
              <option value="0" <?php if ($value['p9']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p9']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p9']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p10">
              <option value="0" <?php if ($value['p10']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p10']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p10']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p11">
              <option value="0" <?php if ($value['p11']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p11']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p11']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p12">
              <option value="0" <?php if ($value['p12']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p12']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p12']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p13">
              <option value="0" <?php if ($value['p13']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p13']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p13']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p14">
              <option value="0" <?php if ($value['p14']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p14']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p14']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p15">
              <option value="0" <?php if ($value['p15']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p15']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p15']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p16">
              <option value="0" <?php if ($value['p16']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p16']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p16']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p17">
              <option value="0" <?php if ($value['p17']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p17']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p17']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td>
            <select name="<?= $value['id_krs'] ?>p18">
              <option value="0" <?php if ($value['p18']==0) {
                echo 'Selected';
              } ?>>A</option>
              <option value="1" <?php if ($value['p18']==1) {
                echo 'Selected';
              } ?>>I</option>
              <option value="2" <?php if ($value['p18']==2) {
                echo 'Selected';
              } ?>>H</option>
            </select>
          </td>
          <td class="text-center">
          <?php $absensi = ($value['p1']+$value['p2']+$value['p3']+$value['p4']+$value['p5']+$value['p6']+$value['p7']+$value['p8']+$value['p9']+$value['p10']+$value['p11']+$value['p12']+$value['p13']+$value['p14']+$value['p15']+$value['p16']+$value['p17']+$value['p18'])/36*100; 
           echo number_format($absensi,0) . '%';
           ?>
          </td>
      </tr>
    <?php } ?>
       
    </tbody>
  </table>
  <button class="btn btn-success pull-right"><i class="fa fa-save"> Simpan</i></button>
 <?php echo form_close() ?>
</div>