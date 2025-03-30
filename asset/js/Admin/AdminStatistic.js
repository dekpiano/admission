var xValues = ["วิชาการ", "ภาษา", "การงาน", "ศิลปะ", "กีฬา"];
var barColors = ["red", "green", "blue", "orange", "brown"];

Chart.register(ChartDataLabels);

ChartStudentsRecruitM1();

function ChartStudentsRecruitM1() {
    $.post("../../admin/Control_admin_statistic/ChartStudentsRecruitM1", {
            Year: $('#Year').val()
        },
        function(data) {
            //console.log(data);
            M1.data.datasets[0].data = data;
            M1.update();
        }, "json"
    );

    var ChartNomalM1 = {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                data: [],
                backgroundColor: barColors
            }]
        },
        options: {
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "สถิตินักเรียนเข้า ม.1"
                },
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    formatter: (value) => value,
                    font: { size: 14 }
                }
            },
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true }
            }
        }
    };

    var NomalM1 = document.getElementById("NomalM1").getContext("2d");
    window.M1 = new Chart(NomalM1, ChartNomalM1);
}

ChartStudentsRecruitM4();

function ChartStudentsRecruitM4() {
    $.post("../../admin/Control_admin_statistic/ChartStudentsRecruitM4", {
            Year: $('#Year').val()
        },
        function(data) {
            //console.log(data);
            M4.data.datasets[0].data = data;
            M4.update();
        }, "json"
    );

    var ChartNomalM4 = {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                data: [],
                backgroundColor: barColors
            }]
        },
        options: {
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "สถิตินักเรียนเข้า ม.4"
                },
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    formatter: (value) => value,
                    font: { size: 14 }
                }
            },
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true }
            }
        }
    };

    var NomalM4 = document.getElementById("NomalM4").getContext("2d");
    window.M4 = new Chart(NomalM4, ChartNomalM4);
}

ChartStudentsRecruitMOther();

function ChartStudentsRecruitMOther() {
    $.post("../../admin/Control_admin_statistic/ChartStudentsRecruitMOther", {
            Year: $('#Year').val()
        },
        function(data) {
            console.log(data);
            Mother.data.datasets[0].data = data;
            Mother.update();
        }, "json"
    );

    var ChartNomalMother = {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                data: [],
                backgroundColor: barColors
            }]
        },
        options: {
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "สถิตินักเรียนเข้า ระหว่างปี"
                },
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    formatter: (value) => value,
                    font: { size: 14 }
                }
            },
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true }
            }
        }
    };

    var NomalMother = document.getElementById("Mother").getContext("2d");
    window.Mother = new Chart(NomalMother, ChartNomalMother);
}


 
        var table = $('#TableReportNormal'); // แทนที่ 'your-table-id' ด้วย ID ของตารางของคุณ

        // ฟังก์ชันคำนวณผลรวมแนวตั้ง
        function calculateColumnTotals() {
          var totals = [];
          table.find('thead tr.NumTitle th').each(function(index) {
          
              var sum = 0;
              table.find('tbody tr').each(function() {
                var value = parseInt($(this).find('td.num').eq(index).text());
                if (!isNaN(value)) {
                  sum += value;
                }
              });
              totals.push(sum);
            
          });
          return totals;
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
        var columnTotals = calculateColumnTotals();
        //console.log(columnTotals);
        
        createTableFooter(columnTotals);
