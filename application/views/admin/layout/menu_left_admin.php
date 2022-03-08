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
        <li <?=$this->uri->segment('2') == "admission" ? 'class="active"' : ''?> > <a href="<?=base_url('admin/admission/'.$this->session->userdata('year'));?>"> <i class="far fa-edit"></i>
                ข้อมูลรับสมัคร </a></li>
        <li <?=$this->uri->segment('2') == "Statistic" ? 'class="active"' : ''?>> <a href="<?=base_url('admin/Statistic/'.$this->session->userdata('year'));?>"> <i class="fas fa-chart-bar"></i>
                สถิติ </a></li>
        <li <?=$this->uri->segment('2') == "Print" ? 'class="active"' : ''?>> <a href="<?=base_url('admin/Print/'.$this->session->userdata('year'));?>"> <i class="fas fa-print"></i>
                พิมพ์ใบสมัคร </a></li>

    </ul>
    <ul class="list-unstyled">
        <li <?=$this->uri->segment('2') == "system" ? 'class="active"' : ''?>> <a href="<?=base_url('admin/system/'.$this->session->userdata('year'));?>"> <i class="fas fa-stream"></i>
                สถานะระบบ </a></li>
    </ul>
</nav>