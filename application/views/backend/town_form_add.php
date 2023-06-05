<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family:'Mitr', sans-serif">
        เพิ่มข้อมูลตึก
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container" style="font-family:'Mitr', sans-serif">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Your Page Content Here -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title"> +ข่าวใหม่ </h3> -->
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="<?= site_url('town/adding'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            เลขตึก
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="t_num" class="form-control" required placeholder="กรุณกรอกเลขตึก" value="<?= set_value('t_num'); ?>">
                                            <span class="fr"><?= form_error('t_num'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อตึก
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="t_name" class="form-control" required placeholder="กรุณาใส่ชื่อตึก"  value="<?= set_value('t_name'); ?>">
                                            <span class="fr"><?= form_error('t_name'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            จำนวนชั้นของตึก
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" name="t_fl_amt" class="form-control" required placeholder="กรุณาใส่จำนวนชั้น" value="<?= set_value('t_fl_amt'); ?>">
                                            <span class="fr"><?= form_error('t_fl_amt'); ?></span>
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