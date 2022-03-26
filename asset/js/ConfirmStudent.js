(function() {
    'use strict';

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('check-needs-validation');

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
// ค้นหาตามทะเบียนบ้าน

$.Thailand({
    $district: $('#stu_hTambon'), // input ของตำบล
    $amphoe: $('#stu_hDistrict'), // input ของอำเภอ
    $province: $('#stu_hProvince'), // input ของจังหวัด
    $zipcode: $('#stu_hPostCode'), // input ของรหัสไปรษณีย์
});

// ค้นหาที่อยู่ปัจจุบัน
$.Thailand({
    $district: $('#stu_cTumbao'), // input ของตำบล
    $amphoe: $('#stu_cDistrict'), // input ของอำเภอ
    $province: $('#stu_cProvince'), // input ของจังหวัด
    $zipcode: $('#stu_cPostcode'), // input ของรหัสไปรษณีย์
});

// ค้นหาโรงเก่า
$.Thailand({
    $district: $('#stu_schoolTambao'), // input ของตำบล
    $amphoe: $('#stu_schoolDistrict'), // input ของอำเภอ
    $province: $('#stu_schoolProvince'), // input ของจังหวัด
});
// ค้นหาสถานที่เกิด
$.Thailand({
    $district: $('#stu_birthTambon'), // input ของตำบล
    $amphoe: $('#stu_birthDistrict'), // input ของอำเภอ
    $province: $('#stu_birthProvirce'), // input ของจังหวัด
});




$(document).on('change', '#clickLike', function() {
    if ($(this).prop("checked") == true) {
        // console.log("Checkbox is checked.");       
        $('#stu_cNumber').val($('#stu_hNumber').val());
        $('#stu_cMoo').val($('#stu_hMoo').val());
        $('#stu_cRoad').val($('#stu_hRoad').val());
        $('#stu_cTumbao').val($('#stu_hTambon').val());
        $('#stu_cDistrict').val($('#stu_hDistrict').val());
        $('#stu_cProvince').val($('#stu_hProvince').val());
        $('#stu_cPostcode').val($('#stu_hPostCode').val());
    } else if ($(this).prop("checked") == false) {
        $('#stu_cNumber').val("");
        $('#stu_cMoo').val("");
        $('#stu_cRoad').val("");
        $('#stu_cTumbao').val("");
        $('#stu_cDistrict').val("");
        $('#stu_cProvince').val("");
        $('#stu_cPostcode').val("");
    }
});

// เพิ่มข้อมูล รายงานตัว
$(document).on('submit', '#FormConfirmStudent', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/InsertConfirmStudent",
        method: "POST",
        data: $('#FormConfirmStudent').serialize(),
        beforeSend: function() {
            $('#response').html('<span class="text-info">Loading response...</span>');
        },
        success: function(data) {
            console.log(data);
            if (data == 1) {
                Swal.fire("แจ้งเตือน", "บันทึกข้อมูลสำเร็จ! <br> สามารถแก้ไขข้อมูลได้จนกว่าระบบจะปิดให้แก้ไข", "success")
            }
            // $('form').trigger("reset");
            // $('#response').fadeIn().html(data);
            // setTimeout(function() {
            //     $('#response').fadeOut("slow");
            // }, 5000);
        }
    });
});

$(document).on('submit', '#FormConfirmStudentUpdate', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/UpdateConfirmStudent",
        method: "POST",
        data: $('#FormConfirmStudentUpdate').serialize(),
        beforeSend: function() {
            $('#response').html('<span class="text-info">Loading response...</span>');
        },
        success: function(data) {
            console.log(data);
            if (data == 1) {
                Swal.fire("แจ้งเตือน", "บันทึกข้อมูลสำเร็จ! <br> สามารถแก้ไขข้อมูลได้จนกว่าระบบจะปิดให้แก้ไข", "success")
            }
            // $('form').trigger("reset");
            // $('#response').fadeIn().html(data);
            // setTimeout(function() {
            //     $('#response').fadeOut("slow");
            // }, 5000);
        }
    });
});

$(document).on('change', '#stu_usedStudent2,#stu_usedStudent1', function() {
    selected_value = $("input[name='stu_usedStudent']:checked").val();
    if (selected_value == "เคย") {
        $("#stu_inputLevel").show();
    } else {
        $("#stu_inputLevel").hide();
    }
});

