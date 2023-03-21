<div class="pb-4 p-3">
    <h4 class="font-italic ">ยินดีต้อนรับ
        <?php echo $stu[0]->recruit_prefix.$stu[0]->recruit_firstName.' '.$stu[0]->recruit_lastName; ?>
        สู่ระบบรับรายตัวนักเรียนใหม่ออนไลน์</h4>
    
</div>

<form id="contactForm" method="post" action="#">
    <div class="card border border-primary">
        <div class="card-body h5">
            <div class="row mb-3">
                <div class="col-md-6 text-center align-self-center">
                    <img src="<?=base_url('uploads/recruitstudent/m'.$stu[0]->recruit_regLevel.'/img/'.$stu[0]->recruit_img)?>"
                        alt="55" class="img-fluid w-50">
                </div>
                <div class="col-md-6 align-self-center">
                    <p>ชั้นมัธยมศึกษาปีที่ <b><?=$stu[0]->recruit_regLevel;?></b></p>
                    <p> ปีการศึกษา <b>2565</b></p>
                    <p> วันที่รายงานตัว <b><?=$this->datethai->thai_date_fullmonth(strtotime(date("d-m-Y")))?></b></p>
                </div>
            </div>
        </div>

    </div>
    <div class="card border border-danger">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active">คำแนะนำ</li>
                <li class="list-group-item">
                    ให้นักเรียนกรอกข้อมูล ทางด้านซ้ายหรือ สมาร์ทโฟนอยู่ทางด้านบน
                    <ul>
                        <ol>- ข้อมูลนักเรียน <span class="text-danger">(** จำเป็นต้องกรอก **)</span> </ol>
                        <ol>- ข้อมูลบิดาหรือพ่อ <span class="text-danger">(** ถ้าไม่มีข้อมูลบิดา ให้ไปกรอกเมนูของมารดาได้ **)</span></ol>
                        <ol>- ข้อมูลมารดาหรือแม่ <span class="text-danger">(** ถ้าไม่มีข้อมูลมารดา ให้ไปกรอกเมนูของบิดาได้ **)</span></ol>
                        <ol>- ข้อมูลผู้ปกครองที่นักเรียนอยู่ด้วยในปัจจุบัน <span class="text-danger">(** จำเป็นต้องกรอก คนที่นักเรียนอาศัยอยู่ด้วย **)</span></ol>
                    </ul>
                </li>
                <li class="list-group-item">เมื่อกรอกข้อมูลสำเร็จจะมีเครื่องหมาย ( <i class="fa fa-check mr-2 "></i>
                    กรอกข้อมูลแล้ว) </li>
                <li class="list-group-item">แต่เมื่อยังไม่กรอกข้อมูลหรือกรอกไม่สำเร็จจะมีเครื่องหมาย ( <i
                        class="fa fa-times mr-2 "></i> ยังไม่กรอกข้อมูล)</li>
                <li class="list-group-item">เมื่อกรอกข้อมูลครบทุกรายการ นักเรียนจะสามารถพิมพ์ใบยืนยันรายงานตัวได้ 
                <?php if($Ckeckstu == 1 && $OtherCkeck == 1): ?>
                    <a target="_blank" href="<?=base_url('Confirm/Print');?>"
                    class="btn btn-info">พิมพ์ใบยืนยันรายงานตัว</a>
                    <?php else: ?>
                        <a href="#" id="checkPirnt" class="btn btn-info checkPirnt">พิมพ์ใบยืนยันรายงานตัว</a>
                        <?php endif; ?>

                </li>
                <li class="list-group-item">เป็นอันเสร็จสิ้นการรายงานตัวออนไลน์</li>
                <li class="list-group-item">
                    <p>ตัวอย่างใบยืนยันการรายงานตัวออนไลน์ เมื่อกดพิมพ์ใบยืนยัน</p>
                    <img src="<?=base_url('uploads/confirm/img1.PNG');?>" alt="" class="img-fluid">
                    <p>(นักเรียนสามารถแคปหน้าจอไว้หรือบันทึกเป็นไฟล์ PDF ถ้าไม่สะดวกพิมพ์
                        เพื่อไว้ยืนยันเวลาส่งเอกสารหลักฐาน)</p>
                </li>
                <li class="list-group-item">ใบมอมตัวที่กรอกข้อมูลแล้ว ทางโรงเรียนเตรียมไว้ให้เพื่อความสะดวก</li>
                <li class="list-group-item">ให้นักเรียนนำหลักฐานสำเนาเพื่อยื่นให้ทางโรงเรียน</li>
            </ul>
        </div>

    </div>
</form>