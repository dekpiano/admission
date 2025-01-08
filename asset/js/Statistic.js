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
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                        },
                        {
                            label: 'หญิง',
                            data: femaleData,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
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