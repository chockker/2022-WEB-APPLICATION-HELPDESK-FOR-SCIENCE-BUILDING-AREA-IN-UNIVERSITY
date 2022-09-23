<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        ข้อมูลชั้นภายในอาคาร
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
                                <a class="btn btn-success" href="<?=  site_url('floor/add'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                                <a class="btn btn-default" href="<?=  site_url('floor'); ?>" role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">id</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อชั้น</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชั้น</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เลขตึก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">view</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">floor plan</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $flrs) { ?>
                                        <tr role="row">
                                            <td align="center"><?= $flrs->fld_id;?></td>
                                            <td><?= $flrs->fld_name;?></td>
                                            <td><?= $flrs->floor;?></td>
                                            <td><?= $flrs->town;?></td>
                                            <!-- <td><//?= $flrs->fld_img;?></td> -->
                                            <td>
                                                <a href="<?php   echo site_url('floor/show_floor_item/'.$flrs->fld_id); ?>" class="btn btn-info btn-xs">
                                                    view
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php   echo site_url('floor/edit/'.$flrs->fld_id); ?>" class="btn btn-warning btn-xs">
                                                    แก้ไข
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?= site_url('floor/del_fld/'.$flrs->fld_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
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