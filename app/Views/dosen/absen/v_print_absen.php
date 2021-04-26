<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIAKAD| Print Absen </title>
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
          <i class="fa fa-file-pdf-o"></i><b> Absensi Kelas - <b>Tahun : <?= $ta['ta'] ?> - Semester : <?= $ta['semester'] ?></b></b>
          <small class="pull-right">Tanggal: <?= date('d-M-Y') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    <div class="col-xs-6 table-responsive">
      <table class="table-striped table-responsive">
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
          
        </table>
      </div>
      <div class="col-xs-6 table-responsive">
      <table class="table-striped table-responsive">
       <tr>
            <td>Mata Kuliah</td>
            <td width="30px" class="text-center">:</td>
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
    <!-- /.row -->

    <!-- Table row -->
    <!-- /.row -->
    <div class="row">
     <br>
    <div class="col-sm-12">
       <table  class="table table-striped table-bordered  table-responsive">
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
    ?>
     <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td class="text-center"><?= $value['nim'] ?></td>
          <td><?= $value['nama_mhs'] ?></td>
          <td><?php if ($value['p1']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p1']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p1']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p2']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p2']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p2']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p3']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p3']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p3']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p4']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p4']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p4']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p5']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p5']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p5']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p6']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p6']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p6']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p7']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p7']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p7']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p8']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p8']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p8']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p9']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p9']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p9']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p10']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p10']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p10']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p11']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p11']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p11']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p12']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p12']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p12']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p13']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p13']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p13']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p14']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p14']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p14']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p15']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p15']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p15']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p16']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p16']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p16']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p17']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p17']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p17']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td><?php if ($value['p18']==0) {
            echo '<i class="fa fa-close text-danger"></i>';
          }elseif ($value['p18']==1) {
            echo '<i class="fa fa-info text-warning"></i>';
          }elseif ($value['p18']==2) {
            echo '<i class="fa fa-check text-success"></i>';
          } ?></td>
          <td class="text-center">
          <?php $absensi = ($value['p1']+$value['p2']+$value['p3']+$value['p4']+$value['p5']+$value['p6']+$value['p7']+$value['p8']+$value['p9']+$value['p10']+$value['p11']+$value['p12']+$value['p13']+$value['p14']+$value['p15']+$value['p16']+$value['p17']+$value['p18'])/36*100; 
           echo number_format($absensi,0) . '%';
           ?>
          </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
</div>
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-4">
        
       
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
      </div>
      <div class="col-xs-4">
            Sidoarjo, <?= date('d-M-Y') ?>
            <br>
            Dosen
            <br>
            <br>
            <br>
            dto.
            <br>
            <?= $jadwal['nama_dosen'] ?>
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
