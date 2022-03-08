<style>
label {
    font-weight: 800;
    color: #000;
}
</style>
<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('students/layout/menu_left_students.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">แก้ไขข้อมูลการสมัคร</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->


        <section class="no-padding-bottom">
            <div class="container-fluid">


                <div class="col-md-12 col-lg-12 order-md-1">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                        </div>

                        <div class="card-body ">
                            <?php $stu = @$chk_stu[0]; ?>
                            <div class="col-md-12 order-md-1">

                                <form class="needs-validation" enctype="multipart/form-data" method="post" novalidate=""
                                    action="<?=base_url('Control_students/reg_update/').$stu->recruit_id.'/'.($stu->recruit_img=='' ? '0' : $stu->recruit_img);?>">
                                    <input hidden type="text" name="recruit_regLevel" id="recruit_regLevel"
                                        value="<?=(isset($stu)) ? $stu->recruit_regLevel : $this->uri->segment(2);?>">

                                    <div class="row mb-3">
                                        <div class="col-md-4 ">
                                            <label for="recruit_idCard">เลขประจำตัวประชาชน 13 หลัก</label>
                                            <div><?=$stu->recruit_idCard?></div>
                                            <input hidden type="text" name="recruit_idCard" id="recruit_idCard"
                                                value="<?=$stu->recruit_idCard;?>">
                                        </div>
                                        <div class="col-md-4 ">
                                            <label for="recruit_idCard">ประจำปีการศึกษา</label>
                                            <div><?=$stu->recruit_year?></div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label for="recruit_idCard">ประเภทการสมัคร</label>
                                            <div><?=$stu->recruit_category?></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2 ">
                                            <label for="recruit_prefix">คำนำหน้า</label>
                                            <select class="form-control" id="recruit_prefix" name="recruit_prefix"
                                                required>
                                                <option value="">เลือก...</option>
                                                <?php $arrayName = array('เด็กชาย' ,'เด็กหญิง','นาย','นางสาว');
                foreach ($arrayName as $key => $value) :
              ?>
                                                <option <?=$stu->recruit_prefix == $value ? 'selected' : ''; ?>
                                                    value="<?=$value;?>">
                                                    <?=$value;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                เลือกคำนำหน้า
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="recruit_firstName">ชื่อผู้สมัคร</label>
                                            <input type="text" class="form-control" id="recruit_firstName"
                                                name="recruit_firstName" value="<?=$stu->recruit_firstName?>" required>
                                            <div class="invalid-feedback">
                                                ระบุชื่อจริง
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="recruit_lastName">นามสกุล</label>
                                            <input type="text" class="form-control" id="recruit_lastName"
                                                name="recruit_lastName" value="<?=$stu->recruit_lastName?>" required>
                                            <div class="invalid-feedback">
                                                ระบุนามสกุล
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_oldSchool">จบการศึกษาจากโรงเรียน</label>
                                            <input type="text" class="form-control" id="recruit_oldSchool"
                                                name="recruit_oldSchool" value="<?=$stu->recruit_oldSchool?>" required>
                                            <div class="invalid-feedback">
                                                ระบุโรงเรียนที่ศึกษาอยู่
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_district">อำเภอของโรงเรียน</label>
                                            <input type="text" class="form-control" id="recruit_district"
                                                name="recruit_district" value="<?=$stu->recruit_district?>" required>
                                            <div class="invalid-feedback">
                                                ระบุอำเภอของโรงเรียน
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_province">จังหวัดของโรงเรียน</label>
                                            <input type="text" class="form-control" id="recruit_province"
                                                name="recruit_province" value="<?=$stu->recruit_province?>" required>
                                            <div class="invalid-feedback">
                                                ระบุจังหวัดของโรงเรียน
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_grade">เกรดเฉลี่ย</label>
                                            <input type="text" class="form-control" id="recruit_grade"
                                                name="recruit_grade" value="<?=$stu->recruit_grade?>" required>
                                            <div class="invalid-feedback">
                                                ระบุเกรดเฉลี่ย
                                            </div>
                                        </div>
                                    </div>

                                    <?php $Y = date('Y',strtotime($stu->recruit_birthday))+543;
              $M = date('m',strtotime($stu->recruit_birthday));
              $D = date('d',strtotime($stu->recruit_birthday));
        ?>

                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <label for="recruit_birthdayD">วันเกิด</label>
                                            <select class="form-control" id="recruit_birthdayD"
                                                name="recruit_birthdayD">
                                                <?php for ($i=1; $i <=31 ; $i++) : ?>
                                                <option <?=($D==$i ? 'selected' : '');?> value="<?=$i;?>"><?=$i;?>
                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                เลือกวันเกิด
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_birthdayM">เดือนเกิด</label>
                                            <select class="form-control" id="recruit_birthdayM"
                                                name="recruit_birthdayM">
                                                <?php $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
                foreach ($thaimonth as $key => $v_m) : ?>
                                                <option <?=($M==$key+1 ? 'selected' : '');?>
                                                    value="<?=sprintf("%02d",$key+1);?>">
                                                    <?=$v_m;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                เลือกวันเกิด
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_birthdayY">ปีเกิด พ.ศ.</label>
                                            <select class="form-control" id="recruit_birthdayY"
                                                name="recruit_birthdayY">
                                                <?php $year=Date("Y")+543; echo "$year"; 
                  for ($i=($year-30);$i<=($year);$i++) : ?>
                                                <option <?=($Y==$i ? 'selected' : '');?> value="<?=$i;?>"><?=$i;?>
                                                </option>
                                                <?php endfor; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                เลือกวันเกิด
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <label for="recruit_race">เชื้อชาติ</label>
                                            <input type="text" class="form-control" id="recruit_race"
                                                name="recruit_race" value="<?=$stu->recruit_race?>" required>
                                            <div class="invalid-feedback">
                                                ระบุเชื้อชาติ
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="recruit_nationality">สัญชาติ</label>
                                            <input type="text" class="form-control" id="recruit_nationality"
                                                name="recruit_nationality" value="<?=$stu->recruit_nationality?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุสัญชาติ
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="recruit_religion">ศาสนา</label>
                                            <input type="text" class="form-control" id="recruit_religion"
                                                name="recruit_religion" value="<?=$stu->recruit_religion?>" required>
                                            <div class="invalid-feedback">
                                                ระบุศาสนา
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    ที่อยู่ตามทะเบียนบ้าน
                                    <div class="row">
                                        <div class="col-md-2 mb-3">
                                            <label for="  recruit_homeNumber">เลขที่</label>
                                            <input type="text" class="form-control" id="  recruit_homeNumber"
                                                name=" recruit_homeNumber" value="<?=$stu->recruit_homeNumber?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุเลขที่บ้าน
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="recruit_homeGroup">หมู่ที่ </label>
                                            <input type="text" class="form-control" id="recruit_homeGroup"
                                                name="recruit_homeGroup" value="<?=$stu->recruit_homeGroup;?>" required>
                                            <div class="invalid-feedback">
                                                ระบุหมู่ที่
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homeRoad">ถนน</label>
                                            <input type="text" class="form-control" id="recruit_homeRoad"
                                                name="recruit_homeRoad" value="<?=$stu->recruit_homeRoad?>">
                                            <div class="invalid-feedback">
                                                ระบุถนน
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homeProvince">จังหวัด</label>
                                            <select id="province" class="custom-select" name="recruit_homeProvince"
                                                required>
                                                <?php foreach ($province as $key => $value) : ?>
                                                <option
                                                    <?php echo $value->PROVINCE_ID == $stu->recruit_homeProvince ? 'selected' : ''  ?>
                                                    value="<?=$value->PROVINCE_ID?>"><?=$value->PROVINCE_NAME?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                ระบุจังหวัด
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homedistrict">อำเภอ/เขต</label>
                                            <select id="amphur" class="custom-select" name="recruit_homedistrict"
                                                required>
                                                <?php foreach ($amphur as $key => $value) :?>
                                                <option
                                                    <?=$stu->recruit_homedistrict == $value->AMPHUR_ID ? 'selected' : '';?>
                                                    value="<?=$value->AMPHUR_ID;?>"><?=$value->AMPHUR_NAME?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                ระบุอำเภอ/เขต
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homeSubdistrict">ตำบล/แขวง</label>
                                            <select id="district" class="custom-select " name="recruit_homeSubdistrict"
                                                required>
                                                <?php foreach ($district as $key => $value) :?>
                                                <option
                                                    <?=$stu->recruit_homeSubdistrict == $value->DISTRICT_ID ? 'selected' : '';?>
                                                    value="<?=$value->DISTRICT_ID;?>"><?=$value->DISTRICT_NAME?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                ระบุตำบล/แขวง
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homePostcode">รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="postcode"
                                                name="recruit_homePostcode" value="<?=$stu->recruit_homePostcode?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุรหัสไปรษณีย์
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_phone">หมายเลขโทรศัพท์ที่สามาติดต่อได้</label>
                                            <input type="text" class="form-control" id="recruit_phone"
                                                name="recruit_phone" value="<?=$stu->recruit_phone?>" required
                                                data-inputmask="'mask': '99-9999-9999'">
                                            <div class="invalid-feedback">
                                                ระบุหมายเลขโทรศัพท์ที่สามาติดต่อได้
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="">อัพโหลดรูปถ่าย (รูปถ่ายหน้าตรงชุดนักเรียน) <span
                                                class="badge badge-primary" data-toggle="tooltip" data-html="true"
                                                data-placement="top"
                                                title="<img class='img-fluid' src=&quot;<?=base_url('uploads/recruitstudent/Eximg.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</span>
                                        </label>
                                        <div class="col-md-3">
                                            <input type="file" class="form-control" id="recruit_img" name="recruit_img"
                                                <?=@$stu->recruit_img == '' ? 'required' : ''?>>
                                            <div class="invalid-feedback">
                                                อัพโหลดรูปภาพ
                                            </div>

                                            <img id="blah" class="img-fluid"
                                                src="<?php echo  @$stu->recruit_img == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/img/'.$stu->recruit_img; ?> "
                                                alt="" />
                                        </div>

                                    </div>

                                    <div <?=@$none;?>>
                                        <hr class="mb-4">
                                        <h4>หลักสูตรที่ต้องการศึกษาต่อ </h4>

                                        <div class="d-block my-3">
                                            <?php $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)'); //,'ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' 
                                            foreach ($AtpyeRoom as $key => $v_AtpyeRoom) : ?>
                                            <div class="custom-control custom-radio">
                                                <input <?=$v_AtpyeRoom == $stu->recruit_tpyeRoom ? 'checked' : ''?>
                                                    id="recruit_tpyeRoom<?=$key?>" name="recruit_tpyeRoom" type="radio"
                                                    class="custom-control-input" value="<?=$v_AtpyeRoom;?>">
                                                <label class="custom-control-label"
                                                    for="recruit_tpyeRoom<?=$key?>"><?=$v_AtpyeRoom;?></label>
                                            </div>
                                            <?php endforeach; ?>

                                        </div>
                                        <hr class="mb-4">

                                        <h4 class="mb-3"><u>หลักฐานการสมัคร</u> <small>(กรณียังไม่มีเอกสารตามที่ระบุ
                                                ยังไม่ต้องใส่
                                                สามารถใส่ในภายหลังในการตรวจสอบได้)</small></h4>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="recruit_certificateEdu">ใบรับรองผลการเรียน (ปพ.1)
                                                    ด้านหน้า <a href="#" 
                                            data-toggle="tooltip" data-placement="top" data-html="true"
                                            title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/p1.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                                <input type="file" class="form-control" id="recruit_certificateEdu"
                                                    name="recruit_certificateEdu" placeholder="">
                                                <div class="invalid-feedback">
                                                    Name on card is required
                                                </div>
                                                <img id="show_certificateEdu" class="img-fluid"
                                                    src="<?php echo  @$stu->recruit_certificateEdu == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/certificate/'.$stu->recruit_certificateEdu; ?>"
                                                    alt="" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="recruit_certificateEduB">ใบรับรองผลการเรียน (ปพ.1)
                                                    ด้านหลัง <a href="#"
                                            data-toggle="tooltip" data-placement="top" data-html="true"
                                            title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/p2.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                                <input type="file" class="form-control" id="recruit_certificateEduB"
                                                    name="recruit_certificateEduB" placeholder="">
                                                <div class="invalid-feedback">
                                                    Name on card is required
                                                </div>
                                                <img id="show_certificateEduB" class="img-fluid"
                                                    src="<?php echo  @$stu->recruit_certificateEduB == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/certificateB/'.$stu->recruit_certificateEduB; ?>"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="recruit_copyidCard">สำเนาบัตรปะชาชน <a href="#"
                                            data-toggle="tooltip" data-placement="top" data-html="true"
                                            title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/idcard.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                                <input type="file" class="form-control" id="recruit_copyidCard"
                                                    name="recruit_copyidCard" placeholder="">
                                                <div class="invalid-feedback">
                                                    Credit card number is required
                                                </div>
                                                <img id="show_copyidCard" class="img-fluid"
                                                    src="<?php echo  @$stu->recruit_copyidCard == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/copyidCard/'.$stu->recruit_copyidCard; ?>"
                                                    alt="" />
                                            </div>
                                            <!-- <div class="col-md-4 mb-3">
                                                <label for="recruit_copyAddress">สำเนาทะเบียนบ้าน <a href="#"
                                            data-toggle="tooltip" data-placement="top" data-html="true"
                                            title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/thome.png')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                                <input type="file" class="form-control" id="recruit_copyAddress"
                                                    name="recruit_copyAddress" placeholder="">
                                                <div class="invalid-feedback">
                                                    Credit card number is required
                                                </div>
                                                <img id="show_copyAddress" class="img-fluid"
                                                    src="<?php echo  @$stu->recruit_copyAddress == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/copyAddress/'.$stu->recruit_copyAddress; ?>"
                                                    alt="" />
                                            </div> -->
                                        </div>



                                    </div>
                                    <hr class="mb-4">

                                    <center>
                                        <div id="html_element" data-callback="onHuman"></div>
                                        <INPUT type="text" id="captcha" name="captcha" value="" required
                                            style="display:none">
                                        <div class="invalid-feedback">
                                            ยืนยันฉันไม่ใช่โปรแกรมอัตโนมัติ
                                        </div>
                                    </center>
                                    <?php if($stu->recruit_status == 'ผ่านการตรวจสอบ'): ?>
                                    <a class="mt-3 btn btn-primary btn-lg btn-block disabled"  role="button" aria-disabled="true"
                                        >คุณผ่านการตรวจสอบแล้ว ไม่สามารถแก้ไขได้ ถ้าจะแก้ไขติดต่อผู้ดูแลระบบได้ที่ เพจ Facebook โรงเรียน</a>
                                    <?php else : ?>
                                    <button class="mt-3 btn btn-primary btn-lg btn-block"
                                        type="submit">ยืนยันการแก้ไขสมัครเรียน</button>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


        </section>


    </div>
</div>