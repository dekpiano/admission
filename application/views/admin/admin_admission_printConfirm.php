<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('admin/layout/menu_left_admin.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">ยินดีต้อนรับ</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="">

            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4 ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary justify-content-between">ตารางข้อมูล<?=$title;?>
                        </h6>
                        <div>
                            <span class="mx-2">เลือกดู</span>
                            <select id="select_year_confrim" name="select_year_confrim"
                                class="custom-select custom-select-sm float-right" style="width: 75px;">
                                <option <?=$this->uri->segment('3') == ($year[0]->recruit_year)+1 ? 'selected' : '' ;?>
                                    value="<?=($year[0]->recruit_year)+1?>"><?=($year[0]->recruit_year)+1?></option>
                                <?php foreach ($year as $key => $v_year) : ?>
                                <option <?=$this->uri->segment('3') == $v_year->recruit_year ? 'selected' : '' ;?>
                                    value="<?=$v_year->recruit_year?>"><?=$v_year->recruit_year?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="dropdown no-arrow">
                            <!-- <a target="_blank"  href="<?=base_url('admin/control_admin_admission/pdf_all/'.$this->uri->segment(3));?>"  class="btn btn-primary btn-sm"><i class="fas fa-print"></i> พิมพ์ใบสมัครทั้งหมด</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered dt-responsive nowrap" id="TB_stu" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>สถานะการสมัคร</th>
                                        <th>สถานะการรายงานตัว</th>
                                       
                                        <th>คำสั่ง</th>
                                        <th>เลขที่สมัคร</th>
                                        <th>รูปภาพ</th>
                                        <th>ชื่อผู้<?=$title;?></th>
                                        <th>เลขประชาชน</th>
                                        <th>ระดับชั้นที่สมัคร</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>หลักสูตร</th>

                                    </tr>
                                </thead>                               
                                <?php foreach ($recruit as $key => $v_recruit) : ?>
                                <tr>
                                <td>
                                        <?php 
                                        if($v_recruit->recruit_status == "รอการตรวจสอบ"){
                                            echo '<h4><span class=" badge badge-pill badge-warning">'.$v_recruit->recruit_status.'</span></h4>';
                                        }elseif($v_recruit->recruit_status == "ผ่านการตรวจสอบ"){
                                            echo '<h4><span class="badge badge-pill badge-success">'.$v_recruit->recruit_status.'</span></h4>';
                                        }else{
                                            echo '<h4><span class="badge badge-pill badge-danger">'.$v_recruit->recruit_status.'</span></h4>';
                                        }
                                        
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($v_recruit->stu_id != null && $v_recruit->stu_UpdateConfirm == $this->uri->segment('3')){
                                                echo '<h4><span class="badge badge-pill badge-success">รายงานตัวแล้ว</span></h4>';
                                            }else{                                              
                                                echo '<h4><span class=" badge badge-pill badge-danger">ยังไม่ได้รายงานตัว</span></h4>';
                                            }
                                            ?>
                                    </td>
                                

                                    <td>
                                        <?php if($v_recruit->stu_id != null && $this->uri->segment('3')): ?>
                                            <a target="_blank"
                                            href="<?=base_url('admin/Control_admin_confirm/pdfConfirm/'.$this->uri->segment(3).'/'.$v_recruit->recruit_idCard);?>"
                                            class="btn btn-primary btn-sm"><i class="fas fa-print"></i>
                                            พิมพ์ใบรายงานตัว</a>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-primary" disabled>
                                            <i class="fas fa-print"></i> รอรายงานตัว</button>
                                       
                                        <?php endif; ?>

                                    </td>
                                    <td><?=$v_recruit->recruit_id;?></td>
                                    <td><img style="width: 100px"
                                            src="<?=base_url('uploads/recruitstudent/m'.$v_recruit->recruit_regLevel.'/img/'.$v_recruit->recruit_img)?>">
                                    </td>
                                    <td><?=$v_recruit->recruit_prefix.$v_recruit->recruit_firstName.' '.$v_recruit->recruit_lastName;?>
                                    </td>
                                    <td><?=$v_recruit->recruit_idCard;?></td>
                                    <td>ม.<?=$v_recruit->recruit_regLevel;?></td>


                                    </td>
                                    <td><?=$v_recruit->recruit_phone;?></td>
                                    <td><?=$v_recruit->recruit_tpyeRoom;?></td>

                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>

</div>
<!-- End of Main Content -->