<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์มเพิ่มข้อมูลของรายละเอียดห้อง
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
                            <form role="form" action="<?= site_url('room/adding'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            เลขห้อง
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="r_name" class="form-control" required placeholder="เลขตึก-เลขห้อง  ตัวอย่าง 78-101" value="<?= set_value('r_name'); ?>">
                                            <span class="fr"><?= form_error('r_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ประเภทห้อง
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="r_type" class="form-control" required placeholder="กรุณากรอกประเภทห้อง"  minlength="1"  value="<?= set_value('r_type'); ?>">
                                            <span class="fr"><?= form_error('r_type'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชั้น
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="floor" class="form-control" required  value="<?= $rradd->floor; ?>" >
                                            <span class="fr"><?= form_error('floor'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ตึก
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="town" class="form-control" required  value="<?= $rradd->town; ?>">
                                            <span class="fr"><?= form_error('town'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?php echo  site_url('town'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                        </div> </div> </div>
                        </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->