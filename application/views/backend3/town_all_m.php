<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family:'Mitr', sans-serif">
        รายการตึกทั้งหมด
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box" style="font-family:'Mitr', sans-serif">
            <div class="box-header">
                <h3 class="box-title" style="font-family:'Mitr', sans-serif">>ตารางข้อมูล</h3>
                </div><!-- /.box-header -->
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
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">No.</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">เลขตึก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อตึก</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จำนวนชั้น</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">view</th>
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
                                                <a href="<?php   echo site_url('floor/index/'.$ts->t_num); ?>" class="btn btn-info btn-xs">
                                                    view
                                                </a>
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