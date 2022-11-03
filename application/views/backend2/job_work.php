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
                <a href="<?= site_url('jobs/bystatus/'.$qstatus1->c_status);?>?status=รอดำเนินการ" class="btn btn-primary">  งานใหม่ <span class="badge"><?= $qstatus1->totaltstatus1;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus2->c_status);?>?status=กำลังดำเนินการ" class="btn btn-info"> กำลังทำ <span class="badge"><?= $qstatus2->totaltstatus2;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus3->c_status);?>?status=เสร็จสิ้น" class="btn btn-success"> ปิดงาน <span class="badge"><?= $qstatus3->totaltstatus3;?></span></a>
                <a href="<?= site_url('jobs/bystatus/'.$qstatus4->c_status);?>?status=ยกเลิก" class="btn btn-danger"> ยกเลิก <span class="badge"><?= $qstatus4->totaltstatus4;?></span></a>
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 30%;">รายละเอียด</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 18%;">ผู้แจ้ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 8%;">สถานะ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 12%;">ผู้รับผิดชอบ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จัดการ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $rs) { ?>
                                        <tr role="row">
                                            <td align="center"><?= $rs->cw_id;?></td>
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
                                            <td><?= $rs->cw_as_name;?></td>
                                            <td>
                                                <a href="<?php   echo site_url('jobs/getupdateformtech/'.$rs->cw_id); ?>" class="btn btn-success btn-xs">
                                                    จัดการ
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?= site_url('tech/tnjob/del/'.$rs->cw_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?= site_url('jobs/getupdateformtechtoprint/'.$rs->cw_id); ?>" role="button"></i>print</a>
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