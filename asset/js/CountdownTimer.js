
let Time;
function makeTimer() {
    var endTime = new Date(Time);
    var endTime = (Date.parse(endTime)) / 1000;
    var now = new Date();
    var now = (Date.parse(now) / 1000);
    var timeLeft = endTime - now;
    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
    if (hours < "10") { hours = "0" + hours; }
    if (minutes < "10") { minutes = "0" + minutes; }
    if (seconds < "10") { seconds = "0" + seconds; }

    if(timeLeft < 0){
        $("#days").html(0+ "<span>วัน</span>");
        $("#hours").html(0 + "<span>ชั่วโมง</span>");
        $("#minutes").html(0 + "<span>นาที</span>");
        $("#seconds").html(0 + "<span>วินาที</span>");
    }else{
        $("#days").html(days + "<span>วัน</span>");
        $("#hours").html(hours + "<span>ชั่วโมง</span>");
        $("#minutes").html(minutes + "<span>นาที</span>");
        $("#seconds").html(seconds + "<span>วินาที</span>");
    }
    
}
setInterval(function() { makeTimer(); }, 1000);


function CheckOnoff(){
    $.ajax({
        url: 'CheckOnoff',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            //console.log(response.onoff_datetime_regis);
            Time = response.onoff_datetime_regis;
            
        },
        error: function (xhr, status, error) {
            //console.error('Error:', xhr.responseText);
        },
    });
}
CheckOnoff();

