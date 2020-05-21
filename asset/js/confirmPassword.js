$('#submit_password').prop('disabled', true);
$(document).on('keyup','#password',function(){
    passwordStrength($(this).val());
});
$(document).on('keyup','#confrim_password',function(){
    data = $(this).val();
    var len = data.length;

    if (len < 7) {
       // alert("Password cannot be blank");
        $('.alert_comfirm').html('รหัสผ่านอย่างน้อย 8 ตัวอักษร');
        // Prevent form submission
        event.preventDefault();
    }else{
        if ($('#password').val() != $('#confrim_password').val()) {
            //alert("Password and Confirm Password don't match");
            $('.alert_comfirm').html('รหัสผ่านไม่ตรงกัน');
            // Prevent form submission
           // event.preventDefault();
        }else{
            $('#submit_password').prop('disabled', false);
            $('.alert_comfirm').html('รหัสผ่านตรงกัน').removeClass('text-danger').addClass('text-success');
        }
    }

  
});

$(document).on('click','#submit_password',function(){ 
    $.post('admin/Control_admin_personnel/change_pass', { password:$('#confrim_password').val() }, function(response) {
        console.log("Response: "+response);
        // Log the response to the console
        if(response == 1){
            swal({
                title: "แจ้งเตือน",
                text: "เปลี่ยนรหัสผ่านเรียบร้อย",
                icon: "success"
              })
              .then((willDelete) => {
                if (willDelete) {
                    location.reload();
                }
              });
        }
       
    });
});