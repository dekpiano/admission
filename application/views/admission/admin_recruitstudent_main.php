
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">จัดการข้อมูล<?=$title;?></h1>
          </div>

          <div class="row">
            <div class="col-4 ">
              <div class="card shadow mb-4">
                  <div class="card-header"><h6 class="m-0 font-weight-bold text-primary ">นักเรียนชั้น ม.1</h6></div>
                  <div class="card-body">
                      <canvas id="barChart1"></canvas>
                  </div>
                  <div class="card-footer small text-muted"></div>
              </div>
              
            </div>
            <div class="col-4">
              <div class="card shadow mb-4">
                  <div class="card-header"><h6 class="m-0 font-weight-bold text-primary ">นักเรียนชั้น ม.4</h6></div>
                  <div class="card-body">
                    <canvas id="barChart4"></canvas>
                  </div>
                   <div class="card-footer small text-muted"></div>
                </div>
              </div>
            <div class="col-4">             
              <div class="card shadow mb-4">
                  <div class="card-header"><h6 class="m-0 font-weight-bold text-primary ">นักเรียนทั้งหมด</h6></div>
                  <div class="card-body">
                    <canvas id="barChartAll"></canvas>
                    </div>
                   <div class="card-footer small text-muted"></div>
                  </div>
                </div>
          </div>

           <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 ">
              <h6 class="m-0 font-weight-bold text-primary ">ตารางข้อมูล<?=$title;?> </h6>
               
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>อัพเดต</th>
                      <th>ลำดับ</th>
                      <th>รูปภาพ</th>
                      <th>ชื่อผู้<?=$title;?></th>
                      <th>เลขประชาชน</th>
                      <th>ระดับชั้นที่สมัคร</th>
                      <th>โรงเรียนเดิม</th>
                      <th>วันเกิด</th>
                      <th>เบอร์โทรศัพท์</th>
                      <th>หลักสูตร</th>
                      <th>สถานะ</th>
                      <th>คำสั่ง</th>
                    </tr>
                  </thead>    
                  <?php foreach ($recruit as $key => $v_recruit) : ?>             
                    <tr>
                      <td><?=$v_recruit->recruit_dateUpdate;?></td>
                      <td><?=sprintf("%04d",$v_recruit->recruit_id);?></td>
                      <td><img style="width: 100px" src="<?=base_url('uploads/recruitstudent/m'.$v_recruit->recruit_regLevel.'/img/'.$v_recruit->recruit_img)?>" ></td>
                      <td><?=$v_recruit->recruit_prefix.$v_recruit->recruit_firstName.' '.$v_recruit->recruit_lastName;?></td>
                      <td><?=$v_recruit->recruit_idCard;?></td>
                      <td>ม.<?=$v_recruit->recruit_regLevel;?></td>
                      <td><?=$v_recruit->recruit_oldSchool;?></td>
                      <td><?=date('d-m',strtotime($v_recruit->recruit_birthday));?>-<?=date('Y',strtotime($v_recruit->recruit_birthday))+543;?></td>
                      <td><?=$v_recruit->recruit_phone;?></td>
                      <td><?=$v_recruit->recruit_tpyeRoom;?></td>
                      <td><?=$v_recruit->recruit_status;?></td>
                      <td>
                         <a target="_blank" href="<?=base_url('admin/control_admin_recruitstudent/pdf/'.$v_recruit->recruit_id);?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> พิมพ์ใบสมัคร</a>
                        <a  href="<?=base_url('admin/control_admin_recruitstudent/edit_recruitstudent/').$v_recruit->recruit_id;?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> ตรวจสอบ</a>
                        <a  href="<?=base_url('admin/control_admin_recruitstudent/delete_recruitstudent/').$v_recruit->recruit_id;?>" class="btn btn-danger btn-sm" onClick="return confirm('ต้องการลบข้อมูลหรือไม่?')"><i class="fas fa-trash-alt"></i> ลบ</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

