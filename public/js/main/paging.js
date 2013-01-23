$(document).ready(function(){
	//分页
	$("img[name='paging']").click(function(){
		location.href=$(this).attr("lang");
	});
	//跳转
	$("img[name='go']").click(function(){
		if($("input[name='page']").val() == ""){
			alert("请填写跳转至页数！");
			return false;
		}else{
			location.href=$(this).attr("lang")+"/"+$("input[name='page']").val();
		}
	});
});