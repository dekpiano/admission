let TBStudentRecruit;
//alert($('#SelLern').attr('key_year'));
ShowStudentRecruit('2566');
$(document).on('change', '#select_year', function() {
    //alert($(this).val());
    ShowStudentRecruit($(this).val());
});

function ShowStudentRecruit(Year) {
    TBStudentRecruit = $('#TBStudentRecruit').DataTable({
        destroy: true,
        "order": [
            [0, "asc"]
        ],
        'processing': true,
        "ajax": {
            url: "../../admin/Control_admin_admission/DataRecruitment",
            "type": "POST",
            data: { "keyYear": Year }
        },
        'columnDefs': [
            { targets: [0, 1, 3, 4, 6, 7, 8], className: 'dt-center' },
            { width: '300px', targets: [2] }
        ],
        'columns': [{
                data: 'recruit_status',
                render: function(data, type, row) {
                    if (data == "รอการตรวจสอบ") {
                        return '<h4><span class=" badge badge-pill badge-warning">' + data + '</span></h4>';
                    } else if (data == "ผ่านการตรวจสอบ") {
                        return '<h4><span class=" badge badge-pill badge-success">' + data + '</span></h4>';
                    } else {
                        return '<h4><span class=" badge badge-pill badge-danger">' + data + '</span></h4>';
                    }
                }
            },
            { data: 'recruit_category' },
            { data: 'recruit_date' },
            { data: 'recruit_id' },
            {
                data: 'recruit_img',
                render: function(data, type, row) {
                    return "<img class='img-fluid' src='../../uploads/recruitstudent/m" + row.recruit_regLevel + "/img/" + data + "' >";
                    //return row.recruit_regLevel;
                }
            },
            { data: 'recruit_Fullname' },
            { data: 'recruit_idCard' },
            { data: 'recruit_regLevel' },
            { data: 'recruit_birthday' },
            { data: 'recruit_phone' },
            { data: 'recruit_tpyeRoom' },
            {
                data: 'recruit_id',
                render: function(data, type, row) {
                    return '<a target="_blank" href="../Control_admin_admission/pdf/' + data + '" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> พิมพ์ใบสมัคร</a> <a href="../../admin/Recruitment/CheckData/' + data + '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> ตรวจสอบ</a> <a href="../Control_admin_admission/delete_recruitstudent/' + data + '" class="btn btn-danger btn-sm" onclick="return confirm(\'ต้องการลบข้อมูลหรือไม่?\')"><i class="fas fa-trash-alt"></i> ลบ</a>';
                }
            }
        ]
    });
}