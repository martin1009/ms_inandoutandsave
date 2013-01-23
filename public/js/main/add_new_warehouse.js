$(document).ready(function(){
	//防空验证
	$("input[name='add_warehouse_submit']").click(function(){
		if($("input[name='warehouse_name']").val() == ""){
			alert("仓库名称不能为空！");
			$("input[name='warehouse_name']").focus()
			return false;
		}
		if($("input[name='warehouse_default']").val() == ""){
			alert("请选择仓库种类！");
			return false;
		}
	});
	//文本编辑框
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="remark"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
	});
});