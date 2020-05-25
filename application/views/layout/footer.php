      <!-- Footer -->
      <!-- <footer class="sticky-footer bg-white">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
                  <span>Copyright &copy; โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์ 2020</span>
              </div>
          </div>
      </footer> -->
      <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
      </a>

      <!-- Modal Login -->
      <div id="myLogin" class="modal fade">
          <div class="modal-dialog modal-login">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">เข้าสู่ระบบ</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form action="<?=base_url('Control_login/validlogin');?>" method="post">
                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input type="text" class="form-control" name="username" placeholder="Username"
                                      required="required">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                  <input type="password" class="form-control" name="password" placeholder="Password"
                                      required="required">
                              </div>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
                          </div>

                      </form>
                  </div>

              </div>
          </div>
      </div>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบ?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">ต้องการออกจากระบบหรือไม่ !</div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary" href="<?=base_url('control_login/logout');?>">Logout</a>
                  </div>
              </div>
          </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="<?=base_url();?>asset/vendor/jquery/jquery.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?=base_url();?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?=base_url();?>asset/js/sb-admin-2.min.js"></script>

      <script src="<?=base_url();?>asset/js/jquery-ui.js?v=1000"></script>

      <!-- Page level plugins -->
      <script src="<?=base_url();?>asset/vendor/chart.js/Chart.min.js"></script>
      <script type="text/javascript">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/5ebe330f8ee2956d73a14f22/default';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
$('[data-toggle="tooltip"]').tooltip();
      </script>

      <!-- Page level plugins -->
      <script src="<?=base_url();?>asset/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/datatables/dataTables.buttons.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/datatables/jszip.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/datatables/pdfmake.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/datatables/vfs_fonts.js"></script>
      <script src="<?=base_url();?>asset/vendor/datatables/buttons.html5.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/counterup/counterup.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="<?=base_url();?>asset/js/demo/datatables-demo.js?v=1001"></script>
      <script src="<?=base_url()?>asset/js/jquery.inputmask.min.js"></script>
      <script src="<?=base_url();?>asset/vendor/sweetalert.min.js"></script>
      <script src="<?=base_url()?>asset/js/passtrength.js"></script>
      <script src="<?=base_url()?>asset/js/confirmPassword.js"></script>
      <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
      </script>
      <script src="https://cdn.tiny.cloud/1/y6b2omlkddg6mbwjuwhrf96ufg0wjfhrf5xw1xes3o6oahi4/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"></script>
      <script src="<?=base_url()?>asset/js/js.js?v=1002"></script>
      <?php  if(isset($alert_verify) && $alert_verify[0] == 1):?>
      <script>
swal("แจ้งเตือน", "<?=$alert_verify[1];?>", "<?=$alert_verify[2];?>");
      </script>
      <?php endif; ?>
      <?php  if($this->session->flashdata('msg') == 'NO' ):?>
      <script>
swal("แจ้งเตือน", "<?=$this->session->flashdata('messge');?>", "success");
// $('#myModal').modal('show');
      </script>
      <?php endif; ?>

      </body>
      <?php $this->load->view('admin/chart/report_bar.php'); ?>
      <script type="text/javascript">
function onHuman(response) {
    document.getElementById('captcha').value = response;
}
var onloadCallback = function() {
    grecaptcha.render('html_element', {
        'sitekey': '6LdZePgUAAAAAA5sewT1jFoUrRv7E7TGBg6fN6Zs'
    });
};

$(document).ready(function() {
   
    $(":input").inputmask();
    $(".sidebar").sortable();
    $(".sidebar").disableSelection();

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $(document).on('click', '.stu_id', function() {
        var stuid = $(this).attr('stuid');
        $('#idstu').val(stuid);
    });
    $(document).on('click', '#report_stu', function() {
        var stuid = $('#idstu').val();
        var d = $('#recruit_birthdayD').val();
        var m = $('#recruit_birthdayM').val();
        var y = $('#recruit_birthdayY').val();
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังโหลด...'
        );
        $.post("<?=base_url('control_admission/check_print');?>", {
            recruit_birthdayD: d,
            recruit_birthdayM: m,
            recruit_birthdayY: y,
            id: stuid
        }, function(data) {
            //alert(data);
            if (data == 0) {
                alert('วันเกิดคุณไม่ถูกต้อง');
                window.location.href = "<?=base_url('Announce');?>"
            } else {
                window.location.href = data;
            }


        });
    });


    tinymce.init({
        selector: 'textarea',
        height: 500,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | spellchecker | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css',

        // enable title field in the Image dialog
        image_title: true,
        // enable automatic uploads of images represented by blob or data URIs
        automatic_uploads: true,
        // add custom filepicker only to Image dialog
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        }
    });
});
      </script>
      <script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#banner_img").change(function() {
    readURL(this);
});
      </script>


      <?php if($this->session->flashdata('msg') == 'ok'): ?>
      <script type="text/javascript">
swal("สำเร็จ!", "<?=$this->session->flashdata('messge')?>", "success");
      </script>
      <?php endif; ?>
      <?php if($this->session->flashdata('msg_uploadfile') == 'on'): ?>
      <script type="text/javascript">
swal("ผิดพลาด!", "<?=$this->session->flashdata('messge')?>", "error");
      </script>
      <?php endif; ?>

      </html>

      <script>
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
                    swal("แจ้งเตือน", "กรุณากรอกข้อมูลให้ครบ!", "warning")
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
      </script>