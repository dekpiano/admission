<div class="page-content align-items-stretch">
    <!-- Side Navbar -->


    <div class="w-100">

        <div class="pricing-header px-3 py-3 pt-md-5  mx-auto text-center">
            <h3 class="display-4">สถิติการรับสมัครนักเรียน </h3>
            <p class="lead">ประจำปีการศึกษา <?=$checkYear[0]->openyear_year;?></p>
            <p class="lead">Update Time <?php echo date('d-m-Y H:i:s'); ?></p>
        </div>
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <div class="row bg-white has-shadow justify-content-center">
<!-- Item -->
<div class="col-xl-3 col-sm-6 ">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-violet"><i class="icon-user"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ทั้งหมด</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 25%; height: 4px;"
                                        aria-valuenow="<?=$RegisterAll[0]->RegAll;?>" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar bg-violet"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=$RegisterAll[0]->RegAll;?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-green"><i class="icon-padnote"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ผ่านการตรวจสอบ</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 70%; height: 4px;"
                                        aria-valuenow="<?=$RegisterAll[0]->Pass;?>" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar bg-green"></div>
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
        <section class="">
            <div class="container-fluid">
               <div class="text-center"> <h2>รอบโควตา</h2> </div> 
                <div class="row ">
                    <?php $round = array('1','4'); ?>
                    <?php foreach ($round as $key => $value) : ?>

                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>สถิติรายวัน ม.<?=$value?></h4>
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered T_m<?=$value?>_N">
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
                                                        if($v_StatisticCroTar->recruit_regLevel == $value):
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
                                            <?php endif; ?>
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

                    <?php endforeach; ?>



                </div>






            </div>
        </section>