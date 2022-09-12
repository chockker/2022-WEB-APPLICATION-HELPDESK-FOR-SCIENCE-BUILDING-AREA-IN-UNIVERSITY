<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #f77100;">
      <h3 style="margin:50px; color:#FFFFFF;text-align:center;font-family:thaisans_neueregular;" >
      :Admin Login:
      </h3>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="padding:0px">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #292b2c;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color:#ffffff;">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('');?>">แจ้งซ่อม<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('form/allcase');?>">ติดตามงาน</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('login');?>">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
<div class="container" style="margin-top: 30px">
  <div class="row">
    <div class="col-sm-4 col-md-4"></div>
    <div class="col col-sm-8 col-md-8">
      <form action="<?= site_url('login/authen');?>" method="post" class="form-horizontal">
        <div class="form-group col col-md-5" style="font-family:thaisans_neueregular;">
          <h3>Login Form</h3>
        </div>
        <div class="form-group col col-md-5" style="font-family:thaisans_neueregular;">
          <label>Username</label>
          <input type="username" name="a_username" class="form-control" required minlength="3" placeholder="*Username" value="<?= set_value('a_username'); ?>">
          <span class="fr"><?= form_error('a_username'); ?></span>
        </div>
        <div class="form-group col col-md-5" style="font-family:thaisans_neueregular;">
          <label>Password</label>
          <input type="password" name="a_password" class="form-control" required  placeholder="*Password" value="<?= set_value('a_password'); ?>">
          <span class="fr"><?= form_error('a_password'); ?></span>
        </div>
        <div class="form-group col col-md-5" style="font-family:thaisans_neueregular;">
          <button type="submit" class="btn btn-primary" style="background-color:#f77100; border-style:none; width: 100%; margin-top:20px">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>