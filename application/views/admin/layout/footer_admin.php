         <!-- Page Footer-->

         </div>
         </div>

         </body>

         </html>

         <!-- JavaScript files-->
         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          
         <script src="<?=base_url();?>asset/vendor/popper.js/umd/popper.min.js"> </script>
         <script src="<?=base_url();?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
         <script src="<?=base_url();?>asset/vendor/jquery.cookie/jquery.cookie.js"> </script>
         <script src="<?=base_url();?>asset/vendor/chart.js/Chart.min.js"></script>
         <script src="<?=base_url();?>asset/vendor/jquery-validation/jquery.validate.min.js"></script>
         <!-- jQuery UI -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
         <script src="<?=base_url();?>asset/js/charts-home.js"></script>
         <!-- Main File-->
         <script src="<?=base_url();?>asset/js/front.js"></script>
         <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        
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

         <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>
         <script src="<?=base_url()?>asset/js/skj.js?v=1003"></script>
         <script src="<?=base_url()?>asset/js/ShowPerviewImg.js?v=2"></script>

         <?php $this->load->view('admin/chart/report_bar.php'); ?>
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

$('#TB_stu').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "order": [[ 0, "desc" ]]
});

function StatusWait(){
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
        url: "<?php echo base_url('admin/Control_admin_admission/SelectThailand'); ?>",
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
        url: "<?php echo base_url('admin/Control_admin_admission/SelectThailand'); ?>",
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
        url: "<?php echo base_url('admin/Control_admin_admission/SelectThailand'); ?>",
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

// Initialize 
$("#recruit_oldSchool").autocomplete({
    minLength: 3,
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: "<?php echo base_url('admin/control_admin_admission/SchoolList'); ?>",
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

$('.T_m1 thead th').each(function(i) {
    var total = 0;
            $('.T_m1 tr').each(function() {
                var value = parseInt($('td', this).eq(i+1).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('.T_m1 tfoot td').eq(i+1).text(total);
});

$('.T_m4 thead th').each(function(i) {
    var total = 0;
            $('.T_m4 tr').each(function() {
                var value = parseInt($('td', this).eq(i+1).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('.T_m4 tfoot td').eq(i+1).text(total);
});
     
     
         </script>