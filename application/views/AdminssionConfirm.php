<?php if($this->session->userdata('idenStu') =="") :?>
<div class="row mt-5 justify-content-center">
<div class="">
    <div class="text-center mb-3">
    <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" width="200" alt="KMUTNB">
    </div>


  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h5><b>ระบบรายงานตัวนักเรียนใหม่ออนไลน์</b></h5>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Online Matriculation System</p> -->

      <form id="loginConfirmStudent" method="post" class="needs-validation" novalidate>        
        <div class="input-group mb-3">
          <input type="text" id="idenStu" name="idenStu" class="form-control" placeholder="หมายเลขบัตรประจำตัวประชาชน" data-inputmask="'mask': '9-9999-99999-99-9'" required>
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
          <center><p><span class="text-danger"> ปิดปรับปรุงระบบ  <br> ตั้งแต่วันที่ 7 กุมภาพันธ์ 2565 เป็นต้นไป  </span></p></center>
      </div>
      <hr>
      <div class="col-12">
          <p><span class="text-info">
             <span class="fas fa-phone"></span>  056-009-667  </span></p>
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
        <a href="../OnlineMatriculation.pdf" target="_blank" class="text-center">คู่มือการใช้งานระบบ</a>
      </p>
      <p class="mb-0">
        <a href="../stepMatriculation.pdf" target="_blank" class="text-center">ขั้นตอนการรายงานตัวออนไลน์</a>
      </p>
      <p class="mb-1">
        <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=newstudent@op.kmutnb.ac.th" target="_blank">ไม่สามารถเข้าใช้งานระบบได้</a>
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
                <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-user-circle-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">หน้าแรก</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">ข้อมูลนักเรียน</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fa fa-star mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">ข้อมูลบิดา</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <i class="fa fa-check mr-2"></i>
                        <span class="font-weight-bold small text-uppercase">ข้อมูลมารดา</span></a>
                    </div>
                    <a href="<?=base_url('Confirm/Logout');?>" class="btn btn-danger w-100">ออกจากระบบ</a>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">                       
                        <?php $this->load->view('FormData/FormMain/PageFormMain.php'); ?>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h4 class="font-italic mb-4">ข้อมูลนักเรียน</h4>
                        
                        <?php $this->load->view('FormData/FormStudent/PageFormStudent.php'); ?>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h4 class="font-italic mb-4">ข้อมูลบิดา</h4>
                        <?php $this->load->view('FormData/FormFather/PageFormFather.php'); ?>
                    </div>
                    
                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h4 class="font-italic mb-4">ข้อมูลมารดา</h4>
                        <?php $this->load->view('FormData/FormMather/PageFormMather.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>