<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family:'Mitr', sans-serif">
        อัพเดทงานซ่อม
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Your Page Content Here -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title"> +ข่าวใหม่ </h3> -->
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?= site_url('jobs/updatedata'); ?>" method="post" class="form-horizontal">
                                <div class="box-body" style="font-family:'Mitr', sans-serif">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                JobNo.
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number"  name="c_id" class="form-control" readonly  value="<?= $query->c_id;?>">
                                                <span class="fr"><?= form_error('c_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ผู้แจ้ง
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text"  class="form-control" disabled  value="<?= $query->c_name;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ประเภทการแจ้ง
                                            </div>
                                            <div class="col-sm-7">
                                                    <input type="text" class="form-control" disabled value="<?= $query->c_type;?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ตึก
                                            </div>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" disabled value="<?= $query->c_town;?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ห้อง
                                            </div>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" disabled value="<?= $query->c_room;?>">
                                             
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                อุปกรณ์ที่่ชำรุด
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" disabled value="<?= $query->c_room,' ',$query->c_item;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                รายละเอียด
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea  class="form-control" disabled><?= $query->c_detail;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ภาพประกอบ
                                            </div>
                                            <div class="col-sm-5">
                                                <img src="<?= base_url('./asset/uploads/'.$query->c_img); ?>" width="100%">
                                                <br>
                                                ว/ด/ป : <?= $query->c_date_save;?>
                                            </div>
                                        </div>
                                        
                                        </div> <!-- sm-6 -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    สถานะล่าสุด <span class="fr">*</span>
                                                    <span class="fr"><?= form_error('c_status'); ?></span>
                                                    <select name="c_status" required class="form-control">
                                                        <option value="">
                                                            <?php
                                                            if($query->c_status==1){
                                                            echo 'รอดำเนินการ';
                                                            }elseif($query->c_status==2){
                                                            echo 'กำลังดำเนินการ';
                                                            }elseif($query->c_status==3){
                                                            echo 'เสร็จสิ้น';
                                                            }else{
                                                            echo 'ยกเลิก';
                                                            }
                                                            ?>
                                                        </option>
                                                        <option value="1">-รอดำเนินการ-</option>
                                                        <option value="2">-กำลังดำเนินการ-</option>
                                                        <option value="3">-เสร็จสิ้น-</option>
                                                        <option value="4">-ยกเลิก-</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    ว/ด/ป (ล่าสุด)
                                                    <input type="text"  class="form-control" value="<?= $query->c_case_update; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    บันทึกการอัพเดทงานซ่อม<span class="fr">*</span>
                                                    <textarea  name="c_case_update_log" placeholder="*ต้องการข้อมูล"  class="form-control" required><?= $query->c_case_update_log;?></textarea>
                                                    <span class="fr"><?= form_error('c_case_update_log'); ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-sm-4">
                                                ผู้บันทึก
                                                <input type="text"  class="form-control"  readonly name="c_ad_name"  value="<?= $_SESSION['a_name'];?>">
                                                <input type="hidden"  class="form-control"  name="c_ad_id"  value="<?= $_SESSION['id'];?>">
                                                <span class="fr"><?= form_error('a_name'); ?></span>
                                                <span class="fr"><?= form_error('c_ad_id'); ?></span>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>         
                                                    <a class="btn btn-danger" href="<?=site_url('jobs'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div>
                            </div> </div> </div>
                            </section><!-- /.content -->
                            </div><!-- /.content-wrapper -->