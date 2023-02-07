<style>
.css-selector {
    background: linear-gradient(273deg, #ec19ee, #5094cc);
    background-size: 400% 400%;

    -webkit-animation: AnimationName 22s ease infinite;
    -o-animation: AnimationName 22s ease infinite;
    animation: AnimationName 22s ease infinite;
}

@-webkit-keyframes AnimationName {
    0% {
        background-position: 0% 51%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 51%
    }
}

@-o-keyframes AnimationName {
    0% {
        background-position: 0% 51%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 51%
    }
}

@keyframes AnimationName {
    0% {
        background-position: 0% 51%
    }

    50% {
        background-position: 100% 50%
    }

    100% {
        background-position: 0% 51%
    }
}

#timer div {
    background-color: #000000;
    color: #ffffff;
    width: 90px;
    height: 90px;
    border-radius: 5px;
    font-size: 35px;
    font-weight: 700;
    margin-left: 10px;
    margin-right: 10px;
}

#timer div span {
    display: block;
    margin-top: -2px;
    font-size: 15px;
    font-weight: 500;
}



@media only screen and (max-width: 768px) {
    #timer {
        margin-top: -20px;
    }

    .timer-header {
        font-size: 2.6rem;
    }

    #timer div {
        width: 95px;
        height: 100px;
        font-size: 32px;
        margin-top: 20px;
    }

    #timer div span {
        font-size: 14px;
    }

    .main-banner {
        padding: 0rem 0 5rem 0 !important;
        color: #ffffff;
        background-size: cover;
    }

    .home {
        padding-top: 0px !important;
    }
}

@media only screen and (max-width: 480px) {
    .timer-header {
        font-size: 16px;
    }

    #timer {
        margin-top: -20px;
    }

    #timer div {
        width: 50px;
        height: 50px;
        font-size: 20px;
        margin-top: 20px;
    }

    #timer div span {
        font-size: 14px;
    }

}

@media only screen and (max-width: 991px) {
    .home {
        padding-top: 0px !important;
    }

    #timer {
        margin-top: -20px;
    }

    .timer-header {
        font-size: 2.6rem;
    }

    #timer div {
        width: 60px;
        height: 60px;
        font-size: 28px;
        margin-top: 20px;
    }

    #timer div span {
        font-size: 14px;
    }
}

@media only screen and (max-width: 1200px) {
    .home {
        padding-top: 50px !important;
    }
}




table thead tr th {
    text-align: center;
}

.home {
    background: url(uploads/home/banner-bg.svg);
    background-repeat-y: no-repeat;
    background-position: 0 -50px;
    padding-top: 150px;
}

.main-banner {
    padding: 3.2rem 0 17rem 0;
    color: #ffffff;
    background-size: cover;
}
</style>

