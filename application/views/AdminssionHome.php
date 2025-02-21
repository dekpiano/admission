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

    .banner-title h1 {
        font-size: 2.7rem;
        text-align: center;
    }

    .banner-title hr {
        color: #fff;
        background-color: #fff;
        width: 150px;
    }

    .main-banner {
        padding: 0rem 0 0 0 !important;
        color: #ffffff;
        background-size: cover;
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
        padding-top: 0px !important;
    }

    .banner-title hr {
        color: #fff;
        background-color: #fff;
    }

   
}

@media only screen and (max-width: 1920px) {
    .home {
        padding-top: 0px !important;
        background-position: center !important;
    }
    .banner-title .logo{
        width: 350px;
    }
}




table thead tr th {
    text-align: center;
}

.home {
    background: url(uploads/bg/hero-bg.svg);
    background-repeat: repeat-x;
    background-position: 0 -50px;
    padding-top: 150px;
    
}

.main-banner {
    padding: 0.2rem 0 17rem 0;
    color: #ffffff;
    background-size: cover;
}
</style>

<div id="home" class="home">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-banner">
                    <div class="d-sm-flex justify-content-center">
                        <div data-aos="zoom-in-up" class="aos-init aos-animate">
                            <div class="banner-title text-center">
                            <img  src="<?=base_url('uploads/logo/logoSKJadmission.png')?>" alt="marsmello"
                            class="img-fluid aos-init aos-animate logo" data-aos="zoom-in-up" >
                                <h1 class="font-weight-medium"> รับสมัครนักเรียนใหม่ ปีการศึกษา
                                    <?=$checkYear[0]->openyear_year?>
                                </h1>
                                <hr>
                            </div>

                            <?php foreach ($quota as $key => $v_quota) :
                            if($v_quota->quota_status == "on"):
                               
                            ?>
                            <h3 class="mt-3">
                                - <?=$v_quota->quota_explain;?>
                            </h3>
                            <?php 
                                endif;
                             endforeach; ?>



                            <div class="text-center mt-5 mt-4">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#myModal" style="font-size:34px;">
                                    <?=$switch[0]->onoff_regis == "on"?"สมัครเรียนเลย ที่นี่...": $switch[0]->onoff_comment?>

                                </button>
                            </div>

                            <?php if($switch[0]->onoff_regis != "on"): ?>
                            <div id="timer" class="flex-wrap d-flex justify-content-center mt-3">
                                <div id="days" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center">
                                </div>
                            </div>
                            <?php endif;?>

                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</div>

<div class="container-fluid py-5">

    <h3 class="text-center">กำหนดการรับนักเรียน ปีการศึกษา <?=$checkYear[0]->openyear_year?></h3>

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
            <tbody class="text-center bg-white">
                <tr>
                    <th scope="row">รอบโควตา (โรงเรียนในเขตพิ้นที่บริการ)</th>
                    <td>1 - 31 มกราคม 2568</td>
                    <td>-</td>
                    <td>7 กุมภาพันธ์ 2568</td>
                    <td>วันเสาร์ที่ 15 กุมภาพันธ์ 2568 (07.30 - 12.00 น.)</td>
                </tr>
                <tr>
                    <th scope="row">รอบความสามารถพิเศษด้านกีฬา</th>
                    <td>
                        1 - 31 มกราคม 2568 (ยื่นเกียรติบัตรผลงาน)
                    </td>
                    <td>-</td>
                    <td>7 กุมภาพันธ์ 2568</td>
                    <td>15 กุมภาพันธ์ 2568 (07.30 - 12.00 น.)</td>
                </tr>
                <tr>
                    <th scope="row">รอบความสามารถพิเศษด้านกีฬา</th>
                    <td>

                        คัดตัวนักกีฬา ครั้งที่ 1 วันที่ 29 - 30 มีนาคม 2568
                    </td>
                    <td>-</td>
                    <td>4 เมษายน 2568</td>
                    <td>5 เมษายน 2568 (07.30 - 12.00 น.)</td>
                </tr>
                <tr>
                    <th scope="row">รอบปกติ</th>
                    <td>
                        25 - 31 มีนาคม 2568 <br>
                        เปิดระบบ 08.30 น. และปิดระบบ 31 มีนาคม 2567 เวลา 16.30 น.

                    </td>
                    <td>2 เมษายน 2568</td>
                    <td>4 เมษายน 2568</td>
                    <td>5 เมษายน 2568 (07.30 - 12.00 น.)</td>
                </tr>


            </tbody>
        </table>
    </div>


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
            <tbody class="text-center bg-white">
                <tr>
                    <th scope="row">รอบโควตา (ม.3 เดิม)</th>
                    <td>1 - 31 มกราคม 2568</td>
                    <td>-</td>
                    <td>7 กุมภาพันธ์ 2568</td>
                    <td>วันเสาร์ที่ 15 กุมภาพันธ์ 2568 (07.30 - 12.00 น.)</td>
                </tr>
                <tr>
                    <th scope="row">รอบความสามารถพิเศษด้านกีฬา</th>
                    <td>
                        1 - 31 มกราคม 2568 (ยื่นเกียรติบัตรผลงาน)
                    </td>
                    <td>-</td>
                    <td>7 กุมภาพันธ์ 2568</td>
                    <td>15 กุมภาพันธ์ 2568 (07.30 - 12.00 น.)</td>
                </tr>
                <tr>
                    <th scope="row">รอบความสามารถพิเศษด้านกีฬา</th>
                    <td>

                        คัดตัวนักกีฬา ครั้งที่ 1 วันที่ 29 - 30 มีนาคม 2568
                    </td>
                    <td>-</td>
                    <td>4 เมษายน 2568</td>
                    <td>5 เมษายน 2568 (07.30 - 12.00 น.)</td>
                </tr>
                <tr>
                    <th scope="row">รอบปกติ</th>
                    <td>
                        25 - 31 มีนาคม 2568 <br>
                        เปิดระบบ 08.30 น. และปิดระบบ 31 มีนาคม 2567 เวลา 16.30 น.

                    </td>
                    <td>2 เมษายน 2568</td>
                    <td>4 เมษายน 2568</td>
                    <td>5 เมษายน 2568 (07.30 - 12.00 น.)</td>
                </tr>


            </tbody>
        </table>
    </div>


