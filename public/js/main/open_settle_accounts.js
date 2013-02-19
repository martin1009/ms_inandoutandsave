$(document).ready(function(){
	//实收金额获取焦点
	$("input[name='paid_in_amount']").focus();
	//输入实收金额
	var amount_payable = "";  //应付金额
	var paid_in_amount = "";  //实收金额
	$("input[name='paid_in_amount']").keyup(function(){
		if(paid_in_amount != parseFloat($(this).val())){
			amount_payable = parseFloat($("input[name='amount_payable']").val());  //应付金额
			paid_in_amount = parseFloat($(this).val()) ? parseFloat($(this).val()) : 0;  //实收金额
			$("input[name='give_change']").val(paid_in_amount-amount_payable);
		}
	});
	//监控回车和取消
	$(document).keyup(function(event){
		if(event.keyCode == "13"){
			$("input[name='submit']").click();
		}
		if(event.keyCode == "27"){
			$("input[name='esc']").click();
		}
	});
	//确定
	$("input[name='submit']").click(function(){
		$("input[name='mode']",opener.document).val("settle_accounts");
		$("form[name='add_storage_order_form']",opener.document).submit();
		window.close();
	});
	//取消
	$("input[name='esc']").click(function(){
		window.close();
	});
});