
if((".clock").length > 0) {
    var theDay = moment.tz('2019-03-29 08:00:00', 'America/Mexico_City');
    var today = moment.tz('America/Mexico_City');

    $('.clock').FlipClock((theDay.valueOf() - today.valueOf())/1000, {
        clockFace: 'DailyCounter',
        language: 'spanish',
        countdown: true
    });
}