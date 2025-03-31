$('#TBStuSurrender').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "order": [[ 3, "desc" ]]
});

$(document).on('click', ".CheckRecruitID", function() {
    //alert($(this).attr('key_recruitID'));
    $('#recruit_id').val($(this).attr('key_recruitID'));
});

$(document).on('submit', "#FormSurrender", function(e) {
    e.preventDefault();
        let recruit_id = $('#recruit_id').val();
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
                $('.NoStatusSurrender_'+recruit_id).empty();
                $('.NoStatusSurrender_'+recruit_id).html('<h4><span class=" badge badge-pill badge-success">มอบตัวแล้ว</span></h4>');
              
            }
            $('#ConfrimSurrender').modal('hide');

        }
    });

});