<div class="col-sm-12">
<ol class="breadcrumb">
   <li><a href="<?= base_url('kelas') ?>"><i class="fa  fa-institution"></i> <?= $title ?> : <label><?= $kelas['nama_kelas'] ?>-<?= $kelas['tahun_angkatan'] ?> </label> </a></li>
</ol>
</div>

<div class="col-sm-12">
    <div class="box box-danger box-solid">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                <tr>
                    <th width="150px">Nama Kelas</th>
                    <th width="30px">:</th>
                    <td width="200px"><?= $kelas['nama_kelas'] ?>-<?= $kelas['tahun_angkatan'] ?></td>
                    <th width="150px">Angkatan</th>
                    <th width="30px">:</th>
                    <td><?= $kelas['tahun_angkatan'] ?></td>
                </tr>
                <tr>
                    <th>Progam Studi</th>
                    <th width="30px">:</th>
                    <td><?= $kelas['prodi'] ?></td>
                    <th>Jumlah</th>
                    <th width="30px">:</th>
                    <td><?= $jml ?></td>
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
                        <th width="50px" >No</th>
                        <th width="100px" class="text-center">NIM</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th width="50px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; 
                   foreach ($mhs as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td class="text-center"><b><?= $value['nim'] ?></b></td>
                        <td><?= $value['nama_mhs'] ?></td>
                        <td class="text-center">                          
                            <a href="<?= base_url('kelas/remove_anggotakls/' . $value['id_mhs']. '/' .$kelas['id_kelas']) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                            </a>
                          
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
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mahasiswa</h4>
              </div>
              <div class="modal-body">
              <table id="example3" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Progam Studi</th>
                        <th width="30px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                     foreach ($mhs_tpk as $key => $value) { ?>
                     <?php if ($kelas['id_prodi'] == $value['id_prodi']) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nim'] ?></td>
                        <td><?= $value['nama_mhs'] ?></td>
                        <td><?= $value['prodi'] ?></td>
                        <td class="text-center">
                        <a href="<?= base_url('kelas/add_anggotakls/' . $value['id_mhs']. '/' .$kelas['id_kelas']) ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                        </td>
                     </tr>
                        <?php  } ?>
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
