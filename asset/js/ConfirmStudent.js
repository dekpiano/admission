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

$(document).on('keyup', "#idenStu", function() {
    console.log($(this).val().length);
    if ($(this).val().length <= 13) {
        $('#submit').prop('disabled', false);
    }
});

// Add smooth scrolling to all links
$("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function() {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
    } // End if
});


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

$(document).on('submit', '#FormConfirmStudentUpdate', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/UpdateConfirmStudent",
        method: "POST",
        data: $('#FormConfirmStudentUpdate').serialize(),
        beforeSend: function() {
            $('.ReLoading').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
        },
        success: function(data) {
            console.log(data);
            if (data == 1) {
                Swal.fire({
                    title: 'แจ้งเตือน?',
                    text: "บันทึกข้อมูลสำเร็จ! <br> ไปบันทึกข้อมูล บิดา - มารดา และผู้ปกครองกันต่อเลย",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ตกลง'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                        $('.ReLoading').html('บันทึกข้อมูล');
                    }
                })
            }
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
            $('.ReLoading').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
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
            $('.ReLoading').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
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
        $('#par_cTambon').val($('#par_hTambon').val());
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
    $("#par_restOrthor2").hide();
    $("#par_restOrthor3").hide();
    $("#par_restOrthor4").hide();
    if (selected_value == "อื่นๆ") {
        $("#par_restOrthor4").show();
    }
    // console.log(selected_value);
});


// ข้อมูลมารดา

$.Thailand({
    $district: $('#par_hTambonM'), // input ของตำบล
    $amphoe: $('#par_hDistrictM'), // input ของอำเภอ
    $province: $('#par_hProvinceM'), // input ของจังหวัด
    $zipcode: $('#par_hPostcodeM'), // input ของรหัสไปรษณีย์
});

$.Thailand({
    $district: $('#par_cTambonM'), // input ของตำบล
    $amphoe: $('#par_cDistrictM'), // input ของอำเภอ
    $province: $('#par_cProvinceM'), // input ของจังหวัด
    $zipcode: $('#par_cPostcodeM'), // input ของรหัสไปรษณีย์
});

$(document).on('change', '#checkPerM', function() {
    if ($(this).prop("checked") == true) {
        // console.log("Checkbox is checked.");       
        $('#par_cNumberM').val($('#par_hNumberM').val());
        $('#par_cMooM').val($('#par_hMooM').val());
        $('#par_cTambonM').val($('#par_hTambonM').val());
        $('#par_cDistrictM').val($('#par_hDistrictM').val());
        $('#par_cProvinceM').val($('#par_hProvinceM').val());
        $('#par_cPostcodeM').val($('#par_hPostcodeM').val());
    } else if ($(this).prop("checked") == false) {
        $('#par_cNumberM').val("");
        $('#par_cMooM').val("");
        $('#par_cTambonM').val("");
        $('#par_cDistrictM').val("");
        $('#par_cProvinceM').val("");
        $('#par_cPostcodeM').val("");
    }
});

$(document).on('change', '.par_serviceM', function() {
    selected_value = $("input[name='par_serviceM']:checked").val();
    $("#par_serviceNameM0").hide();
    $("#par_serviceNameM1").hide();
    $("#par_serviceNameM2").hide();
    $("#par_serviceNameM3").hide();
    $("#par_serviceNameM0").val("");
    $("#par_serviceNameM1").val("");
    $("#par_serviceNameM2").val("");
    $("#par_serviceNameM3").val("");
    if (selected_value == "กระทรวง") {
        $("#par_serviceNameM0").show();
    } else if (selected_value == "กรม") {
        $("#par_serviceNameM1").show();
    } else if (selected_value == "กอง") {
        $("#par_serviceNameM2").show();
    } else if (selected_value == "ฝ่าย/แผนก") {
        $("#par_serviceNameM3").show();
    }
});

$(document).on('change', '.par_restM', function() {
    selected_value = $("input[name='par_restM']:checked").val();
    $("#par_restOrthorM0").hide();
    $("#par_restOrthorM1").hide();
    $("#par_restOrthorM2").hide();
    $("#par_restOrthorM3").hide();
    $("#par_restOrthorM4").hide();
    if (selected_value == "อื่นๆ") {
        $("#par_restOrthorM4").show();
    }
    //console.log(selected_value);
});

