$(document).ready(function(){
	//让主DIV垂直居中
	$("#main_div").css("margin-top",$(document).height()/4);
	//让内容DIV垂直居中
	$("#content_div_1").css("margin-top",($("#content_div").height()/2)-($("#content_div_1").height()/2));
	//==========================倒计时开始========================
	function content_time(){
		var time_text = $("#time_text").html()-1;
		if(time_text < 1){
			clearInterval(set_id);
			location.href=$("#jump_url").attr("href");
		}else{
			$("#time_text").html(time_text);
		}
	}
	var set_id = setInterval(content_time,1000);
	//==========================倒计时结束========================
});