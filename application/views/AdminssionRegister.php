<style>
label {
    font-weight: 800;
    color: #000;
}

.btn-file {
    position: relative;
    overflow: hidden;
}

.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    background: red;
    cursor: inherit;
    display: block;
}


@keyframes animate {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100% {
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
}

@keyframes animate {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100% {
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
}

@keyframes animate {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100% {
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }
}

.background {
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    margin: 0;
    padding: 0;
    background: #007bff;
    overflow: hidden;
    z-index: -9;
}

.background li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 19s linear infinite;
}

.background li:nth-child(0) {
    left: 74%;
    width: 111px;
    height: 111px;
    bottom: -111px;
    animation-delay: 1s;
}

.background li:nth-child(1) {
    left: 87%;
    width: 118px;
    height: 118px;
    bottom: -118px;
    animation-delay: 5s;
}

.background li:nth-child(2) {
    left: 86%;
    width: 146px;
    height: 146px;
    bottom: -146px;
    animation-delay: 2s;
}

.background li:nth-child(3) {
    left: 77%;
    width: 145px;
    height: 145px;
    bottom: -145px;
    animation-delay: 10s;
}

.background li:nth-child(4) {
    left: 41%;
    width: 155px;
    height: 155px;
    bottom: -155px;
    animation-delay: 15s;
}

.background li:nth-child(5) {
    left: 79%;
    width: 183px;
    height: 183px;
    bottom: -183px;
    animation-delay: 3s;
}

.background li:nth-child(6) {
    left: 12%;
    width: 177px;
    height: 177px;
    bottom: -177px;
    animation-delay: 5s;
}

.background li:nth-child(7) {
    left: 55%;
    width: 188px;
    height: 188px;
    bottom: -188px;
    animation-delay: 29s;
}

.background li:nth-child(8) {
    left: 7%;
    width: 162px;
    height: 162px;
    bottom: -162px;
    animation-delay: 29s;
}

.background li:nth-child(9) {
    left: 64%;
    width: 185px;
    height: 185px;
    bottom: -185px;
    animation-delay: 22s;
}

@media only screen and (min-device-width : 320px) and (max-device-width : 568px) and (orientation : portrait) {

    /* For landscape layouts only */
    #header h1 {
        font-size: 18px;
    }
}
</style>

<ul class="background">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>

<!-- Page Header-->
<header class="pt-3">
    <div class="container-fluid text-center">
        <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" alt="logoSKJ" class="img-fluid" style="width: 64px;">
        <h4 class="text-white">ระบบรับสมัครนักเรียน ส.ก.จ.</h4>
    </div>
</header>

