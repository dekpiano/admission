// Login รายงานตั้วนักเรียนใหม่
$(document).on('submit', "#loginConfirmStudent", function(e) {
    e.preventDefault();

    var login = $(this);

    $.ajax({
        url: "Control_login/CheckLoginConfirmStudentNew",
        type: 'post',
        data: login.serialize(),
        success: function(response) {
            //console.log(response);
            if (response == 1) {
                //alert(1);
                location.reload();
            } else if (response == 0) {
                // alert(0);
                Swal.fire(
                    'แจ้งเตือน!',
                    'ไม่มีข้อมูลในระบบ หรือ ยังไม่สมัครเรียน หรือ ยังไม่ผ่านการตรวจสอบ',
                    'error'
                )
            }

        }
    });
});