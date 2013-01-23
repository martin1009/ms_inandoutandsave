$(document).ready(function(){
	//防空验证
	$("input[name='add_lattice_submit']").click(function(){
		if($("input[name='lattice_name']").val() == ""){
			alert("格子名称不能为空！");
			$("input[name='lattice_name']").focus()
			return false;
		}
		if($("select[name='cabinet_id']").val() == ""){
			alert("请选择属于哪个仓储柜！");
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