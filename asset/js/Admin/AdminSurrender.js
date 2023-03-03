$(document).on('click', ".CheckRecruitID", function() {
    //alert($(this).attr('key_recruitID'));
    $('#recruit_id').val($(this).attr('key_recruitID'));
});

$(document).on('submit', "#FormSurrender", function(e) {
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