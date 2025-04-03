let Year = $("#year").val();


function ViewStatisticsQuota() {
    // ดึงข้อมูลผ่าน AJAX
    $.ajax({
        url: "../Control_Statistic/StatisticViewQuota/"+Year,
        method: "GET",
        dataType: "json",
        success: function (response) {
            const labels = response.map(item => item.recruit_date);
            const maleData = response.map(item => item.male);
            const femaleData = response.map(item => item.female);

            if (labels.length === 1) {
                labels.push(""); // เพิ่มจุดข้อมูลเปล่า
                maleData.push(0); // เพิ่มค่า 0
                femaleData.push(0); // เพิ่มค่า 0
            }

            // สร้างกราฟด้วย Chart.js
            const ctx = document.getElementById('registrationChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'ชาย',
                            data: maleData,
                            backgroundColor: 'rgba(54, 162, 235, 1)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                        },
                        {
                            label: 'หญิง',
                            data: femaleData,
                            backgroundColor: 'rgba(255, 99, 132, 1)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            ticks: {
                                beginAtZero: true, // เริ่มที่ 0
                                min: 0,            // บังคับค่าต่ำสุด
                                stepSize: 1        // เพิ่มทีละ 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true // เปิดการแสดง Tooltips
                        },
                        datalabels: { 
                            color: '#fff', // สีตัวเลขเป็นสีขาว
                            font: { weight: 'bold', size: 12 },
                            formatter: (value) => value // แสดงค่าตัวเลข
                        }
                    }
                },
                plugins: [ChartDataLabels] // ใช้ plugin datalabels
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        }
    });
}

ViewStatisticsQuota();

function ViewStatisticsGeneral() {
    // ดึงข้อมูลผ่าน AJAX
    $.ajax({
        url: "../Control_Statistic/StatisticViewGeneral/"+Year,
        method: "GET",
        dataType: "json",
        success: function (response) {
            const labels = response.map(item => item.recruit_date);
            const maleData = response.map(item => item.male);
            const femaleData = response.map(item => item.female);

            //console.log(femaleData);
            

            if (labels.length === 1) {
                labels.push(""); // เพิ่มจุดข้อมูลเปล่า
                maleData.push(0); // เพิ่มค่า 0
                femaleData.push(0); // เพิ่มค่า 0
            }

            // สร้างกราฟด้วย Chart.js
            const ctx = document.getElementById('ChartGeneral').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'ชาย',
                            data: maleData,
                            backgroundColor: 'rgba(54, 162, 235, 1)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                        },
                        {
                            label: 'หญิง',
                            data: femaleData,
                            backgroundColor: 'rgba(255, 99, 132, 1)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            ticks: {
                                beginAtZero: true, // เริ่มที่ 0
                                min: 0,            // บังคับค่าต่ำสุด
                                stepSize: 1        // เพิ่มทีละ 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true // เปิดการแสดง Tooltips
                        },
                        plugins: {
                            legend: { position: 'bottom' }
                        },
                        title: { 
                            display: true, 
                            text: 'สถิติการสมัครเรียนตามวัน', // ข้อความ Title
                            font: { size: 14 }, // ขนาดตัวอักษร
                            padding: 15 // ระยะห่างจากกราฟ
                        },
                        datalabels: { 
                            color: '#fff', // สีตัวเลขเป็นสีขาว
                            font: { weight: 'bold', size: 16 },
                            formatter: (value) => value // แสดงค่าตัวเลข
                        }
                    }
                },
                plugins: [ChartDataLabels] // ใช้ plugin datalabels
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", error);
        }
    });
}

ViewStatisticsGeneral();

// กราฟวงกลม
function genderChart() {

    $.ajax({
        url: "../Control_Statistic/StatisticViewGeneralTotal/"+Year,
        method: "GET",
        dataType: "json",
        success: function (response) {
            const maleData = response.male;
            const femaleData = response.female;


var ctx = document.getElementById('genderPieChart').getContext('2d');

            var genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['ชาย', 'หญิง'],
                    datasets: [{
                        data: [maleData, femaleData], // ค่าจริงควรดึงจากฐานข้อมูล
                        backgroundColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        title: { 
                            display: true, 
                            text: 'สถิติการสมัครเรียนแยกตามเพศ (ทังหมด)', // ข้อความ Title
                            font: { size: 14 }, // ขนาดตัวอักษร
                            padding: 15 // ระยะห่างจากกราฟ
                        },
                        datalabels: { 
                            color: '#fff', // สีตัวเลขเป็นสีขาว
                            font: { weight: 'bold', size: 16 },
                            formatter: (value) => value // แสดงค่าตัวเลข
                        }
                    }
                },
                plugins: [ChartDataLabels] // เปิดใช้งาน Plugin
            });
            

        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", xhr.responseText);
        }
    });
}
genderChart();

// อาร์เรย์ของสี
const colors = [
    'rgba(255, 99, 132, 0.7)',
    'rgba(54, 162, 235, 0.7)',
    'rgba(255, 206, 86, 0.7)',
    'rgba(75, 192, 192, 0.7)',
    'rgba(153, 102, 255, 0.7)'
  ];

