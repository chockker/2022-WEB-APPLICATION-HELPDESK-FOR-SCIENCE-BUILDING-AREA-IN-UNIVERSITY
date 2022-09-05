<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #f77100;">
      <h3 style="margin:50px; color:#FFFFFF;text-align:center" >
      :แจ้งซ่อมอุปกรณ์ของตึกวิทยาศาสตร์:
      </h3>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="padding:0px">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #292b2c;">
        <a class="navbar-brand" style="color:#FFFFFF" href="<?= site_url('');?>">HelpDesk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF" href="<?= site_url('');?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF" href="<?= site_url('form/allcase');?>">ติดตามงาน</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF" href="<?= site_url('login');?>">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
<div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-sm-3 col-md-3" style="margin-top: 30px"></div>
    <div class="col col-sm-9 col-md-9" style="margin-top: 30px">
      <form action="<?= site_url('form/adding');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group col col-md-5">
          <label>ชื่อผู้แจ้ง</label>
          <input type="text" name="c_name" class="form-control" required minlength="3" placeholder="*ต้องการข้อมูล" value="<?= set_value('c_name'); ?>">
          <span class="fr"><?= form_error('c_name'); ?></span>
        </div>
        <div class="form-group col col-md-7">
          <label>ประเภทปัญหา</label>
          <select name="c_type" class="form-control" required>
          <?php if(set_value('c_type')!=''){?>
            <option value="<?= set_value('c_type'); ?>"><?= set_value('c_type'); ?></option>
          <?php } else{
              echo '<option value="">Choose...</option>';
          }
          ?>
            <option value="<?=$rs_detail["j_name"]?>"></option>

          </select>
        </div>
        <div class="form-group col col-md-7">
          <label>ตึก</label>
          <select name="c_town" class="form-control" required>
          <?php if(set_value('c_town')!=''){?>
            <option value="<?= set_value('c_town'); ?>"><?= set_value('c_town'); ?></option>
          <?php } else{
              echo '<option value="">Choose...</option>';
          }
          ?>
            
            <option value="78">-78-</option>
            <option value="76">-76-</option>
            <option value="72">-72-</option>
          </select>
        </div>
        <div class="form-group col col-md-7">
          <label>ชั้น</label>
          <select name="c_floor" class="form-control" required>
          <?php if(set_value('c_floor')!=''){?>
            <option value="<?= set_value('c_floor'); ?>"><?= set_value('c_floor'); ?></option>
          <?php } else{
              echo '<option value="">Choose...</option>';
          }
          ?>
            
            <option value="1">-1-</option>
            <option value="2">-2-</option>
            <option value="3">-3-</option>
            <option value="4">-4-</option>
            <option value="5">-5-</option>
            <option value="6">-6-</option>
            <option value="7">-7-</option>
            <option value="8">-8-</option>
            <option value="9">-9-</option>
            <option value="10">-10-</option>
            <option value="11">-11-</option>
            <option value="12">-12-</option>
          </select>
        </div>
        <div class="form-group col col-md-7">
          <label>รายละเอียดปัญหา</label>
          <textarea name="c_detail" class="form-control" required minlength="5" placeholder="*ต้องการข้อมูล"><?= set_value('c_detail'); ?></textarea>
          <span class="fr"><?= form_error('c_detail'); ?></span>
        </div>
        <div class="form-group col  col-md-5">
          <label>ภาพประกอบ (บังคับ)</label>
          <input type="file" name="c_img" class="form-control"  accept="image/*" required>
          <span class="fr"><?= $error;?></span>
        </div>
        <div class="form-group col col-md-7">
          <button type="submit" class="btn btn-primary" style="background-color:#f77100; border-style:none; width: 100%; margin-top:20px">แจ้งซ่อม</button>
        </div>
      </form>
    </div>
    
  </div>
</div>