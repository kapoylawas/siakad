<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

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
          echo '<div class="alert alert-warning" role="alert">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
    ?>
    
    <?php
        if (session()->getFlashdata('sukses')) {
          echo '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('sukses');
          echo '</div>';
        }
    ?>

    <?php echo form_open('auth/cek_login') ?>
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="level" class="form-control">
            <option  value="">--Pilih Hak Akses--</option>
            <option value="1">Admin</option>
            <option value="2">Mahasiswa</option>
            <option value="3">Dosen</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <!-- <label>
              <input type="checkbox"> Remember Me
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block btn-flat ajax">Sign In</button>
        </div>
        <div class="ajax-content">
          </div>
        <!-- /.col -->
      </div>
      <?php echo form_close() ?>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


