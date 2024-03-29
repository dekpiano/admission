<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            <i class="fas fa-user fa-3x"></i>
        </div>
        <div class="title">
            <h1 class="h4"><?php echo $this->session->userdata('fullname');?></h1>
            <!-- <p>Web Designer</p> -->
        </div>
    </div>
    <span class="heading">ข้อมูลระบบ</span>

    <ul class="list-unstyled">
        <li <?=$this->uri->segment('2') == "Recruitment" ? 'class="active"' : ''?>>
            <a href="<?=base_url('admin/Recruitment/'.$this->session->userdata('year'));?>">
                <i class="far fa-edit"></i>
                ข้อมูลการรับสมัคร </a>
        </li>
        <li <?=$this->uri->segment('2') == "PrintConfirm" ? 'class="active"' : ''?>>
            <a href="<?=base_url('admin/PrintConfirm/'.$this->session->userdata('year'));?>">
                <i class="fas fa-print"></i>
                ข้อมูลการรายงานตัว </a>
        </li>
        <li <?=$this->uri->segment('2') == "Quiz" ? 'class="active"' : ''?>>
            <a href="<?=base_url('admin/Quiz/'.$this->session->userdata('year'));?>">
                <i class="fas fa-print"></i>
                ข้อมูลการสอบ </a>
        </li>
        <li <?=$this->uri->segment('2') == "Surrender" ? 'class="active"' : ''?>>
            <a href="<?=base_url('admin/Surrender/'.$this->session->userdata('year'));?>">
                <i class="fas fa-print"></i>
                ข้อมูลการมอบตัว </a>
        </li>
    </ul>

    <ul class="list-unstyled">
        <li <?=$this->uri->segment('2') == "Statistic" ? 'class="active"' : ''?>> <a
                href="<?=base_url('admin/Statistic/'.$this->session->userdata('year'));?>"> <i
                    class="fas fa-chart-bar"></i>
                สถิติ </a></li>
        <li <?=$this->uri->segment('2') == "Print" ? 'class="active"' : ''?>> <a
                href="<?=base_url('admin/Print/'.$this->session->userdata('year'));?>"> <i class="fas fa-print"></i>
                พิมพ์ใบสมัครทั้งหมด </a></li>
    </ul>
    <ul class="list-unstyled">
        <li <?=$this->uri->segment('2') == "system" ? 'class="active"' : ''?>> <a
                href="<?=base_url('admin/system/'.$this->session->userdata('year'));?>"> <i class="fas fa-stream"></i>
                ตั้งค่าระบบ </a></li>
        <li <?=$this->uri->segment('2') == "AdminRloes" ? 'class="active"' : ''?>> <a
                href="<?=base_url('admin/system/'.$this->session->userdata('year'));?>"> <i class="fas fa-stream"></i>
                ตั้งค่าสิทธ์การใช้งาน </a></li>
    </ul>

</nav>