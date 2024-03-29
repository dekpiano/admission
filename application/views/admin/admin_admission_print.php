<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <?php $this->load->view('admin/layout/menu_left_admin.php');?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"><?=$title;?></h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="container-fluid mt-3">

            <div class="container-fluid">

                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a
                                    href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                    href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">ตัวเลือก</h3>
                    </div>
                    <div class="card-body">
                        <form id="DownloadRecruit">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">ปีการศึกษา</label>
                                    <select name="SelYear" id="SelYear" class="form-control mr-3" required>
                                        <option value="">เลือกปีการศึกษา</option>
                                        <?php foreach ($CountYear as $key => $v_CountYeare) : ?>
                                        <option value="<?=$v_CountYeare->recruit_year?>">
                                            <?=$v_CountYeare->recruit_year?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">รอบที่สมัคร</label>
                                    <select name="SelQuota" id="SelQuota" class="form-control mr-3" required>
                                        <option value="">เลือกรอบที่สมัคร</option>
                                        <?php foreach ($quota as $key => $v_quota) : ?>
                                        <option value="<?=$v_quota->quota_key?>"><?=$v_quota->quota_explain?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">ระดับ</label>
                                    <select name="SelLevel" id="SelLevel" class="form-control mr-3">
                                        <option value="">เลือกระดับชั้น</option>
                                        <option value="ม.ต้น">ม.ต้น</option>
                                        <option value="ม.ปลาย">ม.ปลาย</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">ชั้น</label>
                                    <select name="SelFloor" id="SelFloor" class="form-control mr-3" required>
                                        <option value="">เลือกชั้น</option>
                                        <option value="1">ม.1</option>
                                        <option value="2">ม.2</option>
                                        <option value="3">ม.3</option>
                                        <option value="4">ม.4</option>
                                        <option value="5">ม.5</option>
                                        <option value="6">ม.6</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">หลักสูตร</label>
                                    <select name="SelCourse" id="SelCourse" class="form-control mr-3">
                                        <option value="">เลือกหลักสูตร</option>
                                       
                                    </select>
                                </div>
                               
                                <div class="col-md-2" style="white-space-collapse: preserve-breaks;">
                                    <button type="submit" id="submit_btn" class="btn btn-primary">ค้นหา</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </section>


    </div>
</div>

</div>
<!-- End of Main Content -->