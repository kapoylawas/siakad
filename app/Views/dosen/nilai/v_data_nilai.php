<ol class="breadcrumb">
   <li><a href="<?= base_url('dsn/nilai_mhs') ?>"><i class="fa fa-calculator"></i>  Nilai Mahasiswa</a></li>
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
    <a href="<?= base_url('dsn/print_nilai/' . $jadwal['id_jadwal']) ?>" target="_blank" class="fa fa-print btn btn-success"> Print Nilai</a>
 </div>
 <div class="col-sm-13">
    <?php 
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
    <?php echo form_open('dsn/simpan_nilai/' . $jadwal['id_jadwal']) ?>
    <table id="example2" class="table table-striped table-bordered table-responsive table-hover text-sm">
        <tr class="label-danger">
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center">NIM</th>
            <th rowspan="2" class="text-center">Mahasiswa</th>
            <th colspan="7" class="text-center">Nilai</th>
        </tr>
        <tr class="label-danger">
            <th class="text-center">Absensi</th>
            <th class="text-center" width="80px">Tugas</th>
            <th class="text-center" width="80px">UTS</th>
            <th class="text-center" width="80px">UAS</th>
            <th class="text-center" width="80px">NAb<br>(15%+15%+30%+40%)</th>
            <th class="text-center" width="80px">Huruf</th>
            <th class="text-center" width="80px">Bobot</th>
        </tr>
        <?php $no=1; 
          foreach ($mhs as $key => $value) { 
            echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $value['nim'] ?></td>
                <td><?= $value['nama_mhs'] ?></td>
                <td class="text-center"><?php $absensi = ($value['p1']+$value['p2']+$value['p3']+$value['p4']+$value['p5']+$value['p6']+$value['p7']+$value['p8']+$value['p9']+$value['p10']+$value['p11']+$value['p12']+$value['p13']+$value['p14']+$value['p15']+$value['p16']+$value['p17']+$value['p18'])/36*100; 
                echo number_format($absensi,0);
                echo form_hidden($value['id_krs'] . 'absen', number_format($absensi,0));
                ?>
                </td>
                <td class="text-center"><input name="<?= $value['id_krs']?>nilai_tugas" value="<?= $value['nilai_tugas'] ?>" class="form-control" type="text"></td>
                <td class="text-center"><input name="<?= $value['id_krs']?>nilai_uts" value="<?= $value['nilai_uts'] ?>" class="form-control" type="text"></td>
                <td class="text-center"><input name="<?= $value['id_krs']?>nilai_uas" value="<?= $value['nilai_uas'] ?>" class="form-control" type="text"></td>
                <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                <td class="text-center"><?= $value['bobot'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <button class="btn btn-success pull-right"><i class="fa fa-save"> Simpan</i></button>
  <?php echo form_close() ?>
 </div>
</div>