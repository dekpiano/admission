<?php if($this->session->userdata('idenStu') =="") :?>
<style>
input {
    border: none;
    outline: none
}

.container {
    border-radius: 15px
}

@media(min-width:992px) {
    .img-logo img {
        width: 500px;
        height: 500px
    }

    #circle {
        border: 10px solid rgba(255, 0, 234, 0.945);
        border-radius: 50%;
        position: absolute;
        height: 50px;
        width: 50px;
        left: 290px;
        top: -25px
    }

    .container {
        background-image: linear-gradient(to bottom, rgb(255, 255, 255) 80%, rgb(242, 242, 253), rgb(164, 164, 235))
    }
}

@media(max-width:991px) {
    .img-logo img {
        display: none;
    }

    #circle {
        border: 10px solid rgba(255, 0, 234, 0.945);
        border-radius: 50%;
        position: absolute;
        height: 50px;
        width: 50px;
        left: 100px;
        top: -25px
    }

    .container {
        background-image: linear-gradient(to bottom, rgb(255, 255, 255) 80%, rgb(242, 242, 253), rgb(164, 164, 235))
    }
}

@media(max-width:768px) {


    #circle {
        border: 10px solid rgba(255, 0, 234, 0.945);
        border-radius: 50%;
        position: absolute;
        height: 50px;
        width: 50px;
        left: 302px;
        top: -29px
    }
}

@media(max-width:567px) {


    .container {
        margin-left: 0px;
        margin-top: 30px
    }

    #circle {
        border: 10px solid rgba(255, 0, 234, 0.945);
        border-radius: 50%;
        position: absolute;
        height: 50px;
        width: 50px;
        left: 202px;
        top: -29px
    }
}
</style>

