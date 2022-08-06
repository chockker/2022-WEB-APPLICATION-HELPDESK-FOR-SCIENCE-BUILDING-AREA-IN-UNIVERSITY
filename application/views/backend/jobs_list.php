<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        จัดการรายการแจ้งซ่อม
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <a href="<?= site_url('jobs/bystatus/'.$qstatus1->c_status);?>?status=รอดำเนินการ" class="btn btn-primary">  งานใหม่ <span class="badge"><?= $qstatus1->totalstatus1;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus2->c_status);?>?status=กำลังดำเนินการ" class="btn btn-info"> กำลังทำ <span class="badge"><?= $qstatus2->totalstatus2;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus3->c_status);?>?status=เสร็จสิ้น" class="btn btn-success"> ปิดงาน <span class="badge"><?= $qstatus3->totalstatus3;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus4->c_status);?>?status=ยกเลิก" class="btn btn-danger"> ยกเลิก <span class="badge"><?= $qstatus4->totalstatus4;?></span></a>
                <br><br>
                <h3 class="box-title">ตารางข้อมูล : <font color="red"><?= $this->input->get('status');?></font> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">No.</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 45%;">รายละเอียด</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ผู้แจ้ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $rs) { ?>
                                        <tr role="row">
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
                                                <a href="<?php   echo site_url('jobs/getupdate/'.$rs->c_id); ?>" class="btn btn-success btn-xs">
                                                    จัดการ
                                                </a>
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