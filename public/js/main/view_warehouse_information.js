$(document).ready(function(){
	//删除提示
	$("a[name='del_warehouse']").click(function(){
		if(confirm("您确定要删除此仓库信息吗（不可恢复）？")){
			return true;
		}
		return false;
	});
});