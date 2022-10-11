<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        หน้าส่งงานช่าง
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">
                <br><br>
                </div><!-- /.box-header -->
                <form role="form" action="<?= site_url('jobs/addwork'); ?>" method="post" class="form-horizontal">
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <br />
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;"></th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">No.</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ประเภท</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 45%;">รายละเอียด</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ผู้แจ้ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query as $rs) { ?>                
                                        <tr>
                                            <td><input type="checkbox" name="c_id[]" value="<?= $rs->c_id?>"></td>
                                            <td><?php echo $rs->c_id ?></td>
                                            <td><?php echo $rs->c_type ?></td>
                                            <td><?php echo $rs->c_detail ?></td>
                                            <td><?php echo $rs->c_name ?></td>
                                            <td><?php
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
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 control-label">                                          
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-save"></i> บันทึกข้อมูล</button>                                            
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    </div><!-- /.box-body -->
                </div>
                </section><!-- /.content -->
                </div><!-- /.content-wrapper -->