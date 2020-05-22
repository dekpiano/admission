        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-edit"></i> <?=$title?></h1>
           
          </div>
          <hr>
          <!-- Content Row -->
          <div class="row ">
          
            <div class="col-md-12 order-md-1">
                <div class="container m-auto ">
                    <div class="justify-content-center pt-5">
                        <form class="card card-sm needs-validation" novalidate="" method="post"
                            action="<?=base_url('checkRegister/dataStudent?a=3')?>">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="icofont-search-2"></i>
                                </div>
                                <!--end of col-->
                                <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless "
                                        name="search_stu" type="text" placeholder="ระบุ เลขประจำตัวประชาชน"
                                        value="<?=@$search_stu;?>" required
                                        data-inputmask="'mask': '9-9999-99999-99-9'">
                                    <div class="invalid-feedback">
                                        ระบุเลขประจำตัวประชาชน 13 หลัก
                                    </div>
                                </div>

                            </div>
                    </div>                   
                  
                    <center>
                        
                        <p class="err_verify text-danger"><?=@$err_verify;?></p>
                       
                        <!--end of col-->
                        <div id="html_element" data-callback="onHuman"></div>
                        <INPUT type="hidden" id="captcha" name="captcha" value="">
                        <!--end of col-->
                        <div class="col-auto mt-3">
                            <button class="btn btn-lg btn-success" type="submit"> <i class="fas fa-search"></i> ค้นหา</button>
                        </div>
                    </center>
                    <!--end of col-->
                    </form>
                </div>
            </div>
        </div>
      

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

