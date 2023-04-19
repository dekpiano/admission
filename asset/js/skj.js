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
    var comment = $("#onoff_comment").val();
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/switch_regis',
        data: {
            mode: mode1,
            onoff_comment: comment
        },
        success: function(data) {
            Swal.fire("แจ้งเตือน", "คุณได้ทำการ" + data + "การรับสมัครนักเรียนแล้ว!", "warning")
        }
    });
});

$(document).on('change', '#switch_sys', function() {
    var mode1 = $(this).is(":checked");

    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/switch_system',
        data: {
            mode: mode1
        },
        success: function(data) {
            //alert(data);
            Swal.fire("แจ้งเตือน", "คุณได้ทำการ" + data + "ระบบ!", "warning")
        }
    });
});

$(document).on('change', '#switch_year', function() {
    let dataYear = $(this).val();
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/switch_year',
        data: {
            mode: dataYear
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการเปลี่ยนปีการศึกษาสำเร็จ",
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "../../admin/system/" + dataYear;
                    }
                });
        }
    });
});

$(document).on('change', '#switch_report', function() {
    category = $(this).is(":checked");
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/switch_report',
        data: {
            mode: category
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการเปลี่ยนรายงานตัวสำเร็จ",
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = "../admin/system";
                    }
                });
        }
    });
});

//------------- เปิดปิดประเภทโควตา ----------------------

$(document).on('change', '#quotaM1', function() {
    var category = $(this).is(":checked");
    console.log(category);
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/quotaType',
        data: {
            mode: category,
            ID: 1
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการ " + data,
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = "../admin/system";
                    }
                });
        }
    });
});

$(document).on('change', '#quotaM4', function() {
    var category = $(this).is(":checked");
    console.log(category);
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/quotaType',
        data: {
            mode: category,
            ID: 2
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการ " + data,
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = "../admin/system";
                    }
                });
        }
    });
});

$(document).on('change', '#normal', function() {
    var category = $(this).is(":checked");
    console.log(category);
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/quotaType',
        data: {
            mode: category,
            ID: 3
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการ " + data,
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = "../admin/system";
                    }
                });
        }
    });
});

$(document).on('change', '#normal-between', function() {
    var category = $(this).is(":checked");
    console.log(category);
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/quotaType',
        data: {
            mode: category,
            ID: 4
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการ " + data,
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = "../admin/system";
                    }
                });
        }
    });
});

$(document).on('change', '#quotasport', function() {
    var category = $(this).is(":checked");
    console.log(category);
    $.ajax({
        type: 'POST',
        url: '../../admin/control_admin_admission/quotaType',
        data: {
            mode: category,
            ID: 5
        },
        success: function(data) {
            Swal.fire({
                    title: "แจ้งเตือน",
                    text: "คุณได้ทำการ " + data,
                    icon: "warning"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = "../admin/system";
                    }
                });
        }
    });
});


$(document).on('change', '#select_year_confrim', function() {
    var dataYear = $(this).val();

    Swal.fire({
            title: "แจ้งเตือน",
            text: "คุณได้ทำการเปลี่ยนปีการศึกษาสำเร็จ",
            icon: "warning"
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "../../admin/PrintConfirm/" + dataYear;
            }
        });
});