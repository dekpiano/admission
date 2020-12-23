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

$(document).on('change', '#switch', function() {
    var mode1 = $(this).is(":checked");
    $.ajax({
        type: 'POST',
        url: '../admin/control_admin_admission/switch_regis',
        data: {
            mode: mode1
        },
        success: function(data) {
            swal("แจ้งเตือน", "คุณได้ทำการ" + data + "การรับสมัครนักเรียนแล้ว!", "warning")
        }
    });
});

$(document).on('change', '#switch_sys', function() {
    var mode1 = $(this).is(":checked");

    $.ajax({
        type: 'POST',
        url: '../admin/control_admin_admission/switch_system',
        data: {
            mode: mode1
        },
        success: function(data) {
            //alert(data);
            swal("แจ้งเตือน", "คุณได้ทำการ" + data + "ระบบ!", "warning")
        }
    });
});

$(document).on('change', '#switch_year', function() {
    var dataYear = $(this).val();
    $.ajax({
        type: 'POST',
        url: '../admin/control_admin_admission/switch_year',
        data: {
            mode: dataYear
        },
        success: function(data) {
            swal({
                title: "แจ้งเตือน",
                text: "คุณได้ทำการเปลี่ยนปีการศึกษาสำเร็จ",
                icon: "warning"
              })
              .then((willDelete) => {
                if (willDelete) {
                    window.location = "../admin/system";
                }     
            });
        }
    });
});

$(document).on('change', '#select_year', function() {
    var dataYear = $(this).val();
   
    swal({
        title: "แจ้งเตือน",
        text: "คุณได้ทำการเปลี่ยนปีการศึกษาสำเร็จ",
        icon: "warning"
      })
      .then((willDelete) => {
        if (willDelete) {
            window.location = "../../admin/admission/"+dataYear;
        }     
    });

});