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
                                        aria-valuenow="<?=array_sum($sum_all);?>" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar bg-violet"></div>
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
                                    <div role="progressbar" style="width: 70%; height: 4px;"
                                        aria-valuenow="<?=$sum_pass[0]->sumall?>" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar bg-green"></div>
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
                                    <div role="progressbar" style="width: 40%; height: 4px;"
                                        aria-valuenow="<?=$sum_NoPass[0]->sumall?>" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar bg-red"></div>
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

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    ประเภทปกติ
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row ">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2>สถิติรายวัน ม.1</h2>
                                                <div class="table-responsive">
                                                    <table id="" class="table table-bordered T_m1_N">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
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
                                
                                
                                foreach($sel_date as $v_datatN) :
                                    //echo "<pre>";print_r($v_datat);
                                    if($v_datatN->recruit_date > "2022-03-08" && $v_datatN->recruit_date < "2022-03-14"): 
                                ?>
                                                            <tr>
                                                                <td style="width:150px">
                                                                    <?=$this->datethai->thai_date_fullmonth(strtotime($v_datatN->recruit_date))?>
                                                                </td>

                                                                <?php  
                                       $sub11N = 0; $sub12N = 0; $sub13N = 0; $sub14N = 0; $sub15N = 0;
                                        foreach($sum_date as $m1N) {
                                            
                                            if($m1N->recruit_date > "2022-03-08" && $m1N->recruit_date < "2022-03-14"){
                                            
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 1 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub11N = $sub11N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 1 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub12N = $sub12N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 1 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub13N = $sub13N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 1 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub14N = $sub14N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 1 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub15N = $sub15N + 1;
                                                }
                                               
                                            }
                                           
                                        } 

                                        ?>
                                                                <td class="numN"><?=$sub11N;?></td>
                                                                <td class="numN"><?=$sub12N;?></td>
                                                                <td class="numN"><?=$sub13N;?></td>
                                                                <td class="numN"><?=$sub14N;?></td>
                                                                <td class="numN"><?=$sub15N;?></td>
                                                                <td class="total-numN bg-light"></td>
                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php endforeach; ?>




                                                        </tbody>
                                                        <tfoot class="bg-light">
                                                            <tr class="font-weight-bold">
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

                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2>สถิติรายวัน ม.4</h2>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered T_m4_N">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
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
                                $datat = array('2021-04-24','2021-04-25','2021-04-26','2021-04-27','2021-04-28'); 

                                foreach($sel_date as $v_datatN) :
                                    if($v_datatN->recruit_date > "2022-03-08" && $v_datatN->recruit_date < "2022-03-14"):
                                ?>
                                                            <tr>
                                                                <td style="width:150px">
                                                                    <?=$this->datethai->thai_date_fullmonth(strtotime($v_datatN->recruit_date))?>
                                                                </td>

                                                                <?php  $sub41N = 0; $sub42N = 0; $sub43N = 0; $sub44N = 0; $sub45N = 0;
                                       
                                        foreach($sum_date as $m1N) {
                                            
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 4 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub41N = $sub41N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 4 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub42N = $sub42N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 4 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub43N = $sub43N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 4 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub44N = $sub44N + 1;
                                                }
                                                if($m1N->recruit_date == $v_datatN->recruit_date && $m1N->recruit_regLevel == 4 && $m1N->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub45N = $sub45N + 1;
                                                }
                                        } 
                                        ?>
                                                                <td class="numN"><?=$sub41N;?></td>
                                                                <td class="numN"><?=$sub42N;?></td>
                                                                <td class="numN"><?=$sub43N;?></td>
                                                                <td class="numN"><?=$sub44N;?></td>
                                                                <td class="numN"><?=$sub45N;?></td>
                                                                <td class="total-numN bg-light"></td>

                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php endforeach; ?>

                                                        </tbody>
                                                        <tfoot class="bg-light">
                                                            <tr class="font-weight-bold">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    ประเภทโควตา ม.1 และ ม.4
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row ">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2>สถิติรายวัน ม.1</h2>
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
                                                                
                                foreach($sel_date as $v_datat) :
                                    //echo "<pre>";print_r($v_datat);
                                    if($v_datat->recruit_date > "2022-01-01" && $v_datat->recruit_date < "2022-02-15"): 
                                ?>
                                                            <tr>
                                                                <td style="width:150px">
                                                                    <?=$this->datethai->thai_date_fullmonth(strtotime($v_datat->recruit_date))?>
                                                                </td>

                                                                <?php  $sub11 = 0; $sub12 = 0; $sub13 = 0; $sub14 = 0; $sub15 = 0;
                                       
                                        foreach($sum_date as $m1) {
                                            //echo "<pre>";print_r($m1);
                                            
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub11 = $sub11 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub12 = $sub12 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub13 = $sub13 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub14 = $sub14 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 1 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)"){
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
                                                            <?php endif; ?>
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

                                foreach($sel_date as $v_datat) :
                                    if($v_datat->recruit_date > "2022-01-01" && $v_datat->recruit_date < "2022-02-15"):
                                ?>
                                                            <tr>
                                                                <td style="width:150px">
                                                                    <?=$this->datethai->thai_date_fullmonth(strtotime($v_datat->recruit_date))?>
                                                                </td>

                                                                <?php  $sub11 = 0; $sub12 = 0; $sub13 = 0; $sub14 = 0; $sub15 = 0;
                                       
                                        foreach($sum_date as $m1) {
                                            
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub11 = $sub11 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub12 = $sub12 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub13 = $sub13 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)"){
                                                    //print_r($m1->recruit_date);
                                                    $sub14 = $sub14 + 1;
                                                }
                                                if($m1->recruit_date == $v_datat->recruit_date && $m1->recruit_regLevel == 4 && $m1->recruit_tpyeRoom == "ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)"){
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
                                                            <?php endif; ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ประเภทโควตา นักกีฬา
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                รอรับสมัคร
                            </div>
                        </div>
                    </div>

                </div>

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