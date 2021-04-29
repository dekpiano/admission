<div class="page-content align-items-stretch">
    <!-- Side Navbar -->


    <div class="w-100">
        <!-- Page Header-->
        <!-- <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">
                    ประชาสัมพันธ์
                </h2>
            </div>
        </header> -->
        <!-- Dashboard Counts Section-->
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
                                    <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="<?=array_sum($sum_all);?>"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=array_sum($sum_all);?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-green"><i class="icon-padnote"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ผ่านการตรวจสอบ</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="<?=$sum_pass[0]->sumall?>"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=$sum_pass[0]->sumall?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-4 col-sm-6">
                        <div class="item d-flex align-items-center ">
                            <div class="icon bg-red"><i class="icon-bill"></i></div>
                            <div class="title"><span>ผู้สมัคร<br>ไม่ผ่านการตรวจสอบ (รอแก้ไข)</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="<?=$sum_NoPass[0]->sumall?>"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                </div>
                            </div>
                            <div class="number"><strong><?=$sum_NoPass[0]->sumall?></strong></div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>
        <section class="">

            <div class="container-fluid">
                <h3 class="text-center">ประเภท ทั่วไป</h3>
                <div class="row ">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="line-chart-example card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">สมัครเรียนชั้นมัธยมศึกษาปีที่ 1</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart1" style="display: block; width: 344px; height: 172px;" width="1032"
                                    height="516" class="chartjs-render-monitor"></canvas>
                                <p class="text-center h5">รวม <?=array_sum($sum_1);?> คน</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="line-chart-example card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">สมัครเรียนชั้นมัธยมศึกษาปีที่ 4</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart4" style="display: block; width: 344px; height: 172px;" width="1032"
                                    height="516" class="chartjs-render-monitor"></canvas>
                                <p class="text-center h5">รวม <?=array_sum($sum_4);?> คน</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="line-chart-example card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">รวมทุกประเภททั้งหมด</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="barChartAll" style="display: block; width: 344px; height: 172px;"
                                    width="1032" height="516" class="chartjs-render-monitor"></canvas>
                                <p class="text-center h5">รวม <?=array_sum($sum_all);?> คน</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>สถิติรายวัน ม.1</h2>
                                <p>วันที่ 24 - 28 เมษยน 2564</p>
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered T_m1">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>วันที่</th>
                                                <th>ด้านวิชาการ</th>
                                                <th>ด้านภาษา</th>
                                                <th>ด้านดนตรี ศิลปะ การแสดง</th>
                                                <th>ด้านกีฬา</th>
                                                <th>ด้านการงานอาชีพ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                $datat = array('2021-04-24','2021-04-25','2021-04-26','2021-04-27','2021-04-28'); 
                                
                                foreach($datat as $v_datat) :
                                ?>
                                            <tr>
                                                <td style="width:150px">
                                                    <?=$this->datethai->thai_date_fullmonth(strtotime($v_datat))?>
                                                </td>

                                                <?php  $sub11 = 0; $sub12 = 0; $sub13 = 0; $sub14 = 0; $sub15 = 0;
                                       
                                        foreach($sum_date as $m1) {
                                            
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub11 = $sub11 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub12 = $sub12 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub13 = $sub13 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub14 = $sub14 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub15 = $sub15 + 1;
                                                }
                                        } 

                                        ?>
                                                <td><?=$sub11;?></td>
                                                <td><?=$sub12;?></td>
                                                <td><?=$sub13;?></td>
                                                <td><?=$sub14;?></td>
                                                <td><?=$sub15;?></td>

                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot class="bg-light">
                                            <tr class="font-weight-bold">
                                                <td>รวม</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>สถิติรายวัน ม.4</h2>
                                <p>วันที่ 24 - 28 เมษยน 2564</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered T_m4">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>วันที่</th>
                                                <th>ด้านวิชาการ</th>
                                                <th>ด้านภาษา</th>
                                                <th>ด้านดนตรี ศิลปะ การแสดง</th>
                                                <th>ด้านกีฬา</th>
                                                <th>ด้านการงานอาชีพ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                $datat = array('2021-04-24','2021-04-25','2021-04-26','2021-04-27','2021-04-28'); 

                                foreach($datat as $v_datat) :
                                ?>
                                            <tr>
                                                <td style="width:150px">
                                                    <?=$this->datethai->thai_date_fullmonth(strtotime($v_datat))?>
                                                </td>

                                                <?php  $sub11 = 0; $sub12 = 0; $sub13 = 0; $sub14 = 0; $sub15 = 0;
                                       
                                        foreach($sum_date as $m1) {
                                            
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub11 = $sub11 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub12 = $sub12 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub13 = $sub13 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub14 = $sub14 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub15 = $sub15 + 1;
                                                }
                                        } 
                                        ?>
                                                <td><?=$sub11;?></td>
                                                <td><?=$sub12;?></td>
                                                <td><?=$sub13;?></td>
                                                <td><?=$sub14;?></td>
                                                <td><?=$sub15;?></td>

                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                        <tfoot class="bg-light">
                                            <tr class="font-weight-bold">
                                                <td >รวม</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <h3>ประเภท โควตา</h3>
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="card">
                            <canvas id="barChart1_cota"></canvas>
                            <p class="text-center h5">รวม <?=array_sum($sum_1_cota);?> คน</p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card">
                            <canvas id="barChart4_cota"></canvas>
                            <p class="text-center h5">รวม <?=array_sum($sum_4_cota);?> คน</p>
                        </div>

                    </div>
                    <div class="col-md-4 ">
                        <div class="card">
                            <canvas id="barChartAll_cota"></canvas>
                            <p class="text-center h5">รวม <?=array_sum($sum_all_cota);?> คน</p>
                        </div>

                    </div>
                </div>

                <h3>รวมทุกประเภททั้งหมด</h3>
                <div class="row ">
                    <div class="col-md-4 ">
                        <div class="card">
                            <canvas id="barChart1_all"></canvas>
                            <p class="text-center h5">รวม <?=array_sum($sum_1_all);?> คน</p>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card">
                            <canvas id="barChart4_all"></canvas>
                            <p class="text-center h5">รวม <?=array_sum($sum_4_all);?> คน</p>
                        </div>

                    </div>
                    <div class="col-md-4 ">
                        <div class="card">
                            <canvas id="barChartAll_all"></canvas>
                            <p class="text-center h5">รวม <?=array_sum($sum_all_all);?> คน</p>
                        </div>

                    </div>
                </div> -->
            </div>
        </section>


        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">เลือกระดับชั้น</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">

                        <?php if($switch[0]->onoff_regis == "off") :?>
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
                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>