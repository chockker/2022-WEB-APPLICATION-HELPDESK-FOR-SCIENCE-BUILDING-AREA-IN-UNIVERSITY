<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ฟอร์มแก้ไขข้อมุลอุปกรณ์
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
                            <form role="form" action="<?= site_url('item/editdata'); ?>" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            codename
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="i_codename" class="form-control" required  value="<?= $iedit->i_codename; ?>">
                                            <span class="fr"><?= form_error('i_codename'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชื่อ
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="i_name" class="form-control" required   minlength="1"  value="<?= $iedit->i_name; ?>">
                                            <span class="fr"><?= form_error('i_name'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ประเภท
                                        </div>
                                        <div class="col-sm-3">
                                        <select name="j_name" class="form-control" required >
                                            <?php if(set_value('j_name')!=''){?>
                                                <option value="<?= set_value('j_name'); ?>"><?= set_value('j_name'); ?></option>
                                            <?php } else{
                                                echo '<option value="">Choose...</option>';
                                            }
                                            ?>
                                                <?php foreach ($j_detail as $ijs):?>
                                                <option value="<?php echo $ijs->j_name;?>"><?php echo $ijs->j_name;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ห้อง
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="i_no_room" class="form-control" required placeholder="กรุณากรอกเลขตึก " value="<?= $iedit->i_no_room ?>" minlength="1">
                                            <span class="fr"><?= form_error('i_no_room'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ชั้น
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="floor" class="form-control" required placeholder="กรุณากรอกเลขตึก "  value="<?= $iedit->floor ?>">
                                            <span class="fr"><?= form_error('floor'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ตึก
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="town" class="form-control" required value="<?= $iedit->town; ?>">
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