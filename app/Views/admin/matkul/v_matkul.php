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
                        <th class="text-center">Mata Kuliah</th>
                        <th width="150px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $db = \Config\Database::connect();
                  
                  $no = 1; 
                   foreach ($prodi as $key => $value) { 
                    $jml = $db->table('tbl_matkul')
                              ->where('id_prodi', $value['id_prodi'])
                              ->countAllResults(); 
                       ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><b><?= $value['fakultas'] ?></b></td>
                        <td><?= $value['kode_prodi'] ?></td>
                        <td><?= $value['prodi'] ?></td>
                        <td><?= $value['jenjang'] ?></td>
                        <td class="text-center">
                            <p class="label text-center bg-green"> <?= $jml ?></p>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('matkul/detail/' . $value['id_prodi']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-list-alt"> </i></a>
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