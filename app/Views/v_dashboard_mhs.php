<ol class="breadcrumb">
   <li><a><i class="fa fa-dashboard"></i> Tahun Akademik</a></li>
   <li class="active"><label><b><?= $ta_aktif['ta'] ?> - Semester :<?= $ta_aktif['semester'] ?></b> </label></li>
</ol>

<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-danger">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" width="40px" height="40px" src="<?= base_url('foto_mhs/' . $mhs['foto_mhs']) ?>" >

              <h3 class="profile-username text-center"><?= $mhs['nama_mhs'] ?></h3>
              <h3 class="profile-username text-center"><?= $mhs['nim'] ?></h3>

              <p class="text-muted text-center"><?= $mhs['prodi'] ?></p>

              <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
            <!-- /.box-body -->

        <div class="col-md-9">
         <!-- About Me Box -->
         <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Fakultas : </strong> <?= $mhs['fakultas'] ?> 
              <hr>
              <strong><i class="fa fa-book margin-r-5"></i>Progam Studi : </strong> <?= $mhs['prodi'] ?> 
              <hr>
              <strong><i class="fa fa-building margin-r-5"></i> Kelas : </strong><?= $mhs['nama_kelas'] ?> - <?= $mhs['tahun_angkatan'] ?>
              <hr>
              <strong><i class="fa fa-user-secret margin-r-5"></i> Dosen PA : </strong> <?= $mhs['nama_dosen'] ?>
              <hr>
              <strong><i class="fa  fa-google margin-r-5"></i> Email : </strong>  <?= $mhs['email'] ?>
              <hr>

              <p>
              <a href="<?= base_url('mhs/edit/' . $mhs['id_mhs']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit Profile</a>
                <!-- <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
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



          
