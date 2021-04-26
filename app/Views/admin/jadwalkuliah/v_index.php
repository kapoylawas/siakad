<ol class="breadcrumb">
   <li><a><i class="fa fa-calendar"></i>  <?= $title ?></a></li>
   <li class="active"><label>Tahun Akademik : <b><?= $ta_aktif['ta'] ?> - Semester :<?= $ta_aktif['semester'] ?></b> </label></li>
</ol>
<div class="row">
    <div class="col-sm-12">
    <div class="box box-danger box-solid">
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th class="text-center">Fakultas</th>
                        <th class="text-center">Kode Prodi</th>
                        <th class="text-center">Progam Studi</th>
                        <th class="text-center">Jenjang</th>
                        <th class="text-center">Jumlah Jadwal Kuliah</th>
                        <th class="text-center">Jadwal Kuliah</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                $db = \Config\Database::connect();
                $no=1; 
                foreach ($prodi as $key => $value) {
                    $jml = $db->table('tbl_jadwal')
                              ->where('id_prodi', $value['id_prodi'])
                              ->countAllResults();
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><b><?= $value['fakultas'] ?></b></td>
                        <td><?= $value['kode_prodi'] ?></td>
                        <td><?= $value['prodi'] ?></td>
                        <td class="text-center"><?= $value['jenjang'] ?></td>
                        <td class="text-center"> <span data-toggle="tooltip" title="<?= $jml ?> Jadwal Kuliah"  class="badge bg-red" ><?= $jml ?></span>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('jadwalkuliah/detail_jadwal/' . $value['id_prodi']) ?>" class="btn btn-success btn-sm"><i class="fa fa-calendar"></i></a>
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