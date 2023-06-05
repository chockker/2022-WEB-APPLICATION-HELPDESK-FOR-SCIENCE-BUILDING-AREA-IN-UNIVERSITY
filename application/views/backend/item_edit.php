<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family:'Mitr', sans-serif">
        แก้ไขข้อมุลอุปกรณ์
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
                                            ตึก
                                        </div>
                                        <div class="col-sm-3">
                                        <select name="t_num"  id="town" class="form-control" required>
                                            <?php if(set_value('t_num')!=''){?>
                                                <option value="<?= set_value('t_num'); ?>"><?= set_value('t_num'); ?></option>
                                            <?php } else{
                                                echo '<option value="">กรุณาเลือกตึก</option>';
                                            }
                                            ?>
                                                <?php foreach ($t_detail as $its):?>
                                                <option value="<?php echo $its->t_num;?>"><?php echo $its->t_num ,' ', $its->t_name;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            ห้อง
                                        </div>
                                        <div class="col-sm-3">
                                        <select name="r_name" id="room"class="form-control" required>
                                            <?php if(set_value('r_name')!=''){?>
                                                <option value="<?= set_value('r_name'); ?>"><?= set_value('r_name'); ?></option>
                                            <?php } else{
                                                echo '<option value="">กรุณาเลือกห้อง</option>';
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            *หมายเหตุ(ถ้ามี)
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="textarea" name="i_remark" class="form-control"  placeholder="รายละเอียดอื่นๆ" value="<?= $iedit->i_remark; ?>">
                                            <span class="fr"><?= form_error('i_remark'); ?></span>
                                        </div>
                                    </div>                                   
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 control-label">
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="hidden" name="i_id" value="<?= $iedit->i_id;?>">
                                            <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>
                                            <a class="btn btn-danger" href="<?php echo  site_url('allitem'); ?>" role="button"><i class="fa fa-fw fa-close"></i> ยกเลิก</a>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    </div><!-- /.box-body -->
                                </form>
                            </div>
                        </div> </div> </div>
                        </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->
<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#town').change(function(){
      var t_num = $('#town').val();
      if(t_num != '')
      {
        $.ajax({
          url:"<?php echo base_url('form/action') ?>",
          method:"POST",
          data:{t_num:t_num,function:'action'},
          success:function(data)
          {
            $('#room').html(data);
          }
        });
      }
    });
});
</script>