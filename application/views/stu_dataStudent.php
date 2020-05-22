<?php if(1 == 1){
    $readonly = 'readonly';
    $required1 = 'required';
    $none = 'class="d-none"';
}else{
    $required = 'required';
} ?>
<style>
label {
    font-weight: 800;
    color: #000;
}
</style> <!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 col-lg-9 order-md-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
                </div>

                <div class="card-body ">
                    <?php $stu = @$chk_stu[0]; ?>
                    <div class="col-md-12 order-md-1">
                       
                        <form class="needs-validation" enctype="multipart/form-data" method="post" novalidate=""
                            action="<?=base_url('control_admission/reg_update/').$stu->recruit_id.'/'.($stu->recruit_img=='' ? '0' : $stu->recruit_img);?>">
                            <input hidden type="text" name="recruit_regLevel" id="recruit_regLevel"
                                value="<?=(isset($stu)) ? $stu->recruit_regLevel : $this->uri->segment(2);?>">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="recruit_idCard">เลขประจำตัวประชาชน 13 หลัก</label>
                                    <input <?=@$readonly;?> type="text" class="form-control" id="recruit_idCard"
                                        name="recruit_idCard" required value="<?=$stu->recruit_idCard?>"
                                        data-inputmask="'mask': '9-9999-99999-99-9'">
                                    <div class="invalid-feedback">
                                        ระบุเลขประจำตัวประชาชน 13 หลัก
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label for="recruit_prefix">คำนำหน้า</label>
                                    <select class="form-control" id="recruit_prefix" name="recruit_prefix" required>
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
                                <div class="col-md-6 mb-3">
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
                            </div>

                            <?php $Y = date('Y',strtotime($stu->recruit_birthday))+543;
                  $M = date('m',strtotime($stu->recruit_birthday));
                  $D = date('d',strtotime($stu->recruit_birthday));
            ?>

                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label for="recruit_birthdayD">วันเกิด</label>
                                    <select class="form-control" id="recruit_birthdayD" name="recruit_birthdayD">
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
                                    <select class="form-control" id="recruit_birthdayM" name="recruit_birthdayM">
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
                                    <select class="form-control" id="recruit_birthdayY" name="recruit_birthdayY">
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
                                    <input type="text" class="form-control" id="recruit_race" name="recruit_race"
                                        value="<?=$stu->recruit_race?>" required>
                                    <div class="invalid-feedback">
                                        ระบุเชื้อชาติ
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="recruit_nationality">สัญชาติ</label>
                                    <input type="text" class="form-control" id="recruit_nationality"
                                        name="recruit_nationality" value="<?=$stu->recruit_nationality?>" required>
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
                                        name=" recruit_homeNumber" value="<?=$stu->recruit_homeNumber?>" required>
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
                                <div class="col-md-3 mb-3">
                                    <label for="recruit_homeSubdistrict">ตำบล/แขวง</label>
                                    <input type="text" class="form-control" id="recruit_homeSubdistrict"
                                        name="recruit_homeSubdistrict" value="<?=$stu->recruit_homeSubdistrict;?>"
                                        required>
                                    <div class="invalid-feedback">
                                        ระบุตำบล/แขวง
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="recruit_homedistrict">อำเภอ/เขต</label>
                                    <input type="text" class="form-control" id="recruit_homedistrict"
                                        name="recruit_homedistrict" value="<?=$stu->recruit_homedistrict?>" required>
                                    <div class="invalid-feedback">
                                        ระบุอำเภอ/เขต
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="recruit_homeProvince">จังหวัด</label>
                                    <input type="text" class="form-control" id="recruit_homeProvince"
                                        name="recruit_homeProvince" value="<?=$stu->recruit_homeProvince?>" required>
                                    <div class="invalid-feedback">
                                        ระบุจังหวัด
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="recruit_homePostcode">รหัสไปรษณีย์</label>
                                    <input type="text" class="form-control" id="recruit_homePostcode"
                                        name="recruit_homePostcode" value="<?=$stu->recruit_homePostcode?>" required>
                                    <div class="invalid-feedback">
                                        ระบุรหัสไปรษณีย์
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="recruit_phone">หมายเลขโทรศัพท์ที่สามาติดต่อได้</label>
                                    <input type="text" class="form-control" id="recruit_phone" name="recruit_phone"
                                        value="<?=$stu->recruit_phone?>" required
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
                                    <?php $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)' ); 
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
                                        <label for="recruit_certificateEdu">ใบรับรองผลการเรียน (ปพ.1)</label>
                                        <input type="file" class="form-control" id="recruit_certificateEdu"
                                            name="recruit_certificateEdu" placeholder="">
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                        <img id="blah" class="img-fluid"
                                            src="<?php echo  @$stu->recruit_certificateEdu == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/certificate/'.$stu->recruit_certificateEdu; ?>"
                                            alt="" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyidCard">สำเนาบัตรปะชาชน</label>
                                        <input type="file" class="form-control" id="recruit_copyidCard"
                                            name="recruit_copyidCard" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                        <img id="blah" class="img-fluid"
                                            src="<?php echo  @$stu->recruit_copyidCard == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/copyidCard/'.$stu->recruit_copyidCard; ?>"
                                            alt="" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyAddress">สำเนาทะเบียนบ้าน</label>
                                        <input type="file" class="form-control" id="recruit_copyAddress"
                                            name="recruit_copyAddress" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                        <img id="blah" class="img-fluid"
                                            src="<?php echo  @$stu->recruit_copyAddress == '' ? '#' : base_url().'uploads/recruitstudent/m'.$stu->recruit_regLevel.'/copyAddress/'.$stu->recruit_copyAddress; ?>"
                                            alt="" />
                                    </div>
                                </div>

                                <hr class="mb-4">

                                <div class="card mb-4" style="">
                                    <div class="card-body bg-danger text-white">
                                        <h5 class="card-title  text-center">ข้อตกลงในการสมัครออนไลน์</h5>
                                        <p class="card-text">1.ผู้สมัครเข้าศึกษาสามารถสมัคร ONLINE</p>
                                        <p class="card-text">2.รับสมัครผู้สำเร็จการศึกษา
                                            หรือกำลังศึกษาชั้นประถมศึกษา (ป.6) หรือ
                                            กำลังศึกษาชั้นมัธยมศึกษา (ม.3) ที่จบการศึกษา</p>
                                        <p class="card-text">
                                            3.ผู้สมัครเข้าศึกษาต้องเป็นผู้มีคุณสมบัติครบถ้วนตามที่กำหนดไว้ในคุณสมบัติของผู้สมัครเข้าศึกษาต่อ
                                        </p>
                                        <p class="card-text">4.ข้อความที่กรอกข้อมูลต้องเป็นความจริงทุกประการ
                                            หากผู้สมัครขาดคุณสมบัติอย่างใดอย่างหนึ่ง หรือฝ่าฝืน
                                            ระเบียบการคัดเลือก
                                            หรือการกรอกข้อความไม่เป็นความจริง
                                            ผู้สมัครยินยอมให้ตัดสิทธิ์การเข้าศึกษาโดยไม่มี
                                            ข้อโต้แย้งใด ๆ ทั้งสิ้น</p>
                                        <h4 class="text-center">**ห้ามใช้วุฒิการศึกษาปลอมในการสมัคร
                                            หากตรวจพบจะถูกดำเนินคดีตามกฎหมาย**</h4>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox text-center ">
                                    <input type="checkbox" class="custom-control-input" id="check_proviso"
                                        name="check_proviso" value="1" <?=@$required?>>
                                    <label class="custom-control-label "
                                        for="check_proviso">ยอมรับเงื่อนไขในการสมัคร</label>
                                    <div class="invalid-feedback">
                                        ยอมรับในเงื่อนไข
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <center>
                                <div id="html_element" data-callback="onHuman"></div>
                                <INPUT type="text" id="captcha" name="captcha" value="" required style="display:none">
                                <div class="invalid-feedback">
                                    ยืนยันฉันไม่ใช่โปรแกรมอัตโนมัติ
                                </div>
                            </center>
                            <button class="mt-3 btn btn-primary btn-lg btn-block"
                                type="submit">ยืนยันการแก้ไขสมัครเรียน</button>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->