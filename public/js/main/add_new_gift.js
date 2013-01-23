$(document).ready(function(){
	//提交添加
	$("input[name='submit_1']").click(function(){
		//防空验证
		if($("input[name='name']").val() == ""){
			alert("请填写礼品名称！");
			$("input[name='name']").focus();
			return false;
		}
		if($("input[name='number']").val() == ""){
			alert("请填写礼品数量！");
			$("input[name='number']").focus();
			return false;
		}
	});
});