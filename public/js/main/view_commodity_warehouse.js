$(document).ready(function(){
	//删除提示
	$("a[name='del_commodity_warehouse']").click(function(){
		if(confirm("您确定要删除此商品库存吗（不可恢复）？")){
			return true;
		}
		return false;
	});
});