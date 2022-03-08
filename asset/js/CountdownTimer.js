

// countDow("2022/03/07 14:00:00","CountOn","show-3t1400");

function makeTimer() {
  var endTime = new Date("2022/03/09 08:30:00");
  var endTime = (Date.parse(endTime)) / 1000;
  var now = new Date();
  var now = (Date.parse(now) / 1000);
  var timeLeft = endTime - now;
  var days = Math.floor(timeLeft / 86400); 
  var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
  var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
  var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  if (hours < "10") { hours = "0" + hours; }
  if (minutes < "10") { minutes = "0" + minutes; }
  if (seconds < "10") { seconds = "0" + seconds; }
  $("#days").html(days + "<span>วัน</span>");
  $("#hours").html(hours + "<span>ชั่วโมง</span>");
  $("#minutes").html(minutes + "<span>นาที</span>");
  $("#seconds").html(seconds + "<span>วินาที</span>");
}
setInterval(function() { makeTimer(); }, 0);