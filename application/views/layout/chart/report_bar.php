<script>
var ctxB = document.getElementById("barChart1").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","ด้านการงานอาชีพ","ด้านกีฬา",  "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_1;?>,
            barPercentage: 0.5,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1,
            label: 'จำนวนผู้สมัคร'
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
        
    }
});

var ctxB = document.getElementById("barChart4").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา", "ด้านการงานอาชีพ","ด้านกีฬา", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_4;?>,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1,
            label: 'จำนวนผู้สมัคร'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
       
    }
});

var ctxB = document.getElementById("barChartAll").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'doughnut',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา", "ด้านดนตรี ศิลปะ การแสดง","กีฬา", "ด้านการงานอาชีพ"],
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
        }
       
    }
});



var ctxB = document.getElementById("barChart1_cota").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","กีฬา", "ด้านการงานอาชีพ", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_1_cota;?>,
            barPercentage: 0.5,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1,
            label: 'จำนวนผู้สมัคร'
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

var ctxB = document.getElementById("barChart4_cota").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา", "ด้านการงานอาชีพ","กีฬา", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_4_cota;?>,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1,
            label: 'จำนวนผู้สมัคร'
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

var ctxB = document.getElementById("barChartAll_cota").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'doughnut',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","ด้านการงานอาชีพ","กีฬา",  "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_All_cota;?>,
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
            text: 'รวมรอบโควตาทั้งหมด'
        }
    }
});




var ctxB = document.getElementById("barChart1_all").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา", "ด้านการงานอาชีพ", "กีฬา","ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_1_all;?>,
            barPercentage: 0.5,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1,
            label: 'จำนวนผู้สมัคร'
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

var ctxB = document.getElementById("barChart4_all").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา", "ด้านการงานอาชีพ","กีฬา", "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_4_all;?>,
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            borderWidth: 1,
            label: 'จำนวนผู้สมัคร'
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

var ctxB = document.getElementById("barChartAll_all").getContext('2d');
var myBarChart = new Chart(ctxB, {
    type: 'doughnut',
    data: {
        labels: ["ด้านวิชาการ", "ด้านภาษา","ด้านการงานอาชีพ","กีฬา",  "ด้านดนตรี ศิลปะ การแสดง"],
        datasets: [{
            data: <?=$chart_All_all;?>,
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
            text: 'รวมทุกประเภททั้งหมด'
        }
    }
});




</script>