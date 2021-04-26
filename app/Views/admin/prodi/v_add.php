<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
    <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $title ?></h3>
              <div class="box-tools pull-right">
                <!-- <a href="<?= base_url('ruangan') ?>" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Kembali</a> -->
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

    <?php echo form_open('prodi/insert'); ?>
            <div class="form-group">
                <label>Fakultas</label>
                <select name="id_fakultas" class="form-control select2">
                    <option value="">--Pilih Fakultas--</option>
                   <?php foreach ($fakultas as $key => $value) { ?>
                    <option value="<?= $value['id_fakultas'] ?>"><?= $value['fakultas'] ?></option>
                   <?php } ?>
                </select>
           </div>
           <div class="form-group">
             <label>Kode Progam Studi</label>
             <input name="kode_prodi" class="form-control" placeholder="Kode Progam Studi">
           </div>
           <div class="form-group">
             <label>Progam Studi</label>
             <input name="prodi" class="form-control" placeholder="Progam Studi">
           </div>
           <div class="form-group">
             <label>Jenjang</label>
             <select name="jenjang" class="form-control select2">
                    <option value="">--Pilih Jenjang--</option>
                    <option value="D3">Diploma 3</option>
                    <option value="S1">Strata 1</option>
                    <option value="S2">Strata 2</option>
                    <option value="S3">Strata 3</option>
             </select>
           </div>
           <div class="form-group">
             <label>KA Prodi</label>
             <select name="ka_prodi" class="form-control select2">
                    <option value="">--Pilih KA Prodi--</option>
                    <?php  foreach ($dosen as $key => $value) { ?>
                      <option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                    <?php } ?>
             </select>
           </div>

       </div>
       <div class="modal-footer">
            <a href="<?= base_url('prodi') ?>" class="btn btn-default pull-left">Close</a>
            <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
    <?php echo form_close() ?>
     <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-sm-3">
</div>
</div>

