

$(document).on('click', '#sport', function () {
  // ถ้า Option 2 ถูกเลือก
  //console.log($(this).is(':checked'));
  if ($(this).is(':checked')) {
    // แสดงกลุ่ม radio button ที่ซ่อนอยู่
    $('#hidden-Sport').show();
    $('#hidden-Arts').hide();
    $('#hidden-SciTech').hide();
    $('#hidden-Language').hide();
    $('#hidden-CP').hide();
    $('input[type=radio][name="recruit_major"]').prop('checked', false);
  }
});

$(document).on('click', '#debit', function () {
  // ถ้า Option 2 ถูกเลือก
  if ($(this).is(':checked')) {
    $('input[type=radio][name="recruit_major"]').prop('checked', false);
    $('#recruit_majorCEP0').prop('checked', true);
    $('#hidden-Language').show();
    $('#hidden-SciTech').hide();
    $('#hidden-Arts').hide();
    $('#hidden-CP').hide();
  }
});

$(document).on('click', '#credit', function () {
  // ถ้า Option 2 ถูกเลือก
  if ($(this).is(':checked')) {
    $('input[type=radio][name="recruit_major"]').prop('checked', false);
    $('#hidden-SciTech').show();
    $('#hidden-Language').hide();
    $('#hidden-Arts').hide();
    $('#hidden-CP').hide();
  }
});

$(document).on('click', '#paypal', function () {
  // ถ้า Option 2 ถูกเลือก
  if ($(this).is(':checked')) {
    $('input[type=radio][name="recruit_major"]').prop('checked', false);

    $('#hidden-Arts').show();
    $('#hidden-SciTech').hide();
    $('#hidden-Language').hide();
    $('#hidden-CP').hide();
  }
});

$(document).on('click', '#paypal1', function () {
  // ถ้า Option 2 ถูกเลือก
  if ($(this).is(':checked')) {
    $('input[type=radio][name="recruit_major"]').prop('checked', false);
    $('#recruit_majorCP0').prop('checked', true);
    $('#hidden-CP').show();
    $('#hidden-Sport').hide();
    $('#hidden-Arts').hide();
    $('#hidden-SciTech').hide();
    $('#hidden-Language').hide();
  }
});




// $(document).on('keyup','#recruit_idCard',function() {
//     console.log($(this).val());

//     $.post('',{keyID:$(this).val()},function(){

//     })
// });

// ฟังก์ชั่นเพื่ออัปเดตการแสดงผลของ options ในทุก <select> เมื่อมีการเปลี่ยนแปลง
function updateSelectOptions() {
  let selectedValues = [];
  // รวบรวมค่าที่เลือกจากทุก <select>
  for (let i = 1; i <= $('.SelectCourse').length; i++) {
    const select = document.getElementById('select' + i);
    if (select.value !== "") {
      selectedValues.push(select.value);
    }
  }

  // อัปเดตการแสดงผลของ options ในทุก <select>
  for (let i = 1; i <= $('.SelectCourse').length; i++) {
    const select = document.getElementById('select' + i);
    const selectedValue = select.value;
    for (let option of select.options) {
      // ซ่อน option ที่เลือกไปแล้วใน <select> อื่น แต่เว้น option ที่เลือกใน <select> นี้
      if (selectedValues.includes(option.value) && selectedValue !== option.value) {
        option.hidden = true;
      } else {
        option.hidden = false;
      }
    }
  }
}


// เพิ่ม event listener ให้กับทุก <select>
for (let i = 1; i <= $('.SelectCourse').length; i++) {
  document.getElementById('select' + i).addEventListener('change', updateSelectOptions);
}


function showPreview(event, previewId) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById(previewId);
    preview.innerHTML = '<img src="' + src + '"class="img-fluid" />';
  }
}



// ฟังก์ชันตรวจสอบความถูกต้องของเลขบัตรประชาชนแบบรวมขีด
function checkThaiID(id) {

  id = id.replace(/-/g, '');

  if (id.length !== 13) {
    return { valid: false, message: 'กรุณากรอกเลขบัตรประชาชนให้ครบ 13 หลัก' };
  }

  // ตรวจสอบว่าเป็นเลขบัตรคนไทย (1, 2, 3, 4, 5) หรือคนต่างด้าว (6, 7, 8, 9)
  let firstDigit = id.charAt(0);
  if (!['1', '2', '3', '4', '5', '6', '7', '8'].includes(firstDigit)) {
    return { valid: false, message: 'เลขบัตรประชาชนไทย หรือ ต่างด้าวไม่ถูกต้อง <br> กรุณากรอกใหม่อีกรอบ' };
  }

  // คำนวณผลรวมเพื่อตรวจสอบ Check Digit
  let sum = 0;
  for (let i = 0; i < 12; i++) {
    sum += parseInt(id.charAt(i)) * (13 - i);
  }

  // คำนวณ Check Digit
  let checkDigit = (11 - (sum % 11)) % 10;
  if (checkDigit === parseInt(id.charAt(12))) {
    return { valid: true, message: 'เลขบัตรประชาชนถูกต้อง <br> กรอกข้อมูลการสมัครด้านล่างได้เลย' };
  } else {
    return { valid: false, message: 'เลขบัตรประชาชนไม่ถูกต้อง <br> กรุณากรอกใหม่อีกรอบ' };
  }
}



$(document).on('submit', '#FormCheckIdStudent', function (e) {
  e.preventDefault();

  let id = $('#CheckIdStudent').val();
  //console.log(id);

  let result = checkThaiID(id);
  if (!result.valid) {
    Swal.fire({
      title: "แจ้งเตือน!",
      html: result.message + "!",
      icon: "error"
    });
    $('#CheckIdStudent').val("");
    $('#SectionFormRegisterStudents').hide();
  } else {

    $.post('../../CheckStudentRegister', { Idcard: id }, function (data) {
      //console.log(data);
      if (data > 0) {
        Swal.fire({
          title: "แจ้งเตือน!",
          html: "คุณได้ลงทะเบียนแล้วในปีนี้ ไม่สามารถลงทะเบียนได้อีก!",
          icon: "warning"
        });
        $('#CheckIdStudent').val("");
        $('#SectionFormRegisterStudents').hide();
      } else {
        Swal.fire({
          title: "แจ้งเตือน!",
          html: result.message + "! <br> และสามารถลงทะเบียนเรียนในปีนี้ได้",
          icon: "success"
        });
        $('#recruit_idCard').val(id);
        $('#SectionFormRegisterStudents').show();
      }
    });


  }

});


var $uploadCrop;

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.upload-demo').addClass('ready');
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function () {
        console.log('jQuery bind complete');
      });

    }

    reader.readAsDataURL(input.files[0]);
  }
  else {
    console.log("Sorry - you're browser doesn't support the FileReader API");
  }
}

$uploadCrop = $('#croppieContainer').croppie({
  viewport: {
    width: 200,
    height: 250,
    //type: 'circle'
  },
  boundary: { width: 300, height: 300 },
  enableExif: true,
  enableOrientation:true

});

var currentRotation = 0; 
$(document).on('click', '#rotateRight',function() {
  if ($uploadCrop) {
      currentRotation += 90; // เพิ่มองศาไปทางขวา
      $uploadCrop.croppie('rotate', currentRotation);
  }
});

$('#uploadImage').on('change', function () { readFile(this); });

$('#cropImageBtn').on('click', function (ev) {

  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
    $('#userprofile-avatar').val(resp);
    $('#selectedImage img').attr('src', resp);
  });
  $('#cropModal').modal('hide');
});    
