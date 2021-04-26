<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAKAD| KRS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css" media="print">
  @page { size: landscape; }
  </style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-file-pdf-o"></i><b> Kartu Rencana Studi</b>
          <small class="pull-right">Tanggal: <?= date('d-M-Y') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-xs-12 table-responsive">
    <table class="table-striped">
        <tr>
            <th rowspan="7"><img src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']) ?>" height="130px" width="100px"></th>
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
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
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
          <td><?= $value['matkul'] ?></td>
          <td class="text-center"><?= $value['sks'] ?></td>
          <td class="text-center"><?= $value['smt'] ?></td>
          <td class="text-center"><?= $value['nama_kelas'] ?>-<?= $value['tahun_angkatan'] ?></td>
          <td class="text-center"><?= $value['ruangan'] ?></td>
          <td class="text-center"><?= $value['nama_dosen'] ?></td>
          <td class="text-center"><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
      </tr>
    <?php } ?>
       
    </tbody>
  </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-4">
        <p class="lead">Jumlah SKS: <?= $sks ?></p>
       
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
            
      </div>

      <div class="col-xs-4">
            Sidoarjo, <?= date('d-M-Y') ?>
            <br>
            Pembimbing Akademik
            <br>
            <br>
            <br>
            dto.
            <br>
            <?= $mhs['nama_dosen'] ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
