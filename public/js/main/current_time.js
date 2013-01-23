var _date = new Date();
var _year = _date.getFullYear();  //年份
var _month = parseInt(_date.getMonth())+1;  //月份
if(_month < 10){
	_month = "0"+_month;
}
var _day = _date.getDate();  //日
if(_day < 10){
	_day = "0"+_day;
}
var _hours = parseInt(_date.getHours())+1;  //小时
if(_hours < 10){
	_hours = "0"+_hours;
}
var _minute = _date.getMinutes();  //分钟
if(_minute < 10){
	_minute = "0"+_minute;
}
var _sec = _date.getSeconds();  //秒数
if(_sec < 10){
	_sec = "0"+_sec;
}