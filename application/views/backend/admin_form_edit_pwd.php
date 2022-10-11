<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์ม Reset Password Admin/ช่าง
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
                            <form role="form" action="<?= site_url('admin/editpwd'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            Username
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="a_username" class="form-control" required placeholder="Username" value="<?= $rsedit->a_username; ?>" disabled>
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อ
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="a_name" class="form-control" required  value="<?= $rsedit->a_name; ?>" minlength="4" disabled>
                                            <span class="fr"><?= form_error('a_name'); ?></span>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="col-sm-2 control-label"> -->
                                            <!-- ตำแหน่ง
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="a_level" class="form-control" required  value="<?= $rsedit->a_status;?>" minlength="4" disabled>
                                            <span class="fr"><?= form_error('a_level'); ?></span>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            New Password
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="password" name="admin_pwd1" class="form-control" required placeholder="ภาษาอังกฤษ/ตัวเลข/ขั้นต่ำ 4 ตัว"  minlength="4"  value="<?= set_value('a_password'); ?>" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น">
                                            <span class="fr"><?= form_error('admin_pwd1'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            Confirm Password
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="password" name="admin_pwd2" class="form-control" required placeholder="ภาษาอังกฤษ/ตัวเลข/ขั้นต่ำ 4 ตัว"  minlength="4"  value="<?= set_value('a_password'); ?>" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น">
                                            <span class="fr"><?= form_error('admin_pwd2'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="hidden" name="id" value="<?= $rsedit->id;?>">
                                            <span class="fr"><?= form_error('id'); ?></span>
                                            <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?=  site_url('admin'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                        
                                        </div>
                                    </div>
                                    
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                        </div> </div> </div>
                        </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->