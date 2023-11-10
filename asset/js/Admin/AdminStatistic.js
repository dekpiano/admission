var xValues = ["วิชาการ", "ภาษา", "การงาน", "ศิลปะ", "กีฬา"];
// var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green", "blue", "orange", "brown"];

ChartStudentsRecruitM1();

function ChartStudentsRecruitM1() {
    $.post("../../admin/Control_admin_statistic/ChartStudentsRecruitM1", {
            Year: $('#Year').val()
        },
        function(data, status) {
            console.log(data);
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
            legend: { display: false },
            title: {
                display: true,
                text: "สถิตินักเรียนเข้า ม.1"
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
        function(data, status) {
            console.log(data);
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
            legend: { display: false },
            title: {
                display: true,
                text: "สถิตินักเรียนเข้า ม.4"
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
        function(data, status) {
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
            legend: { display: false },
            title: {
                display: true,
                text: "สถิตินักเรียนเข้า ระหว่างปี"
            }
        }
    };

    var NomalMother = document.getElementById("Mother").getContext("2d");
    window.Mother = new Chart(NomalMother, ChartNomalMother);
}