<div class="vh-100">
    <div class="container bg-white pb-5">
        <div class="row d-flex justify-content-start align-items-center mt-sm-5">
            <div class="col-lg-7 col-md-7 col-12">
                <div class="pb-5">
                    <img src="https://img.freepik.com/free-vector/woman-standing-mammography-machine-examination-disease-diagnosis_74855-11248.jpg?w=740&t=st=1675048019~exp=1675048619~hmac=6e3fa360d90084c342c29d0c81d4eb779b6d00d88a3ea3cc00721cf98e32c98b"
                        class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-4  col-md-5">
                <div class="text-center d-none">
                    <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" class="img-fluid" style="width: 64px;"
                        alt="KMUTNB">
                </div>
                <div class="mt-3">
                    <div class="text-center">
                        <h3>รายงานตัวนักเรียนใหม่ออนไลน์</h3>
                    </div>

                    <form id="loginConfirmStudent" class="needs-validation mt-5" novalidate>
                        <div class="d-flex flex-column dek-floating-label">
                            
                            <input type="text" id="idenStu" name="idenStu" class="border-bottom border-primary dek-floating-input"
                                autocomplete="off" placeholder=""
                                data-inputmask="'mask': '9-9999-99999-99-9'" required>
                                <label for="email">เลขบัตรประจำตัวประชาชน</label>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูลหมายเลขบัตรประจำตัวประชาชน
                            </div>
                        </div>
                        <div class="d-flex flex-column dek-floating-label">
                           
                            <input type="text" id="recruit_phone" name="recruit_phone"
                                class="border-bottom border-primary dek-floating-input" autocomplete="off"
                                placeholder=""
                                data-inputmask="'mask': '99-9999-9999'" required>
                                <label for="email">เบอร์โทรศัพท์ <small>(กรอกเบอร์โทรศัพท์ที่ใช้สมัครเท่านั้น)</small></label>
                            <div class="invalid-feedback">
                                กรุณากรอกเบอร์โทรศัพท์
                            </div>
                        </div>
                        <input type="submit" id="submit" value="เข้าสู่ระบบ" class="btn btn-primary btn-block mb-3">


                        <div class="col-12">
                            <p><span class="text-info">
                                    <span class="fas fa-phone"></span> 056-009-667 </span></p>
                        </div>
                        <p class="mb-0">
                            <a href="https://www.canva.com/design/DAE8dEvbv_0/sdFvsyMrdXQL1cZI26iDZQ/view?utm_content=DAE8dEvbv_0&utm_campaign=designshare&utm_medium=link&utm_source=editor"
                                target="_blank" class="text-center">คู่มือการใช้งานระบบรายงานตัวออนไลน์</a>

                        </p>
                        <!-- <p class="mb-0">
                            <a href="../stepMatriculation.pdf" target="_blank"
                                class="text-center">ขั้นตอนการรายงานตัวออนไลน์</a>
                        </p> -->

                        </p>

                        <p class="mb-1">
                            <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=dekpiano@skj.ac.th"
                                target="_blank">ไม่สามารถเข้าใช้งานระบบได้</a>
                        </p>


                    </form>
                </div>
            </div>
        </div>
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
    <!-- <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">อ่านฉันก่อน!</h4>
            <p>

                - ให้นักเรียนกรอกข้อมูลนักเรียน ข้อมูลบิดา มารดา และผู้ปกครองให้เรียบร้อยก่อน
                <b>เพื่อจะได้ไม่ต้องมาเสียเวลากรอกที่โรงเรียน</b> <br>
                - เมื่อเสร็จแล้วให้นักเรียนให้เตรียมเอกสารที่สมัครตัวจริงและสำเนา นำมาโรงเรียนในวันที่รายงานตัว 
                <br>
                - นักเรียนไม่ต้องพิมพ์เอกสารใด ๆ ออกจากระบบ ถ้านักเรียนบันทึกข้อมูลเสร็จแล้ว
                ทางโรงเรียนจะพิมพ์ออกมาเพื่อบริการในไว้ให้ <br>
            </p>
            <hr>
            <p class="mb-0">เมื่อทำต้องขั้นตอนขอระบบ นักเรียนจะเสร็จไวขึ้น
                <b>นักเรียนคนที่มากรอกข้อมูลที่โรงเรียนจะทำให้เสียเวลา</b>
            </p>
            <p class="mb-0">เมื่อนักเรียนมีปัญหาในการกรอกข้อมูล ในติดต่อช่องแชท ในเพจ Facebook โรงเรียนสวนกุหลาบวิทยาลัย
                (จิรประวัติ) นครสวรรค์
                <b> <a href="https://m.me/SKJNS160">แจ้งปัญหาที่นี่</a> </b>
            </p>
        </div>
    </div> -->

    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-md-3 order-1 order-md-0">
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
                <a target="_blank" href="<?=base_url('Confirm/Print');?>"
                    class="btn btn-info w-100">พิมพ์ใบยืนยันรายงานตัว</a>
                <?php else: ?>
                <a href="#" id="checkPirnt" class="btn btn-info w-100 checkPirnt">พิมพ์ใบยืนยันรายงานตัว</a>
                <?php endif; ?>
                <hr>
                <a href="<?=base_url('Confirm/Logout');?>" class="btn btn-danger w-100 mb-5">ออกจากระบบ</a>
                <p class="mb-0">เมื่อนักเรียนมีปัญหาในการกรอกข้อมูล ในติดต่อช่องแชท ในเพจ Facebook โรงเรียนสวนกุหลาบวิทยาลัย
                (จิรประวัติ) นครสวรรค์
                <b> <a href="https://m.me/SKJNS160">แจ้งปัญหาที่นี่</a> </b>
            </p>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active " id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <?php $this->load->view('FormData/FormMain/PageFormMain.php'); ?>
                    </div>

                    <div class="tab-pane fade rounded  p-3" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h4 class="font-italic mb-4">ข้อมูลนักเรียน</h4>

                        <?php 
                        // if(!isset($stuConf[0]->stu_iden)){
                          $this->load->view('FormData/FormStudent/PageFormStudentEdit.php'); 
                        // }else{
                        //   $this->load->view('FormData/FormStudent/PageFormStudent.php'); 
                        // }
                        ?>
                    </div>

                    <div class="tab-pane fade rounded p-3" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <h4 class="font-italic mb-4">ข้อมูลบิดา</h4>

                        <?php 
                        //if($FatherCkeck == 1){
                          $this->load->view('FormData/FormFather/PageFormFatherEdit.php');
                        // }else{
                        //   $this->load->view('FormData/FormFather/PageFormFather.php');
                        // }
                        ?>
                    </div>

                    <div class="tab-pane fade rounded p-3" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h4 class="font-italic mb-4">ข้อมูลมารดา</h4>
                        <?php //if($MatherCkeck == 1){
                          $this->load->view('FormData/FormMather/PageFormMatherEdit.php');
                        // }else{
                        //     $this->load->view('FormData/FormMather/PageFormMather.php');
                        // }
                        ?>
                    </div>
                    <div class="tab-pane fade rounded p-3" id="v-pills-other" role="tabpanel"
                        aria-labelledby="v-pills-other-tab">
                        <h4 class="font-italic mb-4">ข้อมูลผู้ปกครอง</h4>
                        <div class="alert alert-success">
                            <strong>แจ้งเตือน!</strong> กรณีที่นักเรียนอยู่กับบิดา - มารดา เลือกเป็นผู้ปกครอง 1 คน

                            <div class="custom-control custom-radio custom-control-inline ml-5">
                                <input class="custom-control-input checkPu" type="radio" name="checkPu" id="par_rest88"
                                    value="บิดา" <?=@$OtherConf[0]->par_relation=="บิดา"?"checked":""?> required11>
                                <label class="custom-control-label" for="par_rest88">เป็นบิดา</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input checkPu" type="radio" name="checkPu" id="par_rest89"
                                    value="มารดา" required11 <?=@$OtherConf[0]->par_relation=="มารดา"?"checked":""?>>
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
                                <input class="custom-control-input checkPu" type="radio" name="checkPu" id="par_rest90"
                                    value="ผู้ปกครองอื่น" required11 <?=$check;?>>
                                <label class="custom-control-label" for="par_rest90">ผู้ปกครองอื่น</label>
                            </div>
                        </div>
                        <?php //if($OtherCkeck == 1){
                          $this->load->view('FormData/FormOther/PageFormOtherEdit.php');
                        // }else{
                        //     $this->load->view('FormData/FormOther/PageFormOther.php');
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php endif; ?>