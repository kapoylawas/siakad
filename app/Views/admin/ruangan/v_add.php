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

    <?php echo form_open('ruangan/insert'); ?>
            <div class="form-group">
                <label>Gedung</label>
                <select name="id_gedung" class="form-control">
                    <option value="">--Pilih Gedung--</option>
                    <?php foreach ($gedung as $key => $value) { ?> 
                        <option value="<?= $value['id_gedung'] ?>"><?= $value['gedung'] ?></option>
                   <?php } ?>
                </select>
           </div>
           <div class="form-group">
             <label>Ruangan</label>
             <input name="ruangan" class="form-control" placeholder="Ruangan" required>
           </div>

       </div>
       <div class="modal-footer">
            <a href="<?= base_url('ruangan') ?>" class="btn btn-default pull-left">Close</a>
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