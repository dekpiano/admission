<div class="container vh-100 ">

    <!-- Outer Row -->
    <div class="row vh-100">

        <div class=" col-lg-12 col-md-9 align-self-center">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block p-5">
                            <img src="<?=base_url('uploads/students/logoRegis.svg');?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" style="width: 20%;">
                                    <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบรับสมัคร</h1>
                                </div>
                                <form class="user needs-validation" novalidate="" method="post"
                                    action="<?=base_url('StudentCheckLogin')?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-2" placeholder="เลขประจำตัวประชาชน"
                                            required data-inputmask="'mask': '9-9999-99999-99-9'" name="recruit_idCard" id="recruit_idCard">
                                        <div class="invalid-feedback">
                                            ระบุเลขประจำตัวประชาชน 13 หลัก
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-2" placeholder="วัน-เดือน-ปี เกิด (09-07-2534)" name="recruit_birthday" id="recruit_birthday" data-inputmask="'mask': '99-99-9999'" required>
                                        <div class="invalid-feedback">
                                            ระบุวันเดือนปีเกิด
                                        </div>
                                        <small class="text-muted">ตัวอย่าง เกิดวันที่ 9 กรกฏาคม 2534 กรอกดังนี้
                                            09/07/2534</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        เข้าสู่ระบบ
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>