<div class="page-content align-items-stretch">
    <!-- Side Navbar -->
    <div class="container-fluid py-5">
        <h2>ตรวจสอบข้อมูลการสมัครเรียน และ แก้ไขการสมัคร</h2>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="TB_CheckRegister" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr class="text-center">
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ - นามสกุล</th>
                                <th scope="col">ระดับที่สมัคร</th>
                                <th scope="col">รอบสมัคร</th>
                                <th scope="col">สายการเรียน</th>
                                <th scope="col">สถานะการสมัคร</th>
                                <th scope="col">สถานะรายงานตัว</th>
                                <th scope="col">สถานะมอบตัว</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php foreach ($DataStudents as $key => $v_DataStudents): ?>
                            <tr>
                                <th scope="row"><?=$v_DataStudents->recruit_id?></th>
                                <td><?=$v_DataStudents->recruit_prefix.$v_DataStudents->recruit_firstName.' '.$v_DataStudents->recruit_lastName?>
                                </td>
                                <td class="text-center">ม.<?=$v_DataStudents->recruit_regLevel?></td>
                                <td class="text-center"><?=$v_DataStudents->recruit_category?></td>
                                <td><?=$v_DataStudents->recruit_tpyeRoom?></td>
                                <td class="text-center">
                                    <?php if($v_DataStudents->recruit_status === "ผ่านการตรวจสอบ"): ?>

                                    <span class="badge badge-pill badge-success">
                                        <h6 style="margin-bottom: 0rem;font-size: 14px;"><i class="fa fa-check"
                                                aria-hidden="true"></i> <?=$v_DataStudents->recruit_status?></h6>
                                    </span>
                                    <a style="margin-bottom: 0rem;font-size: 14px;" href="<?=base_url('login'); ?>"
                                        class="btn btn-primary btn-sm mt-2"><i class="fas fa-print"></i> พิมพ์บัตรประจำตัวสอบ</a>


                                    <?php elseif($v_DataStudents->recruit_status === "รอการตรวจสอบ"): ?>
                                    <span class="badge badge-pill badge-danger">
                                        <h6 style="margin-bottom: 0rem;font-size: 14px;"><i class="fa fa-times"
                                                aria-hidden="true"></i> <?=$v_DataStudents->recruit_status?></h6>
                                    </span>
                                    <?php else: ?>
                                    <span class="badge badge-pill badge-danger">
                                        <h6 style="margin-bottom: 0rem;font-size: 14px;"><i class="fa fa-times"
                                                aria-hidden="true"></i> <?=$v_DataStudents->recruit_status?></h6>
                                    </span>

                                    <?php if($v_DataStudents->recruit_status != "ผ่านการตรวจสอบ"): ?>
                                    
                                    <a style="margin-bottom: 0rem;font-size: 14px;" href="<?=base_url('login'); ?>"
                                        class="btn btn-warning btn-sm mt-2"><i class="fas fa-edit"></i> แก้ไขการสมัคร
                                        ที่นี่...</a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($v_DataStudents->recruit_status == "ผ่านการตรวจสอบ"): ?>
                                    <?php  if($switch[0]->onoff_report == "on"): ?>
                                    <?php if($v_DataStudents->stu_id != null &&  $v_DataStudents->stu_UpdateConfirm >= $checkYear[0]->openyear_year): ?>
                                    <a style="margin-bottom: 0rem;font-size: 14px;" href="<?=base_url('Confirm')?>"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-check" aria-hidden="true"></i> รายงานตัวแล้ว
                                    </a>
                                    <?php else: ?>
                                    <a style="margin-bottom: 0rem;font-size: 14px;" href="<?=base_url('Confirm')?>"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-exclamation-circle"></i> รอรายงานตัว <br> (คลิกที่นี่)
                                    </a>
                                    <?php endif; ?>
                                    <?php else : ?>
                                    <?php if($v_DataStudents->stu_id != null &&  $v_DataStudents->stu_UpdateConfirm >= $checkYear[0]->openyear_year): ?>
                                    <a style="margin-bottom: 0rem;font-size: 14px;" href="#" data-toggle="modal"
                                        data-target="#AlertConfirm" class="btn btn-success btn-sm">
                                        <i class="fa fa-check" aria-hidden="true"></i> รายงานตัวแล้ว
                                    </a>
                                    <?php else: ?>
                                    <a style="margin-bottom: 0rem;font-size: 14px;" href="#" class="btn btn-info btn-sm"
                                        data-toggle="modal" data-target="#AlertConfirm">
                                        <i class="fas fa-exclamation-circle"></i> รอรายงานตัว <br> (คลิกที่นี่)
                                    </a>
                                    <?php endif; ?>

                                    <!-- <a href="#" data-toggle="modal" data-target="#AlertConfirm" class="btn btn-info">
                                        <i class="fas fa-exclamation-circle"></i> รอรายงานตัว
                                    </a> -->
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($v_DataStudents->recruit_statusSurrender === ""): ?>
                                    <span class="badge badge-pill badge-info">
                                        <h6 style="margin-bottom: 0rem;font-size: 14px;"><i
                                                class="fas fa-exclamation-circle"></i> ยังไม่มอบตัว</h6>
                                    </span>
                                    <?php else: ?>
                                    <span class="badge badge-pill badge-success">
                                        <h6 style="margin-bottom: 0rem;font-size: 14px;"><i class="fa fa-check"
                                                aria-hidden="true"></i> มอบตัวแล้ว</h6>
                                    </span>
                                    <?php endif; ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="w-100">
        <!-- Page Header-->
        <!-- <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
                    ประชาสัมพันธ์
                </h2>
            </div>
        </header> -->
        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <h3>หลักสูตรที่เปิดสอน ห้องเรียนความเป็นเลิศ</h3>
                <div class="row bg-white has-shadow">
                    <!-- Item -->

                    <div class="col-xl-2 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-violet"><i class="fa fa-flask" aria-hidden="true"></i></div>
                            <div class="title"><span>ด้านวิชาการ</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-2 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-red"><i class="fa fa-language" aria-hidden="true"></i></div>
                            <div class="title"><span>ด้านภาษา</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-green"><i class="fa fa-music" aria-hidden="true"></i></div>
                            <div class="title"><span>ด้านดนตรี ศิลปะ การแสดง</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-violet"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                            <div class="title"><span>ด้านการงาน อาชีพ</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-2 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-red"><i class="fa fa-trophy" aria-hidden="true"></i></div>
                            <div class="title"><span>ด้านกีฬา</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section-->
        <div class="projects mt-3">
            <div class="container-fluid">
                <!-- Project-->
                <div class="project">
                    <?php //$this->load->view('AdminssionAdvertise.php'); ?>

                </div>
            </div>
        </div>

    
        <!-- <?php if($switch[0]->onoff_regis == "off") :?>
        <div class="text-success">
            <?php echo $switch[0]->onoff_comment; ?>
        </div>
        <?php else : ?>
        <a href="<?=base_url('RegStudent/1');?>" class="bb btn btn-lg btn-block btn-primary">
            <i class="fa fa-user-plus" aria-hidden="true"></i> สมัครเรียน ชั้นมัธยมศึกษาปีที่ 1
        </a>
        <a href="<?=base_url('RegStudent/4');?>" class="bb btn btn-lg btn-block btn-primary">
            <i class="fa fa-user-plus" aria-hidden="true"></i> สมัครเรียน ชั้นมัธยมศึกษาปีที่ 4
        </a>
        <?php endif; ?> -->