function ViewStatisticSport() {
    // ดึงข้อมูลผ่าน AJAX
    $.ajax({
        url: "../Control_Statistic/StatisticViewQuotaSport/"+Year,
        method: "GET",
        dataType: "json",
        success: function (response) {
            const labels = response.map(item => item.recruit_major);
            const Tatal = response.map(item => item.Tatal);
            // const femaleData = response.map(item => item.female);

            console.log(response);
            

            if (labels.length === 1) {
                labels.push(""); // เพิ่มจุดข้อมูลเปล่า
                Tatal.push(0); // เพิ่มค่า 0
                //femaleData.push(0); // เพิ่มค่า 0
            }

            // สร้างกราฟด้วย Chart.js
            const ctx = document.getElementById('ChartSport').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'ทั้งหมด',
                            data: Tatal,
                            backgroundColor: colors[0],
                            borderColor: colors[0],
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            ticks: {
                                beginAtZero: true, // เริ่มที่ 0
                                min: 0,            // บังคับค่าต่ำสุด
                                stepSize: 1        // เพิ่มทีละ 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true // เปิดการแสดง Tooltips
                        },
                        plugins: {
                            legend: { position: 'bottom' }
                        },
                        title: { 
                            display: true, 
                            text: 'สถิติการสมัครเรียนกีฬา', // ข้อความ Title
                            font: { size: 14 }, // ขนาดตัวอักษร
                            padding: 15 // ระยะห่างจากกราฟ
                        },
                        datalabels: { 
                            color: '#fff', // สีตัวเลขเป็นสีขาว
                            font: { weight: 'bold', size: 14 },
                            formatter: (value) => value // แสดงค่าตัวเลข
                        }
                    }
                },
                plugins: [ChartDataLabels] // ใช้ plugin datalabels
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", xhr.responseText);
        }
    });
}

ViewStatisticSport();

// กราฟวงกลมกีฬา
function genderChartQuotaSport() {

    $.ajax({
        url: "../Control_Statistic/StatisticViewQuotaSportFM/"+Year,
        method: "GET",
        dataType: "json",
        success: function (response) {
            const maleData = response.male;
            const femaleData = response.female;


var ctx = document.getElementById('genderPieChartSport').getContext('2d');

            var genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['ชาย', 'หญิง'],
                    datasets: [{
                        data: [maleData, femaleData], // ค่าจริงควรดึงจากฐานข้อมูล
                        backgroundColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        title: { 
                            display: true, 
                            text: 'สถิติการสมัครเรียนแยกตามเพศ (กีฬา)', // ข้อความ Title
                            font: { size: 14 }, // ขนาดตัวอักษร
                            padding: 15 // ระยะห่างจากกราฟ
                        },
                        datalabels: { 
                            color: '#fff', // สีตัวเลขเป็นสีขาว
                            font: { weight: 'bold', size: 16 },
                            formatter: (value) => value // แสดงค่าตัวเลข
                        }
                    }
                },
                plugins: [ChartDataLabels] // เปิดใช้งาน Plugin
            });
            

        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: ", xhr.responseText);
        }
    });
}
genderChartQuotaSport();

function calculateSum() {
    $("#CalculateTableNormal tbody tr").each(function () {
        let rowSum = 0;

        $(this)
            .find("td.num")
            .each(function (index) {
                let value = parseInt($(this).text()) || 0;
                rowSum += value;
                let totalCell = $(".col-total").eq(index);
                totalCell.text((parseInt(totalCell.text()) || 0) + value);
            });

       // $(this).find("td:last").text(rowSum); // อัปเดตผลรวมของแถว
    });

    let grandTotal = 0;
    $(".totalAll").each(function () {
        grandTotal += parseInt($(this).text()) || 0;        
        
    });

    $(".col-total:last").text(grandTotal); // อัปเดตผลรวมทั้งหมด
    
}
calculateSum();




// สถิติโควตาเขตพื้นที่
var table = $('#TbStatisticQcota'); 

// ฟังก์ชันคำนวณผลรวมแนวตั้ง
function calculateColumnTotals() {
  var totals = [];
  table.find('thead tr th.TitleQ').each(function(index) {
  
      var sum = 0;
      table.find('tbody tr').each(function() {
        var value = parseInt($(this).find('td.NumQ').eq(index).text());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      totals.push(sum);
    
  });
  return totals;
}

// ฟังก์ชันคำนวณผลรวมแนวนอน
function calculateRowTotals() {
    table.find('tbody tr').each(function() {
      var row = $(this);
      var sum = 0;
      row.find('td').each(function(index) {
        if (index > 0) { // ข้ามคอลัมน์แรก (วันที่)
          var value = parseInt($(this).text());
          if (!isNaN(value)) {
            sum += value;
          }
        }
      });
      row.append('<td class="NumQ text-danger text-center bg-light font-weight-bold">' + sum + '</td>'); // เพิ่มผลรวมแนวนอนในคอลัมน์สุดท้าย
    });
  }


// สร้าง tfoot และแสดงผลรวมแนวตั้ง
function createTableFooter(columnTotals) {
  var footer = $('<tfoot><tr class="text-center bg-light font-weight-bold text-danger"><td>รวม</td></tr></tfoot>');
  for (var i = 0; i < columnTotals.length; i++) {
    footer.find('tr').append('<td>' + columnTotals[i] + '</td>');
  }
  table.append(footer);
}

// เรียกใช้ฟังก์ชัน
calculateRowTotals()
var columnTotals = calculateColumnTotals();
//console.log(columnTotals);
createTableFooter(columnTotals);
