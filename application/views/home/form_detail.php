<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #f77100;">
    <h3 style="margin:50px; color:#FFFFFF;text-align:center" >
       :รายละเอียดการแจ้งซ่อม:
      </h3>
    </div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-12" style="padding:0px">
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
<div class="container" style="margin-top: 50px">
  <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    <div class="col col-sm-10 col-md-10">
      <form class="form-horizontal" >
        <div class="form-group row">
          <div class="col-12 col-sm-2">
            <label>CaseID</label>
            <input type="number" name="c_id" class="form-control"    value="<?= $rs_detail->c_id;?>" disabled>
          </div>
          <div class="col-12 col-sm-4">
            <label>Status</label>
            <?php
            $st = $rs_detail->c_status;
            if($st==1){
            $stMsg='รอดำเนินการ';
            }elseif ($st==2) {
            $stMsg='อยู่ระหว่างดำเนินการ';
            }elseif ($st==3) {
            $stMsg='ส่งซ่อมภายนอก';
            }elseif ($st==4) {
            $stMsg='ดำเนินการเสร็จสิ้น';
            }else{
            $stMsg='ยกเลิก';
            }
            ?>
            <input type="text" style="color:red;"  class="form-control"  value="<?= $stMsg;?>" disabled>
          </div>
        </div>
        <div class="form-group row col col-sm-5">
          <label>ชื่อผู้แจ้ง</label>
          <input type="text" name="c_name" class="form-control" disabled  value="<?= $rs_detail->c_name;?>">
        </div>
        <div class="form-group  row col col-sm-7">
          <label>ประเภทปัญหา</label>
          <select name="c_type" class="form-control" disabled>
            <option value="<?= $rs_detail->c_type;?>"><?= $rs_detail->c_type;?></option>
          </select>
        </div>
        <div class="form-group row col col-sm-7">
          <label>รายละเอียดปัญหา</label>
          <textarea name="c_detail" class="form-control" disabled><?= $rs_detail->c_detail;?></textarea>
        </div>
        <div class="form-group  row col col-sm-5">
          <label>ตึก</label>
          <select name="c_town" class="form-control" disabled>
            <option value="<?= $rs_detail->c_town;?>"><?= $rs_detail->c_town;?></option>
          </select>
        </div>
        <div class="form-group  row col col-sm-5">
          <label>ชั้น</label>
          <select name="c_floor" class="form-control" disabled>
            <option value="<?= $rs_detail->c_floor;?>"><?= $rs_detail->c_floor;?></option>
          </select>
        </div>
        <div class="form-group row col col-sm-7" >
          <label>ภาพประกอบ</label>
          <img src="<?= base_url('./asset/uploads/'.$rs_detail->c_img); ?>"width="100%">
        </div>
        <div class="form-group  col col-sm-5">
          <br><br>
          <a href="<?= site_url('');?>"  class="btn btn-primary">กลับหน้าหลัก </a>
        </div>
      </form>
    </div>
    
  </div>
</div>