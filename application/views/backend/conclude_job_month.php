<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Noto+Sans+Thai+Looped&display=swap" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        <!-- Your Page Content Here -->
        <div class="box" style="font-family:'Mitr', sans-serif">
            <div class="box-header">      
                </div><!-- /.box-header -->
                <div class="box-body">
                    <style type="text/css">
                        @media print{
                            #hid{
                            display: none; /* ซ่อน  */
                            }
                        }
                    </style>
                    <div class="col-sm-12" >
                        <form role="form" action="<?= site_url('conclude/view_by_month'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-2 control-label">                                
                                <select id="hid" name="m_date" class="form-control" required>
                                    <?php if(set_value('m_date')!=''){?>
                                        <option value="<?= set_value('m_date'); ?>"><?php if(set_value('m_date')=='01'){echo 'มกราคม';}elseif(set_value('m_date')=='02'){echo 'กุมภาพันธ์';}elseif(set_value('m_date')=='03'){echo 'มีนาคม';}elseif(set_value('m_date')=='04'){echo 'เมษายน';}
                            elseif(set_value('m_date')=='05'){echo 'พฤษภาคม';}elseif(set_value('m_date')=='06'){echo 'มิถุนายน';}elseif(set_value('m_date')=='07'){echo 'กรกฎาคม';}elseif(set_value('m_date')=='08'){echo 'สิงหาคม';}
                            elseif(set_value('m_date')=='09'){echo 'กันยายน';}elseif(set_value('m_date')=='10'){echo 'ตุลาคม';}elseif(set_value('m_date')=='11'){echo 'พฤศจิกายน';}elseif(set_value('m_date')=='12'){echo 'ธันวาคม';}?></option>
                                    <?php } else{
                                        echo '<option value="">กรุณาเลือกเดือน</option>';
                                    }
                                    ?>
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <input id="hid" type="text" name="y_date"  class="form-control" required minlength="4" pattern="^[0-9]+$" placeholder="กรุณาใส่ปีค.ศ." value="<?= set_value('y_date');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 " >
                                    <button id="hid" class="btn btn-primary" type="submit">ค้นหา</button>
                                </div>
                            </div>
                            <div class="col-sm-6" style="display: flex;justify-content: flex-end;align: right;">
                                <div class="form-group" >
                                    <div class="col-sm-4 control-lable">
                                        <button id="hid" onclick="window.print();"class="btn btn-danger" style="font-size:20px">Print Report</button>         
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                        <a id="hid" class="btn btn-primary" style="font-size:20px;" href="<?= site_url('conclude/view_date/'); ?>" role="button" >รายการตามวันที่</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                        <a id="hid" class="btn btn-primary" style="font-size:20px;" href="<?= site_url('conclude/view_year/'); ?>" role="button" >รายการตามปี</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" >
                            <h3 class="box-title" style="font-family:'Mitr', sans-serif">ข้อมูลเดือน :<font color="red" ><?php if(set_value('m_date')=='01'){echo 'มกราคม';}elseif(set_value('m_date')=='02'){echo 'กุมภาพันธ์';}elseif(set_value('m_date')=='03'){echo 'มีนาคม';}elseif(set_value('m_date')=='04'){echo 'เมษายน';}
                            elseif(set_value('m_date')=='05'){echo 'พฤษภาคม';}elseif(set_value('m_date')=='06'){echo 'มิถุนายน';}elseif(set_value('m_date')=='07'){echo 'กรกฎาคม';}elseif(set_value('m_date')=='08'){echo 'สิงหาคม';}
                            elseif(set_value('m_date')=='09'){echo 'กันยายน';}elseif(set_value('m_date')=='10'){echo 'ตุลาคม';}elseif(set_value('m_date')=='11'){echo 'พฤศจิกายน';}elseif(set_value('m_date')=='12'){echo 'ธันวาคม';}?></font> ปี :<font color="red" ><?=set_value('y_date');?></font></h3>
                        </div>
                    </div>
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" >
                        <div class="row">
                            <div class="col-sm-6" >
                                <?php
                                $data_case_type = array();
                                //chart data format
                                foreach ($querytype as $k) {
                                    $data_case_type[] = "['".$k->c_type."'".", ".$k->casetotal."]";
                                }
                                //cut last commar
                                $data_case_type = implode(",", $data_case_type);
                                ?>
                                <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'จำนวนงานแยกตามประเภท'],
                                <?php echo $data_case_type;?>
                                ]);
                                var options = {
                                title: 'จำนวนงานแยกตามประเภท'
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="piechart1" style="width: 600px; height: 400px;"></div>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                //echo $query;
                                $case_status = array();
                                foreach ($querystatus as $s) {
                                
                                //status name
                                    if($s->c_status==1){
                                        $statusname = 'รอดำเนินการ';
                                    }elseif($s->c_status==2){
                                        $statusname = 'กำลังดำเนินการ';
                                    }elseif($s->c_status==3){
                                        $statusname = 'เสร็จสิ้น';
                                    }else{
                                        $statusname = 'ยกเลิก';
                                    }
                                
                                //chart data format
                                $c_status[] = "['".$statusname."'".", ".$s->statustotal."]";
                                }
                                //cut last commar
                                $c_status = implode(",", $c_status);
                                ?>
                                <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'จำนวนงานแยกตามสถานะ'],
                                <?php echo $c_status;?>
                                ]);
                                var options = {
                                title: 'จำนวนงานแยกตามสถานะ'
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="piechart2" style="width: 600px; height: 400px;"></div>
                            </div>
                            <div class="col-sm-12">
                                <br />
                                <table  class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">No.</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ประเภท</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 30%;">รายละเอียด</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">อุปกรณ์ที่ได้รับแจ้ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ห้อง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ผู้แจ้ง</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">สถานะ</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">อัพเดตล่าสุด</th>
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
                                            <td><?=$rs->c_item;?><?='-'?><?=$rs->i_name;?></td>
                                            <td><?=$rs->i_address?></td>
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
                                            <td><?=$rs->c_case_update?></td>                                                                                    
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <h3 style="font-family:'Mitr', sans-serif">จำนวนงานแยกตามประเภท</h3>
                                <table class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 50%;">ประเภทงานซ่อม</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จำนวน</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($querytype as $rsr) { ?>
                                        <tr role="row">
                                            <td><?= $rsr->c_type;?></td>
                                            <td align="center"><?= $rsr->casetotal;?></td>                                         
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <h3 style="font-family:'Mitr', sans-serif">จำนวนงานแยกตามสถานะ</h3>
                                <table class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="danger">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 50%;">สถานะทั้งหมด</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จำนวน</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($querystatus as $rss) { ?>
                                        <tr role="row">
                                            <td>
                                                <?php
                                                if($rss->c_status==1){
                                                echo 'รอดำเนินการ';
                                                }elseif($rss->c_status==2){
                                                echo 'กำลังดำเนินการ';
                                                }elseif($rss->c_status==3){
                                                echo 'เสร็จสิ้น';
                                                }else{
                                                echo 'ยกเลิก';
                                                }
                                                ?>
                                            </td>
                                            <td align="center"><?= $rss->statustotal;?></td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <h3 style="font-family:'Mitr', sans-serif">สรุปการแจ้งเสียอุปกรณ์</h3>
                                <table class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row" class="info">
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 50%;">รายชื่ออุปกรณ์</th>
                                            <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">จำนวนการแจ้ง</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($queryitem as $isr) { ?>
                                        <tr role="row">
                                            <td><?= $isr->c_item;?></td>
                                            <td align="center"><?= $isr->itemtotal;?></td>
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