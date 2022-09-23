<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์มแก้ไขข้อมูลตึก
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
                            <form role="form" action="<?= site_url('town/editdata'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            เลขตึก
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="t_num" class="form-control" required placeholder="กรุณากรอกเลขตึก" value="<?= $tedit->t_num; ?>">
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อตึก
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="t_name" class="form-control" required placeholder="กรุณากรอกชื่ออาคาร" value="<?= $tedit->t_name; ?>" minlength="4">
                                            <span class="fr"><?= form_error('t_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            จำนวนชั้น
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="number" name="t_fl_amt" class="form-control" required placeholder="กรุณากรอกจำนวนชั้น" value="<?= $tedit->t_fl_amt; ?>" minlength="1">
                                            <span class="fr"><?= form_error('t_fl_amt'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="hidden" name="t_id" value="<?= $tedit->t_id;?>">
                                            <span class="fr"><?= form_error('i_td'); ?></span>
                                            <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?=  site_url('town'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                        </div> </div> </div>
                        </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->