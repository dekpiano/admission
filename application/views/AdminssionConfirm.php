<?php if($this->session->userdata('idenStu') =="") :?>
<div class="row mt-5 justify-content-center">
    <div class="">
        <div class="text-center mb-3">
            <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" width="200" alt="KMUTNB">
        </div>


        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h5><b>รายงานตัวนักเรียนใหม่ออนไลน์</b></h5>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Online Matriculation System</p> -->

                <form id="loginConfirmStudent" method="post" class="needs-validation" novalidate>
                    <div class="input-group mb-3">
                        <input type="text" id="idenStu" name="idenStu" class="form-control"
                            placeholder="หมายเลขบัตรประจำตัวประชาชน" data-inputmask="'mask': '9-9999-99999-99-9'"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <!--<div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <div class="col-12">
                    <p><span class="text-info">
                            <span class="fas fa-phone"></span> 056-009-667 </span></p>
                </div>



                <!--<div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
    -->
                <!-- /.social-auth-links -->
                <p class="mb-0">
                    <a href="https://www.canva.com/design/DAE8dEvbv_0/0BOZnsblL5N2guiWoMXeng/view?utm_content=DAE8dEvbv_0&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" target="_blank" class="text-center">คู่มือการใช้งานระบบ</a>

                </p>
                <p class="mb-0">
                    <a href="../stepMatriculation.pdf" target="_blank"
                        class="text-center">ขั้นตอนการรายงานตัวออนไลน์</a>
                </p>

                </p>               

                <p class="mb-1">
                    <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=dekpiano@skj.ac.th"
                        target="_blank">ไม่สามารถเข้าใช้งานระบบได้</a>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<?php else : ?>




<style>
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*/
.nav-pills-custom .nav-link {
    background: #fff;
    position: relative;
}

.nav-pills-custom .nav-link.active {
    color: #45b649;
    background: #fff;
}


/* Add indicator arrow for the active tab */
@media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
        content: '';
        display: block;
        border-top: 8px solid transparent;
        border-left: 10px solid #fff;
        border-bottom: 8px solid transparent;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
        opacity: 0;
    }
}

