<div class="page-content align-items-stretch ">
    <!-- Side Navbar -->
    <div class="container mt-3 mb-3">
        <div class="row align-items-center">
            <div class="col-2"></div>
            <div class="col-12">
                <h4 class="mb-3 mt-0">ระบบมอบตัวออนไลน์การเป็นนักเรียนโรงเรียนสวนกุหลาบวิทยาลัย
                    (จิรประวัติ) นครสวรรค์</h4>
                <div id="basicwizard">
                    <ul class="nav nav-tabs nav-justified mb-3">
                        <li class="nav-item" data-target-form="#contactDetailForm">
                            <a href="#contactDetail" data-bs-toggle="tab" data-toggle="tab"
                                class="nav-link icon-btn active">
                                <i class="bx bxs-contact me-1"></i>
                                <span class="d-none d-sm-inline">หน้าแรก</span>
                            </a>
                        </li>
                        <!-- end nav item -->
                        <li class="nav-item" data-target-form="#studentForm">
                            <a href="#studentForm" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                                <i class="bx bxs-building me-1"></i>
                                <span class="d-none d-sm-inline">ข้อมูลนักเรียน (ตัวเอง)</span>
                            </a>
                        </li>
                        <!-- end nav item -->
                        <li class="nav-item" data-target-form="#fatherForm">
                            <a href="#fatherForm" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                                <i class="bx bxs-book me-1"></i>
                                <span class="d-none d-sm-inline">ข้อมูลบิดา (พ่อ)</span>
                            </a>
                        </li>
                         <!-- end nav item -->
                         <li class="nav-item" data-target-form="#matherForm">
                            <a href="#matherForm" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                                <i class="bx bxs-book me-1"></i>
                                <span class="d-none d-sm-inline">ข้อมูลมารดา (แม่)</span>
                            </a>
                        </li>
                        <!-- end nav item -->
                        <li class="nav-item">
                            <a href="#finish" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                                <i class="bx bxs-check-circle me-1"></i>
                                <span class="d-none d-sm-inline">Finish</span>
                            </a>
                        </li>
                        <!-- end nav item -->
                    </ul>
                    <!-- nav pills -->


                    <div class="tab-content mb-0 pt-0">

                        <!-- START: Define your tab pans here -->

                        <div class="tab-pane show active" id="contactDetail">
                            <form id="contactForm" method="post" action="#">
                                <div class="card border border-primary">
                                    <div class="card-body h5">


                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                ชั้นมัธยมศึกษาตอนต้นปีที่ <b>1</b>
                                            </div>
                                            <div class="col-md-4">
                                                ห้อง <b>1</b>
                                            </div>
                                            <div class="col-md-4">
                                                ปีการศึกษา <b>2565</b>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                ชื่อนักเรียน <b>2565</b>
                                            </div>
                                            <div class="col-md-6">
                                                นามสกุล <b>2565</b>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                วันที่
                                                <b><?=$this->datethai->thai_date_fullmonth(strtotime(date("d-m-Y")))?></b>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-md-12 text-center h5">
                                    ขอรับรองว่าข้าพเจ้าจะมอบตัวเป็นนักเรียนของโรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ)
                                    นครสวรรค์ <br>
                                    โดยปฏิบัติคำสั่งกฎระเบียบ
                                    ข้อบังคับทุกประการและปฏิบัติตัวถูกต้องตามระเบียบของโรงเรียน
                                    <div class="form-check mt-3">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input class="custom-control-input" type="checkbox" id="tt" value="option1"
                                                required>
                                            <label class="custom-control-label" for="tt">ยอมรับและมอบตัว</label>
                                        </div>

                                        <div class="invalid-feedback">
                                            ยอมรับและมอบตัว
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- end contact detail tab pane -->
                        <div class="tab-pane" id="studentForm">
                            <!-- end basicwizard -->
                            <div class="card border border-primary">
                                <div class="card-body h6">
                                    <form id="jobForm" method="post" action="#">
                                        <h5 class="my-3">ข้อมูลนักเรียน</h5>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">รหัสประจำตัวประชาชน
                                                13 หลัก</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="รหัสประจำตัวประชาชน 13 หลัก"
                                                    required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">วันที่เกิด</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สถานที่เกิด</label>
                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ตำบล"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อำเภอ"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="จังหวัด"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="โรงพยาบาล"
                                                            required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">เชื้อชาติ</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุเชื้อชาติ" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สัญชาติ</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุสัญชาติ" required11>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ศาสนา</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุศาสนา" required11>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">กรุ๊ปเลือด</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุกรุ๊ปเลือด" required11>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">โรคประจำตัว
                                                (ระบุ)</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุโรคประจำตัว" required11>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">จำนวนพี่น้องทั้งหมด
                                                <br> <small> (รวมทั้งตัวนักเรียนเองด้วย)</small> </label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุจำนวนพี่น้องทั้งหมด"
                                                    required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">นักเรียนเป็นลูกคนที่</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุจำนวน" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-7 col-form-label col-form-label">พี่น้องเรียนในโรงเรียนสวนกุหลาบวิทยาลัย
                                                (จิรประวัติ) นครสวรรค์ (รวมตัวนักเรียนเองด้วย)</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุจำนวน" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ชื่อเล่นของนักเรียน</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุชื่อเล่น" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ความพิการ</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุความพการ ถ้ามี..." required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">น้ำหนัก</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุน้ำหนัก กิโลกรัม" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ส่วนสูง</label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุส่วนสูง ซม." required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ความสามารถพิเศษ</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุความสามารถพิเศษ" required11>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สภาพบิดา
                                                -
                                                มารดา</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="inlineCheckbox1" value="option1">
                                                    <label class="custom-control-label"
                                                        for="inlineCheckbox1">อยู่ด้วยกัน</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="inlineCheckbox2" value="option2">
                                                    <label class="custom-control-label"
                                                        for="inlineCheckbox2">แยกกันอยู่</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="inlineCheckbox3" value="option3">
                                                    <label class="custom-control-label"
                                                        for="inlineCheckbox3">หย่าร้าง</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="inlineCheckbox3" value="option3">
                                                    <label class="custom-control-label"
                                                        for="inlineCheckbox3">บิดาถึงแก่กรรม</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="inlineCheckbox3" value="option3">
                                                    <label class="custom-control-label"
                                                        for="inlineCheckbox3">มารดาถึงแก่กรรม</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox"
                                                        id="inlineCheckbox3" value="option3">
                                                    <label class="custom-control-label"
                                                        for="inlineCheckbox3">บิดาหรือมารดาแต่งงานใหม่</label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สภาพความเป็นอยู่ปัจจุบัน</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="custom-control-label"
                                                        for="inlineRadio1">อยู่กับบิดาและมารดา</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="custom-control-label"
                                                        for="inlineRadio2">อยู่กับบิดาหรือมารดา
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3"> อื่นๆ
                                                    </label>
                                                    <input type="text" id="input1" class="textbox form-control"
                                                        placeholder="เช่น ลุง ป้า ตา ยาย">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ทีอยู่ตามทะเบียนบ้าน</label>
                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="รหัสประจำบ้าน" required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="บ้านเลขที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="หมู่ที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ถนน"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ตำบล"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อำเภอ"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="จังหวัด"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="รหัสไปรษณีย์" required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="เบอร์โทรศัพท์ (นักเรียน)" required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อีเมล"
                                                            required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ทีอยู่ปัจจุบัน ( <div
                                                    class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox" id="tt"
                                                        value="option1">
                                                    <label class="custom-control-label" for="tt">ตามทะเบียนบ้าน</label>
                                                </div>)</label>

                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="บ้านเลขที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="หมู่ที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ถนน"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ตำบล"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อำเภอ"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="จังหวัด"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="รหัสไปรษณีย์" required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="เบอร์โทรศัพท์" required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สภาพความเป็นอยู่ปัจจุบัน</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="custom-control-label"
                                                        for="inlineRadio1">บ้านตนเอง</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="custom-control-label" for="inlineRadio2">เช่าอยู่
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3">
                                                        อาศัยผู้อื่นอยู่
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3">
                                                        บ้านพักราชการ
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3"> วัด </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3"> หอพัก
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ระยะทางอยู่ห่างจากโรงเรียน
                                            </label>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ใส่เป็นกิโลเมตร" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">เดินทางโดย </label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="เช่น รถยนต์ เรือ เดิน" required11>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">จบการศึกษาชั้น
                                            </label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระดับชั้น" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">จากโรงเรียน
                                            </label>
                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="ชื่อโรงเรียน" required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ตำบล"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อำเภอ"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="จังหวัด"
                                                            required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">เคยเป็นนักเรียนโรงเรียนสวนกุหลาบวิทยาลัย(จิรประวัติ)
                                                นครสวรรค์</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="custom-control-label" for="inlineRadio2">ไม่เคย
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3"> เคย </label>
                                                    <input type="text" id="input1" class="ml-2 textbox form-control"
                                                        placeholder="ระบุชั้นเรียน เช่น ม.2, ม.4">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">โทรศัพท์ติดต่อฉุกเฉิน
                                            </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุเบอร์โทรศัพท์" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">โทรศัพท์เพื่อนบ้านใกล้เคียง
                                            </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุเบอร์โทรศัพท์" required11>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end job detail tab pane -->

                        <div class="tab-pane" id="fatherForm">
                            <div class="card border border-primary">
                                <div class="card-body h6">
                                    <form id="jobForm" method="post" action="#">
                                        <h5 class="my-3">ข้อมูลบิดา</h5>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ชื่อ-นามสกุลบิดา</label>
                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-4 mb-2">
                                                        <input type="text" class="form-control" placeholder="ชื่อจริง"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-4 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="นามสกุลจริง" required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">อายุ</label>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุอายุ" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">รหัสประจำตัวประชาชน
                                                13 หลัก</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control form-control" id="colFormLabelLg"
                                                    placeholder="ระบุเลข 13 หลัก" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">เชื้อชาติ</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุเชื้อชาติ" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สัญชาติ</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุสัญชาติ" required11>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ศาสนา</label>
                                            <div class="col-sm-2">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุศาสนา" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">อาชีพ</label>
                                            <div class="col-sm-3">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุลักษณะอาชีพ" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">วุฒิการศึกษา</label>
                                            <div class="col-sm-3">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุวุฒิการศึกษา" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">เงินเดือน/รายได้</label>
                                            <div class="col-sm-3">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุเงินเดือน/รายได้" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ตำแหน่งหน้าที่การงาน</label>
                                            <div class="col-sm-3">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุตำแหน่งหน้าที่การงาน"
                                                    required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">หมายเลขโทรศัพท์มือถือ</label>
                                            <div class="col-sm-3">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ระบุโทรศัพท์มือถือ" required11>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ถึงแก่กรรมเมื่อวันที่</label>
                                            <div class="col-sm-3">
                                                <input type="email" class="form-control form-control"
                                                    id="colFormLabelLg" placeholder="ยังไม่ถึงแก่กรรม ไม่ต้องระบุ"
                                                    required11>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ที่อยู่ตามทะเบียนบ้าน</label>
                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="บ้านเลขที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="หมู่ที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ตำบล"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อำเภอ"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="จังหวัด"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="รหัสไปรษณีย์" required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ทีอยู่ปัจจุบัน ( <div
                                                    class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="custom-control-input" type="checkbox" id="ttt"
                                                        value="option1">
                                                    <label class="custom-control-label" for="ttt">ตามทะเบียนบ้าน</label>
                                                </div>)</label>

                                            <div class="col-sm-9">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="บ้านเลขที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="หมู่ที่"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="ตำบล"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="อำเภอ"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control" placeholder="จังหวัด"
                                                            required11>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-2">
                                                        <input type="text" class="form-control"
                                                            placeholder="รหัสไปรษณีย์" required11>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">ลักษณะที่พัก</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="custom-control-label"
                                                        for="inlineRadio1">บ้านตนเอง</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="custom-control-label" for="inlineRadio2">เช่าอยู่
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3">
                                                        อาศัยผู้อื่นอยู่
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                    <label class="custom-control-label" for="inlineRadio3">
                                                        บ้านพักราชการ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">กรณีรับราชการ
                                                <br><small class="text-danger">ถ้าไม่ได้รับราชการไม่ต้องเลือก</small>
                                            </label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio ">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="a1" value="option1">
                                                    <label class="custom-control-label" for="a1">กระทรวง
                                                        <div id="dvPassport" style="display: none">
                                                            <input type="text" class="form-control"
                                                                placeholder="ระบุกระทรวง" required11>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="a2" value="option2">
                                                    <label class="custom-control-label" for="a2">กรม
                                                        <div id="dvPassport" style="display: none">
                                                            <input type="text" class="form-control"
                                                                placeholder="ระบุกรม" required11>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="a3" value="option3">
                                                    <label class="custom-control-label" for="a3">
                                                        กอง
                                                        <div id="dvPassport" style="display: none">
                                                            <input type="text" class="form-control"
                                                                placeholder="ระบุกอง" required11>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="a4" value="option3">
                                                    <label class="custom-control-label" for="a4">
                                                        ฝ่าย/แผนก
                                                        <div id="dvPassport" style="display: none">
                                                            <input type="text" class="form-control"
                                                                placeholder="ระบุฝ่าย/แผนก" required11>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabelLg"
                                                class="col-sm-3 col-form-label col-form-label">สิทธ์ในการเบิกค่าเล่าเรียนบุตร</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="custom-control-label"
                                                        for="inlineRadio1">เบิกได้</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="custom-control-label" for="inlineRadio2">เบิกไม่ได้
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end education detail tab pane -->
                        <div class="tab-pane" id="finish">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <i class="bx bx-check-double h5"></i>
                                        <h3 class="mt-0">Thank you !</h3>
                                        <div class="mb-3">
                                            <div class="form-check d-inline-block">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                    required11 />
                                                <label class="custom-control-label" for="customCheck1">I agree with the
                                                    Terms and Conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>

                        <!-- END: Define your tab pans here -->

                        <!-- START: Define your controller buttons here-->
                        <div class="d-flex wizard justify-content-between mt-3">
                            <div class="first">
                                <a href="javascript:void(0);" class="btn btn-primary">
                                    หน้าแรก
                                </a>
                            </div>
                            <div class="d-flex">
                                <div class="previous me-2">
                                    <a href="javascript:void(0);" class="btn icon-btn btn-primary">
                                        <i class="bx bx-left-arrow-alt me-2"></i>ย้อนกลับ
                                    </a>
                                </div>
                                <div class="next">
                                    <a href="javascript:void(0);" class="btn icon-btn btn-primary mt-3 mt-md-0">
                                        ถัดไป<i class="bx bx-right-arrow-alt ms-2"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="last">
                                <a href="javascript:void(0);" class="btn btn-primary mt-3 mt-md-0">
                                    Finish
                                </a>
                            </div>
                        </div>

                        <!-- END: Define your controller buttons here-->

                    </div>
                    <!-- end tab content-->



                </div>








            </div>
            <div class="col-2"></div>

        </div>

    </div>

</div>