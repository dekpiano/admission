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

        <div class="mt-5">

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        สถิติการรับสมัครนักเรียน รอบปกติ 2567
                    </div>
                    <div class="card-body">
                        <?php $Day = array('2024-03-09','2024-03-10','2024-03-11','2024-03-12','2024-03-13','2024-03-14','2024-03-15') ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2">วันที่</th>
                                    <th colspan="2" class="text-center">มัธยมศึกษาปีที่ 1</th>
                                    <th colspan="2" class="text-center">มัธยมศึกษาปีที่ 4</th>
                                </tr>
                                <tr>
                                    <th class="text-center">ชาย</th>
                                    <th class="text-center">หญิง</th>
                                    <th class="text-center">ชาย</th>
                                    <th class="text-center">หญิง</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $today = date('Y-m-d'); 
                                // บวกไป 1 วัน
                                $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
                                ?>

                                <?php foreach ($Day as $key => $v_Day) : ?>
                                    <?php if($tomorrow > $v_Day) :?>
                                <tr>
                                    <td><?php echo $this->datethai->thai_date_fullmonth(strtotime($v_Day));?> </td>                                    
                                    <?php foreach ($StatisticNormal as $key => $v_cNormal) :?>
                                    <?php if($v_Day == $v_cNormal->recruit_date): ?>
                                    <td class="text-center"><?=$v_cNormal->Man1?></td>
                                    <td class="text-center"><?=$v_cNormal->Girl1?></td>
                                    <td class="text-center"><?=$v_cNormal->Man4?></td>
                                    <td class="text-center"><?=$v_cNormal->Girl4?></td>
                                    <?php endif; ?>                                    
                                    <?php endforeach; ?>                                    
                                </tr>
                                <?php endif; ?>       
                                <?php endforeach; ?>

                              
                                <?php foreach ($Day as $key => $v_Day) : ?>
                                    <?php if($tomorrow <= $v_Day) :?>
                                <tr>
                                    <td><?php echo $this->datethai->thai_date_fullmonth(strtotime($v_Day));?> </td>                                    
                                  
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                                                  
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>





                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <section class="services-section" id="">
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
        </section>


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