<div id="home" class="home">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="main-banner">
                    <div class="d-sm-flex justify-content-between">
                        <div data-aos="zoom-in-up" class="aos-init aos-animate">
                            <div class="banner-title">
                                <h1 class="font-weight-medium"> รับสมัครนักเรียน 2566
                                </h1>
                            </div>
                            <p class="mt-3">รอบโควตา (โรงเรียนในเขตพิ้นที่บริการ) ในระดับชั้น ม.1

                                <br>
                                (ม.3 เดิม) ในระดับชั้น ม.4 ปีการศึกษา 2566
                            </p>

                            <div class="text-center mt-5">
                                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                    data-bs-target="#myModal" style="font-size:34px;">
                                    <?=$switch[0]->onoff_regis == "on"?"สมัครเรียนเลย ที่นี่...": $switch[0]->onoff_comment?>

                                </button>
                            </div>


                            <!-- <div id="timer" class="flex-wrap d-flex justify-content-center">
                                <div id="days" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mt-5">
                    <img src="https://skj.ac.th/uploads/Admission/banner-main1.svg" alt="marsmello"
                        class="img-fluid aos-init aos-animate" data-aos="zoom-in-up" style="width:100%">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="p-5">
    <div class="row  justify-content-center">
        <div class="col-md-4  align-self-center">
            <img src="https://img.freepik.com/free-vector/tiny-hr-manager-looking-candidate-job-interview-magnifier-computer-screen-flat-vector-illustration-career-employment_74855-8619.jpg?w=996&t=st=1675070479~exp=1675071079~hmac=896bbf82a8c06eab169bb4542c4005c8b0663176e08dc713312d58520ef2ac65"
                alt="marsmello" class="img-fluid aos-init aos-animate" data-aos="zoom-in-up" style="width:100%">
        </div>
        <div class="col-md-4  align-self-center">
            <h2>ตรวจสอบการสมัครเรียน</h2>
            <h5>
            นักเรียนสามารถตรวจสอบสถานะว่า ผ่านการตรวจสอบ หรือต้องแก้ไขข้อมูลหรือไม่ <br> เมื่อผ่านการตรวจสอบแล้ว รอการรายงานตัวผ่านระบบออนไลน์ ในวันที่กำหนด
            </h5>
            <a href="<?=base_url('CheckRegister');?>" class="btn btn-outline-primary" style="font-size:26px;">ตรวจสอบการสมัครเรียน</a>
        </div>
        <div class="col-md-4  align-self-center pt-3">
            <h2>รายงานตัวออนไลน์</h2>
            <h5>
                เมื่อผ่านการตรวจสอบแล้ว นักเรียนสามารถรายงานตัว กรอกข้อมูลประวัติส่วนตัว ของนักเรียน และผู้ปกครอง
                เพื่อเป็นการรายงานเข้าเรียน ณ โรงเรียนแห่งนี้
            </h5>
            <?php  if($switch[0]->onoff_report == "on"): ?>
            <a href="<?=base_url('Confirm');?>" class="btn btn-outline-primary" style="font-size:26px;">รายงานตัวออนไลน์</a>
            <?php else : ?>
                <a href="#" data-toggle="modal" data-target="#AlertConfirm" class="btn btn-outline-primary" style="font-size:26px;">รายงานตัวออนไลน์</a>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="page-content align-items-stretch">
    <!-- Side Navbar -->
    <div class="container-fluid py-5">

        <h3 class="text-center">กำหนดการรับนักเรียน ปีการศึกษา 2566</h3>
        <div class="card">
            <div class="card-body">
                <h5>ชั้นมัธยมศึกษาปีที่ 1</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">รอบการสมัคร</th>
                                <th scope="col">รับสมัคร</th>
                                <th scope="col">สอบ</th>
                                <th scope="col">ประกาศผล</th>
                                <th scope="col">สัมภาษณ์ รายงานตัว มอบตัว</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">รอบโควตา (โรงเรียนในเขตพิ้นที่บริการ)</th>
                                <td>1 - 30 มกราคม 2566</td>
                                <td>-</td>
                                <td>3 กุมภาพันธ์ 2566</td>
                                <td>วันเสาร์ที่ 18 กุมภาพันธ์ 2566 (08.30 - 11.30 น.)</td>
                            </tr>
                            <tr>
                                <th scope="row">รอบปกติ</th>
                                <td>11 - 15 มีนาคม 2566</td>
                                <td>25 มีนาคม 2566</td>
                                <td>29 มีนาคม 2566</td>
                                <td>1 เมษายน 2566 (08.30 - 11.30 น.)</td>
                            </tr>
                            <tr>
                                <th scope="row">รอบความสามารถพิเศษด้านกีฬา</th>
                                <td>คัดตัวนักกีฬา 18 - 19 กุมภาพันธ์ 2566</td>
                                <td>-</td>
                                <td>19 กุมภาพันธ์ 2566</td>
                                <td>1 เมษายน 2566 (08.30 - 11.30 น.)</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>ชั้นมัธยมศึกษาปีที่ 4</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">รอบการสมัคร</th>
                                <th scope="col">รับสมัคร</th>
                                <th scope="col">สอบ</th>
                                <th scope="col">ประกาศผล</th>
                                <th scope="col">สัมภาษณ์ รายงานตัว มอบตัว</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th scope="row">รอบโควตา (ม.3 เดิม)</th>
                                <td>1 - 30 มกราคม 2566</td>
                                <td>-</td>
                                <td>3 กุมภาพันธ์ 2566</td>
                                <td>วันเสาร์ที่ 18 กุมภาพันธ์ 2566 (08.30 - 11.30 น.)</td>
                            </tr>
                            <tr>
                                <th scope="row">รอบปกติ</th>
                                <td>11 - 15 มีนาคม 2566</td>
                                <td>26 มีนาคม 2566</td>
                                <td>30 มีนาคม 2566</td>
                                <td>1 เมษายน 2566 (13.00 - 15.30 น.)</td>
                            </tr>
                            <tr>
                                <th scope="row">รอบความสามารถพิเศษด้านกีฬา</th>
                                <td>คัดตัวนักกีฬา 18 - 19 กุมภาพันธ์ 2566</td>
                                <td>-</td>
                                <td>19 กุมภาพันธ์ 2566</td>
                                <td>1 เมษายน 2566 (13.00 - 15.30 น.)</td>
                            </tr>

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

        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">เลือกการสมัคร</h4>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="close"><span
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
                                        <?php  $q = explode("|",$v_quota->quota_level);
                                        foreach ($q as $key => $v_q) : ?>
                                        <a href="<?=base_url('RegStudent/'.$v_q.'/'.$v_quota->quota_key);?>"
                                            class="btn btn-primary">สมัครเรียน ม.<?=$v_q;?></a>
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