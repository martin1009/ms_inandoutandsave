$(document).ready(function(){
	//提交表单
	$("input[name='initial_input_submit']").click(function(){
		//防空验证
		if($("input[name='commodity_number']").val() == ""){
			alert("商品编号不能为空！");
			$("input[name='commodity_number']").focus()
			return false;
		}
		if($("input[name='input_num']").val() == ""){
			alert("入库数量不能为空！");
			$("input[name='input_num']").focus()
			return false;
		}
	});
});