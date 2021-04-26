<ol class="breadcrumb">
   <li><a><i class="fa fa-calendar"></i> KHS</a></li>
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
    <a href="<?= base_url('mhs/print_khs') ?>" target="_blank" class="fa fa-print btn btn-success"> Cetak KHS</a>
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
        <th class="text-center">Nilai</th>
        <th class="text-center">Bobot</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; 
      $sks = 0;
      $grand_tobobot = 0;
      foreach ($data_matkul as $key => $value) { 
        $sks = $sks + $value['sks'];
        $tot_bobot = $value['sks'] * $value['bobot'];
        $grand_tobobot = $grand_tobobot + $tot_bobot;
    ?>
      <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-center"><?= $value['kode_matkul'] ?></td>
          <td><?= $value['matkul'] ?> </td>
          <td class="text-center"><?= $value['sks'] ?></td>
          <td class="text-center"><?= $value['smt'] ?></td>
          <td class="text-center"><?= $value['nilai_huruf'] ?></td>
          <td class="text-center"><?= $value['bobot'] ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <h4><b> Jumlah SKS : <?= $sks ?> </b></h4>
  <h4><b> IPK : <?php if (empty($data_matkul)) {
      echo '0';
  }else {
      echo number_format ($grand_tobobot/$sks,2);
  } ?> </b></h4>
</div>
</div>
</div>
</div>