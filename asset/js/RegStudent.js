
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