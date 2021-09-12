function stringDayTime(time, classDayTime, classTime) {
    var year = time.getFullYear();
    var month = time.getMonth();
    var day = time.getDate();
    var hour = time.getHours();
    var min = time.getMinutes();
    var sec = time.getSeconds();
    var weekday = time.getDay();
    if (hour < 10) {
        hour = '0' + hour;
    }
    if (min < 10) {
        min = '0' + min;
    }
    if (sec < 10) {
        sec = '0' + sec;
    }
    switch (weekday) {
        case 0:
            weekday = 'Chủ nhật';
            break;
        case 1:
            weekday = 'Thứ hai';
            break;
        case 2:
            weekday = 'Thứ ba';
            break;
        case 3:
            weekday = 'Thứ tư';
            break;
        case 4:
            weekday = 'Thứ năm';
            break;
        case 5:
            weekday = 'Thứ sáu';
            break;
        case 6:
            weekday = 'Thứ bảy';
            break;
    }
    $(`.${classDayTime}`).html(`${weekday}, ngày ${day} tháng ${month} năm ${year}`);
    $(`.${classTime}`).html(`${hour}:${min}:${sec}`);
}

window.stringDayTime = stringDayTime;
