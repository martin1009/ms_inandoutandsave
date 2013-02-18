$(document).ready(function(){
	//实收金额获取焦点
	$("input[name='paid_in_amount']").focus();
	//输入实收金额
	$("input[name='paid_in_amount']").keyup(function(event){
		alert(event.keyCode);
	});
	//监控回车
	$(document).keyup(function(event){
		if(event.keyCode == "13"){
			$("input[name='submit']").click();
		}
	});
	//确定
	$("input[name='submit']").click(function(){
		alert("确定");
	});
});