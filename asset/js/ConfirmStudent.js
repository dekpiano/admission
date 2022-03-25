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
        $("#stu_personOther").hide();
    }
});