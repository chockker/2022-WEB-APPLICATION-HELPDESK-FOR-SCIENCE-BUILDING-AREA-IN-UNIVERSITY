<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family:'Mitr', sans-serif">
        ข้อมูลอุปกรณ์ภายในห้องทั้งหมด
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box" style="font-family:'Mitr', sans-serif">
            <div class="box-header">
                <h3 class="box-title" style="font-family:'Mitr', sans-serif">ตารางข้อมูล</h3>
                </div><!-- /.box-header -->
                <div class="form-group">
                    <div class="col-sm-2 control-label">
                    </div>
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-success" href="<?=  site_url('item/add'); ?>" role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มข้อมูล</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">id</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">รหัสชื่อ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ห้อง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ตึก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">*หมายเหตุ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th>
                                            <!-- <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">floor plan</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $itas) { ?>
                                        <tr role="row">
                                            <td align="center"><?= $itas->i_id;?></td>
                                            <td><?= $itas->i_codename;?></td>
                                            <td><?= $itas->i_name;?></td>
                                            <td><?= $itas->i_type;?></td>
                                            <td><?= $itas->i_address;?></td>
                                            <td><?= $itas->town;?></td>
                                            <td><?= $itas->i_remark;?></td>
                                            <!-- <td><//?= $flrs->fld_img;?></td> -->
                                            
                                            <td>
                                                <a href="<?php   echo site_url('item/edit/'.$itas->i_id); ?>" class="btn btn-warning btn-xs">
                                                    แก้ไข
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="<?= site_url('allitem/del_item/'.$itas->i_id); ?>" role="button" onclick="return confirm('ยืนยันการลบข้อมูล??');"><i class="fa fa-fw fa-trash" ></i> ลบ</a>
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