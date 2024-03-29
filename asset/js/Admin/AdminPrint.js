$(document).on('change','#SelLevel',function(){
    var mainOption = $(this).val();
    $.ajax({
        url: '../../admin/Control_admin_print/ChangeCouse', // ส่งคำขอไปยังไฟล์ PHP เพื่อดึงข้อมูล
        type: 'POST', 
        data: {mainOption: mainOption},
        success: function(response) { // หลังจากได้ข้อมูลกลับมา
            var data = JSON.parse(response); // แปลงข้อมูล JSON เป็นออบเจ็กต์ JavaScript
            console.log(data);
            var options = '<option value="">เลือกหลักสูตร</option>'; // ตัวเลือกแรก
            for (var i = 0; i < data.length; i++) {
                options += '<option value="' + data[i].course_id + '">' + data[i].course_initials + '</option>'; // สร้างตัวเลือก
            }
            $('#SelCourse').html(options); // เพิ่มตัวเลือกในแท็ก <select>
        }
    });
});

$(document).on('submit', "#DownloadRecruit", function(e) {
    e.preventDefault();
    let SelYear = $('#SelYear').val();
    let SelQuota = $('#SelQuota').val();
    let SelFloor = $('#SelFloor').val();
    let SelCourse = $('#SelCourse').val();
      // เพิ่มคลาส 'disabled' เพื่อป้องกันการคลิกซ้ำ
      $('#submit_btn').addClass('disabled');
      // เปลี่ยนข้อความบนปุ่มเป็น "Loading..."
      $('#submit_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

    $.ajax({
        url: "../../admin/Control_admin_print/DownloadPDF/"+SelYear+"/"+SelQuota+"/"+SelFloor+"/"+SelCourse,
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            window.open('../../admin/Control_admin_print/DownloadPDF/'+SelYear+'/'+SelQuota+'/'+SelFloor+'/'+SelCourse, '_blank');
            $('#submit_btn').removeClass('disabled');
          // เปลี่ยนข้อความบนปุ่มกลับเป็น "Submit"
          $('#submit_btn').html('ค้นหา'); 

        }
    });
});
