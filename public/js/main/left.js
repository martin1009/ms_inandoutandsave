$(document).ready(function(){
	//树形菜单单击事件
	$("div[name='fu_menu']").click(function(){
		//显示对应的菜单项
		if($("ul[name='"+$(this).attr("id")+"']").css("display") == "none"){
			$(this).attr("class","dd_div_1_jian");
			$("ul[name='"+$(this).attr("id")+"']").css("display","block");
		}else{
			$(this).attr("class","dd_div_1");
			$("ul[name='"+$(this).attr("id")+"']").css("display","none");
		}
	});
});