</div>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="row">
        <div class="col-md-4 p-lg-3 mx-auto order-lg-0 order-1 mt-3">
            <img src="https://zakreeya.files.wordpress.com/2012/04/1722092.jpg" class="img-fluid" alt="" srcset="">
        </div>
        <div class="col-md-8 p-lg-5 mx-auto order-0 mb-3 align-self-center">
            <h1 class="display-5 font-weight-normal">ข้อปฏิบัติการเตรียมตัวเข้าสอบและการสอบ</h1>
            <p class="lead font-weight-normal">อ่านฉันก่อน!</p>
            <a class="btn btn-primary"
                href="https://drive.google.com/file/d/1BN-k53usmAKM2njS5lyP_aI6yePCrCU9/view?usp=sharing"
                target="_blank">อ่านฉันสิ คลิกเลย...</a>
        </div>
    </div>
</div>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="row">
        <div class="col-md-4 p-lg-3 mx-auto order-lg-0 order-1 mt-3">
            <img src="https://hr.rmutr.ac.th/wp-content/uploads/2020/02/aHR0cHM6Ly9zLmlzYW5vb2suY29tL2hvLzAvdWQvMTcvODUwMjMvYmIuanBn.jpg"
                class="img-fluid" alt="" srcset="">
        </div>
        <div class="col-md-8 p-lg-5 mx-auto order-0 mb-3 align-self-center">
            <h1 class="display-5 font-weight-normal">วิธีตรวจสอบการสมัครและพิมพ์บัตรประจำตัวสอบ</h1>
            <p class="lead font-weight-normal">เพื่อใช้ยืนยันตัวในการสอบรอบปกติ จะพิมพ์ออกมาหรือจะแคปจอ ก็ได้
                ไปดูวิธีกัน</p>
            <a class="btn btn-primary"
                href="https://www.canva.com/design/DAF-0Dmo0J8/tyheWTsb30Z_zh1WnQT-zg/view?utm_content=DAF-0Dmo0J8&utm_campaign=designshare&utm_medium=link&utm_source=editor"
                target="_blank">คลิกฉันเลย</a>
        </div>
    </div>
</div>




<section class="container-fluid mt-3">
    <div class="card">
        <div class="card-body">
            <div class="p-3">
                <div class="row  justify-content-center">
                    <!-- <div class="col-md-4  align-self-center">
            <img src="https://img.freepik.com/free-vector/tiny-hr-manager-looking-candidate-job-interview-magnifier-computer-screen-flat-vector-illustration-career-employment_74855-8619.jpg?w=996&t=st=1675070479~exp=1675071079~hmac=896bbf82a8c06eab169bb4542c4005c8b0663176e08dc713312d58520ef2ac65"
                alt="marsmello" class="img-fluid aos-init aos-animate" data-aos="zoom-in-up" style="width:100%">
        </div> -->
                    <div class="col-md-6  align-self-center">
                        <h2>ตรวจสอบการสมัครเรียน</h2>
                        <h5>
                            นักเรียนสามารถตรวจสอบสถานะว่า ผ่านการตรวจสอบ หรือต้องแก้ไขข้อมูลหรือไม่ <br>
                            เมื่อผ่านการตรวจสอบแล้ว
                            รอการรายงานตัวผ่านระบบออนไลน์ ในวันที่กำหนด
                        </h5>
                        <a href="<?=base_url('CheckRegister');?>" class="btn btn-outline-primary"
                            style="font-size:26px;">ตรวจสอบการสมัครเรียน</a>
                    </div>
                    <div class="col-md-6  align-self-center pt-3">
                        <h2>รายงานตัวออนไลน์</h2>
                        <h5>
                            เมื่อผ่านการตรวจสอบแล้ว นักเรียนสามารถรายงานตัว กรอกข้อมูลประวัติส่วนตัว ของนักเรียน
                            และผู้ปกครอง
                            เพื่อเป็นการรายงานเข้าเรียน ณ โรงเรียนแห่งนี้
                        </h5>
                        <?php  if($switch[0]->onoff_report == "on"): ?>
                        <a href="<?=base_url('Confirm');?>" class="btn btn-outline-primary"
                            style="font-size:26px;">รายงานตัวออนไลน์</a>
                        <?php else : ?>
                        <a href="#" data-toggle="modal" data-target="#AlertConfirm" class="btn btn-outline-primary"
                            style="font-size:26px;">รายงานตัวออนไลน์</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<div class="page-content align-items-stretch">
    <!-- Side Navbar -->


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