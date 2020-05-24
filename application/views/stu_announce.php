        <!-- Begin Page Content -->
        <div class="container-fluid mt-6">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="news-titel mb-0 text-gray-800"><?=$title?></h1>
           
          </div>
        <hr>
        <!-- Content Row -->
        <div class="row">            
            <div class="col-md-12 order-md-1">

               
                    <div id="accordion" class="accordion">
                        <div class="card mb-0 ">
                            <div class="card-header bg-primary">
                                <button class="text-white btn btn-link cool" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-bullhorn"></i> ประกาศผลการสมัครสอบ <b>ชั้นมัธยมศึกษาปีที่ 1  (รอบที่ <?=$around;?>)</b>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <section >
                                        <div class="">
                                            <div class="">                                             
                                                <div class="text-center h3">รายชื่อผู้สมัครสอบ ม.1 (รอบที่ <?=$around;?>)</div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover show_announce">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">เลขที่สมัคร</th>
                                                                <th style="padding-right:160px;" scope="col">ชื่อสกุล</th>
                                                                <th scope="col">สถานะตรวจสอบการสมัคร</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php  foreach ($m1 as $key => $v_m1) : ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?=sprintf('%04d',$v_m1->recruit_id);?></th>
                                                                <td><?=$v_m1->recruit_prefix.$v_m1->recruit_firstName.' '.$v_m1->recruit_lastName;?>
                                                                </td>
                                                                <td class="h5">
                                                                    <?php if($v_m1->recruit_status == 'ผ่านการตรวจสอบ'): ?>
                                                                    <span class="text-success"><i
                                                                            class="icofont-check-circled"></i>
                                                                        <?=$v_m1->recruit_status?></span>
                                                                    <span class="badge badge-secondary badge-pill"><i
                                                                            class="icofont-print"></i>
                                                                        <a href="#" stuid="<?=$v_m1->recruit_id;?>"
                                                                            target="_blank" data-toggle="modal"
                                                                            data-target="#staticBackdrop"
                                                                            class="text-white stu_id">พิมพ์ใบสมัครสอบ</a>
                                                                        <!-- <?=base_url('control_recruitstudent/pdf/').$v_m1->recruit_id;?> -->
                                                                    </span>
                                                                    <?php else : ?>
                                                                    <span class="text-warning"><i
                                                                            class="icofont-exclamation-circle"></i>
                                                                        <?=$v_m1->recruit_status?></span>
                                                                    <span class="badge badge-danger badge-pill"><i
                                                                            class="icofont-edit"></i>
                                                                        <a href="<?=base_url('checkRegister?a=3&edit=0');?>"
                                                                            class="text-white">กลับไปแก้ไข</a>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                    </section>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-0 ">
                            <div class="card-header bg-primary">
                                <button class="text-white btn btn-link cool" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <i class="fas fa-bullhorn"></i> ประกาศผลการสมัครสอบ <b>ชั้นมัธยมศึกษาปีที่ 4 (รอบที่  <?=$around;?>)</b>
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <section style="">
                                        <div class="">
                                            <div class="">                                              

                                                <div class="text-center h3">รายชื่อผู้สมัครสอบ ม.4 (รอบที่  <?=$around;?>)</div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover show_announce">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">เลขที่สมัคร</th>
                                                                <th style="padding-right:160px;" scope="col">ชื่อสกุล</th>
                                                                <th scope="col">สถานะตรวจสอบการสมัคร</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php  foreach ($m4 as $key => $v_m4) : ?>
                                                            <tr>
                                                                <th scope="row">
                                                                    <?=sprintf('%04d',$v_m4->recruit_id);?></th>
                                                                <td><?=$v_m4->recruit_prefix.$v_m4->recruit_firstName.' '.$v_m4->recruit_lastName;?>
                                                                </td>
                                                                <td class="h5">
                                                                    <?php if($v_m4->recruit_status == 'ผ่านการตรวจสอบ'): ?>
                                                                    <span class="text-success"><i
                                                                            class="icofont-check-circled"></i>
                                                                        <?=$v_m4->recruit_status?></span>
                                                                    <span class="badge badge-secondary badge-pill"><i
                                                                            class="icofont-print"></i>
                                                                        <a href="#" stuid="<?=$v_m4->recruit_id;?>"
                                                                            target="_blank" data-toggle="modal"
                                                                            data-target="#staticBackdrop"
                                                                            class="text-white stu_id">พิมพ์ใบสมัครสอบ</a>
                                                                        <!-- <?=base_url('control_recruitstudent/pdf/').$v_m4->recruit_id;?> -->
                                                                    </span>
                                                                    <?php else : ?>
                                                                    <span class="text-warning"><i
                                                                            class="icofont-exclamation-circle"></i>
                                                                        <?=$v_m4->recruit_status?></span>
                                                                    <span class="badge badge-danger badge-pill"><i
                                                                            class="icofont-edit"></i>
                                                                        <a href="<?=base_url('checkRegister?a=3&edit=0');?>"
                                                                            class="text-white">กลับไปแก้ไข</a>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                    </section>
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="alert alert-warning mt-5" role="alert">
                        <h4 class="alert-heading">หมายเหตุ</h4>
                        <p> นักเรียนโควตามัธยมศึกษาปีที่ ๓ โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์
                            ไม่ต้องทำการทดสอบข้อเขียน ให้มารายงานตัวและมอบตัวตามวันและเวลาที่กำหนด</p>
                        <hr>
                        <p class="mb-0">โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
                    </div>

                </div>

          
        
      

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ยืนยันด้วยวันเกิด</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <input hidden type="text" id="idstu">
                            <div class="col">
                                <select class="form-control" id="recruit_birthdayD" name="recruit_birthdayD" required>
                                    <option value="">วันที่...</option>
                                    <?php for ($i=1; $i <=31 ; $i++) : ?>
                                    <option value="<?=sprintf("%02d",$i);?>"><?=$i;?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-feedback">
                                    เลือกวันเกิด
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-control" id="recruit_birthdayM" name="recruit_birthdayM" required>
                                    <option value="">เดือน...</option>
                                    <?php $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
                                foreach ($thaimonth as $key => $v_m) : ?>
                                    <option value="<?=sprintf("%02d",$key+1);?>"><?=$v_m;?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    เลือกเดือนเกิด
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-control" id="recruit_birthdayY" name="recruit_birthdayY" required>
                                    <option value="">ปี...</option>
                                    <?php $year=Date("Y")+543; echo "$year"; 
                      for ($i=($year-30);$i<=($year);$i++) : ?>
                                    <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php endfor; ?>
                                </select>
                                <div class="invalid-feedback">
                                    เลือกปีเกิด
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" id="report_stu" class="btn btn-primary "> พิมพ์ใบสมัครสอบ</button>
                </div>
            </div>
        </div>
    </div>
