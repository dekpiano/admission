$(document).on('click', ".CheckRecruitID", function() {
    //alert($(this).attr('key_recruitID'));
    $('#recruit_id').val($(this).attr('key_recruitID'));
    let IDrecruit = $(this).attr('key_recruitID');
});

$(document).on('change', '#select_year_Quiz', function() {
    var dataYear = $(this).val();

    Swal.fire({
            title: "แจ้งเตือน",
            text: "คุณได้ทำการเปลี่ยนปีการศึกษาสำเร็จ",
            icon: "warning"
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = dataYear;
            }
        });
});

$(document).on('submit', "#FormCheckQuiz", function(e) {
    e.preventDefault();

    $.ajax({
        url: "../../admin/Control_admin_quiz/UpdateStatusQuiz",
        type: 'post',
        data: $(this).serialize(),
        success: function(response) {
            if (response == 0) {
                console.log(response);
                $('#'+$('#recruit_id').val()).html('สอบไม่ผ่าน');
                $('#'+$('#recruit_id').val()).removeClass('btn-success').addClass('btn-danger');
                
            }
            if(response == 1){
                $('#'+$('#recruit_id').val()).html('สอบผ่าน');
                $('#'+$('#recruit_id').val()).removeClass('btn-danger').addClass('btn-success');
            }
          
            $('#ConfrimSurrender').modal('hide');

        }
    });

});