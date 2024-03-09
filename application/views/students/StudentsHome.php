<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('students/layout/menu_left_students.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">ประชาสัมพันธ์</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <div class="row bg-white has-shadow border border-primary mb-2">
                    <i class="fas fa-bullhorn fa-1x"></i>
                    <span class="pl-2 pr-2">ขณะนี้สามารถแก้ไขข้อมูลให้ระบบได้ </span>
                    <a href="<?=base_url('StudentsEdit');?>" class="btn btn-primary btn-sm">คลิกที่นี่</a>
                </div>

                <div class="row bg-white has-shadow border border-primary mb-2">
                    <i class="fas fa-bullhorn fa-1x"></i>
                    <span class="pl-2 pr-2">ในวันสอบสามารถพิมพ์บัตรประจำตัวเข้าสอบได้ หรือ จะแคปหน้าจอได้ เพื่อยันยันตัวตนในการสอบ
                    </span>
                </div>

            </div>
        </section>


    </div>
</div>