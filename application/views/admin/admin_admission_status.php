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
                <div class=" bg-white has-shadow col-lg-12">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="text">
                                <h3 class="h4">ประเภทการสมัครรอบ </h3><small>สามารถเลือกเปิดได้แค่อย่างเดียว</small>
                            </div>
                        </div>

                        <?php  foreach ($switch_quota as $key => $v_quota) :  ?>
                        <div class="project-date">
                            <?=$v_quota->quota_explain?>
                            <input type="checkbox" id="<?=$v_quota->quota_key?>" valun="<?=$switch_quota[0]->quota_key?>"
                                <?=$v_quota->quota_status == "on" ? 'checked' : '' ?> data-toggle="toggle"
                                data-on="เปิด" data-off="ปิด">
                            <label for="category"></label>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="project mb-2">
                <div class=" bg-white has-shadow col-lg-6">
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
            <div class="project mb-2">
                <div class=" bg-white has-shadow col-lg-6">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">

                            <div class="text">
                                <h3 class="h4">รับสมัครนักเรียน</h3><small>ใช้แจ้งเตือนในการปิดระบบ</small>
                                <input type="text" value="<?=$switch[0]->onoff_comment?>" id="onoff_comment"
                                    name="onoff_comment" class="form-control"
                                    placeholder="ใส่แจ้งเตือนเฉพาะปิดรับสมัคร">
                            </div>
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
                <div class=" bg-white has-shadow col-lg-6">
                    <div class="left-col p-3 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">

                            <div class="text">
                                <h3 class="h4">สถานะระบบ</h3><small>ระบบจะปิดทั้งหมด</small>
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