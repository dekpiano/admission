<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('admin/layout/menu_left_admin.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"><?=$title;?></h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="container-fluid mt-3">
            <div class="project mb-2">
                <div class="bg-white has-shadow col-lg-12">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="text">
                                <h3 class="h4">ประเภทการสมัครรอบ </h3><small>สามารถเลือกเปิดได้หลายประเภท</small>
                            </div>
                        </div>
                    </div>

                    <?php  foreach ($switch_quota as $key => $v_quota) :  ?>
                    <div class="left-col p-2 row align-items-center justify-content-between">

                        <div class="project-title align-items-center col-md-4">
                            <?=$v_quota->quota_explain?>

                            <div class="project-date">
                                <input type="checkbox" id="<?=$v_quota->quota_key?>"
                                    valun="<?=$switch_quota[0]->quota_key?>"
                                    <?=$v_quota->quota_status == "on" ? 'checked' : '' ?> data-toggle="toggle"
                                    data-on="เปิด" data-off="ปิด">
                                <label for="category"></label>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <?php if($v_quota->quota_key != "quotasport"): ?>
                           
                                <div class="i-checks">
                                <?php if($v_quota->quota_key != "quotaM4"): ?>
                                    <div class="row m-0 p-0">
                                        <div class="col-md-2">
                                            <span>ม.ต้น</span>
                                        </div>
                                        <div class="col-md-10">
                                            <?php $SubCourse = explode("|",$v_quota->quota_course);?>
                                            <?php  foreach ($switch_course as $key => $v_course) : ?>
                                            <?php if($v_course->course_gradelevel == "ม.ต้น"): ?>
                                            <input id="ckeck_<?=$v_quota->quota_key;?>" type="checkbox" value="<?=$v_course->course_id?>" <?php echo in_array($v_course->course_id, $SubCourse) ? 'checked' : '';?>
                                                class="checkbox-template check_course course<?=$v_quota->quota_id?>" name="ckeck_<?=$v_quota->quota_key;?>[]" course_id="<?=$v_quota->quota_id?>">
                                            <label class="m-0 pr-3"
                                                for="ckeck_<?=$v_quota->quota_key;?>"><?=$v_course->course_branch?></label>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($v_quota->quota_key != "quotaM1"): ?>
                                        <?php $SubCourse = explode("|",$v_quota->quota_course);?>
                                    <div class="row m-0 p-0">
                                        <div class="col-md-2">
                                            <span>ม.ปลาย</span>
                                        </div>
                                        <div class="col-md-10">
                                            <?php  foreach ($switch_course as $key => $v_course) :  ?>
                                            <?php if($v_course->course_gradelevel == "ม.ปลาย"): ?>
                                            <input id="ckeck_<?=$v_quota->quota_key;?>" type="checkbox" value="<?=$v_course->course_id?>" <?php echo in_array($v_course->course_id, $SubCourse) ? 'checked' : '';?>
                                                class="checkbox-template check_course course<?=$v_quota->quota_id?>" name="ckeck_<?=$v_quota->quota_key;?>[]" course_id="<?=$v_quota->quota_id?>">
                                            <label class="m-0 pr-3"
                                                for="ckeck_<?=$v_quota->quota_key;?>"><?=$v_course->course_branch?></label>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                        </div>


                    </div>
                    <?php endforeach; ?>


                </div>
            </div>
            <div class="project mb-2">
                <div class=" bg-white has-shadow col-lg-12">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">

                            <div class="text">
                                <h3 class="h4">เปิด - ปิด ระบบรายงานตัว</h3><small>ระบบจะปิดทั้งหมด</small>
                            </div>
                        </div>
                        <div class="project-date">
                            <input type="checkbox" id="switch_report" valun="<?=$switch[0]->onoff_report?>"
                                <?=$switch[0]->onoff_report == "on" ? 'checked' : '' ?> data-toggle="toggle"
                                data-on="เปิด" data-off="ปิด">
                            <label for="switch_report"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project mb-2">
                <div class=" bg-white has-shadow col-lg-12">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="text">
                                <h3 class="h4">เปิด - ปิดการรับสมัครนักเรียน</h3><small>ใช้แจ้งเตือนในการปิดระบบ</small>
                                <input type="text" value="<?=$switch[0]->onoff_comment?>" id="onoff_comment"
                                    name="onoff_comment" class="form-control"
                                    placeholder="ใส่แจ้งเตือนเฉพาะปิดรับสมัคร">
                            </div>
                        </div>
                        <div>
                            <label for="onoff_datetime_regis">วันที่เปิดรับสมัครวันแรก</label>
                            <input type="text" class="form-control" name="onoff_datetime_regis" id="onoff_datetime_regis" data-id="<?=$switch[0]->onoff_id?>" value="<?=$switch[0]->onoff_datetime_regis?>">
                        </div>
                        <div class="project-date">
                            <input type="checkbox" id="switch" valun="<?=$switch[0]->onoff_regis?>"
                                <?=$switch[0]->onoff_regis == "on" ? 'checked' : '' ?> data-toggle="toggle"
                                data-on="เปิด" data-off="ปิด">
                            <label for="switch"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project mb-2">
                <div class=" bg-white has-shadow col-lg-12">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">

                            <div class="text">
                                <h3 class="h4">ปีการศึกษาที่รับสมัคร</h3><small>สามารถเปิดรับสมัครล่วงหน้าได้ 1
                                    ปีการศึกษา</small>
                            </div>
                        </div>
                        <div class="project-date">
                            <select id="switch_year" name="switch_year"
                                class="custom-select custom-select-sm float-right" style="width: 75px;">
                                <option
                                    <?=$checkYear[0]->openyear_year == ($year[0]->recruit_year)+1 ? 'selected' : '' ;?>
                                    value="<?=($year[0]->recruit_year)+1?>"><?=($year[0]->recruit_year)+1?></option>
                                <?php foreach ($year as $key => $v_year) : ?>
                                <option <?=$checkYear[0]->openyear_year == $v_year->recruit_year ? 'selected' : '' ;?>
                                    value="<?=$v_year->recruit_year?>"><?=$v_year->recruit_year?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="project mb-2">
                <div class=" bg-white has-shadow col-lg-12">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">

                            <div class="text">
                                <h3 class="h4">สถานะระบบจะปิดทั้งหมด</h3><small>ระบบจะปิดทั้งหมด</small>
                            </div>
                        </div>
                        <div class="project-date">
                            <input type="checkbox" id="switch_sys" valun="<?=$switch[0]->onoff_system?>"
                                <?=$switch[0]->onoff_system == "on" ? 'checked' : '' ?> data-toggle="toggle"
                                data-on="เปิด" data-off="ปิด">
                            <label for="switch_sys"></label>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>
</div>

</div>
<!-- End of Main Content -->