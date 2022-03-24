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
                                <input class="custom-control-input" type="checkbox" id="tt" value="option1" required>
                                <label class="custom-control-label" for="tt">ยอมรับและมอบตัว</label>
                            </div>

                            <div class="invalid-feedback">
                                ยอมรับและมอบตัว
                            </div>
                        </div>
                    </div>
                </form>