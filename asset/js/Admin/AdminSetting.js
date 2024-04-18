$(document).on('click', ".check_course", function() {
   
    var selectedData = []; // สร้าง array เพื่อเก็บข้อมูลที่ถูกเลือก
        $('.course'+$(this).attr('course_id')+':checked').each(function() {
            selectedData.push($(this).val()); // เพิ่มค่าของ checkbox ที่ถูกเลือกเข้าไปใน array
        });
        var joinedString = selectedData.join("|");

        $.ajax({
            url: "../../admin/Control_admin_setting/UpdateQuotaInCourse",
            type: 'post',
            data: {course_id:$(this).attr('course_id'),course_data:joinedString},
            success: function(response) {
                console.log(response);
                // if (response == 1) {
                //     //alert(1);
                //     //location.reload();
                //     Swal.fire(
                //         'แจ้งเตือน!',
                //         'คุณยืนยันการมอบตัวสำเร็จ!',
                //         'success'
                //     )
                // }
             
    
            }
        });
});

$(document).on('submit', "#FormSurrender1", function(e) {
    e.preventDefault();

    $.ajax({
        url: "../../admin/Control_admin_surrender/UpdateSurrender",
        type: 'post',
        data: $(this).serialize(),
        success: function(response) {
            console.log(response);
            if (response == 1) {
                //alert(1);
                //location.reload();
                Swal.fire(
                    'แจ้งเตือน!',
                    'คุณยืนยันการมอบตัวสำเร็จ!',
                    'success'
                )
            }
            $('#ConfrimSurrender').modal('hide');

        }
    });

});