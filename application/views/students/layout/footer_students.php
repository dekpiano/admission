         <!-- Page Footer-->

         </div>

         </div>

         </body>

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
         <script src="<?=base_url();?>asset/js/charts-home.js"></script>
         <!-- Main File-->
         <script src="<?=base_url();?>asset/js/front.js"></script>
         <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
         </script>

         <!-- <script src="<?=base_url()?>asset/js/AutoProvince-students.js"></script> -->
         <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>
         <script src="<?=base_url()?>asset/js/ShowPerviewImg.js?v=2"></script>
         
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

$(document).ready(function() {
    // Initialize 
    $("#recruit_oldSchool").autocomplete({
        minLength: 3,
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?php echo base_url('control_students/SchoolList'); ?>",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#recruit_oldSchool').val(ui.item.label); // display the selected text
            $('#recruit_province').val(ui.item.province); // save selected id to input
            $('#recruit_district').val(ui.item.amphur);
            return false;
        }
    });
});

function StatusWait() {
    Swal.fire("แจ้งเตือน", "รอการตรวจสอบเอกสาร", "warning")
}
// รูปแบบการกรอก
$(":input").inputmask();


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#recruit_img").change(function() {
    readURL(this);
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


$(document).on('change', '#province', function() {
    var province = $(this).val();
    $.ajax({
        type: "post",
        url: "<?php echo base_url('control_students/SelectThailand'); ?>",
        data: {
            id: province,
            func: 'province'
        },
        success: function(response) {
            $('#amphur').html(response);

            $('#district').html('<option value="">กรุณาเลือกตำบล</option>');
            //console.log(response);
        }
    });
});
$(document).on('change', '#amphur', function() {
    var amphur = $(this).val();
    $.ajax({
        type: "post",
        url: "<?php echo base_url('control_students/SelectThailand'); ?>",
        data: {
            id: amphur,
            func: 'amphur'
        },
        success: function(response) {
            $('#district').html(response);
            //console.log(response);
        }
    });

    $.ajax({
        type: "post",
        url: "<?php echo base_url('control_students/SelectThailand'); ?>",
        data: {
            id: amphur,
            func: 'postcode'
        },
        success: function(response) {
            $('#postcode').val(response);
            // console.log(response);
        }
    });
});
         </script>