$(document).on('change', '#stu_presentLife0,#stu_presentLife1,#stu_presentLife2', function() {
    selected_value = $("input[name='stu_presentLife']:checked").val();
    if (selected_value == "บุคคลอื่น") {
        $("#stu_personOther").show();
    } else {
        $("#stu_personOther").val("");
        $("#stu_personOther").hide();

    }
});


// บิดา --------------------------------------------

// ค้นหาที่อยู่ปัจจุบัน
$.Thailand({
    $district: $('#par_hTambon'), // input ของตำบล
    $amphoe: $('#par_hDistrict'), // input ของอำเภอ
    $province: $('#par_hProvince'), // input ของจังหวัด
    $zipcode: $('#par_hPostcode'), // input ของรหัสไปรษณีย์
});

$.Thailand({
    $district: $('#par_cTambon'), // input ของตำบล
    $amphoe: $('#par_cDistrict'), // input ของอำเภอ
    $province: $('#par_cProvince'), // input ของจังหวัด
    $zipcode: $('#par_cPostcode'), // input ของรหัสไปรษณีย์
});

$(document).on('submit', '#FormConfirmFather', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/InsertConfirmFather",
        method: "POST",
        data: $('#FormConfirmFather').serialize(),
        beforeSend: function() {
            $('#response').html('<span class="text-info">Loading response...</span>');
        },
        success: function(data) {
            //console.log(data);
            if (data == 1) {

                Swal.fire({
                    title: 'แจ้งเตือน?',
                    text: "บันทึกข้อมูลสำเร็จ!",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ตกลง'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })

            }
            // $('form').trigger("reset");
            // $('#response').fadeIn().html(data);
            // setTimeout(function() {
            //     $('#response').fadeOut("slow");
            // }, 5000);
        }
    });
});

$(document).on('submit', '#FormConfirmFatherUpdate', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/UpdateConfirmFather",
        method: "POST",
        data: $('#FormConfirmFatherUpdate').serialize(),
        beforeSend: function() {
            $('#response').html('<span class="text-info">Loading response...</span>');
        },
        success: function(data) {
            console.log(data);
            if (data == 1) {
                Swal.fire("แจ้งเตือน", "บันทึกข้อมูลสำเร็จ! <br> สามารถแก้ไขข้อมูลได้จนกว่าระบบจะปิดให้แก้ไข", "success")
            }
            // $('form').trigger("reset");
            // $('#response').fadeIn().html(data);
            // setTimeout(function() {
            //     $('#response').fadeOut("slow");
            // }, 5000);
        }
    });
});

$(document).on('change', '#checkPer', function() {
    if ($(this).prop("checked") == true) {
        // console.log("Checkbox is checked.");       
        $('#par_cNumber').val($('#par_hNumber').val());
        $('#par_cMoo').val($('#par_hMoo').val());
        $('#par_cTambon').val($('#stu_hTambon').val());
        $('#par_cDistrict').val($('#par_hDistrict').val());
        $('#par_cProvince').val($('#par_hProvince').val());
        $('#par_cPostcode').val($('#par_hPostcode').val());
    } else if ($(this).prop("checked") == false) {
        $('#par_cNumber').val("");
        $('#par_cMoo').val("");
        $('#par_cTambon').val("");
        $('#par_cDistrict').val("");
        $('#par_cProvince').val("");
        $('#par_cPostcode').val("");
    }
});

$(document).on('change', '.par_service', function() {
    selected_value = $("input[name='par_service']:checked").val();
    $("#par_serviceName0").hide();
    $("#par_serviceName1").hide();
    $("#par_serviceName2").hide();
    $("#par_serviceName3").hide();
    $("#par_serviceName0").val("");
    $("#par_serviceName1").val("");
    $("#par_serviceName2").val("");
    $("#par_serviceName3").val("");
    if (selected_value == "กระทรวง") {
        $("#par_serviceName0").show();
    } else if (selected_value == "กรม") {
        $("#par_serviceName1").show();
    } else if (selected_value == "กอง") {
        $("#par_serviceName2").show();
    } else if (selected_value == "ฝ่าย/แผนก") {
        $("#par_serviceName3").show();
    }
});

$(document).on('change', '.par_rest', function() {
    selected_value = $("input[name='par_rest']:checked").val();
    $("#par_restOrthor0").hide();
    $("#par_restOrthor1").hide();
    $("#par_restOrthor").hide();
    $("#par_restOrthor3").hide();
    $("#par_restOrthor4").hide();
    if (selected_value == "อื่นๆ") {
        $("#par_restOrthor4").show();
    }
    // console.log(selected_value);
});