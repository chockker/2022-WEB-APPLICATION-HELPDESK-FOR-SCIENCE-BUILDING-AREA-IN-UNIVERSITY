<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Welcome to CodeIgniter</title>
 <style>

 </style>
</head>
<body>
<div id="container" style="text-align:center">
 <h1>รายละเอียดการแจ้งซ่อม</h1>
<br></br>
<div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <table  class="table-striped ">
            <thead>
                <tr>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:20%;font-size:25px">No.</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:20%;">ผู้แจ้ง</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:40%;">ประเภท</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:40%;">ห้อง</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:20%;">รายละเอียด</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:20%;">สถานะ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:20%;">เวลาที่แจ้ง</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width:20%;">ผู้รับงาน</th>
                </tr>
            </thead>
        <tbody>
            <?php foreach ($rp_detail as $rp){?>
                <tr>
                <td><?= $rp->c_id;?></td>
                <td><?= $rp->c_name;?></td>
                <td><?= $rp->c_type;?></td>
                <td><?= $rp->c_room;?></td>
                <td><?= $rp->c_detail;?></td>
                <td><?= $rp->c_status;?></td>
                <td><?= $rp->c_date_save;?></td>
                <td><?= $rp->cw_as_name;?></td>
            <?php }?>
            </tr>
        </tbodt>
        </table>
    </div>
</div>
 
</div>
 
</body>
</html>