         <!-- Page Footer-->
         <footer class="main-footer" style="position: static;">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-sm-5">
                         <p>โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์ © 2020</p>
                     </div>
                     <div class="col-sm-4">
                         <!-- Histats.com  (div with counter) -->
                         <div id="histats_counter"></div>

                     </div>

                     <div class="col-sm-3 text-right">
                         <p>Design by <a href="#" class="" data-toggle="modal" data-target="#LoginAdmin">Dekpiano</a>
                         </p>
                         <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                     </div>
                 </div>
             </div>
         </footer>
         </div>

         </div>

         </body>

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
         <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

         <script src="<?=base_url()?>asset/js/AutoProvince.js?v=3"></script>
         <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>
         <script src="<?=base_url()?>asset/js/ShowPerviewImg.js?v=2"></script>

         <script src="<?=base_url()?>asset/js/CountdownTimer.js?v=7"></script>

         <script src="https://cdn.jsdelivr.net/npm/vanilla-wizard@0.0.5"></script>
         <script>
new Wizard("#basicwizard", {
    validate: true
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
         <!-- Histats.com  END  -->
         <?php $this->load->view('layout/chart/report_bar.php'); ?>
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
$(":input").inputmask();

$('body').AutoProvince({
    PROVINCE: '#province', // select div สำหรับรายชื่อจังหวัด
    AMPHUR: '#amphur', // select div สำหรับรายชื่ออำเภอ
    DISTRICT: '#district', // select div สำหรับรายชื่อตำบล
    POSTCODE: '#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
    CURRENT_PROVINCE: 1, //  แสดงค่าเริ่มต้น ใส่ไอดีจังหวัดที่เคยเลือกไว้
    CURRENT_AMPHUR: 1, // แสดงค่าเริ่มต้น  ใส่ไอดีอำเภอที่เคยเลือกไว้
    CURRENT_DISTRICT: 1, // แสดงค่าเริ่มต้น  ใส่ไอดีตำบลที่เคยเลือกไว้
    arrangeByName: false // กำหนดให้เรียงตามตัวอักษร
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
                    Swal.fire("แจ้งเตือน", "กรุณากรอกข้อมูลให้ครบ!", "warning")
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
    $('#example').DataTable({
        "order": [
            [0, "desc"]
        ]
    });
});
         </script>