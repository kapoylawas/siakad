<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
    <div class="box box-success box-solid">
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

     
    <?php echo form_open_multipart('dosen/insert'); ?>
     
        <!-- <div class="col-sm-6"> -->
           <div class="form-group">
             <label>Kode Dosen</label>
             <input name="kode_dosen" class="form-control" placeholder="Kode Dosen">
           </div>
        <!-- </div> -->
        
           <div class="form-group">
             <label>NIDN</label>
             <input name="nidn" class="form-control" placeholder="NIDN">
           </div>
        
           <div class="form-group">
             <label>Nama Dosen</label>
             <input name="nama_dosen" class="form-control" placeholder="Naman Dosen">
           </div>
           <div class="form-group">
             <label>Password</label>
             <input name="password" class="form-control" placeholder="Password">
           </div>
        <div class="col-sm-6">
           <div class="form-group">
             <img src="<?= base_url('foto_dosen/default.png')?>" id="gambar_load" width="100px">
           </div>
        </div>
        <div class="col-sm-6">
           <div class="form-group">
             <label>Foto Dosen</label>
             <input type="file" name="foto_dosen" id="preview_gambar" class="form-control" placeholder="NIDN">
           </div>
        </div>
          
       </div>
       <div class="modal-footer">
            <a href="<?= base_url('dosen') ?>" class="btn btn-default pull-left">Close</a>
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



