<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        รายการตึกทั้งหมด
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ตารางข้อมูล</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-success" href="<?=  site_url('town/add'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                <a class="btn btn-default" href="<?=  site_url('town'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
                            </div>
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">No.</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">เลขตึก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อตึก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จำนวนชั้น</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jquery as $ts) { ?>
                                        <tr role="row">
                                            <td align="center"><?= $ts->t_id;?></td>
                                            <td><?= $ts->t_num;?></td>
                                            <td><?= $ts->t_name;?></td>
                                            <td><?= $ts->t_fl_amt;?></td>
                                            <td>
                                                <a href="<?php   echo site_url('town/edit/'.$ts->t_id); ?>" class="btn btn-warning btn-xs">
                                                    แก้ไข
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?= site_url('town/del/'.$ts->t_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
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