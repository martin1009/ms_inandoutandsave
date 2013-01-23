$(document).ready(function(){
	//结算提示
	$("a[name='settlement_storage']").click(function(){
		if(confirm("您确定要结算此入库单吗？")){
			return true;
		}
		return false;
	});
});