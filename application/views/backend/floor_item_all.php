<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        รายละเอียดของชั้นภายในอาคาร
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="font-size:50px"><?= $flplan->fld_name;?></h3>
                </div><!-- /.box-header -->
                <div class="form-group">
                    <div class="col-sm-2 control-label">
                    </div>
                    <div class="col col-sm-7">
                        <img src="<?= base_url('./asset/uploads/floor_plan/'.$flplan->fld_img); ?>"width="100%">
                    </div>
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 40%;">รหัสชื่อ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ประเภท</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ห้อง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ชั้น</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ตึก</th>
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
                                                <a href="<?php   echo site_url('floor/show_floor_item'); ?>" class="btn btn-info btn-xs">
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