$(document).on('submit', '#FormConfirmMather', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/InsertConfirmMather",
        method: "POST",
        data: $('#FormConfirmMather').serialize(),
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

$(document).on('submit', '#FormConfirmMatherUpdate', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/UpdateConfirmMather",
        method: "POST",
        data: $('#FormConfirmMatherUpdate').serialize(),
        beforeSend: function() {
            $('#response').html('<span class="text-info">Loading response...</span>');
        },
        success: function(data) {
            console.log(data);
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


// ข้อมูลผู้ปกครอง

$.Thailand({
    $district: $('#par_hTambonO'), // input ของตำบล
    $amphoe: $('#par_hDistrictO'), // input ของอำเภอ
    $province: $('#par_hProvinceO'), // input ของจังหวัด
    $zipcode: $('#par_hPostcodeO'), // input ของรหัสไปรษณีย์
});

$.Thailand({
    $district: $('#par_cTambonO'), // input ของตำบล
    $amphoe: $('#par_cDistrictO'), // input ของอำเภอ
    $province: $('#par_cProvinceO'), // input ของจังหวัด
    $zipcode: $('#par_cPostcodeO'), // input ของรหัสไปรษณีย์
});

$(document).on('change', '#checkPerO', function() {
    if ($(this).prop("checked") == true) {
        // console.log("Checkbox is checked.");       
        $('#par_cNumberO').val($('#par_hNumberO').val());
        $('#par_cMooO').val($('#par_hMooO').val());
        $('#par_cTambonO').val($('#par_hTambonO').val());
        $('#par_cDistrictO').val($('#par_hDistrictO').val());
        $('#par_cProvinceO').val($('#par_hProvinceO').val());
        $('#par_cPostcodeO').val($('#par_hPostcodeO').val());
    } else if ($(this).prop("checked") == false) {
        $('#par_cNumberO').val("");
        $('#par_cMooO').val("");
        $('#par_cTambonO').val("");
        $('#par_cDistrictO').val("");
        $('#par_cProvinceO').val("");
        $('#par_cPostcodeO').val("");
    }
});

$(document).on('change', '.par_serviceO', function() {
    selected_value = $("input[name='par_serviceO']:checked").val();
    $("#par_serviceNameO0").hide();
    $("#par_serviceNameO1").hide();
    $("#par_serviceNameO2").hide();
    $("#par_serviceNameO3").hide();
    $("#par_serviceNameO0").val("");
    $("#par_serviceNameO1").val("");
    $("#par_serviceNameO2").val("");
    $("#par_serviceNameO3").val("");
    if (selected_value == "กระทรวง") {
        $("#par_serviceNameO0").show();
    } else if (selected_value == "กรม") {
        $("#par_serviceNameO1").show();
    } else if (selected_value == "กอง") {
        $("#par_serviceNameO2").show();
    } else if (selected_value == "ฝ่าย/แผนก") {
        $("#par_serviceNameO3").show();
    }
});

$(document).on('change', '.par_restO', function() {
    selected_value = $("input[name='par_restO']:checked").val();
    $("#par_restOrthorO0").hide();
    $("#par_restOrthorO1").hide();
    $("#par_restOrthorO2").hide();
    $("#par_restOrthorO3").hide();
    $("#par_restOrthorO4").hide();
    if (selected_value == "อื่นๆ") {
        $("#par_restOrthorO4").show();
    }
    //console.log(selected_value);
});

$(document).on('submit', '#FormConfirmOther', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/InsertConfirmOther",
        method: "POST",
        data: $('#FormConfirmOther').serialize(),
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

$(document).on('submit', '#FormConfirmOtherUpdate', function(e) {
    e.preventDefault();
    $.ajax({
        url: "Control_confirm/UpdateConfirmOther",
        method: "POST",
        data: $('#FormConfirmOtherUpdate').serialize(),
        beforeSend: function() {
            $('#response').html('<span class="text-info">Loading response...</span>');
        },
        success: function(data) {
            console.log(data);
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


$(document).on('change', '.checkPu', function() {
    selected_value = $("input[name='checkPu']:checked").val();
    console.log(selected_value);
    if (selected_value == "บิดา") {
        //  $('par_stuIDO').val($('par_stuID').val()); 
        $('#par_relationO').val($('#par_relation').val());
        // $('#par_relationKeyO').val($('#par_relationKey').val());
        $('#par_prefixO').val($('#par_prefix').val());
        $('#par_firstNameO').val($('#par_firstName').val());
        $('#par_lastNameO').val($('#par_lastName').val());
        $('#par_agoO').val($('#par_ago').val());
        $('#par_IdNumberO').val($('#par_IdNumber').val());
        $('#par_nationalO').val($('#par_national').val());
        $('#par_raceO').val($('#par_race').val());
        $('#par_religionO').val($('#par_religion').val());
        $('#par_careerO').val($('#par_career').val());
        $('#par_educationO').val($('#par_education').val());
        $('#par_salaryO').val($('#par_salary').val());
        $('#par_positionJobO').val($('#par_positionJob').val());
        $('#par_phoneO').val($('#par_phone').val());
        $('#par_deceaseO').val($('#par_decease').val());
        $('#par_hNumberO').val($('#par_hNumber').val());
        $('#par_hMooO').val($('#par_hMoo').val());
        $('#par_hTambonO').val($('#par_hTambon').val());
        $('#par_hDistrictO').val($('#par_hDistrict').val());
        $('#par_hProvinceO').val($('#par_hProvince').val());
        $('#par_hPostcodeO').val($('#par_hPostcode').val());
        $('#par_cNumberO').val($('#par_cNumber').val());
        $('#par_cMooO').val($('#par_cMoo').val());
        $('#par_cTambonO').val($('#par_cTambon').val());
        $('#par_cDistrictO').val($('#par_cDistrict').val());
        $('#par_cProvinceO').val($('#par_cProvince').val());
        $('#par_cPostcodeO').val($('#par_cPostcode').val());

        const T = ["บ้านตนเอง", "เช่าบ้าน", "อาศัยผู้อื่นอยู่", "บ้านพักสวัสดิกา", "อื่นๆ"];

        for (let index = 0; index < T.length; index++) {

            if (T[index] == $("input[name='par_rest']:checked").val()) {
                $('#par_restO' + index).prop("checked", true);
                $('#par_restOrthorO' + index).val($('#par_restOrthor' + index).val());

                if ($("input[name='par_rest']:checked").val() == "อื่นๆ") {
                    $('#par_restOrthorO' + index).show();
                } else {
                    $('#par_restOrthorO' + index).hide();
                }
            }


        }


        const service = ["กระทรวง", "กรม", "กอง", "ฝ่าย/แผนก"];
        for (let index = 0; index < service.length; index++) {
            if (service[index] == $("input[name='par_service']:checked").val()) {
                $('#par_serviceO' + index).prop("checked", true);
                $('#par_serviceNameO' + index).show();
                $('#par_serviceNameO' + index).val($('#par_serviceName' + index).val());
            } else {
                $('#par_serviceNameO' + index).hide();
            }

        }
        const claim = ["เบิกได้", "เบิกไม่ได้"];
        for (let index = 0; index < claim.length; index++) {
            if (claim[index] == $("input[name='par_claim']:checked").val()) {
                $('#par_claimO' + index).prop("checked", true);
            }

        }

    } else if (selected_value == "มารดา") {

        //  $('par_stuIDO').val($('par_stuID').val()); 
        $('#par_relationO').val($('#par_relationM').val());
        // $('#par_relationKeyO').val($('#par_relationKeyM').val());
        $('#par_prefixO').val($('#par_prefixM').val());
        $('#par_firstNameO').val($('#par_firstNameM').val());
        $('#par_lastNameO').val($('#par_lastNameM').val());
        $('#par_agoO').val($('#par_agoM').val());
        $('#par_IdNumberO').val($('#par_IdNumberM').val());
        $('#par_nationalO').val($('#par_nationalM').val());
        $('#par_raceO').val($('#par_raceM').val());
        $('#par_religionO').val($('#par_religionM').val());
        $('#par_careerO').val($('#par_careerM').val());
        $('#par_educationO').val($('#par_educationM').val());
        $('#par_salaryO').val($('#par_salaryM').val());
        $('#par_positionJobO').val($('#par_positionJobM').val());
        $('#par_phoneO').val($('#par_phoneM').val());
        $('#par_deceaseO').val($('#par_deceaseM').val());
        $('#par_hNumberO').val($('#par_hNumberM').val());
        $('#par_hMooO').val($('#par_hMooM').val());
        $('#par_hTambonO').val($('#par_hTambonM').val());
        $('#par_hDistrictO').val($('#par_hDistrictM').val());
        $('#par_hProvinceO').val($('#par_hProvinceM').val());
        $('#par_hPostcodeO').val($('#par_hPostcodeM').val());
        $('#par_cNumberO').val($('#par_cNumberM').val());
        $('#par_cMooO').val($('#par_cMooM').val());
        $('#par_cTambonO').val($('#par_cTambonM').val());
        $('#par_cDistrictO').val($('#par_cDistrictM').val());
        $('#par_cProvinceO').val($('#par_cProvinceM').val());
        $('#par_cPostcodeO').val($('#par_cPostcodeM').val());

        const T = ["บ้านตนเอง", "เช่าบ้าน", "อาศัยผู้อื่นอยู่", "บ้านพักสวัสดิกา", "อื่นๆ"];
        for (let index = 0; index < T.length; index++) {
            if (T[index] == $("input[name='par_restM']:checked").val()) {
                $('#par_restO' + index).prop("checked", true);
                $('#par_restOrthorO' + index).val($('#par_restOrthor' + index).val());

                if ($("input[name='par_rest']:checked").val() == "อื่นๆ") {
                    $('#par_restOrthorO' + index).show();
                } else {
                    $('#par_restOrthorO' + index).hide();
                }
            }

        }

        const service = ["กระทรวง", "กรม", "กอง", "ฝ่าย/แผนก"];
        for (let index = 0; index < service.length; index++) {
            if (service[index] == $("input[name='par_serviceM']:checked").val()) {
                $('#par_serviceO' + index).prop("checked", true);
                $('#par_serviceNameO' + index).show();
                $('#par_serviceNameO' + index).val($('#par_serviceNameM' + index).val());
            } else {
                $('#par_serviceNameO' + index).hide();
            }

        }
        const claim = ["เบิกได้", "เบิกไม่ได้"];
        for (let index = 0; index < claim.length; index++) {
            if (claim[index] == $("input[name='par_claimM']:checked").val()) {
                $('#par_claimO' + index).prop("checked", true);
            }

        }

    } else if (selected_value == "ผู้ปกครองอื่น") {

        $('.FormConfirmOther')[0].reset();

    }



});