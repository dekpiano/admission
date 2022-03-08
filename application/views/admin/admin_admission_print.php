<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('admin/layout/menu_left_admin.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"><?=$title;?></h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="container-fluid mt-3">

            <div class="container-fluid">

                <h2>มัธยมศึกษาปีที่ 1</h2>
                <div class="row">
                <?php $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)','ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' ); 
                foreach ($AtpyeRoom as $key => $v_AtpyeRoom) : ?>
                    <div class="col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-xl mr-3"><i class="fas fa-print"></i></span>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="card-text mb-0"><?=$v_AtpyeRoom?></h5>
                                        <!-- <p class="card-text text-uppercase text-muted">Memora</p> -->
                                    </div>
                                </div><a href="<?=base_url('admin/Print/'.$this->session->userdata('year').'/'.$v_AtpyeRoom.'/1')?>" class="tile-link"></a>
                            </div>
                        </div>
                    </div>   
                <?php endforeach; ?>    
                </div>

                <h2>มัธยมศึกษาปีที่ 4</h2>
                <div class="row">
                <?php $AtpyeRoom = array('ห้องเรียนความเป็นเลิศทางด้านวิชาการ (Science Match and Technology Program)','ห้องเรียนความเป็นเลิศทางด้านภาษา (Chinese English Program)','ห้องเรียนความเป็นเลิศทางด้านดนตรี ศิลปะ การแสดง (Preforming Art Program)','ห้องเรียนความเป็นเลิศด้านการงานอาชีพ (Career Program)','ห้องเรียนความเป็นเลิศด้านกีฬา (Sport Program)' ); 
                foreach ($AtpyeRoom as $key => $v_AtpyeRoom) : ?>
                    <div class="col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-xl mr-3"><i class="fas fa-print"></i></span>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="card-text mb-0"><?=$v_AtpyeRoom?></h5>
                                        <!-- <p class="card-text text-uppercase text-muted">Memora</p> -->
                                    </div>
                                </div><a href="<?=base_url('admin/Print/'.$this->session->userdata('year').'/'.$v_AtpyeRoom.'/4')?>" class="tile-link"></a>
                            </div>
                        </div>
                    </div>   
                <?php endforeach; ?>    
                </div>

            </div>

        </section>


    </div>
</div>

</div>
<!-- End of Main Content -->