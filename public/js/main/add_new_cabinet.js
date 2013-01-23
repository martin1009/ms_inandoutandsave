$(document).ready(function(){
	//防空验证
	$("input[name='add_cabinet_submit']").click(function(){
		if($("input[name='cabinet_name']").val() == ""){
			alert("商品名称不能为空！");
			$("input[name='commodity_name']").focus()
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