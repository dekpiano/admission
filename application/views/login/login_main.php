<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เข้าสู่ระบบ (สำหรับนักเรียน) | ระบบรับสมัครนักเรียน สวนกุหลาบ ฯ จิรประวัติ นครสวรรค์</title>
    <meta name="description" content="สำหรับแก้ไข หรือ อัพเดตข้อมูล ในกรณีเจ้าตรวจสอบแล้วไม่ผ่านการตรวจสอบ
- ดูสถานะการสมัครเรียน">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=base_url();?>asset/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=base_url();?>asset/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=base_url();?>asset/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarabun:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=base_url();?>asset/css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url();?>asset/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=base_url();?>asset/img/Logo.ico">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body style="font-family:Sarabun">
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-7">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" alt="logoSKJ"
                                        class="img-fluid mx-2" style="width: 72px;">
                                    <h1>ระบบรับสมัคร (สำหรับนักเรียน)</h1>
                                    <h2>ประจำปีการศึกษา <?=$checkYear[0]->openyear_year?></h2>
                                </div>
                                <p>
                                    - สำหรับแก้ไข หรือ อัพเดตข้อมูล ในกรณีเจ้าตรวจสอบแล้วไม่ผ่านการตรวจสอบ <br>
                                    - ดูสถานะการสมัครเรียน
                                </p>
                                <p>งานวิชาการและงานทะเบียนโรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-5 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <h2 class="mb-3">เข้าสู่ระบบ</h2>
                                <form method="post" class="form-validate needs-validation" novalidate=""
                                    action="<?=base_url('StudentCheckLogin')?>">
                                    <div class="form-group">
                                        <input id="login-username" type="text" required
                                            data-msg="ระบุเลขประจำตัวประชาชน 13 หลัก" class="input-material"
                                            data-inputmask="'mask': '9-9999-99999-99-9'" name="recruit_idCard"
                                            id="recruit_idCard">
                                        <label for="login-username"
                                            class="label-material">เลขบัตรประจำตัวประชาชน</label>

                                    </div>
                                    <div class="form-group">
                                        <input id="login-password" type="password" name="recruit_birthday"
                                            id="recruit_birthday" required data-msg=" ระบุวัน-เดือน-ปีเกิด"
                                            class="input-material" >
                                        <label for="login-password" class="label-material">วันเดือนปี เกิด (Ex. 09-07-2534)</label>
                                        <small class="text-muted">ตัวอย่าง เกิดวันที่ 9 กรกฏาคม 2534 กรอกดังนี้
                                            09-07-2534 <br> <b>(อย่าลืมใส่เครื่องหมายขีด (-) ระหว่างวันเกิด)</b></small>
                                    </div><button id="login" type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                                    <hr>
                                    <div class=" text-center">
                                        <a href="<?=base_url('welcome');?>" class="btn btn-outline-primary">
                                            <span class="">หน้าแรก</span>
                                        </a>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- JavaScript files-->
    <script src="<?=base_url();?>asset/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>asset/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?=base_url();?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>asset/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?=base_url();?>asset/vendor/chart.js/Chart.min.js"></script>
    <script src="<?=base_url();?>asset/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?=base_url();?>asset/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="<?=base_url();?>asset/js/front.js"></script>

    <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
    <script src="<?=base_url();?>asset/js/sweetalert.min.js"></script>

    <script>
    // รูปแบบการกรอก
    $(":input").inputmask();
    </script>

    <?php  if($this->session->flashdata('msg') == 'NO' ):?>
    <script>
    swal("แจ้งเตือน", "<?=$this->session->flashdata('messge');?>", "<?=$this->session->flashdata('status');?>");
    </script>
    <?php elseif($this->session->flashdata('msg') == 'Yes'):?>
    <script>
    swal("แจ้งเตือน", "<?=$this->session->flashdata('messge');?>", "<?=$this->session->flashdata('status');?>");
    </script>
    <?php endif; $this->session->mark_as_temp('msg',20); ?>
</body>

</html>