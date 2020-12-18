<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar"
    style="font-weight: 800;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ระบบรับสมัครนักเรียน ส.ก.จ. </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mb-3">
    <li class="nav-item ">

        <div class="text-white text-center"> ยินดีต้อนรับ <Br></Br> <?php  echo $this->session->userdata('fullname');?>

    </li>
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <div class="header1">
        <div class="text-while mx-3">ข้อมูลการสมัคร</div> 
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('StudentData')?>">
                <i class="far fa-newspaper"></i>
                <span>แก้ไขใบสมัคร</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>ตรวจสอบสถานะการสมัคร</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>พิมพ์ใบสมัคร</span></a>
        </li>


        <hr class="sidebar-divider">

    </div>

    <div class="text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <center>
        <button type="button" class="btn btn-outline-light text-center" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>LogOut</span></ฺ>
        </button>
    </center>


</ul>