.nav-pills-custom .nav-link.active::before {
    opacity: 1;
}
</style>
<section class="py-5 header">


    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-md-3">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill"
                        href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-star mr-2"></i>
                        <span class="">หน้าแรก</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill"
                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <span class="">ข้อมูลนักเรียน</span>
                        <?php if($Ckeckstu == 1) :?>
                        ( <i class="fa fa-check mr-2 "></i> กรอกข้อมูลแล้ว)
                        <?php else :?>
                        ( <i class="fa fa-times mr-2 "></i> ยังไม่กรอกข้อมูล)
                        <?php endif; ?>
                    </a>
                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill"
                        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <span class="">ข้อมูลบิดา</span>
                        <?php if($FatherCkeck == 1) :?>
                        ( <i class="fa fa-check mr-2 "></i> กรอกข้อมูลแล้ว)
                        <?php else :?>
                        ( <i class="fa fa-times mr-2 "></i> ยังไม่กรอกข้อมูล)
                        <?php endif; ?>
                    </a>
                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill"
                        href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <span class="">ข้อมูลมารดา</span>
                        <?php if($MatherCkeck == 1) :?>
                        ( <i class="fa fa-check mr-2 "></i> กรอกข้อมูลแล้ว)
                        <?php else :?>
                        ( <i class="fa fa-times mr-2 "></i> ยังไม่กรอกข้อมูล)
                        <?php endif; ?>
                    </a>
                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-other-tab" data-toggle="pill" href="#v-pills-other"
                        role="tab" aria-controls="v-pills-other" aria-selected="false">
                        <span class="">ข้อมูลผู้ปกครอง</span>
                        <?php if($OtherCkeck == 1) :?>
                        ( <i class="fa fa-check mr-2 "></i> กรอกข้อมูลแล้ว)
                        <?php else :?>
                        ( <i class="fa fa-times mr-2 "></i> ยังไม่กรอกข้อมูล)
                        <?php endif; ?>
                    </a>
                </div>
                <hr>
                <?php if($Ckeckstu == 1 && $OtherCkeck == 1): ?>
                <a target="_blank" href="<?=base_url('Confirm/Print');?>" class="btn btn-info w-100">พิมพ์ใบยืนยันรายงานตัว</a>
                <?php else: ?>
                <a href="#" id="checkPirnt" class="btn btn-info w-100 checkPirnt">พิมพ์ใบยืนยันรายงานตัว</a>
                <?php endif; ?>
                <hr>
                <a href="<?=base_url('Confirm/Logout');?>" class="btn btn-danger w-100 mb-5">ออกจากระบบ</a>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active " id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <?php $this->load->view('FormData/FormMain/PageFormMain.php'); ?>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-3" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h4 class="font-italic mb-4">ข้อมูลนักเรียน</h4>

                        <?php if(isset($stuConf[0]->stu_iden)){
                          $this->load->view('FormData/FormStudent/PageFormStudentEdit.php'); 
                        }else{
                          $this->load->view('FormData/FormStudent/PageFormStudent.php'); 
                        }
                        ?>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-3" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <h4 class="font-italic mb-4">ข้อมูลบิดา</h4>

                        <?php if($FatherCkeck == 1){
                          $this->load->view('FormData/FormFather/PageFormFatherEdit.php');
                        }else{
                          $this->load->view('FormData/FormFather/PageFormFather.php');
                        }
                        ?>
                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-3" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h4 class="font-italic mb-4">ข้อมูลมารดา</h4>
                        <?php if($MatherCkeck == 1){
                          $this->load->view('FormData/FormMather/PageFormMatherEdit.php');
                        }else{
                            $this->load->view('FormData/FormMather/PageFormMather.php');
                        }
                        ?>
                    </div>
                    <div class="tab-pane fade shadow rounded bg-white p-3" id="v-pills-other" role="tabpanel"
                        aria-labelledby="v-pills-other-tab">
                        <h4 class="font-italic mb-4">ข้อมูลผู้ปกครอง</h4>
                        <div class="alert alert-success">
                            <strong>แจ้งเตือน!</strong> กรณีที่นักเรียนอยู่กับบิดา - มารดา เลือกเป็นผู้ปกครอง 1 คน
                            
                            <div class="custom-control custom-radio custom-control-inline ml-5">
                                <input class="custom-control-input checkPu" type="radio" name="checkPu"
                                    id="par_rest88" value="บิดา" <?=@$OtherConf[0]->par_relation=="บิดา"?"checked":""?> required11>
                                <label class="custom-control-label" for="par_rest88">เป็นบิดา</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input checkPu" type="radio" name="checkPu"
                                    id="par_rest89" value="มารดา" required11 <?=@$OtherConf[0]->par_relation=="มารดา"?"checked":""?>>
                                <label class="custom-control-label" for="par_rest89">เป็นมารดา</label>
                            </div>  
                            แล้วกดบันทึกข้อมูลด้านล่าง
                            <br><br>
                            แต่ถ้าไม่ใช่ให้กรอกข้อมูลผู้ปกครองอื่นที่อยู่กับนักเรียนในฟอร์มด้านล่าง 
                            <?php if(@$OtherConf[0]->par_relation=="บิดา" || @$OtherConf[0]->par_relation=="มารดา"){
                                $check = "";
                            }else{
                                $check = "checked";
                            }?>
                            <div class="custom-control custom-radio custom-control-inline ml-5">
                                <input class="custom-control-input checkPu" type="radio" name="checkPu"
                                    id="par_rest90" value="ผู้ปกครองอื่น" required11 <?=$check;?>>
                                <label class="custom-control-label" for="par_rest90">ผู้ปกครองอื่น</label>
                            </div> 
                        </div>
                        <?php if($OtherCkeck == 1){
                          $this->load->view('FormData/FormOther/PageFormOtherEdit.php');
                        }else{
                            $this->load->view('FormData/FormOther/PageFormOther.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php endif; ?>