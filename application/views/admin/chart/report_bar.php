<script>
var ctxB = document.getElementById("barChart1").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","กีฬา", "ด้านการงานอาชีพ", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_1;?>,
            barPercentage: 0.5,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        },
        responsive: true,
        title: {
            display: true,
            text: 'สมัครเรียนชั้นมัธยมศึกษาปีที่ 1'
        }
    }
});

var ctxB = document.getElementById("barChart4").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","กีฬา", "ด้านการงานอาชีพ", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_4;?>,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
            display: true,
            text: 'สมัครเรียนชั้นมัธยมศึกษาปีที่ 4'
        }
    }
});

var ctxB = document.getElementById("barChartAll").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'doughnut',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","กีฬา", "ด้านการงานอาชีพ", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_All;?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
            display: true,
            text: 'สมัครเรียนทั้งหมด'
        }
    }
});
</script>