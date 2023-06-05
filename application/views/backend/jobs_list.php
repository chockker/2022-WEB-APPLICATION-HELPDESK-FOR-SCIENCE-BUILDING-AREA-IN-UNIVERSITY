<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
        <h1 style="font-family:'Mitr', sans-serif">
        จัดการรายการแจ้งซ่อม
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header" style="font-family:'Mitr', sans-serif">
                <a href="<?= site_url('jobs/bystatus/'.$qstatus1->c_status);?>?status=รอดำเนินการ" class="btn btn-primary">  รอดำเนินการ <span class="badge"><?= $qstatus1->totalstatus1;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus2->c_status);?>?status=กำลังดำเนินการ" class="btn btn-info"> กำลังดำเนินการ <span class="badge"><?= $qstatus2->totalstatus2;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus3->c_status);?>?status=เสร็จสิ้น" class="btn btn-success"> เสร็จสิ้น <span class="badge"><?= $qstatus3->totalstatus3;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus4->c_status);?>?status=ยกเลิก" class="btn btn-danger" > ยกเลิก <span class="badge"><?= $qstatus4->totalstatus4;?></span></a>
                <div class="col-sm-12" style="display: flex;justify-content: flex-end;align: right;">
                    <div class="form-group">
                        <div class="col-sm-4 control-lable" >
                            <a href="<?= site_url('jobs/sentwork');?>" class="btn btn-success" style="font-family:'Mitr', sans-serif" >ส่งงานช่าง</a>
                        </div>
                    </div>
                </div>
                <br><br>
                <h3 class="box-title" style="font-family:'Mitr', sans-serif;font-size:20px">ตารางข้อมูล : <font color="red"><?= $this->input->get('status');?></font> </h3>
                </div><!-- /.box-header -->             
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info" style="font-family:'Mitr', sans-serif">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">No.</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 35%;">รายละเอียด</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ผู้แจ้ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $rs) { ?>
                                        <tr role="row" style="font-family:'Mitr', sans-serif">
                                            <td align="center"><?= $rs->c_id;?></td>
                                            <td><?= $rs->c_type;?></td>
                                            <td><?= 
                                            $rs->c_detail
                                            .'<br>'
                                            .'ว/ด/ป '
                                            .date('d/m/Y H:i:s',strtotime($rs->c_date_save))
                                            .' น.'
                                            ;?></td>
                                            <td>
                                                <?= 
                                                $rs->c_name
                                                .'<br>'
                                                ;?></td>
                                            <td>
                                                <?php
                                                if($rs->c_status==1){
                                                echo 'รอดำเนินการ';
                                                }elseif($rs->c_status==2){
                                                echo 'กำลังดำเนินการ';
                                                }elseif($rs->c_status==3){
                                                echo 'เสร็จสิ้น';
                                                }else{
                                                echo 'ยกเลิก';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php   echo site_url('jobs/getupdate/'.$rs->c_id); ?>" class="btn btn-success btn-xs" style="font-family:'Mitr', sans-serif">
                                                    จัดการ
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" style="font-family:'Mitr', sans-serif" href="<?= site_url('jobs/del/'.$rs->c_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
                                            </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div><!-- /.box-body -->
                </div>
                </section><!-- /.content -->
                </div><!-- /.content-wrapper -->