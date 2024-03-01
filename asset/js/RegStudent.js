
$(document).on('click','#sport',function() {
    // ถ้า Option 2 ถูกเลือก
    console.log($(this).is(':checked'));
    if($(this).is(':checked')) {
      // แสดงกลุ่ม radio button ที่ซ่อนอยู่
      $('#hidden-Sport').show();
      $('#hidden-Arts').hide();
      $('#hidden-SciTech').hide();
      $('#hidden-Language').hide();
      $('#hidden-CP').hide();
      $('input[type=radio][name="recruit_major"]').prop('checked', false);
    }
});

$(document).on('click','#debit',function() {
    // ถ้า Option 2 ถูกเลือก
    if($(this).is(':checked')) {    
        $('input[type=radio][name="recruit_major"]').prop('checked', false);
        $('#recruit_majorCEP0').prop('checked', true);
        $('#hidden-Language').show();
        $('#hidden-SciTech').hide();
        $('#hidden-Arts').hide();
        $('#hidden-CP').hide();
    }
});

$(document).on('click','#credit',function() {
    // ถ้า Option 2 ถูกเลือก
    if($(this).is(':checked')) {
        $('input[type=radio][name="recruit_major"]').prop('checked', false);
      $('#hidden-SciTech').show();
      $('#hidden-Language').hide();
      $('#hidden-Arts').hide();
      $('#hidden-CP').hide();
    } 
});

$(document).on('click','#paypal',function() {
    // ถ้า Option 2 ถูกเลือก
    if($(this).is(':checked')) {
        $('input[type=radio][name="recruit_major"]').prop('checked', false);
        
      $('#hidden-Arts').show();
      $('#hidden-SciTech').hide();
      $('#hidden-Language').hide();
      $('#hidden-CP').hide();
    } 
});

$(document).on('click','#paypal1',function() {
    // ถ้า Option 2 ถูกเลือก
    if($(this).is(':checked')) {
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
  for (let i = 1; i <= 7; i++) {
    const select = document.getElementById('select' + i);
    if (select.value !== "") {
      selectedValues.push(select.value);
    }
  }

  // อัปเดตการแสดงผลของ options ในทุก <select>
  for (let i = 1; i <= 7; i++) {
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
for (let i = 1; i <= 7; i++) {
  document.getElementById('select' + i).addEventListener('change', updateSelectOptions);
}


  function showPreview(event, previewId) {
    if (event.target.files.length > 0) {
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById(previewId);
      preview.innerHTML = '<img src="' + src + '"class="img-fluid" />';
    }
  }


