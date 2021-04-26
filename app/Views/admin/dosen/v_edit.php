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

     
    <?php echo form_open_multipart('dosen/update/' . $dosen['id_dosen']); ?>
            
        <!-- <div class="col-sm-6"> -->
           <div class="form-group">
             <label>Kode Dosen</label>
             <input name="kode_dosen" value="<?= $dosen['kode_dosen'] ?>" class="form-control" placeholder="Kode Dosen">
           </div>
        <!-- </div> -->
        
           <div class="form-group">
             <label>NIDN</label>
             <input name="nidn" value="<?= $dosen['nidn'] ?>" class="form-control" placeholder="NIDN">
           </div>
        
           <div class="form-group">
             <label>Nama Dosen</label>
             <input name="nama_dosen" value="<?= $dosen['nama_dosen'] ?>" class="form-control" placeholder="Naman Dosen">
           </div>
           <div class="form-group">
             <label>Password</label>
             <input name="password" value="<?= $dosen['password'] ?>" class="form-control" placeholder="Password">
           </div>
        <div class="col-sm-6">
           <div class="form-group">
             <img src="<?= base_url('foto_dosen/' . $dosen['foto_dosen'])?>" id="gambar_load" width="100px">
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
            <a href="<?= base_url('dsn') ?>" class="btn btn-default pull-left">Close</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
        </div>
    <?php echo form_close() ?>
     <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-sm-3">
</div>
</div>



