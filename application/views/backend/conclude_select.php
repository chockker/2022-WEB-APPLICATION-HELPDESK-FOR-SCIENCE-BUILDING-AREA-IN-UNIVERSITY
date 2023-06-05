<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family:'Mitr', sans-serif">
        รายการแจ้งซ่อม
        </h1>
    </section>
    <!-- Top menu -->
    <?php // echo $this->session->flashdata('msginfo'); ?>
    <!-- Main content -->
    <section class="content">
    <div class="container" style="font-family:'Mitr', sans-serif">
        <!-- Your Page Content Here -->
        <div class="box">
            <div class="box-header">      
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="col-sm-12" style="display: flex;justify-content: center;align: center">
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <a class="btn btn-primary" style="font-size:30px;" href="<?= site_url('conclude/view_date/'); ?>" role="button" >รายการตามวันที่</a>
                            </div>      
                        </div>
                    </div>
                    <div class="col-sm-12">
                    </div>
                    <div class="col-sm-12" style="display: flex;justify-content: center;align: center;margin-top:20px">                    
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <a class="btn btn-primary" style="font-size:30px;" href="<?= site_url('conclude/view_month/'); ?>" role="button" >รายการตามเดือน</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    </div>
                    <div class="col-sm-12" style="display: flex;justify-content: center;align: center;margin-top:20px">                    
                        <div class="form-group">
                            <div class="col-sm-3 control-label">
                                <a class="btn btn-primary" style="font-size:30px;" href="<?= site_url('conclude/view_year/'); ?>" role="button" >รายการตามปี</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div><!-- /.box-body -->
                </div>
                </div>
                </section><!-- /.content -->
                </div><!-- /.content-wrapper -->