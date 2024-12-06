         <!-- Page Footer-->
          <?php if($this->uri->segment(1) !== "RegStudent") :?>
         <footer class="main-footer" style="position: static;">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-sm-5">
                         <p>โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์ © 2020</p>
                     </div>
                     <div class="col-sm-4">
                         <div id="histats_counter"></div>

                     </div>

                     <div class="col-sm-3 text-right">
                         <p>Design by <a href="<?=base_url('loginAdmin');?>" class="" data-toggle1="modal"
                                 data-target1="#LoginAdmin">Dekpiano</a>
                         </p>
                     </div>
                 </div>
             </div>
         </footer>
         <?php endif; ?>
         </div>

         </div>

         </body>

         <!-- Modal แจ้งเตือนรายงานตัวออนไลน์ -->
         <div class="modal fade" id="AlertConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="alert alert-danger" role="alert"> ระบบยังไม่เปิดให้รายงานตัว กรุณารอ... </div>
                         ** หมั่นตรวจสอบข้อมูลหน้าเว็บไซต์รับสมัครนักเรียน หรือ เพจ Facebook โรงเรียน สกจ.
                     </div>

                 </div>
             </div>
         </div>

         <!-- Modal-->
         <div id="LoginAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
             class="modal fade text-left">
             <div role="document" class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 id="exampleModalLabel" class="modal-title">Login Admin</h4>
                         <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                 aria-hidden="true">×</span></button>
                     </div>
                     <div class="modal-body">
                         <form method="post" action="<?=base_url('Control_login/validlogin');?>">
                             <input type="text" class="d-none" name="openyear_year"
                                 value="<?=$checkYear[0]->openyear_year;?>">
                             <div class="form-group">
                                 <label>Username</label>
                                 <input type="email" name="username" id="username" placeholder="Email Address"
                                     class="form-control">
                             </div>
                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" id="password" name="password" placeholder="Password"
                                     class="form-control">
                             </div>
                             <div class="form-group">
                                 <input type="submit" value="Signin" class="btn btn-primary">
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Modal-->
         <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
             class="modal fade text-left">
             <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 id="exampleModalLabel" class="modal-title">เลือกการสมัคร</h4>
                         <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                 aria-hidden="true">×</span></button>
                     </div>
                     <div class="modal-body">
                         <?php if($switch[0]->onoff_regis == "off") :?>
                         <?php echo $switch[0]->onoff_comment; ?>
                         <?php else : ?>

                         <div class="row">
                             <?php foreach ($quota as $key => $v_quota) :?>
                             <?php if($v_quota->quota_status == "on"): ?>
                             <div class="col-md-6">
                                 <div class="card" style="border: 2px solid #2b90d9;">
                                     <div class="card-body">
                                         <h5 class="card-title"><?=$v_quota->quota_explain?></h5>
                                         <?php if($v_quota->quota_key == "quotasport"):?>
                                         <h6 class="card-title text-danger">(เฉพาะนักเรียนที่ผ่านการคัดตัวเท่านั้น)
                                         </h6>
                                         <?php endif; ?>
                                         <?php  $q = explode("|",$v_quota->quota_level);
                                        foreach ($q as $key => $v_q) : ?>
                                         <a href="<?=base_url('RegStudent/'.$v_q.'/'.$v_quota->quota_key);?>"
                                             class="btn btn-primary mb-1">สมัครเรียน ม.<?=$v_q;?></a>
                                         <?php endforeach; ?>
                                     </div>
                                 </div>
                             </div>
                             <?php endif; ?>
                             <?php endforeach; ?>

                         </div>
                         <?php endif; ?>


                     </div>

                 </div>
             </div>
         </div>

         </html>

         <!-- JavaScript files-->
         <script src="<?=base_url();?>asset/vendor/jquery/jquery.min.js"></script>
         <!-- jQuery UI -->
         <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
         <script src="<?=base_url();?>asset/vendor/popper.js/umd/popper.min.js"> </script>
         <script src="<?=base_url();?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
         <script src="<?=base_url();?>asset/vendor/jquery.cookie/jquery.cookie.js"> </script>
         <script src="<?=base_url();?>asset/vendor/chart.js/Chart.min.js"></script>
         <script src="<?=base_url();?>asset/vendor/jquery-validation/jquery.validate.min.js"></script>
         <!-- Main File-->
         <script src="<?=base_url();?>asset/js/front.js"></script>
         <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
         </script>
         <!-- DataTable-->
         <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
         <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
         <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
         <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
         <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
         <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

         <script type="text/javascript"
             src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
         <script type="text/javascript"
             src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js">
         </script>

         <script type="text/javascript"
             src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js">
         </script>

         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>

         <?php if($this->uri->segment(1) == "RegStudent"):?>
         <script src="<?=base_url()?>asset/js/AutoProvince.js?v=7.2"></script>
         <script src="<?=base_url()?>asset/js/RegStudent.js?v=5"></script>
         <?php elseif($this->uri->segment(1) == "Confirm"):?>
         <script src="<?=base_url()?>asset/js/ConfirmStudent.js?v=21.1"></script>
         <script src="<?=base_url()?>asset/js/login.js?v=7"></script>
         <?php endif; ?>

         <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
         <script src="<?=base_url()?>asset/js/ShowPerviewImg.js?v=2"></script>
         <script src="<?=base_url()?>asset/js/CountdownTimer.js?v=16"></script>
         <script>
$(document).ready(function() {
    $('#TB_CheckRegister').DataTable({
        order: [
            [0, 'desc']
        ],
        autoWidth: false,
        responsive: true,
        columnDefs: [{
            width: '3%',
            targets: 0
        }, {
            width: '20%',
            targets: 1
        }, {
            width: '5%',
            targets: 2
        }, {
            width: '22%',
            targets: 5
        }, {
            width: '12%',
            targets: 6
        }]
    });
});
         </script>
         <!-- Histats.com  START  (aync)-->
         <script type="text/javascript">
