//$(document).ready(function(){
	//文本编辑框
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="remarks"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
	});
	//日期控件
	$("input[name='entry_time']").click(function(){
		new Calendar().show(this);
	});
	//防空验证
	$("input[name='submit_1']").click(function(){
		if($("input[name='name']").val() == ""){
			alert("姓名不能为空！");
			$("input[name='name']").focus();
			return false;
		}
		if($("input[name='number']").val() == ""){
			alert("员工编号不能为空！");
			$("input[name='name']").focus();
			return false;
		}
		if($("input[name='entry_time']").val() == ""){
			alert("员工入职时间不能为空！");
			$("input[name='name']").focus();
			return false;
		}
		return true;
	});
});