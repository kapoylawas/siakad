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

     
    <?php echo form_open_multipart('mahasiswa/update/' . $mhs['id_mhs']); ?>
            
        <!-- <div class="col-sm-6"> -->
           <div class="form-group">
             <label>NIM</label>
             <input name="nim" value="<?= $mhs['nim'] ?>" class="form-control" placeholder="NIM">
           </div>
        <!-- </div> -->
        
           <div class="form-group">
             <label>Nama Mahasiswa</label>
             <input name="nama_mhs" value="<?= $mhs['nama_mhs'] ?>"  class="form-control" placeholder="Nama Mahasiswa">
           </div>
        
           <div class="form-group">
             <label>Progam Studi</label>
               <select name="id_prodi" class="form-control">
                    <option value="<?= $mhs['id_prodi'] ?>"><?= $mhs['jenjang'] ?>-<?= $mhs['prodi'] ?></option>
                    <?php foreach ($prodi as $key => $value) { ?>
                        <option value="<?= $value['id_prodi'] ?>"><?= $value['jenjang'] ?>-<?= $value['prodi'] ?></option>
                   <?php } ?>
               </select>
           </div>
           <div class="form-group">
             <label>Password</label>
             <input name="password" value="<?= $mhs['password'] ?>" class="form-control" placeholder="Password">
           </div>
        <div class="col-sm-6">
           <div class="form-group">
             <img src="<?= base_url('foto_mhs/' . $mhs['foto_mhs'])?>" id="gambar_load" width="100px">
           </div>
        </div>
        <div class="col-sm-6">
           <div class="form-group">
             <label>Foto Mahasiswa</label>
             <input type="file" name="foto_mhs" id="preview_gambar" class="form-control">
           </div>
        </div>
          
       </div>
       <div class="modal-footer">
            <a href="<?= base_url('mahasiswa') ?>" class="btn btn-default pull-left">Close</a>
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