var _Hasync = _Hasync || [];
_Hasync.push(['Histats.start', '1,4498483,4,205,255,27,00010001']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
    var hs = document.createElement('script');
    hs.type = 'text/javascript';
    hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0])
    .appendChild(hs);
})();
         </script>
         <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4498483&101" alt=""
                     border="0"></a></noscript>

         <?php  if($this->session->flashdata('msg') == 'NO' ):?>
         <script>
Swal.fire("แจ้งเตือน", "<?=$this->session->flashdata('messge');?>", "<?=$this->session->flashdata('status');?>");
         </script>
         <?php elseif($this->session->flashdata('msg') == 'Yes'):?>
         <script>
Swal.fire("แจ้งเตือน", "<?=$this->session->flashdata('messge');?>", "<?=$this->session->flashdata('status');?>");
         </script>
         <?php endif; $this->session->mark_as_temp('msg',20); ?>
         <script>
$(".checkPirnt").click(function() {
    Swal.fire("แจ้งเตือน",
        "ให้นักเรียนตรวจสอบข้อมูล <br> -ข้อมูลนักเรียน (จำเป็นต้องกรอก)<br> -ข้อมูลบิดา มารดา ถ้ามีในกรอกทั้ง 2 คน หรือ ถ้าไม่มีกรอกข้อมูล บิดา หรือ มารดา ก็ได้ <br> -ข้อมูลผู้ปกครอง  (จำเป็นต้องกรอก)<br> .ให้ครบถ้วนก่อนถึงจะพิมพ์ใบยืนยันรายงานตัวได้",
        "warning");
});
//  Google Check
function onHuman(response) {
    document.getElementById('captcha').value = response;
}
var onloadCallback = function() {
    grecaptcha.render('html_element', {
        'sitekey': '6LdZePgUAAAAAA5sewT1jFoUrRv7E7TGBg6fN6Zs'
    });
};
// รูปแบบการกรอก
$('#CheckIdStudent').inputmask({
    mask: "9-9999-99999-99-9", // กำหนดรูปแบบ 9-9999-99999-99-9
    placeholder: "", // ไม่แสดง placeholder
    showMaskOnHover: false // ไม่แสดงขณะ hover
});

$(":input").inputmask();

$("#idenStu").inputmask("9-9999-99999-99-9", {
    "onincomplete": function() {
        alert('กรอกเลขประจำตัวประชาชนให้ครบ 13 หลัก');
    }
});
$("#par_IdNumber").inputmask("9-9999-99999-99-9", {
    "onincomplete": function() {
        alert('กรอกเลขประจำตัวประชาชนให้ครบ 13 หลัก');
    }
});
$("#par_IdNumberM").inputmask("9-9999-99999-99-9", {
    "onincomplete": function() {
        alert('กรอกเลขประจำตัวประชาชนให้ครบ 13 หลัก');
    }
});
$("#par_IdNumberO").inputmask("9-9999-99999-99-9", {
    "onincomplete": function() {
        alert('กรอกเลขประจำตัวประชาชนให้ครบ 13 หลัก');
    }
});


$(document).on('click', '#BtnSubmitRegister', function() {
    $(this).html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังบันทึกข้อมูล...'
        );
    // $(this).prop('disabled', true); // Disable button to prevent multiple clicks
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire("แจ้งเตือน", "กรุณากรอกข้อมูลให้ครบ!", "warning");
                    $('#BtnSubmitRegister').html('สมัครเรียน');
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


$('.T_m1 thead th').each(function(i) {
    var total = 0;
    $('.T_m1 tr').each(function() {
        var value = parseInt($('td', this).eq(i + 1).text());
        if (!isNaN(value)) {
            total += value;
        }
    });
    $('.T_m1 tfoot td').eq(i + 1).text(total);
});

$('.T_m4 thead th').each(function(i) {
    var total = 0;
    $('.T_m4 tr').each(function() {
        var value = parseInt($('td', this).eq(i + 1).text());
        if (!isNaN(value)) {
            total += value;
        }
    });
    $('.T_m4 tfoot td').eq(i + 1).text(total);
});

$('.T_m1_N thead th').each(function(i) {
    var total = 0;
    $('.T_m1_N tr').each(function() {
        var value = parseInt($('td', this).eq(i + 1).text());
        if (!isNaN(value)) {
            total += value;
        }
    });
    $('.T_m1_N tfoot td').eq(i + 1).text(total);
});

$('.T_m4_N thead th').each(function(i) {
    var total = 0;
    $('.T_m4_N tr').each(function() {
        var value = parseInt($('td', this).eq(i + 1).text());
        if (!isNaN(value)) {
            total += value;
        }
    });
    $('.T_m4_N tfoot td').eq(i + 1).text(total);
});

$('.T_m1_N tr,.T_m4_N tr').each(function() {
    //the value of sum needs to be reset for each row, so it has to be set inside the row loop
    var sum = 0
    //find the combat elements in the current row and sum it 
    $(this).find('.numN').each(function() {
        var combat = $(this).text();
        if (!isNaN(combat) && combat.length !== 0) {
            sum += parseFloat(combat);
        }
    });
    //set the value of currents rows sum to the total-combat element in the current row
    $('.total-numN', this).html(sum);
});

$(document).ready(function() {
    $('.example').DataTable({
        "columnDefs": [{
            targets: [0],
            type: "date"
        }],
        "order": [
            [0, "desc"]
        ]
    });
});
         </script>