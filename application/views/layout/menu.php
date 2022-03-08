<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion d-none d-md-block " id="accordionSidebar"
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

    <?php if($switch[0]->onoff_system == 'on'): ?>
    <!-- Nav Item - Dashboard -->
    <div class="header1">
        <div class="sidebar-brand-text mx-3 text-while">หลักสูตรที่เปิดสอนความเป็นเลิศ</div>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>ด้านวิชาการ</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>ด้านภาษา</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>ด้านดนตรี ศิลปะ การแสดง</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>ด้านการงานอาชีพ</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url()?>">
                <i class="far fa-newspaper"></i>
                <span>ด้านกีฬา</span></a>
        </li>

        <hr class="sidebar-divider">


        <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('StudentLogin')?>">
                <i class="fas fa-bullhorn"></i>
                <span>ประกาศรายชื่อผู้สมัคร<br> 
                <i class="fas fa-print"></i> พิมพ์ใบสมัครสอบ <br>
                <i class="fas fa-edit"></i> ตรวจสอบและแก้ไขข้อมูล
                </span>
                </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item ">
            <?php if($switch[0]->onoff_regis == 'on'): ?>
            <a class="nav-link" href="<?=base_url('selectlevel')?>">
                <i class="fas fa-user-plus"></i>
                <span>สมัครเรียน <?=$checkYear[0]->openyear_year;?></span>
            </a>
            <?php else : ?>
            <span class="nav-link"><i class="fas fa-times-circle"></i> สมัครเรียน (ปิดรับสมัคร)</span>
            <?php endif; ?>
        </li>
    
        <?php endif; ?>
    </div>
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <li class="nav-item ">
        <?php  if(!empty($this->session->userdata('fullname'))) : ?>
        <div class="text-white text-center"> ยินดีต้อนรับ <Br></Br> <?php  echo $this->session->userdata('fullname');?>
        </div>
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>LogOut</span></a>
        <?php else :  ?>
        <a class="nav-link" href="#" data-toggle="modal" data-target="#myLogin">
            <i class="fas fa-sign-in-alt"></i>
            <span>Login</span></a>
        <?php endif; ?>
    </li>
    <hr class="sidebar-divider">
    <?php  if(!empty($this->session->userdata('fullname'))) : ?>
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-edit"></i>
            <span>เลือกปีรับสมัคร </span>
            <select id="switch_year" name="switch_year" class="custom-select custom-select-sm float-right"
                style="width: 75px;">
                <option <?=$checkYear[0]->openyear_year == ($year[0]->recruit_year)+1 ? 'selected' : '' ;?>
                    value="<?=($year[0]->recruit_year)+1?>"><?=($year[0]->recruit_year)+1?></option>
                <?php foreach ($year as $key => $v_year) : ?>
                <option <?=$checkYear[0]->openyear_year == $v_year->recruit_year ? 'selected' : '' ;?>
                    value="<?=$v_year->recruit_year?>"><?=$v_year->recruit_year?></option>
                <?php endforeach; ?>
            </select>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('admin/admission/').$checkYear[0]->openyear_year?>">
            <i class="fas fa-edit"></i>
            <span>จัดการข้อมูลสมัครเรียน</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?=base_url('admin/news')?>">
            <i class="fas fa-edit"></i>
            <span>จัดการประชาสัมพันธ์</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-window-close"></i>
            <span style="float: none;">เปิดปิดรับสมัคร
                <div class="switchToggle float-right">
                    <input type="checkbox" id="switch" valun="<?=$switch[0]->onoff_regis?>"
                        <?=$switch[0]->onoff_regis == "on" ? 'checked' : '' ?>>
                    <label for="switch">Toggle</label>
                </div>
            </span>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-window-close"></i>
            <span style="float: none;">เปิดปิดระบบ
                <div class="switchToggle float-right">
                    <input type="checkbox" id="switch_sys" valun="<?=$switch[0]->onoff_system?>"
                        <?=$switch[0]->onoff_system == "on" ? 'checked' : '' ?>>
                    <label for="switch_sys">Toggle</label>
                </div>
            </span>
        </a>
    </li>
    <?php endif; ?>

</ul>





<div class="fixed-top d-block d-md-none " style="height: 100vh;overflow: scroll;">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-gradient-success p-4 text-white ">
            <h5 class="">เมนู</h5>
            <Ul style="list-style-type: none;">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item ">
                    <a class="nav-link text-white" href="<?=base_url()?>">
                        <i class="far fa-newspaper"></i>
                        <span>ประชาสัมพันธ์</span></a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item ">
                    <a class="nav-link text-white" href="<?=base_url('Announce')?>">
                        <i class="fas fa-bullhorn"></i>
                        <span>ประกาศรายชื่อผู้สมัคร <br> <i class="fas fa-print"></i> พิมพ์ใบสมัครสอบ
                        </span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item ">
                    <?php if($switch[0]->onoff_regis == 'on'): ?>
                    <a class="nav-link" href="<?=base_url('selectlevel')?>">
                        <i class="fas fa-user-plus"></i>
                        <span>สมัครเรียน</span>
                    </a>
                    <?php else : ?>
                    <span class="nav-link"><i class="fas fa-times-circle"></i> สมัครเรียน (ปิดรับสมัคร)</span>
                    <?php endif; ?>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="<?=base_url('checkRegister')?>">
                        <i class="fas fa-edit"></i>
                        <span>ตรวจสอบและแก้ไขข้อมูล</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item ">

                    <?php  if(!empty($this->session->userdata('fullname'))) : ?>
                    <div class="text-white text-center"> ยินดีต้อนรับ <Br></Br>
                        <?php  echo $this->session->userdata('fullname');?>
                    </div>
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>LogOut</span></a>
                    <?php else :  ?>
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#myLogin">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span></a>
                    <?php endif; ?>
                </li>
                <hr class="sidebar-divider">
                <?php  if(!empty($this->session->userdata('fullname'))) : ?>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="<?=base_url('admin/admission')?>">
                        <i class="fas fa-edit"></i>
                        <span>จัดการข้อมูลสมัครเรียน</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-window-close"></i>
                        <span style="float: none;">เปิดปิดรับสมัคร
                            <div class="switchToggle float-right">
                                <input type="checkbox" id="switch" valun="<?=$switch[0]->onoff_regis?>"
                                    <?=$switch[0]->onoff_regis == "on" ? 'checked' : '' ?> >
                                <label for="switch">Toggle</label>
                            </div>
                        </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-window-close"></i>
                        <span style="float: none;">เปิดปิดระบบ
                            <div class="switchToggle float-right">
                                <input type="checkbox" id="switch_sys" valun="<?=$switch[0]->onoff_system?>"
                                    <?=$switch[0]->onoff_system == "on" ? 'checked' : '' ?>>
                                <label for="switch_sys">Toggle</label>
                            </div>
                        </span>
                    </a>
                </li>

                <?php endif; ?>
            </Ul>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-gradient-success">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="text-white"><i class="fas fa-user-graduate"></i> ระบบรับสมัครนักเรียน ส.ก.จ.</span>

    </nav>
</div>