        <!-- Begin Page Content -->
        <div class="container-fluid mt-6">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-edit"></i> เข้าสู่ระบบรับสมัครนักเรียน</h1>

            </div>
            <hr>


            <div class="">
                <div class="row justify-content-sm-center">
                    <div class="col-sm-5 col-md-8">
                        <div class="card border-success">
                            <div class="card-header bg-gradient-success text-while">เข้าสู่ระบบรับสมัคร</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12 text-center">
                                        <img src="https://skj.ac.th/uploads/logo/LogoSKJ_4.png" style="width: 100%;">
                                       
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <form class="form-signin needs-validation" novalidate="" method="post" action="<?=base_url('checkRegister/dataStudent?a=3')?>" >
                                            <input type="text" class="form-control mb-2"
                                                placeholder="เลขประจำตัวประชาชน" required
                                                data-inputmask="'mask': '9-9999-99999-99-9'" name="search_stu">
                                            <div class="invalid-feedback">
                                                ระบุเลขประจำตัวประชาชน 13 หลัก
                                            </div>
                                            <!-- <input type="text" class="form-control mb-2" placeholder="วันเดือนปีเกิด (05-07-2534)" data-inputmask="'mask': '99-99-9999'"
                                                required>
                                                <div class="invalid-feedback">
                                                ระบุวันเดือนปีเกิด
                                            </div> -->
                                            <!--end of col-->
                                            <div id="html_element" data-callback="onHuman"></div>
                                            <INPUT type="hidden" id="captcha" name="captcha" value="">
                                            <!--end of col-->
                                            <button class="btn btn-lg btn-success btn-block mb-1" type="submit">เข้าสู่ระบบ</button>                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>



        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->