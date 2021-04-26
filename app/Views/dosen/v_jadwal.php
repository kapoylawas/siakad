<ol class="breadcrumb">
   <li><a><i class="fa fa-calendar"></i> Jadwal Mengajar</a></li>
   <li class="active"><label><b>Tahun : <?= $ta['ta'] ?> - Semester : <?= $ta['semester'] ?></b> </label></li>
</ol>

<div class="row">
<div class="col-sm-12">
   <div class="box box-danger box-solid">
            <!-- /.box-header -->
 <div class="box-body">
  <table id="example1" class="table table-bordered table-hover">
  <thead>
    <tr class="label-danger">
        <th class="text-center">No</th>
        <th class="text-center">Progam Studi</th>
        <th class="text-center">Hari</th>
        <th class="text-center">Kode</th>
        <th class="text-center">Mata Kuliah</th>
        <th class="text-center">SKS</th>
        <th class="text-center">Kelas</th>
        <th class="text-center">Ruangan</th>
        <th class="text-center">Dosen</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; 
      foreach ($jadwal as $key => $value) { 
    ?>
      <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-center"><?= $value['prodi'] ?></td>
          <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
          <td class="text-center"><?= $value['kode_matkul'] ?></td>
          <td class="text-center"><?= $value['matkul'] ?></td>
          <td class="text-center"><?= $value['sks'] ?></td>
          <td class="text-center"><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></td>
          <td class="text-center"><?= $value['ruangan'] ?></td>
          <td class="text-center"><?= $value['nama_dosen'] ?></td>
      </tr>
    <?php } ?>
      
       
    </tbody>
  </table>
  
</div>
</div>
</div>
</div>