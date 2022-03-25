<h4 class="font-italic mb-4">ยินดีต้อนรับ
    <?php echo $stu[0]->recruit_prefix.$stu[0]->recruit_firstName.' '.$stu[0]->recruit_lastName; ?>
    สู่ระบบรับรายตัวนักเรียนใหม่ออนไลน์</h4>
<form id="contactForm" method="post" action="#">
    <div class="card border border-primary">
        <div class="card-body h5">

            <div class="row mb-3">
                <div class="col-md-6">
              <img src="<?=base_url('uploads/recruitstudent/m'.$stu[0]->recruit_regLevel.'/'.$stu[0]->recruit_img)?>" alt="55" class="img-fluid">
                </div>
                <div class="col-md-6">
                   <p>ชั้นมัธยมศึกษาตอนต้นปีที่ <b>1</b></p> 
                  <p> ปีการศึกษา <b>2565</b></p> 
                <p> วันที่รายงานตัว <b><?=$this->datethai->thai_date_fullmonth(strtotime(date("d-m-Y")))?></b></p>
                   
                    
                </div>
            </div>
        </div>

    </div>
    <!-- <div class="col-md-12 text-center h5">
        ขอรับรองว่าข้าพเจ้าจะมอบตัวเป็นนักเรียนของโรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ)
        นครสวรรค์ <br>
        โดยปฏิบัติคำสั่งกฎระเบียบ
        ข้อบังคับทุกประการและปฏิบัติตัวถูกต้องตามระเบียบของโรงเรียน
        <div class="form-check mt-3">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input class="custom-control-input" type="checkbox" id="tt" value="option1" required>
                <label class="custom-control-label" for="tt">ยอมรับและมอบตัว</label>
            </div>

            <div class="invalid-feedback">
                ยอมรับและมอบตัว
            </div>
        </div>
    </div> -->
</form>