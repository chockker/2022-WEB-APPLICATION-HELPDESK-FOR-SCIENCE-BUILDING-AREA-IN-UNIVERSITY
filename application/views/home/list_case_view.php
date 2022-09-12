<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
</script>
<script>
$(document).ready(function() {
$('#example').DataTable( {
"aaSorting" :[[0,'desc']],
"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );
</script>
<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12" style="background-color: #f77100;">
      <h3 style="margin:50px; color:#FFFFFF;text-align:center;font-family:thaisans_neueregular;">
        :แจ้งซ่อมอุปกรณ์ของตึกวิทยาศาสตร์:
      </h3>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col col-sm-12 col-md-12" style="padding:0px">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #292b2c;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color:#ffffff;">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('');?>">แจ้งซ่อม<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('form/allcase');?>">ติดตามงาน</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" style="color:#FFFFFF;font-family:thaisans_neueregular;" href="<?= site_url('login');?>">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
<div class="container" style="margin-top: 10px">
  <div class="row">
    <div class="col col-sm-12 col-md-12">
      <h3>ติดตามงาน</h3>
      <!-- datatable : id example & class display -->
      <table id="example" class="table table-bordered table-striped table-hover  display">
        <thead style="background-color: #f77100;">
          <tr style="color: #ffffff;font-family:thaisans_neueregular;">
            <th style="width: 5%;">No.</th>
            <th style="width: 15%;">ประเภท</th>
            <th style="width: 40%;">รายละเอียด</th>
            <th style="width: 25%;">ผู้แจ้ง</th>
            <th style="width: 15%;">สถานะ</th>
            <th style="width: 5%;">view</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($query as $rs) { ?>
          <tr style="font-family:thaisans_neueregular;">
            <td align="center"><?= $rs->c_id;?></td>
            <td><?= $rs->c_type;?></td>
            <td><?=
              '<b>'.$rs->c_detail.'</b>'
              .'<br>'
              .'ว/ด/ป '
              .date('d/m/Y H:i:s',strtotime($rs->c_date_save))
              .' น.'
            ;?></td>
            <td>
              <?=
              '<b> แจ้งโดย '.$rs->c_name
              .'</b><br>'
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
            <td><a href="<?= site_url('form/detail/'.$rs->c_id);?>" class="btn btn-info btn-sm" target="_blank" style="background-color: #f77100;border-style:none;"> view </a></td>
          </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>