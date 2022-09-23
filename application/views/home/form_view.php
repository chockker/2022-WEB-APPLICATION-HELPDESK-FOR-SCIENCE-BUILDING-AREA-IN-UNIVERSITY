<script src ="<?php echo base_url('asset/bt4/js/jquery-3.3.1.slim.min.js');?>"></script>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #f77100;">
      <h3 style="margin:50px; color:#FFFFFF;text-align:center;font-family:thaisans_neueregular;" >
      :แจ้งซ่อมอุปกรณ์ของตึกวิทยาศาสตร์:
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
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('');?>">แจ้งซ่อม <span class="sr-only">(current)</span></a>
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
<div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-sm-3 col-md-3" style="margin-top: 30px"></div>
    <div class="col col-sm-9 col-md-9" style="margin-top: 30px">
      <form action="<?= site_url('form/adding');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group col col-md-5" style="font-family:thaisans_neueregular;">
          <label>ชื่อผู้แจ้ง</label>
          <input type="text" name="c_name" class="form-control" required minlength="3" placeholder="*ต้องการข้อมูล" value="<?= set_value('c_name'); ?>">
          <span class="fr"><?= form_error('c_name'); ?></span>
        </div>
        <div class="form-group col col-md-7" style="font-family:thaisans_neueregular;">
          <label>ประเภทปัญหา</label>
          <select name="j_name" class="form-control" required>
          <?php if(set_value('j_name')!=''){?>
            <option value="<?= set_value('j_name'); ?>"><?= set_value('j_name'); ?></option>
          <?php } else{
              echo '<option value="">Choose...</option>';
          }
          ?>
            <?php foreach ($j_detail as $jrs):?>
            <option value="<?php echo $jrs->j_name;?>"><?php echo $jrs->j_name;?></option>
            <?php endforeach;?>
          </select>
        </div>
        </script>
        <div class="form-group col col-md-7" style="font-family:thaisans_neueregular;">
          <label>ตึก</label>
          <select name="t_num" class="form-control" required>
          <?php if(set_value('t_num')!=''){?>
            <option value="<?= set_value('t_num'); ?>"><?= set_value('t_num'); ?></option>
          <?php } else{
              echo '<option value="">Choose...</option>';
          }
          ?>
            <?php foreach ($t_detail as $trs):?>
            <option value="<?php echo $trs->t_num;?>"><?php echo $trs->t_num;?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group col col-md-7" style="font-family:thaisans_neueregular;">
          <label>ชั้น</label>
          <select name="fl_no" class="form-control" required>
          <?php if(set_value('fl_no')!=''){?>
            <option value="<?= set_value('fl_no'); ?>"><?= set_value('fl_no'); ?></option>
          <?php } else{
              echo '<option value="">Choose...</option>';
          }
          ?>
            <?php foreach ($fl_detail as $fls):?>
            <option value="<?php echo $fls->fl_no;?>"><?php echo $fls->fl_no;?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group col col-md-7" style="font-family:thaisans_neueregular;">
          <label>รายละเอียดปัญหา</label>
          <textarea name="c_detail" class="form-control" required minlength="5" placeholder="*ต้องการข้อมูล"><?= set_value('c_detail'); ?></textarea>
          <span class="fr"><?= form_error('c_detail'); ?></span>
        </div>
        <div class="form-group col  col-md-5" style="font-family:thaisans_neueregular;">
          <label>ภาพประกอบ (บังคับ)</label>
          <input type="file" name="c_img" class="form-control"  accept="image/*" required>
          <!-- <span class="fr"><?= $error;?></span> -->
        </div>
        <div class="form-group col col-md-7">
          <button type="submit" class="btn btn-primary" style="background-color:#f77100; border-style:none; width: 100%; margin-top:20px;font-family:thaisans_neueregular;">แจ้งซ่อม</button>
        </div>
      </form>
    </div>
    
  </div>
</div>