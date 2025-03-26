function ViewStatisticsQuota() {
    // ดึงข้อมูลผ่าน AJAX
    $.ajax({
        url: "../Control_Statistic/StatisticViewQuota",
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
        url: "../Control_Statistic/StatisticViewGeneral",
        method: "GET",
        dataType: "json",
        success: function (response) {
            const labels = response.map(item => item.recruit_date);
            const maleData = response.map(item => item.male);
            const femaleData = response.map(item => item.female);

            console.log(femaleData);
            

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
        url: "../Control_Statistic/StatisticViewGeneralTotal",
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