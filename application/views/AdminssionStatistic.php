<style>
body {
    background-color: aliceblue;
}

/* Feature Box
---------------------*/
.feature-box-1 {
    padding: 32px;
    box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    margin: 15px 0;
    position: relative;
    z-index: 1;
    border-radius: 10px;
    overflow: hidden;
    -moz-transition: ease all 0.35s;
    -o-transition: ease all 0.35s;
    -webkit-transition: ease all 0.35s;
    transition: ease all 0.35s;
    top: 0;
    background-color: #fff;
}

.feature-box-1 * {
    -moz-transition: ease all 0.35s;
    -o-transition: ease all 0.35s;
    -webkit-transition: ease all 0.35s;
    transition: ease all 0.35s;
}

.feature-box-1 .icon {
    width: 70px;
    height: 70px;
    line-height: 70px;
    background: #fc5356;
    color: #ffffff;
    text-align: center;
    border-radius: 50%;
    font-size: 27px;
}

.feature-box-1 .icon i {
    line-height: 70px;
}

.feature-box-1 h1 {
    color: #007bff;
    font-weight: 600;
}

.feature-box-1 p {
    margin: 0;
    font-size: 22px;
}

.feature-box-1:after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: auto;
    right: 0;
    border-radius: 10px;
    width: 0;
    background: #007bff;
    z-index: -1;
    -moz-transition: ease all 0.35s;
    -o-transition: ease all 0.35s;
    -webkit-transition: ease all 0.35s;
    transition: ease all 0.35s;
}

.feature-box-1:hover {
    top: -5px;
}

.feature-box-1:hover h1 {
    color: #ffffff;
}

.feature-box-1:hover p {
    color: rgba(255, 255, 255, 0.8);
}

.feature-box-1:hover:after {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    left: 0;
    right: auto;
}

.section {
    padding: 100px 0;
    position: relative;
}
.accordion .card-header:after {
    font-family: 'FontAwesome';  
    content: "\f068";
    float: right; 
}
.accordion .card-header.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\f067"; 
}
</style>
<style>
/* Extra small devices (portrait phones, less than 576px) */
@media (max-width: 575.98px) {
    .section-title {
        padding-bottom: 0px;
        text-align: center;
    }

    .section-title h2 {
        font-weight: 700;
        color: #007bff;
        font-size: 30px;
        margin: 0 0 15px;
        border-left: 5px solid #fc5356;
        padding-left: 15px;
    }

    .section-title h3 {       
        font-size: 24px;
    }
}

/* // Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767.98px) {}

/* // Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {}

/* // Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199.98px) {}

/* // Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
    .section-title {
        padding-bottom: 45px;
    }

    .section-title h2 {
        font-weight: 700;
        color: #007bff;
        font-size: 45px;
        margin: 0 0 15px;
        border-left: 5px solid #fc5356;
        padding-left: 15px;
    }
}
</style>
<div class="page-content align-items-stretch">
    <!-- Side Navbar -->


    <div class="w-100">

        <div class="pricing-header px-3 py-3 pt-md-5  mx-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <h2>สถิติการรับสมัครนักเรียน </h2>
                            <h3>ประจำปีการศึกษา <?=$checkYear[0]->openyear_year;?> </h3>
                            <p>
                                Update Time <?php echo date('d-m-Y H:i:s'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <section style="padding:0px" class="dashboard-counts">
            <div class="container">
                <div class="row bg-white has-shadow justify-content-center" style="padding: 0px;">
                    <!-- Item -->
                    <div class="col-xl-4 col-sm-6 ">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-violet"><i class="icon-user"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ทั้งหมด</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 25%; height: 4px;"
                                        aria-valuenow="<?=$RegisterAll[0]->RegAll;?>" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar bg-violet"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=$RegisterAll[0]->RegAll;?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-4 col-sm-6">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-green"><i class="icon-padnote"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ผ่านการตรวจสอบ</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 70%; height: 4px;"
                                        aria-valuenow="<?=$RegisterAll[0]->Pass;?>" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar bg-green"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=$RegisterAll[0]->Pass;?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-4 col-sm-6">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-red"><i class="icon-bill"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ไม่ผ่านการตรวจสอบ (รอแก้ไข)</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 40%; height: 4px;"
                                        aria-valuenow="<?=$RegisterAll[0]->NoPass;?>" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar bg-red"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=$RegisterAll[0]->NoPass;?></strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-4">       

            <div id="accordion">
                <!-- รอบทั่วไป -->
                <div class="card">
                    <div class="card-header bg-primary ">
                        <a class="btn btn-link text-white" data-toggle="collapse" href="#collapseGeneral">
                            สถิติการรับสมัครนักเรียน <?=$checkYear[0]->openyear_year;?> รอบทั่วไป
                        </a>
                    </div>
                    <div id="collapseGeneral" class="collapse show" data-parent="#accordion">

                        <div class="row">
                            <div class="col-md-8 p-3">
                                <canvas id="ChartGeneral" width="800" height="400"></canvas>
                            </div>
                            <div class="col-md-4 p-3">
                                <canvas id="genderPieChart"></canvas>
                            </div>
                        </div>

                        <div class="p-3">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr class="text-center">
                                        <th>วันที่สมัคร</th>
                                        <th>ผู้ชาย ม.1</th>
                                        <th>ผู้หญิง ม.1</th>
                                        <th>ผู้ชาย ม.4</th>
                                        <th>ผู้หญิง ม.4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($StatisticTableNormal as $key => $v_Statis) :?>
                                    <tr class="text-center">
                                        <td><?=$v_Statis->recruit_date?></td>
                                        <td><?=$v_Statis->M1?></td>
                                        <td><?=$v_Statis->F1?></td>
                                        <td><?=$v_Statis->M4?></td>
                                        <td><?=$v_Statis->F4?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- รอบโควตา -->
                <div class="card">
                    <div class="card-header  bg-primary">
                        <a class="btn btn-link collapsed text-white" data-toggle="collapse" href="#collapseQuota">
                            สถิติการรับสมัครนักเรียน <?=$checkYear[0]->openyear_year;?>
                            รอบโควตาโรงเรียนในเขตพื้นที่บริการ
                        </a>
                    </div>
                    <div id="collapseQuota" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                            <canvas id="registrationChart" width="800" height="400"></canvas>

                        </div>
                    </div>
                </div>
            </div>

            <div class="" id="">
                <div class="container">

                    <div class="row">
                        <!-- feaure box -->
                        <?php foreach ($StatisticAll as $key => $value):?>
                        <div class="col-sm-6 col-lg-6 ">

                            <div class="feature-box-1 ">
                                <a href="#" style="display: inline;color: #858585;">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="s-left mr-3">
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="s-right">
                                            <div class="feature-contentb">
                                                <h1><?=$value->num?></h1>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p>
                                            <?=$value->quota_explain?>
                                        </p>
                                    </div>

                                    <div class="h3">
                                        <i class="fa fa-male" aria-hidden="true"></i> <?=$value->Man?> | <i
                                            class="fa fa-female" aria-hidden="true"></i> <?=$value->Girl?>
                                    </div>
                                </a>
                            </div>


                        </div>
                        <?php endforeach; ?>
                        <!-- / -->
                    </div>
                </div>
            </div>

        </div>
        <!-- 
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>สถิติรายวัน</h4>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered T_m1_N">
                                <thead class="bg-primary text-white">
                                    <tr class="text-center">
                                        <th>วันที่</th>
                                        <th>ด้านวิชาการ</th>
                                        <th>ด้านภาษา</th>
                                        <th>ด้านดนตรี ศิลปะ การแสดง</th>
                                        <th>ด้านกีฬา</th>
                                        <th>ด้านการงานอาชีพ</th>
                                        <th class="bg-warning">รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                     foreach($StatisticCroTar as $v_StatisticCroTar) : 
                                                       
                                                        ?>
                                    <tr class="text-center">
                                        <td style="width:150px">
                                            <?=$this->datethai->thai_date_fullmonth(strtotime($v_StatisticCroTar->recruit_date))?>
                                        </td>
                                        <td class="numN"><?=$v_StatisticCroTar->SMT?></td>
                                        <td class="numN"><?=$v_StatisticCroTar->CEP?></td>
                                        <td class="numN"><?=$v_StatisticCroTar->PAP?></td>
                                        <td class="numN"><?=$v_StatisticCroTar->SP?></td>
                                        <td class="numN"><?=$v_StatisticCroTar->CP?></td>
                                        <td class="total-numN bg-light"></td>
                                    </tr>

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr class="font-weight-bold text-center">
                                        <td>รวม</td>
                                        <td class="numN"></td>
                                        <td class="numN"></td>
                                        <td class="numN"></td>
                                        <td class="numN"></td>
                                        <td class="numN"></td>
                                        <td class="total-numN"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->