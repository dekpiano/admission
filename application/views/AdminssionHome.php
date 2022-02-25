<div class="page-content align-items-stretch">
    <!-- Side Navbar -->
    <div class="container-fluid">
        <a href="https://drive.google.com/file/d/1zeBOmrYsIl7j9YVyRiuKBODbX1Bi3-WX/view" target="_blank" rel="noopener noreferrer">
            <img src="<?=base_url('uploads/admis65.png')?>" class="img-fluid mb-3"
                alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">
        </a>

        <div class="row mb-3">
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
        <img src="<?=base_url('uploads/banner65.png')?>" class="img-fluid" alt="รูปภาพแบนเนอร์การรับสมัครนักเรียน">

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