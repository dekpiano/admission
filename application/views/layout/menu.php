<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin')?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ระบบรับสมัครนักเรียน </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url()?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ประชาสัมพันธ์</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('selectlevel')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>สมัครเรียน</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('checkRegister')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ตรวจสอบและแก้ไขข้อมูล</span></a>
    </li>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>