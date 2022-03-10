<style>
#timer div {
    background-color: #000000;
    color: #ffffff;
    width: 100px;
    height: 105px;
    border-radius: 5px;
    font-size: 35px;
    font-weight: 700;
    margin-left: 5px;
    margin-right: 5px;
}

#timer div span {
    display: block;
    margin-top: -2px;
    font-size: 15px;
    font-weight: 500;
}

.timer-header {
    font-size: 2.6rem;
}

@media only screen and (max-width: 767px) {
    #timer {
        margin-top: -20px;
    }

    #timer div {
        width: 60px;
        height: 60px;
        font-size: 28px;
        margin-top: 20px;
        border-radius: 5px;
        font-weight: 700;
        margin-left: 5px;
        margin-right: 5px;
    }

    #timer div span {
        font-size: 14px;
    }
}

@media only screen and (max-width: 992px) {
    #timer {
        margin-top: -20px;
    }

    #timer div {
        width: 60px;
        height: 60px;
        font-size: 28px;
        margin-top: 20px;
        border-radius: 5px;
        font-weight: 700;
        margin-left: 5px;
        margin-right: 5px;
    }

    #timer div span {
        font-size: 14px;
    }
}

@media only screen and (max-width: 1200px) {
    #timer {
        margin-top: -20px;
    }

    #timer div {
        width: 65px;
        height: 65px;
        font-size: 28px;
        margin-top: 20px;
        border-radius: 5px;
        font-weight: 700;
        margin-left: 5px;
        margin-right: 5px;
    }

    #timer div span {
        font-size: 14px;
    }
}
</style>
<div class="page-content align-items-stretch">
    <!-- Side Navbar -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-8 col-sm-6 align-self-center">
                <div class="card">
                    <div class="card-body">
                        <h2>รอบปกติ เริ่มลงทะเบียนวันนี้ - 13 มี.ค.2565</h2>
                        <p>การสมัครเข้าเรียนออนไลน์ กรุณาอ่านรายละเอียดประกาศและศึกษาคู่มือการสมัครก่อน
                            <br>เริ่มตรวจหลักฐานระหว่างวันที่ 9-13 มี.ค.65 ในเวลาราชการ
                        </p>
                        <div class="row">
                            <div class="col-lg-4">
                                <p>รายละเอียดประกาศ <a
                                        href="https://drive.google.com/file/d/1zeBOmrYsIl7j9YVyRiuKBODbX1Bi3-WX/view"
                                        target="_blank" rel="noopener noreferrer">คลิกที่นี่</a> </p>
                                <p>คู่มือการสมัคร <a
                                        href="<?=base_url('uploads/recruitstudent/คู่มือการเข้าใช้งานระบบรับสมัครนักเรียน.pdf');?>"
                                        target="_blank" rel="noopener noreferrer">คลิกที่นี่</a> </p>
                            </div>
                            <div class="col-lg-8">
                                <div class="text-center">
                                    <h5>เหลือเวลาสมัครอีก...</h5>
                                </div>
                                <div id="timer" class="flex-wrap d-flex justify-content-center">

                                    <div id="days" class="align-items-center flex-column d-flex justify-content-center">
                                    </div>
                                    <div id="hours"
                                        class="align-items-center flex-column d-flex justify-content-center"></div>
                                    <div id="minutes"
                                        class="align-items-center flex-column d-flex justify-content-center">
                                    </div>
                                    <div id="seconds"
                                        class="align-items-center flex-column d-flex justify-content-center">
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-sm-6 align-self-center">
                <div class="text-center mt-3 mb-3">
                    <a href="#" target="_blank" data-toggle="modal" data-target="#myModal">
                        <img src="https://www.phonics1stonline.com/assets_v2/img/p/b1.png" alt="สมัครเรียน"
                            class="img-fluid w-50">
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                รายชื่อผู้สมัคร (รอบปกติ)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>เลขที่</th>
                                <th>ชื่อ - สกุล</th>
                                <th>ชั้น</th>
                                <th>แผน</th>
                                <th>วันที่สมัคร</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($regis as $key => $v_regis) :
                        if($v_regis->recruit_year == "2565" && $v_regis->recruit_category =="normal"):
                             ?>
                            <tr>
                                <td><?=$v_regis->recruit_id?></td>
                                <td><?=$v_regis->recruit_prefix?><?=$v_regis->recruit_firstName?>
                                    <?=$v_regis->recruit_lastName?></td>
                                <td>ชั้นมัธยมศึกษาปีที่ <?=$v_regis->recruit_regLevel?></td>
                                <td>
                                    <?php
                                $str = explode("(",$v_regis->recruit_tpyeRoom);
                                echo $str[0];
                                ?>
                                </td>
                                <td><?=$this->datethai->thai_date_fullmonth(strtotime($v_regis->recruit_date))?></td>
                                <td>
                                    <?php if($v_regis->recruit_status == "รอการตรวจสอบ"){
                                   $text = "รอการตรวจสอบ";
                                   $status = "warning";
                                } elseif($v_regis->recruit_status == "ผ่านการตรวจสอบ"){
                                    $text = "ผ่านการตรวจสอบ";
                                    $status = "success";
                                } elseif($v_regis->recruit_status == "กรอกข้อมูลไม่ครบถ้วน"){
                                    $text = "ไม่ผ่าน กลับไปตรวจสอบ";
                                    $status = "danger";
                                } 
                                ?>
                                    <span class="badge badge-<?=$status?>">
                                        <h6 style="margin-bottom: 0rem;"><?=$text;?></h6>
                                    </span>
                                </td>
                            </tr>
                            <?php endif; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <a href="https://drive.google.com/file/d/1zeBOmrYsIl7j9YVyRiuKBODbX1Bi3-WX/view" target="_blank"
            rel="noopener noreferrer">
            <img src="<?=base_url('uploads/admis65.png')?>" class="img-fluid mb-3"
                alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">
        </a>

        <!-- <div class="row mb-3">
            <div class="col-6">
                <img src="<?=base_url('uploads/bannersport1.jpg')?>" class="img-fluid"
                    alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">
            </div>
            <div class="col-6">
                <img src="<?=base_url('uploads/bannersport2.jpg')?>" class="img-fluid"
                    alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">
            </div>
        </div>

        <img src="<?=base_url('uploads/banner65-1.png')?>" class="img-fluid" alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">
        <img src="<?=base_url('uploads/banner65.png')?>" class="img-fluid" alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน"> -->

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

        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">เลือกการสมัคร</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <?php if($switch[0]->onoff_regis == "off") :?>
                        <?php echo $switch[0]->onoff_comment; ?>
                        <?php else : ?>

                        <div class="row">
                            <?php foreach ($quota as $key => $v_quota) :?>
                            <?php if($v_quota->quota_status == "on"): ?>
                            <div class="col-md-6">
                                <div class="card" style="border: 2px solid #2b90d9;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$v_quota->quota_explain?></h5>
                                        <?php if($v_quota->quota_key == "quotasport"):?>
                                        <h6 class="card-title text-danger">(เฉพาะนักเรียนที่ผ่านการคัดตัวเท่านั้น)</h6>
                                        <?php endif; ?>
                                        <?php  $q = explode("|",$v_quota->quota_level);
                                        foreach ($q as $key => $v_q) : ?>
                                        <a href="<?=base_url('RegStudent/'.$v_q.'/'.$v_quota->quota_key);?>"
                                            class="btn btn-primary mb-1">สมัครเรียน ม.<?=$v_q;?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                        <?php endif; ?>


                    </div>

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