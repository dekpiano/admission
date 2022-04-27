<style>
.service {
    text-align: center;
    padding: 25px 10px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    background: transparent;
    transition: transform 0.5s, background 0.5s;
}

.service a {
    font-size: 18px;
    margin-bottom: 10px;
    color: #000;
}

.service i {
    font-size: 40px;
    margin-bottom: 10px;
    color: #007bff;
}

.service h2 {
    font-weight: 600;
    margin-bottom: 8px;
}

.service:hover {
    background: #007bff;
    color: #fff;
    transform: scale(1.05);
}

.service:hover i {
    color: #fff;
}

.service:hover a {
    color: #fff;
}

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
    <div class="container-fluid text-center">
        <a href="https://admission.skj.ac.th/" target="_blank"
            rel="noopener noreferrer">
            <img src="https://skj.ac.th/uploads/banner/all/admis65-2.png" class="img-fluid mb-3"
                alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">
        </a>
    </div>

    <div class="container mt-4 mb-4">
        <div class="row">

            <?php if($quota[2]->quota_status == 'on') : ?>
            <div class="col align-self-center">
                <a href="#" href="#" data-toggle="modal" data-target="#myModal">
                    <div class="service">
                        <i class="fas fa-laptop-code"></i>
                        <h3>สมัครเรียน</h3>
                        <h2> <?=$quota[2]->quota_explain?> (เพิ่มเติม) </h2>
                        <p><a href="#" href="#" data-toggle="modal" data-target="#myModal"></a></p>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <?php if($quota[3]->quota_status == 'on') : ?>
            <div class="col align-self-center">
                <a href="#" href="#" data-toggle="modal" data-target="#myModal">
                    <div class="service">
                    <i class="fas fa-solid fa-futbol"></i>
                        <h3>สมัครเรียน</h3>
                        <h2><?=$quota[3]->quota_explain?> </h2>
                        <p><a href="https://drive.google.com/file/d/1O1cI0nOnD27YqpqPKX24ngrRLTQiheca/view?usp=sharing"
                                target="_blank" rel="noopener noreferrer">ดูรายชื่อนักกีฬา</a></p>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <?php if($quota[0]->quota_status == 'on') : ?>
            <div class="col align-self-center">
                <a href="#" href="#" data-toggle="modal" data-target="#myModal">
                    <div class="service">
                    <i class="fas fa-solid fa-child"></i>
                        <h3>สมัครเรียน</h3>
                        <h2> <?=$quota[0]->quota_explain?> </h2>
                        <p><a href="https://drive.google.com/file/d/1O1cI0nOnD27YqpqPKX24ngrRLTQiheca/view?usp=sharing"
                                target="_blank" rel="noopener noreferrer"></a></p>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if($quota[1]->quota_status == 'on') : ?>
            <div class="col align-self-center">
                <a href="#" href="#" data-toggle="modal" data-target="#myModal">
                    <div class="service">
                    <i class="fas fa-solid fa-child"></i>
                        <h3>สมัครเรียน</h3>
                        <h2> <?=$quota[1]->quota_explain?> </h2>
                        <p><a href="https://drive.google.com/file/d/1O1cI0nOnD27YqpqPKX24ngrRLTQiheca/view?usp=sharing"
                                target="_blank" rel="noopener noreferrer"></a></p>
                    </div>
                </a>
            </div>
            <?php endif; ?>
        </div>
        
        <?php if($switch[0]->onoff_report == 'on') : ?>
        <div class="row">
            <div class="col align-self-center">
                <a href="<?=base_url('Confirm')?>">
                    <div class="service">
                        <i class="fas fa-user-edit"></i>
                        <h2>รายงานตัวออนไลน์</h2>
                        <p>
                            สำหรับนักเรียนที่มีผลประกาศคัดเลือกให้ปีการศึกษา 2565
                        </p>
                        <p>
                            <a href="https://drive.google.com/file/d/1FD6TKzCi2brH7oxxIJzbjaA2zPNwijXV/view?usp=sharing"
                                target="_blank" rel="noopener noreferrer"></a>
                            <a href="https://drive.google.com/file/d/1nfNiCcKzSuiGE5uKLTICtDs54chu1J4Y/view?usp=sharing"
                                target="_blank" rel="noopener noreferrer"></a>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                รายชื่อผู้สมัคร (รอบปกติ)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered example" style="width:100%">
                        <thead>
                            <tr>
                                <th>เลขที่</th>
                                <th>ชื่อ - สกุล</th>
                                <th>ชั้น</th>
                                <th>แผน</th>
                                <th>วันที่สมัคร</th>
                                <th>สถานะการสมัคร</th>
                                <th>สถานะรายงานตัว</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($regis as $key => $v_regis) :
                        if($v_regis->recruit_category =="normal"):
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
                                <td><?=$this->datethai->thai_date_fullmonth(strtotime($v_regis->recruit_date))?>
                                </td>
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
                                <td>
                                    <?php if($v_regis->stu_fristName != null){
                                     $status = "success";
                                        $txt = "รายงานตัวออนไลน์แล้ว";
                                }else{
                                    $status = "danger";
                                    $txt = "ยังไม่ได้รายงานตัวออนไลน์";
                                }?>
                                    <span class="badge badge-<?=$status?>">
                                        <h6 style="margin-bottom: 0rem;"><?=$txt;?></h6>
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
        <div class="card">
            <div class="card-header bg-primary text-white">
                รายชื่อผู้สมัคร (รอบโควตา นักกีฬา)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered example" style="width:100%">
                        <thead>
                            <tr>
                                <th>เลขที่</th>
                                <th>ชื่อ - สกุล</th>
                                <th>ชั้น</th>
                                <th>แผน</th>
                                <!-- <th>วันที่สมัคร</th> -->
                                <th>สถานะ</th>
                                <th>สถานะรายงานตัว</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($regis as $key => $v_regis) :
                        if($v_regis->recruit_category =="quotasport"):
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
                                <!-- <td><?=$this->datethai->thai_date_fullmonth(strtotime($v_regis->recruit_date))?> -->
                                </td>
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
                                <td>
                                    <?php if($v_regis->stu_fristName != null){
                                     $status = "success";
                                        $txt = "รายงานตัวออนไลน์แล้ว";
                                }else{
                                    $status = "danger";
                                    $txt = "ยังไม่ได้รายงานตัวออนไลน์";
                                }?>
                                    <span class="badge badge-<?=$status?>">
                                        <h6 style="margin-bottom: 0rem;"><?=$txt;?></h6>
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