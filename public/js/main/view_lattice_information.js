$(document).ready(function(){
	//删除提示
	$("a[name='del_lattice']").click(function(){
		if(confirm("您确定要删除此格子信息吗（不可恢复）？")){
			return true;
		}
		return false;
	});
});