<div class="container-fluid mt-6">
    <!-- Page Heading -->
    <div class="card shadow mt-4">
        <div class="card-body">
            <div id="header" class="d-sm-flex align-items-center justify-content-between ">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-graduate"></i>
                    ข้อมูลการสมัครชั้นมัธยมศึกษาปีที่ <?=$this->uri->segment(2)?>
                </h1>
            </div>
        </div>
    </div>

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
                                <div class="row justify-content-center">
                                    <div class="mb-3 col-md-4" style="text-align: -webkit-center;">
                                        <div class="fileinput-new img-thumbnail"
                                            style="width: 180px; height: 200px;overflow: hidden;">

                                            <img id="blah" class="img-fluid"
                                                src="https://us.123rf.com/450wm/happyvector071/happyvector0711904/happyvector071190415714/121105442-creative-illustration-of-default-avatar-profile-placeholder-isolated-on-background-art-design-grey-p.jpg?ver=6"
                                                alt="">

                                        </div>


                                        <div class="custom-file mt-3">
                                            <input type="file" class="form-control" id="recruit_img" name="recruit_img"
                                                required>
                                            <div class="invalid-feedback">กรุณาอัพโหลดรูปภาพ</div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <h2>ลักษณะของรูปถ่ายที่จะนำมาใช้งาน</h2>
                                        <ul>
                                            <li>สวมเครื่องแบบนักเรียน</li>
                                            <li>ยืนตัวตรงหน้าตรงไม่มีท่าทาง ครึ่งตัว (แนวตั้ง)</li>
                                            <li>ไม่สวมหมวก ไม่ใส่แว่นตาดำ ถ่ายไว้ไม่เกิน 6 เดือน</li>
                                            <li>นักเรียนหญิงมัดผมให้เรียบร้อยผมไม่ปิดหน้าผาก นักเรียนชายผมสั้น</li>
                                            <li>นามสกุลภาพที่ใช้งานได้ .JPEG .PNG เท่านั้น (ใช้โทรศัพท์ถ่ายได้)</li>
                                        </ul>
                                        <label for="recruit_img">อัพโหลดรูปถ่าย (รูปถ่ายหน้าตรงชุดนักเรียน) <a href="#"
                                                data-toggle="tooltip" data-placement="top" data-html="true"
                                                title="<img class='img-fluid' src=&quot;<?=base_url('uploads/recruitstudent/Eximg.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a>
                                            <span class="text-red">*</span> </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row ">
                                    <div class="col-md-8 mb-3 col-lg-2 ">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_idCard"
                                                value="<?=$checkYear[0]->openyear_year;?>" readonly placeholder=" ">
                                            <label for="recruit_idCard">ประจำปีการศึกษา <span
                                                    class="text-red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 col-lg-4">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input"
                                                value="<?=$TypeQuota[0]->quota_explain;?>" readonly>

                                            <input type="text" class="form-control" id="recruit_category"
                                                name="recruit_category" hidden value="<?=$TypeQuota[0]->quota_key;?>"
                                                readonly>
                                            <label for="">ประเภทสมัครเรียน <span class="text-red">*</span> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">

                                    <div class="col-md-8 mb-3 col-lg-4 ">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_idCard"
                                                name="recruit_idCard" required placeholder=" "
                                                data-inputmask="'mask': '9-9999-99999-99-9'" data-toggle="tooltip"
                                                data-placement="top" title="หมายเลขประชาชนของนักเรียน">
                                            <label for="recruit_idCard">เลขประจำตัวประชาชน 13 หลัก <span
                                                    class="text-red">*</span> </label>
                                            <div class="invalid-feedback">
                                                ระบุเลขประจำตัวประชาชน 13 หลัก
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row ">
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <select class="dek-floating-select form-select" id="recruit_prefix"
                                                name="recruit_prefix" required data-toggle="tooltip"
                                                data-placement="top" title="คำนำหน้า" placeholder=" ">
                                                <option value=""></option>
                                                <option value="เด็กชาย">เด็กชาย</option>
                                                <option value="เด็กหญิง">เด็กหญิง</option>
                                                <option value="นาย">นาย</option>
                                                <option value="นางสาว">นางสาว</option>
                                            </select>
                                            <label for="recruit_prefix">คำนำหน้า <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                เลือกคำนำหน้า
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_firstName"
                                                name="recruit_firstName" placeholder=" " required data-toggle="tooltip"
                                                data-placement="top" title="ชื่อของนักเรียน" />
                                            <label for="recruit_firstName">ชื่อ <span class="text-red">*</span> </label>
                                            <div class="invalid-feedback">
                                                ระบุชื่อของนักเรียน
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">

                                            <input type="text" class="dek-floating-input" id="recruit_lastName"
                                                name="recruit_lastName" placeholder=" " required data-toggle="tooltip"
                                                data-placement="top" title="นามสกุลของนักเรียน">
                                            <label for="recruit_lastName">นามสกุล <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุนามสกุลของนักเรียน
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <select class="dek-floating-select" id="recruit_birthdayD"
                                                name="recruit_birthdayD" placeholder=" " required>
                                                <option value=""></option>
                                                <?php for ($i=1; $i <=31 ; $i++) : ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <label for="recruit_birthdayD">วันเกิด <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                เลือกวันเกิด
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <select class="dek-floating-select" id="recruit_birthdayM"
                                                name="recruit_birthdayM" placeholder=" " required>
                                                <option value=""></option>
                                                <?php $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
                                foreach ($thaimonth as $key => $v_m) : ?>
                                                <option value="<?=sprintf("%02d",$key+1);?>"><?=$v_m;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="recruit_birthdayM">เดือนเกิด <span
                                                    class="text-red">*</span></label>
                                            <div class="invalid-feedback">
                                                เลือกเดือนเกิด
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <select class="dek-floating-select" id="recruit_birthdayY"
                                                name="recruit_birthdayY" placeholder=" " required>
                                                <option value=""></option>
                                                <?php $year=Date("Y")+543; echo "$year"; 
                      for ($i=($year-30);$i<=($year);$i++) : ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <label for="recruit_birthdayY">ปีเกิด พ.ศ. <span
                                                    class="text-red">*</span></label>
                                            <div class="invalid-feedback">
                                                เลือกปีเกิด
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_race"
                                                name="recruit_race" required placeholder=" ">
                                            <label for="recruit_race">เชื้อชาติ <span class="text-red">*</span> </label>
                                            <div class="invalid-feedback">
                                                ระบุเชื้อชาติ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_nationality"
                                                name="recruit_nationality" required placeholder=" ">
                                            <label for="recruit_nationality">สัญชาติ <span
                                                    class="text-red">*</span></label>
                                            <div class="invalid-feedback">
                                                ระบุสัญชาติ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_religion"
                                                name="recruit_religion" required placeholder=" ">
                                            <label for="recruit_religion">ศาสนา <span class="text-red">*</span> </label>
                                            <div class="invalid-feedback">
                                                ระบุศาสนา
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="tel" class="dek-floating-input" id="recruit_phone"
                                                name="recruit_phone" placeholder=" " required
                                                data-inputmask="'mask': '99-9999-9999'">
                                            <label for="recruit_phone">หมายเลขโทรศัพท์ที่สามาติดต่อได้ <span
                                                    class="text-red">*</span> </label>
                                            <div class="invalid-feedback">
                                                ระบุหมายเลขโทรศัพท์ที่สามาติดต่อได้
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ข้อมูลที่อยู่ตามทะเบียนบ้าน</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_homeNumber"
                                                name="recruit_homeNumber" required placeholder=" ">
                                            <label for=" recruit_homeNumber">บ้านเลขที่ <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุเลขที่บ้าน
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_homeGroup"
                                                name="recruit_homeGroup" required placeholder=" ">
                                            <label for="recruit_homeGroup">หมู่ที่ <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุหมู่ที่
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_homeRoad"
                                                name="recruit_homeRoad" placeholder=" ">
                                            <label for="recruit_homeRoad">ถนน </label>
                                            <div class="invalid-feedback">
                                                ระบุถนน
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="dek1-floating-label">
                                            <input type="text" class="dek1-floating-input" id="recruit_homeSubdistrict"
                                                name="recruit_homeSubdistrict" placeholder=" ">
                                            <label for="recruit_homeSubdistrict">ตำบล/แขวง <span
                                                    class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุตำบล/แขวง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek1-floating-label">
                                            <input type="text" class="dek1-floating-input" id="recruit_homedistrict"
                                                name="recruit_homedistrict" placeholder=" ">
                                            <label for="recruit_homedistrict">อำเภอ/เขต <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุอำเภอ/เขต
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek1-floating-label">
                                            <input type="text" class="dek1-floating-input" id="recruit_homeProvince"
                                                name="recruit_homeProvince" placeholder=" ">
                                            <label for="recruit_homeProvince">จังหวัด <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุจังหวัด
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dek1-floating-label">
                                            <input type="text" class="dek1-floating-input" id="recruit_homePostcode"
                                                name="recruit_homePostcode" required placeholder=" ">
                                            <label for="recruit_homePostcode">รหัสไปรษณีย์ <span
                                                    class="text-red">*</span></label>
                                            <div class="invalid-feedback">
                                                ระบุรหัสไปรษณีย์
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">ข้อมูลการจบจากโรงเรียน</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_oldSchool"
                                                name="recruit_oldSchool" placeholder=" " required data-toggle="tooltip"
                                                data-placement="top" title="จบการศึกษาจากโรงเรียน">
                                            <label for="recruit_oldSchool">จบการศึกษาจากโรงเรียน <span
                                                    class="text-red">*</span> <small>ไม่ต้องพิมพ์คำว่า
                                                    "โรงเรียน"</small></label>
                                            <div class="invalid-feedback">
                                                ระบุโรงเรียนที่จบการศึกษา
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_district"
                                                name="recruit_district" placeholder=" " required data-toggle="tooltip"
                                                data-placement="top" title="อำเภอของโรงเรียนที่จบการศึกษา">
                                            <label for="recruit_district">อำเภอ <span class="text-red">*</span> </label>
                                            <div class="invalid-feedback">
                                                ระอำเภอของโรงเรียนที่จบการศึกษา
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_province"
                                                name="recruit_province" placeholder=" " required data-toggle="tooltip"
                                                data-placement="top" title="จังหวัดของโรงเรียนที่จบการศึกษา">
                                            <label for="recruit_province">จังหวัด <span class="text-red">*</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                ระบุจังหวัดของโรงเรียนที่จบการศึกษา
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="dek-floating-label">
                                            <input type="text" class="dek-floating-input" id="recruit_grade"
                                                name="recruit_grade" placeholder=" " data-toggle="tooltip"
                                                data-placement="top" title="ระบุเกรดเฉลี่ย ในใบ ปพ.1">
                                            <label for="recruit_grade">เกรดเฉลี่ย <small>(กรณีเกรดเฉลี่ยใบ ปพ.1
                                                    ยังไม่ออก
                                                    ไม่ต้องกรอก)</small> <span class="text-red"></span> </label>
                                            <div class="invalid-feedback">
                                                ระบุเกรดเฉลี่ย ในใบ ปพ.1
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">หลักสูตรที่ต้องการเรียน <span
                                        class="text-red">*</span></h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <?php if($TypeQuota[0]->quota_key == "quotaM1" || $TypeQuota[0]->quota_key == "quotaM4" || $this->uri->segment(3) == "normal-between"):
                                        ?>
                                <!-- วิทยาศาสตร์ -->
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="recruit_tpyeRoom" type="radio" class="custom-control-input"
                                        value="ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"
                                        required>
                                    <label class="custom-control-label" for="credit">ห้องเรียนความเป็นเลิศทางด้านวิชาการ
                                        (Science Match and Technology Program)</label>
                                </div>
                                <div id="hidden-SciTech" style="display:none;margin: 0px 25px 10px;">
                                    <?php 
                                            $TypeSciTech = array('วิทย์ - คณิต','วิทย์ - เทคโน');
                                            foreach ($TypeSciTech as $key => $v_TypeSciTech) :
                                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="recruit_major"
                                            id="recruit_major<?=$key?>" value="<?=$v_TypeSciTech;?>" required>
                                        <label class="form-check-label" for="recruit_major<?=$key?>">
                                            <?=$v_TypeSciTech;?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวิชาเอก
                                    </div>
                                </div>
                                <!-- ภาษา -->
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="recruit_tpyeRoom" type="radio" class="custom-control-input"
                                        value="ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)" required>
                                    <label class="custom-control-label" for="debit">ห้องเรียนความเป็นเลิศทางด้านภาษา
                                        (Chinese
                                        English Program)</label>
                                </div>

                                <div id="hidden-Language" style="display:none;margin: 0px 25px 10px;">
                                    <?php 
                                            $TypeLanguage = array('ภาษา');
                                            foreach ($TypeLanguage as $key => $v_TypeLanguage) :
                                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="recruit_major"
                                            id="recruit_majorCEP<?=$key?>" value="<?=$v_TypeLanguage;?>" required>
                                        <label class="form-check-label" for="recruit_majorCEP<?=$key?>">
                                            <?=$v_TypeLanguage;?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวิชาเอก
                                    </div>
                                </div>

                                <!-- ศิลปะ -->
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="recruit_tpyeRoom" type="radio" class="custom-control-input"
                                        value="ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)"
                                        required>
                                    <label class="custom-control-label" for="paypal">ห้องเรียนความเป็นเลิศทางด้านดนตรี
                                        ศิลปะ
                                        การแสดง (Performing Arts Program)</label>
                                </div>
                                <div id="hidden-Arts" style="display:none;margin: 0px 25px 10px;">
                                    <?php 
                                            $TypeArts = array('ดนตรี','ศิลปะ','การแสดง');
                                            foreach ($TypeArts as $key => $v_TypeArts) :
                                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="recruit_major"
                                            id="recruit_major<?=$key?>" value="<?=$v_TypeArts;?>" required>
                                        <label class="form-check-label" for="recruit_major<?=$key?>">
                                            <?=$v_TypeArts;?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวิชาเอก
                                    </div>
                                </div>

                                <!-- การงานอาชีพ -->
                                <div class="custom-control custom-radio">
                                    <input id="paypal1" name="recruit_tpyeRoom" type="radio"
                                        class="custom-control-input"
                                        value="ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)" required>
                                    <label class="custom-control-label"
                                        for="paypal1">ห้องเรียนความเป็นเลิศด้านการงานอาชีพ
                                        (Career Program) </label>
                                </div>
                                <div id="hidden-CP" style="display:none;margin: 0px 25px 10px;">
                                    <?php 
                                            $TypeCP = array('การงานอาชีพ');
                                            foreach ($TypeCP as $key => $v_TypeCP) :
                                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="recruit_major"
                                            id="recruit_majorCP<?=$key?>" value="<?=$v_TypeCP;?>" required>
                                        <label class="form-check-label" for="recruit_majorCP<?=$key?>">
                                            <?=$v_TypeCP;?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวิชาเอก
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if($TypeQuota[0]->quota_key == "quotasport"):?>
                                <div class="custom-control custom-radio">
                                    <input id="sport" name="recruit_tpyeRoom" type="radio" class="custom-control-input"
                                        value="ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)" required>
                                    <label class="custom-control-label" for="sport">ห้องเรียนความเป็นเลิศด้านกีฬา
                                        (Sport Program)</label>
                                </div>

                                <div id="hidden-Sport" style="display:none;margin-left: 25px;">
                                    <?php 
                                            $TypeSport = array('ฟุตบอล','ฟุตซอล','บาสเกตบอล','วอลเลย์บอล');
                                            foreach ($TypeSport as $key => $v_TypeSport) :
                                        ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="recruit_major"
                                            id="recruit_major<?=$key?>" value="<?=$v_TypeSport;?>" required>
                                        <label class="form-check-label" for="recruit_major<?=$key?>">
                                            <?=$v_TypeSport;?>
                                        </label>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกประเภทกีฬา
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if($TypeQuota[0]->quota_key == "normal") : ?>
                                <!-- สำหรับรอบปกติ -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>อ่านฉันก่อนนะ!</b></p>
                                        การสมัครรอบปกติ
                                        จะเป็นการสอบเพื่อคัดเลือกนักเรียนเข้าเรียนตามหลักสูตรความเป็นเลิศ
                                        โดยเรียงลำดับคะแนนนักเรียนและเลือก
                                        ตามลำดับ <br>
                                        กรณี ที่สอบได้ลำดับที่ห้องเรียนเต็มหรือจำนวนนักเรียนในแต่ละห้องเกินโควตา
                                        นักเรียนจะต้องถูกเลือกเข้าเรียนตามหลักสูตรความเป็นเลิศในลำดับถัดไป
                                        <br>ดังนั้น กรุณาเลือกลำดับตามที่ต้องการเรียนก่อน
                                    </div>
                                    <div class="col-md-6">
                                        ลำดับการเลือก
                                        <hr>

                                        <?php foreach ($Course as $key => $v_CourseS) :?>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2">
                                                ลำดับที่ <?=$key+1;?>
                                            </div>
                                            <div>
                                                <select name="recruit_majorOrder[]" id="select<?=$key+1;?>"
                                                    class="form-control mb-2" required>
                                                    <option value="">เลือกหลักสูตรลำดับที่ <?=$key+1;?></option>
                                                    <?php foreach ($Course as $key => $v_CourseS) :?>
                                                    <option value="<?=$v_CourseS->course_id?>">
                                                        <?=$v_CourseS->course_initials?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                                <?php endif; ?>
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
                                        <label for="recruit_certificateEdu">ใบรับรองผลการเรียน (ปพ.1) <u>ด้านหน้า</u> <a
                                                href="#" data-toggle="tooltip" data-placement="top" data-html="true"
                                                title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/p1.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a>
                                        </label>
                                        <input type="file" class="form-control" id="recruit_certificateEdu"
                                            name="recruit_certificateEdu" placeholder="">
                                        <img id="show_certificateEdu" class="img-fluid" src="# " alt="">
                                        <div class="invalid-feedback">
                                            กรุณาเลือกไฟล์ ใบรับรองผลการเรียน (ปพ.1) <u>ด้านหน้า</u>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_certificateEduB">ใบรับรองผลการเรียน (ปพ.1) <u>ด้านหลัง</u>
                                            <a href="#" data-toggle="tooltip" data-placement="top" data-html="true"
                                                title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/p2.jpg')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                        <input type="file" class="form-control" id="recruit_certificateEduB"
                                            name="recruit_certificateEduB" placeholder="">
                                        <img id="show_certificateEduB" class="img-fluid" src="# " alt="">
                                        <div class="invalid-feedback">
                                            กรุณาเลือกไฟล์ ใบรับรองผลการเรียน (ปพ.1) <u>ด้านหลัง</u>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyidCard">สำเนาบัตรปะชาชน <a href="#"
                                                data-toggle="tooltip" data-placement="top" data-html="true"
                                                title="<img class='img-fluid' src=&quot;https://www.innnews.co.th/wp-content/uploads/2023/03/%E0%B8%A7%E0%B8%B4%E0%B8%98%E0%B8%B5%E0%B9%80%E0%B8%8B%E0%B9%87%E0%B8%99%E0%B8%AA%E0%B8%B3%E0%B9%80%E0%B8%99%E0%B8%B2%E0%B8%9A%E0%B8%B1%E0%B8%95%E0%B8%A3%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B2%E0%B8%8A%E0%B8%99-%E0%B9%80%E0%B8%8B%E0%B9%87%E0%B8%99%E0%B8%A2%E0%B8%B1%E0%B8%87%E0%B9%84%E0%B8%87%E0%B9%83%E0%B8%AB%E0%B9%89%E0%B8%96%E0%B8%B9%E0%B8%81%E0%B8%95%E0%B9%89%E0%B8%AD%E0%B8%87.png&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                        <input type="file" class="form-control" id="recruit_copyidCard"
                                            name="recruit_copyidCard" placeholder="">
                                        <img id="show_copyidCard" class="img-fluid" src="# " alt="">
                                        <div class="invalid-feedback">
                                            กรุณาเลือกไฟล์ สำเนาบัตรปะชาชน
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4 mb-3">
                                        <label for="recruit_copyAddress">สำเนาทะเบียนบ้าน <a href="#"
                                                data-toggle="tooltip" data-placement="top" data-html="true"
                                                title="<img class='img-fluid' src=&quot;<?=base_url('asset/img/thome.png')?>&quot;>">ตัวอย่างรูปที่ถูกต้อง</a></label>
                                        <input type="file" class="form-control" id="recruit_copyAddress"
                                            name="recruit_copyAddress" placeholder="">
                                        <img id="show_copyAddress" class="img-fluid" src="# " alt="">
                                        <div class="invalid-feedback">
                                            กรุณาเลือกไฟล์ สำเนาทะเบียนบ้าน
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <?php if($TypeQuota[0]->quota_key == "normal") : ?>
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold text-primary">เกียรติบัตรด้านความสามารถที่ใช้สมัครเรียน

                                </h5>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="row">
                                    <?php for ($i=1; $i <=3 ; $i++):?>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_certificateAbility">เกียรติบัตรใบที่ <?=$i;?> </label>
                                        <input type="file" class="form-control" id="recruit_certificateAbility<?=$i;?>"
                                            name="recruit_certificateAbility[]" placeholder=""
                                            onchange="showPreview(event,'preview<?=$i;?>')">
                                        <div id="preview<?=$i;?>"></div>

                                    </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
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
                            <span class="text-red">*</span> </label>
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

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <button class="btn btn-light btn-lg btn-block mt-3 mb-5" type="submit">สมัครเรียน</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>