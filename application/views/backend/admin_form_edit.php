<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์มแก้ไขข้อมูล Admin/ช่าง
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
                            <form role="form" action="<?= site_url('admin/editdata'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            Username
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="a_username" class="form-control" required  value="<?= $rsedit->a_username; ?>" disabled>
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อ
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="a_name" class="form-control" required  value="<?= $rsedit->a_name; ?>" minlength="4">
                                            <span class="fr"><?= form_error('a_name'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            Status
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="a_status" required class="form-control">
                                                <span class="fr"><?= form_error('a_status'); ?></span>
                                                <option value="<?= $rsedit->a_status;?>">
                                                    <?php if($rsedit->a_status==1){echo 'Admin';}elseif($rsedit->a_status==2){echo 'ผู้จัดการ';}else{echo 'ช่าง';}?>  </option>
                                                    <option value="">--เปลี่ยน---</option>
                                                    <option value="1">-Admin</option>
                                                    <option value="2">-ผู้จัดการ</option>
                                                    <option value="0">-ช่าง</option>
                                            </select>
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