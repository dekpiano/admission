<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('students/layout/menu_left_students.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">ตรวจสอบสถานะการสมัคร</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a
                                    href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                    href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">ตรวจสอบสถานะการสมัคร</h3>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">ประเภทการสมัคร</label>
                                <div class="col-sm-9">
                                    <div class=" text-primary"><?=$stu->recruit_category?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">เลขประจำตัวผู้สมัคร</label>
                                <div class="col-sm-9">
                                    <div class=" text-primary"><?=sprintf("%04d",$stu->recruit_id)?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-9">
                                    <div class=" text-primary">
                                        <?=$stu->recruit_prefix.$stu->recruit_firstName.' '.$stu->recruit_lastName?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">หลักสูตร</label>
                                <div class="col-sm-9">
                                    <div class=" text-primary">
                                        <?php 
                                        $sub = explode('|',$stu->recruit_majorOrder);
                                        foreach ($sub as $keym => $v_sub) {
                                            foreach ($course as $keyc => $v_course) {
                                                if($v_course->course_id ==  $v_sub){
                                                    echo "ลำดับที่ ".($keym+1).' '.$v_course->course_initials."<br>"; 
                                                }
                                            }
                                        }
                                       
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">การตรวจคุณสมบัติ</label>
                                <div class="col-sm-9">
                                    
                                      <?php 
                                          $status = $stu->recruit_status; 
                                          if ($status == "รอการตรวจสอบ"){
                                            echo '<div class=" text-warning h1">';
                                            echo '<i class="fas fa-exclamation-circle"></i> ';
                                            echo $status;
                                          }elseif($status == "ผ่านการตรวจสอบ"){
                                            echo '<div class=" text-primary h1">';
                                            echo '<i class="fas fa-check-circle"></i> ';
                                            echo $status;
                                          }else{
                                            echo '<div class=" text-danger h1">';
                                            echo '<i class="fas fa-times-circle"></i> ';
                                            echo $status;
                                          }
                                      ?>                                        
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>