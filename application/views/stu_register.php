<style>
label {
    font-weight: 800;
    color: #000;
}
</style> <!-- Begin Page Content -->
<div class="container-fluid mt-6">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-plus"></i> ข้อมูลการสมัคร ชั้นมัธยมศึกษาปีที่
            <?=$this->uri->segment(2)?></h1>

    </div>
    <hr>
    <!-- Content Row -->

    <div class="">
        <div class="row ">
            <div class="col-md-12 order-md-1 ">


                <form class="needs-validation contact-block" enctype="multipart/form-data" method="post" novalidate=""
                    action="<?=base_url('control_admission/reg_insert')?>">
                    <input hidden type="text" name="recruit_regLevel" id="recruit_regLevel"
                        value="<?=$this->uri->segment(2);?>">
                    <div class="border-primary">

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ข้อมูลนักเรียน</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-8 mb-3 col-lg-2 ">
                                        <label for="recruit_idCard">ประจำปีการศึกษา</label>
                                        <input type="text" class="form-control" id="recruit_idCard"
                                            value="<?=$checkYear[0]->openyear_year;?>" readonly>

                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-8 mb-3 col-lg-4 ">
                                        <label for="recruit_idCard">เลขประจำตัวประชาชน 13 หลัก</label>
                                        <input type="text" class="form-control" id="recruit_idCard"
                                            name="recruit_idCard" required data-inputmask="'mask': '9-9999-99999-99-9'"
                                            data-toggle="tooltip" data-placement="top"
                                            title="หมายเลขประชาชนของนักเรียน">
                                        <div class="invalid-feedback">
                                            ระบุเลขประจำตัวประชาชน 13 หลัก
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-3 mb-3">
                                        <label for="recruit_prefix">คำนำหน้า</label>
                                        <select class="form-control" id="recruit_prefix" name="recruit_prefix" required
                                            data-toggle="tooltip" data-placement="top" title="คำนำหน้า">
                                            <option value="">เลือก...</option>
                                            <option value="เด็กชาย">เด็กชาย</option>
                                            <option value="เด็กหญิง">เด็กหญิง</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            เลือกคำนำหน้า
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_firstName">ชื่อ</label>
                                        <input type="text" class="form-control" id="recruit_firstName"
                                            name="recruit_firstName" placeholder required data-toggle="tooltip"
                                            data-placement="top" title="ชื่อของนักเรียน">
                                        <div class="invalid-feedback">
                                            ระบุชื่อของนักเรียน
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_lastName">นามสกุล</label>
                                        <input type="text" class="form-control" id="recruit_lastName"
                                            name="recruit_lastName" placeholder required data-toggle="tooltip"
                                            data-placement="top" title="นามสกุลของนักเรียน">
                                        <div class="invalid-feedback">
                                            ระบุนามสกุลของนักเรียน
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="recruit_birthdayD">วันเกิด</label>
                                        <select class="form-control" id="recruit_birthdayD" name="recruit_birthdayD"
                                            required>
                                            <option value="">เลือก</option>
                                            <?php for ($i=1; $i <=31 ; $i++) : ?>
                                            <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            เลือกวันเกิด
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_birthdayM">เดือนเกิด</label>
                                        <select class="form-control" id="recruit_birthdayM" name="recruit_birthdayM"
                                            required>
                                            <option value="">เลือก</option>
                                            <?php $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
                                foreach ($thaimonth as $key => $v_m) : ?>
                                            <option value="<?=sprintf("%02d",$key+1);?>"><?=$v_m;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            เลือกเดือนเกิด
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_birthdayY">ปีเกิด พ.ศ.</label>
                                        <select class="form-control" id="recruit_birthdayY" name="recruit_birthdayY"
                                            required>
                                            <option value="">เลือก</option>
                                            <?php $year=Date("Y")+543; echo "$year"; 
                      for ($i=($year-30);$i<=($year);$i++) : ?>
                                            <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            เลือกปีเกิด
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_race">เชื้อชาติ</label>
                                        <input type="text" class="form-control" id="recruit_race" name="recruit_race"
                                            required>
                                        <div class="invalid-feedback">
                                            ระบุเชื้อชาติ
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_nationality">สัญชาติ</label>
                                        <input type="text" class="form-control" id="recruit_nationality"
                                            name="recruit_nationality" required>
                                        <div class="invalid-feedback">
                                            ระบุสัญชาติ
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_religion">ศาสนา</label>
                                        <input type="text" class="form-control" id="recruit_religion"
                                            name="recruit_religion" required>
                                        <div class="invalid-feedback">
                                            ระบุศาสนา
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="recruit_img">อัพโหลดรูปถ่าย (รูปถ่ายหน้าตรงชุดนักเรียน) <a href="#"
                                            data-toggle="tooltip" data-placement="top" data-html="true"
                                            title="<img class='img-fluid' src=&quot;<?=base_url('uploads/recruitstudent/Eximg.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                    <input type="file" class="form-control" id="recruit_img" name="recruit_img">
                                    <img id="blah" class="img-fluid" src="# " alt="">
                                    <div class="invalid-feedback">
                                        อัพโหลดรูปภาพ
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ที่อยู่ตามทะเบียนบ้าน</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for=" recruit_homeNumber">เลขที่</label>
                                        <input type="text" class="form-control" id="recruit_homeNumber"
                                            name="recruit_homeNumber" required>
                                        <div class="invalid-feedback">
                                            ระบุเลขที่บ้าน
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="recruit_homeGroup">หมู่ที่ </label>
                                        <input type="text" class="form-control" id="recruit_homeGroup"
                                            name="recruit_homeGroup" required>
                                        <div class="invalid-feedback">
                                            ระบุหมู่ที่
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_homeRoad">ถนน</label>
                                        <input type="text" class="form-control" id="recruit_homeRoad"
                                            name="recruit_homeRoad">
                                        <div class="invalid-feedback">
                                            ระบุถนน
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4 mb-3">
                                        <label for="recruit_homeProvince">จังหวัด</label>
                                        <select id="province" class="custom-select" name="recruit_homeProvince" required>
                                            <option value="">- กรุณาเลือกจังหวัด -</option>
                                        </select>                                     
                                        <div class="invalid-feedback">
                                            ระบุจังหวัด
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_homedistrict">อำเภอ/เขต</label>
                                        <select id="amphur" class="custom-select" name="recruit_homedistrict" required>
                                            <option value="">- กรุณาเลือกอำเภอ -</option>
                                        </select>                                     
                                        <div class="invalid-feedback">
                                            ระบุอำเภอ/เขต
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_homeSubdistrict">ตำบล/แขวง</label>
                                        <select id="district" class="custom-select " name="recruit_homeSubdistrict" required>
                                            <option value="">- กรุณาเลือกตำบล -</option>
                                        </select>                                      
                                        <div class="invalid-feedback">
                                            ระบุตำบล/แขวง
                                        </div>
                                    </div>
                                    
                                 
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_homePostcode">รหัสไปรษณีย์</label>
                                        <input type="text" class="form-control" id="postcode"
                                            name="recruit_homePostcode" required>
                                        <div class="invalid-feedback">
                                            ระบุรหัสไปรษณีย์
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_phone">หมายเลขโทรศัพท์ที่สามาติดต่อได้</label>
                                        <input type="tel" class="form-control" id="recruit_phone" name="recruit_phone"
                                            placeholder required data-inputmask="'mask': '99-9999-9999'">
                                        <div class="invalid-feedback">
                                            ระบุหมายเลขโทรศัพท์ที่สามาติดต่อได้
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">จบจากโรงเรียน</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="recruit_oldSchool">จบการศึกษาจากโรงเรียน</label>
                                        <input type="text" class="form-control" id="recruit_oldSchool"
                                            name="recruit_oldSchool" placeholder required data-toggle="tooltip"
                                            data-placement="top" title="จบการศึกษาจากโรงเรียน">
                                        <div class="invalid-feedback">
                                            ระบุโรงเรียนที่จบการศึกษา
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="recruit_district">อำเภอ</label>
                                        <input type="text" class="form-control" id="recruit_district"
                                            name="recruit_district" placeholder required data-toggle="tooltip"
                                            data-placement="top" title="อำเภอของโรงเรียนที่จบการศึกษา">
                                        <div class="invalid-feedback">
                                            ระอำเภอของโรงเรียนที่จบการศึกษา
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="recruit_province">จังหวัด</label>
                                        <input type="text" class="form-control" id="recruit_province"
                                            name="recruit_province" placeholder required data-toggle="tooltip"
                                            data-placement="top" title="จังหวัดของโรงเรียนที่จบการศึกษา">
                                        <div class="invalid-feedback">
                                            ระบุจังหวัดของโรงเรียนที่จบการศึกษา
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">หลักสูตรที่ต้องการเรียน</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="recruit_tpyeRoom" type="radio"
                                            class="custom-control-input"
                                            value="ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"
                                            required>
                                        <label class="custom-control-label"
                                            for="credit">ห้องเรียนความเป็นเลิศทางด้านวิชาการ
                                            (Science Match and Technology Program)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="recruit_tpyeRoom" type="radio"
                                            class="custom-control-input"
                                            value="ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)" required>
                                        <label class="custom-control-label" for="debit">ห้องเรียนความเป็นเลิศทางด้านภาษา
                                            (Chinese
                                            English Program)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="paypal" name="recruit_tpyeRoom" type="radio"
                                            class="custom-control-input"
                                            value="ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"
                                            required>
                                        <label class="custom-control-label"
                                            for="paypal">ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ
                                            การแสดง (Preforming Art Program)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="paypal1" name="recruit_tpyeRoom" type="radio"
                                            class="custom-control-input"
                                            value="ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)" required>
                                        <label class="custom-control-label"
                                            for="paypal1">ห้องเรียนความเป็นเลิศด้านการงานอาชีพ
                                            (Career Program)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="sport" name="recruit_tpyeRoom" type="radio"
                                            class="custom-control-input"
                                            value="ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)" required>
                                        <label class="custom-control-label"
                                            for="sport">ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold text-primary"><u>หลักฐานการสมัคร</u>
                                    <small>(กรณียังไม่มีเอกสารตามที่ระบุ
                                        ยังไม่ต้องใส่
                                        สามารถใส่ในภายหลังในการตรวจสอบได้)</small>
                                </h5>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_certificateEdu">ใบรับรองผลการเรียน (ปพ.1)</label>
                                        <input type="file" class="form-control" id="recruit_certificateEdu"
                                            name="recruit_certificateEdu" placeholder="">
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyidCard">สำเนาบัตรปะชาชน</label>
                                        <input type="file" class="form-control" id="recruit_copyidCard"
                                            name="recruit_copyidCard" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyAddress">สำเนาทะเบียนบ้าน</label>
                                        <input type="file" class="form-control" id="recruit_copyAddress"
                                            name="recruit_copyAddress" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class=" mb-4" style="">
                            <div class="card-body bg-danger text-white">
                                <h5 class="card-title  text-center">ข้อตกลงในการสมัครออนไลน์</h5>
                                <p class="card-text">1.ผู้สมัครเข้าศึกษาสามารถสมัคร ONLINE</p>
                                <p class="card-text">2.รับสมัครผู้สำเร็จการศึกษา
                                    หรือกำลังศึกษาชั้นประถมศึกษา
                                    (ป.6) หรือ
                                    กำลังศึกษาชั้นมัธยมศึกษา (ม.3) ที่จบการศึกษา</p>
                                <p class="card-text">
                                    3.ผู้สมัครเข้าศึกษาต้องเป็นผู้มีคุณสมบัติครบถ้วนตามที่กำหนดไว้ในคุณสมบัติของผู้สมัครเข้าศึกษาต่อ
                                </p>
                                <p class="card-text">4.ข้อความที่กรอกข้อมูลต้องเป็นความจริงทุกประการ
                                    หากผู้สมัครขาดคุณสมบัติอย่างใดอย่างหนึ่ง หรือฝ่าฝืน ระเบียบการคัดเลือก
                                    หรือการกรอกข้อความไม่เป็นความจริง
                                    ผู้สมัครยินยอมให้ตัดสิทธิ์การเข้าศึกษาโดยไม่มี
                                    ข้อโต้แย้งใด ๆ ทั้งสิ้น</p>
                                <h4 class="text-center">**ห้ามใช้วุฒิการศึกษาปลอมในการสมัคร
                                    หากตรวจพบจะถูกดำเนินคดีตามกฎหมาย**</h4>
                            </div>
                        </div>

                        <div class="form-check text-center">
                            <input class="form-check-input " type="checkbox" id="check_proviso" name="check_proviso"
                                value="1" required>
                            <label class="form-check-label" for="check_proviso">
                                ยอมรับเงื่อนไขในการสมัคร
                            </label>
                            <div class="invalid-feedback">
                                ยอมรับในเงื่อนไข
                            </div>
                        </div>
                        <hr class="mb-4">
                        <center>

                            <div id="html_element" data-callback="onHuman"></div>
                            <input type="text" id="captcha" name="captcha" required style="display:none">
                            <div class="invalid-feedback">
                                ยืนยันฉันไม่ใช่โปรแกรมอัตโนมัติ
                            </div>


                        </center>
                        <button class="btn btn-primary btn-lg btn-block mt-3" type="submit">สมัครเรียน</button>
                </form>




            </div>

        </div>
    </div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->