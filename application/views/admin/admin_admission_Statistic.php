<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('admin/layout/menu_left_admin.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">สถิติการรับสมัครนักเรียน <small>ประจำปีการศึกษา <?=$checkYear[0]->openyear_year;?></small></h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
    
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
                                                aria-valuenow="" aria-valuemin="0"
                                                aria-valuemax="100" class="progress-bar bg-violet"></div>
                                        </div>
                                    </div>
                                    <div class="number"><strong><?=$recruit[0]->StuALL?></strong></div>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="col-xl-3 col-sm-6">
                                <div class="item d-flex align-items-center ">
                                    <div class="icon bg-green"><i class="icon-padnote"></i></div>
                                    <div class="title"><span>ผู้สมัคร<br>ผ่านการตรวจสอบ</span>
                                        <div class="progress">
                                            <div role="progressbar" style="width: 70%; height: 4px;"
                                                aria-valuenow="" aria-valuemin="0"
                                                aria-valuemax="100" class="progress-bar bg-green"></div>
                                        </div>
                                    </div>
                                    <div class="number"><strong><?=$recruit[0]->Pass?></strong></div>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center ">
                                    <div class="icon bg-red"><i class="icon-bill"></i></div>
                                    <div class="title"><span>ผู้สมัคร<br>ไม่ผ่านการตรวจสอบ (รอแก้ไข)</span>
                                        <div class="progress">
                                            <div role="progressbar" style="width: 40%; height: 4px;"
                                                aria-valuenow="" aria-valuemin="0"
                                                aria-valuemax="100" class="progress-bar bg-red"></div>
                                        </div>
                                    </div>
                                    <div class="number"><strong><?=$recruit[0]->NoPass?></strong></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <section class="">
                    <div class="container-fluid">
                    <input type="hidden" name="Year" id="Year" value="<?=$this->uri->segment('3')?>">
                        <div class="row ">                           
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="line-chart-example card">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">สมัครเรียนชั้นมัธยมศึกษาปีที่ 1</h3>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="NomalM1" style="display: block; width: 344px; height: 172px;"
                                            width="1032" height="516" class="chartjs-render-monitor"></canvas>
                                        <p class="text-center h5">รวม <?=$recruit[0]->NumAllM1?> คน</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="line-chart-example card">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">สมัครเรียนชั้นมัธยมศึกษาปีที่ 4</h3>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="NomalM4" style="display: block; width: 344px; height: 172px;"
                                            width="1032" height="516" class="chartjs-render-monitor"></canvas>
                                        <p class="text-center h5">รวม <?=$recruit[0]->NumAllM4?> คน</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="line-chart-example card">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="h4">สมัครเรียน ระหว่างปี</h3>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="Mother" style="display: block; width: 344px; height: 172px;"
                                            width="1032" height="516" class="chartjs-render-monitor"></canvas>
                                        <p class="text-center h5">รวม <?=$recruit[0]->NumAllMother?> คน</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

   


    </div>
</div>

</div>
<!-- End of Main Content -->