<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper" style="font-family:'Mitr', sans-serif">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Your Page Content Here -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form  class="form-horizontal">
                                <div class="box-body">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-12 control-label" style="text-align:center;font-size:150%">
                                                ใบรายงานผลการแจ้งซ่อม
                                            </div>
                                        </div>
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
                                                วันเวลาที่แจ้ง
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text"  class="form-control" disabled  value="<?= $query->c_date_save;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ประเภทการแจ้ง
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text"  class="form-control" disabled  value="<?= $query->c_type;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3 control-label">
                                                ตึก
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text"  class="form-control" disabled  value="<?= $query->c_town;?>">
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
                                        <div class="form-group" >
                                            <div class="col-sm-3 control-label">
                                                รายละเอียด
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea  class="form-control" disabled><?= $query->c_detail;?></textarea>
                                            </div>
                                        </div>
                                        </div> <!-- sm-6 -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    สถานะล่าสุด <span class="fr">*</span>
                                                    <span class="fr"><?= form_error('c_status'); ?></span>
                                                    <input type="text" class="form-control" disabled value="<?php 
                                                            if($query->c_status==1){
                                                            echo 'รอดำเนินการ';
                                                            }elseif($query->c_status==2){
                                                            echo 'กำลังดำเนินการ';
                                                            }elseif($query->c_status==3){
                                                            echo 'เสร็จสิ้น';
                                                            }else{
                                                            echo 'ยกเลิก';
                                                            }
                                                            ?>">
                                                </div>
                                                <div class="col-sm-5">
                                                    ว/ด/ป ที่อัพเดตงาน(ล่าสุด)
                                                    <input type="text"  class="form-control" value="<?= $query->c_case_update; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    บันทึกการอัพเดทงานซ่อม<span class="fr">*</span>
                                                    <textarea  name="c_case_update_log" placeholder="*ต้องการข้อมูล"  class="form-control" disabled><?= $query->c_case_update_log;?></textarea>
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

                                            <style type="text/css">
                                                @media print{
                                                    #hid{
                                                    display: none; /* ซ่อน  */
                                                    }
                                                }
                                            </style>

                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <button id="hid" onclick="window.print();"class="btn btn-primary">Print Report</button>         
                                                </div>
                                            </div>
                                        </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div>
                            </div> </div> </div>
                            </section><!-- /.content -->
                            </div><!-- /.content-wrapper -->