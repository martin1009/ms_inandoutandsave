$(document).ready(function(){
	//提交事件
	$("#submit").click(function(){
		//用户名防空验证
		if($("input[name='username']").val() == ""){
			alert("请输入用户名！");
			$("input[name='username']").focus();
			return false;
		}
		//密码防空验证
		if($("input[name='password']").val() == ""){
			alert("请输入密码！");
			$("input[name='password']").focus();
			return false;
		}
		//通过提交
		$("#login_form").submit();
	});
	//回车事件
	$(document).keyup(function(event){
		if(event.keyCode == 13){
			$("#submit").click();
		}
	});
});