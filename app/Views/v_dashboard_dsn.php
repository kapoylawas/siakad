<ol class="breadcrumb">
   <li><a><i class="fa fa-calendar-check-o"></i> Tahun Akademik</a></li>
   <li class="active"><label><b><?= $ta['ta'] ?> - Semester :<?= $ta['semester'] ?></b> </label></li>
</ol>

    <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-danger">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" width="40px" height="40px" src="<?= base_url('foto_dosen/' . $dosen['foto_dosen']) ?>" >
              <h3 class="profile-username text-center"><?= $dosen['nidn'] ?></h3>
              <h3 class="profile-username text-center"><?= $dosen['nama_dosen'] ?></h3>
            </div>
          </div>
        </div>
         <!-- /.box-body -->

        <div class="col-md-9">
         <!-- About Me Box -->
         <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Tanggal Lahir :  </strong>  
              <?= $dosen['tanggal_lahir'] ?>
              <hr>
              <strong><i class="fa fa-book margin-r-5"></i>Pendidikan Terakhir : </strong> 
              <?= $dosen['pendidikan_terakhir'] ?>
              <hr>
              <strong><i class="fa fa-building margin-r-5"></i> Alamat : </strong>
              <?= $dosen['alamat'] ?>
              <hr>
              
              <p>
              <a href="<?= base_url('dsn/edit/' . $dosen['id_dosen']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit Profile</a>
              </p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan</strong>

              <p></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</div>
 <!-- /.box -->



          
