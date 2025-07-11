<style>
label {
    font-weight: 800;
    color: #000;
}
</style>

<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('admin/layout/menu_left_admin.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">ตรวจสอบสถานะ / แก้ไขการรับสมัคร</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="">
            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="row justify-content-lg">
                    <div class="col-12">
                        <div class="card shadow mb-4 ">
                            <div class="card-header py-3 bg-<?=$color?>">
                                <h6 class="m-0 font-weight-bold  text-white "><?=$icon?> <?php echo end($breadcrumbs);?>
                                </h6>
                            </div>

                            <div class="card-body">

                                <form enctype="multipart/form-data"
                                    action="<?=base_url('admin/Student/Update/').$recruit[0]->recruit_id;?>"
                                    method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 mb-3">
                                            <label for="recruit_idCard">เลขประจำตัวประชาชน 13 หลัก</label>
                                            <input type="text" class="form-control" id="recruit_idCard"
                                                name="recruit_idCard" required value="<?=$recruit[0]->recruit_idCard;?>"
                                                data-inputmask="'mask': '9-9999-99999-99-9'">
                                            <div class="invalid-feedback">
                                                ระบุเลขประจำตัวประชาชน 13 หลัก
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2 mb-3">
                                            <label for="recruit_idCard">ระดับชั้นที่สมัคร</label>
                                            <input class="form-control" type="text" name="recruit_regLevel"
                                                id="recruit_regLevel" value="<?=$recruit[0]->recruit_regLevel;?>">
                                        </div>
                                        <div class="col-md-6 col-lg-2 mb-3">
                                            <label for="recruit_idCard">ระดับชั้นที่สมัคร</label>
                                            <input class="form-control" type="text" name="recruit_year"
                                                id="recruit_year" value="<?=$recruit[0]->recruit_year;?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_prefix">คำนำหน้า</label>
                                            <select class="form-control" id="recruit_prefix" name="recruit_prefix"
                                                required>
                                                <option value="">เลือก...</option>
                                                <?php $arrayName = array('เด็กชาย' ,'เด็กหญิง','นาย','นางสาว');
                           foreach ($arrayName as $key => $value) :
                         ?>
                                                <option <?=$recruit[0]->recruit_prefix == $value ? 'selected' : ''; ?>
                                                    value="<?=$value;?>"><?=$value;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                เลือกคำนำหน้า
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_firstName">ชื่อผู้สมัคร</label>
                                            <input type="text" class="form-control" id="recruit_firstName"
                                                name="recruit_firstName" value="<?=$recruit[0]->recruit_firstName?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุชื่อจริง
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_lastName">นามสกุล</label>
                                            <input type="text" class="form-control" id="recruit_lastName"
                                                name="recruit_lastName" value="<?=$recruit[0]->recruit_lastName?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุนามสกุล
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_oldSchool">ศึกษาอยู่โรงเรียน</label>
                                            <input type="text" class="form-control" id="recruit_oldSchool"
                                                name="recruit_oldSchool" value="<?=$recruit[0]->recruit_oldSchool?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุโรงเรียนที่ศึกษาอยู่
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_district">อำเภอ</label>
                                            <input type="text" class="form-control" id="recruit_district"
                                                name="recruit_district" value="<?=$recruit[0]->recruit_district?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุอำเภอของโรงเรียน
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_province">จังหวัด</label>
                                            <input type="text" class="form-control" id="recruit_province"
                                                name="recruit_province" value="<?=$recruit[0]->recruit_province?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุจังหวัดของโรงเรียน
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_grade">เกรดเฉลี่ย</label>
                                            <input type="text" class="form-control" id="recruit_grade"
                                                name="recruit_grade" value="<?=$recruit[0]->recruit_grade?>" >
                                            <div class="invalid-feedback">
                                                ระบุจังหวัดของโรงเรียน
                                            </div>
                                        </div>
                                    </div>


                                    <?php $Y = date('Y',strtotime($recruit[0]->recruit_birthday))+543;
                 $M = date('m',strtotime($recruit[0]->recruit_birthday));
                 $D = date('d',strtotime($recruit[0]->recruit_birthday));
           ?>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
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

                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_birthdayM">เดือนเกิด</label>
                                            <select class="form-control" id="recruit_birthdayM"
                                                name="recruit_birthdayM">
                                                <?php $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
                   foreach ($thaimonth as $key => $v_m) : ?>
                                                <option <?=($M==$key+1 ? 'selected' : '');?>
                                                    value="<?=@sprintf("%02d",$key+1);?>">
                                                    <?=$v_m;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                เลือกวันเกิด
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
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
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_race">เชื้อชาติ</label>
                                            <input type="text" class="form-control" id="recruit_race"
                                                name="recruit_race" value="<?=$recruit[0]->recruit_race?>" required>
                                            <div class="invalid-feedback">
                                                ระบุเชื้อชาติ
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_nationality">สัญชาติ</label>
                                            <input type="text" class="form-control" id="recruit_nationality"
                                                name="recruit_nationality" value="<?=$recruit[0]->recruit_nationality?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุสัญชาติ
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="recruit_religion">ศาสนา</label>
                                            <input type="text" class="form-control" id="recruit_religion"
                                                name="recruit_religion" value="<?=$recruit[0]->recruit_religion?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุศาสนา
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    ที่อยู่ตามทะเบียนบ้าน
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="  recruit_homeNumber">เลขที่</label>
                                            <input type="text" class="form-control" id="  recruit_homeNumber"
                                                name=" recruit_homeNumber" value="<?=$recruit[0]->recruit_homeNumber?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุเลขที่บ้าน
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="recruit_homeGroup">หมู่ที่ </label>
                                            <input type="text" class="form-control" id="recruit_homeGroup"
                                                name="recruit_homeGroup" value="<?=$recruit[0]->recruit_homeGroup;?>"
                                                required>
                                            <div class="invalid-feedback">
                                                ระบุหมู่ที่
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homeRoad">ถนน</label>
                                            <input type="text" class="form-control" id="recruit_homeRoad"
                                                name="recruit_homeRoad" value="<?=$recruit[0]->recruit_homeRoad?>">
                                            <div class="invalid-feedback">
                                                ระบุถนน
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homeSubdistrict">ตำบล/แขวง</label>
                                            <input type="text" id="recruit_homeSubdistrict"
                                                name="recruit_homeSubdistrict" class="form-control"
                                                value="<?=$recruit[0]->recruit_homeSubdistrict;?>">
                                            <div class="invalid-feedback">
                                                ระบุตำบล/แขวง
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homedistrict">อำเภอ/เขต</label>
                                            <input type="text" id="recruit_homedistrict" name="recruit_homedistrict"
                                                class="form-control" value="<?=$recruit[0]->recruit_homedistrict;?>">
                                            <div class="invalid-feedback">
                                                ระบุอำเภอ/เขต
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homeProvince">จังหวัด</label>
                                            <input type="text" id="recruit_homeProvince" name="recruit_homeProvince"
                                                class="form-control" value="<?=$recruit[0]->recruit_homeProvince;?>">
                                            <div class="invalid-feedback">
                                                ระบุจังหวัด
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="recruit_homePostcode">รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="recruit_homePostcode"
                                                name="recruit_homePostcode"
                                                value="<?=$recruit[0]->recruit_homePostcode?>" required>
                                            <div class="invalid-feedback">
                                                ระบุรหัสไปรษณีย์
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="recruit_phone">หมายเลขโทรศัพท์ที่สามาติดต่อได้</label>
                                            <input type="text" class="form-control" id="recruit_phone"
                                                name="recruit_phone" value="<?=$recruit[0]->recruit_phone?>" required
                                                data-inputmask="'mask': '99-9999-9999'">
                                            <div class="invalid-feedback">
                                                ระบุหมายเลขโทรศัพท์ที่สามาติดต่อได้
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="recruit_img">อัพโหลดรูปถ่าย (รูปถ่ายหน้าตรงชุดนักเรียน)</label>
                                        <div class="col-md-3">
                                            <input type="file" class="form-control" id="recruit_img" name="recruit_img">
                                            <div class="invalid-feedback">
                                                อัพโหลดรูปภาพ
                                            </div>

                                            <img id="blah" class="img-fluid"
                                                src="<?php echo  @$recruit[0]->recruit_img == '' ? '#' : base_url().'uploads/recruitstudent/m'.$recruit[0]->recruit_regLevel.'/img/'.$recruit[0]->recruit_img; ?>"
                                                alt="" />
                                        </div>

                                    </div>


                                    <hr class="mb-4">
                                    <h4>หลักสูตรที่ต้องการศึกษาต่อ </h4>

                                    <?php if(@$recruit[0]->recruit_category != "normal"): ?>

                                    <?php 
                                $AtpyeRoom = array(
                                    'ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)',
                                    'ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)',
                                    'ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)',
                                    'ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)',
                                    'ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)'
                                ); 
                                foreach ($AtpyeRoom as $key => $v_AtpyeRoom) : ?>
                                    <div class="custom-control custom-radio">
                                        <input id="recruit_tpyeRoom<?=$key?>" name="recruit_tpyeRoom" type="radio"
                                            class="custom-control-input" value="<?=$v_AtpyeRoom;?>"
                                            onclick="showMajorOptions()"
                                            <?= ($v_AtpyeRoom == @$recruit[0]->recruit_tpyeRoom) ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="recruit_tpyeRoom<?=$key?>">
                                            <?=$v_AtpyeRoom;?>
                                        </label>
                                    </div>

                                    <!-- แสดงข้อมูลตามประเภท -->
                                    <div id="major-options-<?=$key?>" class="major-options"
                                        style="display:none;margin: 0px 25px 10px;">
                                        <?php if($v_AtpyeRoom == 'ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)') : ?>
                                        <?php 
            $TypeSciTech = array('วิทย์ - คณิต','วิทย์ - เทคโน');
            foreach ($TypeSciTech as $key => $v_TypeSciTech) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="recruit_major"
                                                id="recruit_major<?=$key?>" value="<?=$v_TypeSciTech;?>" required <?= ($v_TypeSciTech == @$recruit[0]->recruit_major) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="recruit_major<?=$key?>">
                                                <?=$v_TypeSciTech;?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php elseif($v_AtpyeRoom == 'ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Performing Arts Program)') : ?>
                                        <?php
            $TypeArts = array('ดนตรี','ศิลปะ','การแสดง');
            foreach ($TypeArts as $key => $v_TypeArts) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="recruit_major"
                                                id="recruit_major<?=$key?>" value="<?=$v_TypeArts;?>" required <?= ($v_TypeArts == @$recruit[0]->recruit_major) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="recruit_major<?=$key?>">
                                                <?=$v_TypeArts;?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php elseif($v_AtpyeRoom == 'ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)') : ?>
                                        <?php 
            $TypeLanguage = array('ภาษา');
            foreach ($TypeLanguage as $key => $v_TypeLanguage) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="recruit_major"
                                                id="recruit_majorCEP<?=$key?>" value="<?=$v_TypeLanguage;?>" required <?= ($v_TypeLanguage == @$recruit[0]->recruit_major) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="recruit_majorCEP<?=$key?>">
                                                <?=$v_TypeLanguage;?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php elseif($v_AtpyeRoom == 'ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)') : ?>
                                        <?php 
                                            $TypeCP = array('การงานอาชีพ');
                                            foreach ($TypeCP as $key => $v_TypeCP) :
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="recruit_major"
                                                id="recruit_majorCP<?=$key?>" value="<?=$v_TypeCP;?>" required <?= ($v_TypeCP == @$recruit[0]->recruit_major) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="recruit_majorCP<?=$key?>">
                                                <?=$v_TypeCP;?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>

                                        <?php elseif($v_AtpyeRoom == 'ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)') : ?>
                                        <?php 
                                            $TypeSport = array('ฟุตบอล','ฟุตซอล','บาสเกตบอล','วอลเลย์บอล','กรีฑา','มวย','เทเบิลเทนนิส','เปตอง');
                                            foreach ($TypeSport as $key_TypeSport => $v_TypeSport) :
                                        ?>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="recruit_major"
                                                id="recruit_majorSport<?=$key_TypeSport?>" value="<?=$v_TypeSport;?>" required <?= ($v_TypeSport == @$recruit[0]->recruit_major) ? 'checked' : '' ?>>
                                            <label class="custom-control-label" for="recruit_majorSport<?=$key_TypeSport?>">
                                                <?=$v_TypeSport;?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                        <div class="invalid-feedback">
                                            กรุณาเลือกประเภทกีฬา
                                        </div>
                                        รุ่นอายุ

                                        <div id="hidden-sportAge" style="margin-left: 25px;">
                                            <?php 
                                            $sportAge = array('13'=>'รุ่นอายุ 13 ปี เกิดพ.ศ.2555','14'=>'️รุ่นอายุ 14 ปี เกิดพ.ศ.2554','15'=>'️รุ่นอายุ 15 ปี เกิดพ.ศ.2553','16'=>'️รุ่นอายุ 16 ปี เกิดพ.ศ.2552','17'=>'️รุ่นอายุ 17 ปี เกิดพ.ศ.2551','18'=>'️รุ่นอายุ 18 ปี เกิดพ.ศ.2550');
                                            foreach ($sportAge as $key => $v_sportAge) :
                                        ?>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="recruit_agegroup"
                                                    id="recruit_agegroup<?=$key?>" value="<?=$key;?>"  <?= ($key == @$recruit[0]->recruit_agegroup) ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="recruit_agegroup<?=$key?>">
                                                    <?=$v_sportAge;?>
                                                </label>
                                            </div>
                                            <?php endforeach; ?>

                                        </div>

                                        <?php endif; ?>
                                        <div class="invalid-feedback">กรุณาเลือกวิชาเอก</div>
                                    </div>

                                    <?php endforeach; ?>


                            </div>
                            <?php else : ?>
                            <?php foreach ($course as $key_CourseS => $v_CourseS) :?>                               
                            <?php 
                                if(@$recruit[0]->recruit_majorOrder != ""){
                                    $SubMajorOrder = explode("|",@$recruit[0]->recruit_majorOrder);
                                } else {
                                    $SubMajorOrder = 3;
                                }   
                                if($key_CourseS < count($SubMajorOrder)) :
                            ?>
                            <div class="d-flex align-items-center">
                                <div class="mr-2">
                                    ลำดับที่ <?=$key_CourseS+1;?>
                                </div>
                                <div>
                                    <select name="recruit_majorOrder[]" id="select<?=$key+1;?>"
                                        class="form-control mb-2 SelectCourse" required>
                                        <option value="">เลือกหลักสูตรลำดับที่ <?=$key_CourseS+1;?></option>
                                        <?php foreach ($course as $key => $v_CourseS) :?>
                                        <?php if($v_CourseS) :?>
                                        <option
                                            <?=$SubMajorOrder[$key_CourseS] == $v_CourseS->course_id ?"selected":""?>
                                            value="<?=$v_CourseS->course_id?>">
                                            <?=$v_CourseS->course_initials?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <hr class="mb-4">

                            <div class="p-3">
                                <h4 class="mb-3"><u>หลักฐานการสมัคร</u> <small>(กรณียังไม่มีเอกสารตามที่ระบุ
                                        ยังไม่ต้องใส่
                                        สามารถใส่ในภายหลังในการตรวจสอบได้)</small></h4>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_certificateEdu">ใบรับรองผลการเรียน (ปพ.1)
                                            ด้านหน้า</label>
                                        <input type="file" class="form-control" id="recruit_certificateEdu"
                                            name="recruit_certificateEdu" placeholder="">
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                        <img id="show_certificateEdu" class="img-fluid"
                                            src="<?php echo  @$recruit[0]->recruit_certificateEdu == '' ? '#' : base_url().'uploads/recruitstudent/m'.$recruit[0]->recruit_regLevel.'/certificate/'.$recruit[0]->recruit_certificateEdu; ?>"
                                            alt="" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_certificateEduB">ใบรับรองผลการเรียน (ปพ.1)
                                            ด้านหลัง</label>
                                        <input type="file" class="form-control" id="recruit_certificateEduB"
                                            name="recruit_certificateEduB" placeholder="">
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                        <img id="show_certificateEduB" class="img-fluid"
                                            src="<?php echo  @$recruit[0]->recruit_certificateEduB == '' ? '#' : base_url().'uploads/recruitstudent/m'.$recruit[0]->recruit_regLevel.'/certificateB/'.$recruit[0]->recruit_certificateEduB; ?>"
                                            alt="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyidCard">สำเนาบัตรปะชาชน</label>
                                        <input type="file" class="form-control" id="recruit_copyidCard"
                                            name="recruit_copyidCard" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                        <img id="show_copyidCard" class="img-fluid"
                                            src="<?php echo  @$recruit[0]->recruit_copyidCard == '' ? '#' : base_url().'uploads/recruitstudent/m'.$recruit[0]->recruit_regLevel.'/copyidCard/'.$recruit[0]->recruit_copyidCard; ?>"
                                            alt="" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="recruit_copyAddress">สำเนาทะเบียนบ้าน</label>
                                        <input type="file" class="form-control" id="recruit_copyAddress"
                                            name="recruit_copyAddress" placeholder="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                        <img id="show_copyAddress" class="img-fluid"
                                            src="<?php echo  @$recruit[0]->recruit_copyAddress == '' ? '#' : base_url().'uploads/recruitstudent/m'.$recruit[0]->recruit_regLevel.'/copyAddress/'.$recruit[0]->recruit_copyAddress; ?>"
                                            alt="" />
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <button type="submit" class="btn btn-lg btn-<?=$color?>  btn-block"><?=$icon?>
                                    <?php echo end($breadcrumbs);?></button>
                                </form>
                            </div>

                            <hr>

                            <form class="p-3" method="post"
                                action="<?=base_url('admin/Control_admin_admission/confrim_report/').$recruit[0]->recruit_id;?>">
                                <h3>Admin ยืนยันข้อมูล เพื่อพิมพ์ใบสมัครสอบ</h3>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input <?=("ผ่านการตรวจสอบ" == $recruit[0]->recruit_status ? 'checked' : '')?>
                                            type="radio" id="recruit_status1" name="recruit_status"
                                            class="custom-control-input" value="ผ่านการตรวจสอบ">
                                        <label class="custom-control-label" for="recruit_status1">ผ่านการตรวจสอบ</label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input <?=("ผ่านการตรวจสอบ" != $recruit[0]->recruit_status ? 'checked' : '')?>
                                            type="radio" id="recruit_status2" name="recruit_status"
                                            class="custom-control-input" value="ไม่ผ่านการตรวจสอบ">
                                        <label class="custom-control-label"
                                            for="recruit_status2">ไม่ผ่านการตรวจสอบ</label>
                                    </div>
                                    <div <?=("ผ่านการตรวจสอบ" != $recruit[0]->recruit_status ? '':'style="display:none"') ?>
                                        id="AdminComment">
                                        <input type="text" name="TextAdminComment" id="TextAdminComment"
                                            class="form-control" placeholder="เพราะ..."
                                            value="<?=("ผ่านการตรวจสอบ" != $recruit[0]->recruit_status ? $recruit[0]->recruit_status:'') ?>">
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-lg btn-success  btn-block">ยืนยันข้อมูล</button>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
        </section>


    </div>
</div>



</div>
<!-- End of Main Content -->