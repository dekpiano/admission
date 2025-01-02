function formatThaiDate(dateInput) {
	// ชื่อวันภาษาไทย
	const thaiDays = [
	  "อาทิตย์", "จันทร์", "อังคาร", 
	  "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"
	];
  
	// ชื่อเดือนภาษาไทย
	const thaiMonths = [
	  "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", 
	  "พฤษภาคม", "มิถุนายน", "กรกฎาคม", 
	  "สิงหาคม", "กันยายน", "ตุลาคม", 
	  "พฤศจิกายน", "ธันวาคม"
	];
  
	// แปลงวันที่เป็น Date Object
	const date = new Date(dateInput);
  
	if (isNaN(date)) {
	  return "วันที่ไม่ถูกต้อง";
	}
  
	// ดึงข้อมูลวัน เดือน ปี
	const dayOfWeek = thaiDays[date.getDay()];
	const day = date.getDate();
	const month = thaiMonths[date.getMonth()];
	const year = date.getFullYear() + 543; // แปลงปี ค.ศ. เป็น พ.ศ.
  
	// คืนค่าข้อความวันที่ในรูปแบบภาษาไทย
	//return `วัน${dayOfWeek} ที่ ${day} ${month} ${year}`;
	return `${day} ${month} ${year}`;
  }

  
let TBStudentRecruit;
const url = window.location.href;
// แยก URL ด้วย '/' และดึงค่าที่ต้องการ
const parts = url.split('/');
const year = parts[parts.length - 1];

//alert(year);
ShowStudentRecruit(year);
$(document).on("change", "#select_year", function () {
	//alert($(this).val());
	ShowStudentRecruit($(this).val());
});

function ShowStudentRecruit(Year) {
	TBStudentRecruit = $("#TBStudentRecruit").DataTable({
		destroy: true,
		dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'
        ],
		order: [[0, "asc"]],
		processing: true,
		ajax: {
			url: "../../admin/Control_admin_admission/DataRecruitment",
			type: "POST",
			data: { keyYear: Year },
		},
		columnDefs: [
			{ targets: [0, 1, 3, 4, 6, 7, 8], className: "dt-center" },
			{ width: "300px", targets: [2] },
		],
		columns: [
			{
				data: "recruit_status",
				render: function (data, type, row) {
					if (data == "รอการตรวจสอบ") {
						return (
							'<h4><span class=" badge badge-pill badge-warning">' +
							data +
							"</span></h4>"
						);
					} else if (data == "ผ่านการตรวจสอบ") {
						return (
							'<h4><span class=" badge badge-pill badge-success">' +
							data +
							"</span></h4>"
						);
					} else {
						return (
							'<h4><span class=" badge badge-pill badge-danger">' +
							data +
							"</span></h4>"
						);
					}
				},
			},
			{ data: "recruit_Fullname" },
			{ data: "recruit_category" },
			{ data: "recruit_date",
				render: function(data, type, row){
					return formatThaiDate(data);
				}
			 },
			{ data: "recruit_id" },
			{
				data: "recruit_img",
				render: function (data, type, row) {
					return (
						"<img class='img-fluid' src='../../uploads/recruitstudent/m" +
						row.recruit_regLevel +
						"/img/" +
						data +
						"' >"
					);
					//return row.recruit_regLevel;
				},
			},			
			{ data: "recruit_idCard" },
			{
				data: "recruit_regLevel",
				render: function (data, type, row) {
					return "ม." + row.recruit_regLevel;
				},
			},
            { data: "recruit_oldSchool" },
			{ data: "recruit_birthday",
				render: function(data, type, row){
					return formatThaiDate(data);
				}
			 },
			{ data: "recruit_phone" },
			{ data: "recruit_tpyeRoom" },
			{ data: "recruit_certificateAbility",
				render: function (data, type, row) {
					var Ability = data.split("|");
					// วนลูปผ่านอาร์เรย์เพื่อสร้างสตริง HTML ของแท็ก <img>
					var imageTags = Ability.map(function(imageUrl) {
						return "<img class='' src='../../uploads/recruitstudent/m" +row.recruit_regLevel +"/certificateAbility/" + imageUrl.trim() + "' style='width: 200px; height: auto;'>"; // ตั้งค่าขนาดรูปภาพตามต้องการ
					  }).join(' '); // ใช้ว่างเป็นตัวคั่นระหว่างแท็ก <img>
			  
					  return imageTags;
				}, 
			},
			{
				data: "recruit_id",
				render: function (data, type, row) {
					return (
						'<a target="_blank" href="../Control_admin_admission/pdf/' +
						data +
						'" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> พิมพ์ใบสมัคร</a> <a href="../../admin/Recruitment/CheckData/' +
						data +
						'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> ตรวจสอบ</a> <a href="../Control_admin_admission/delete_recruitstudent/' +
						data +
						'" class="btn btn-danger btn-sm" onclick="return confirm(\'ต้องการลบข้อมูลหรือไม่?\')"><i class="fas fa-trash-alt"></i> ลบ</a>'
					);
				},
			},
		],
	});
}

$(document).on('change', "#recruit_status2,#recruit_status1", function() {
    if($(this).prop('checked') && $(this).val() === "ไม่ผ่านการตรวจสอบ"){
        $("#AdminComment").show();
    }else{
        $("#AdminComment").hide();
    }
});
