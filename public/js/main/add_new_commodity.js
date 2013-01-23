$(document).ready(function(){
	//防空验证
	$("input[name='add_commodity_submit']").click(function(){
		if($("input[name='commodity_name']").val() == ""){
			alert("商品名称不能为空！");
			$("input[name='commodity_name']").focus()
			return false;
		}
		if($("input[name='dan_wei']").val() == ""){
			alert("商品单位不能为空！");
			$("input[name='dan_wei']").focus()
			return false;
		}
		if($("input[name='commodity_serial_number']").val() == ""){
			alert("商品货号不能为空！");
			$("input[name='commodity_serial_number']").focus()
			return false;
		}
		if($("input[name='commodity_color']").val() == ""){
			alert("商品颜色不能为空！");
			$("input[name='commodity_color']").focus()
			return false;
		}
		if($("input[name='commodity_size']").val() == ""){
			alert("商品尺码不能为空！");
			$("input[name='commodity_size']").focus()
			return false;
		}
	});
	//生成商品编号        商品编号=货号+颜色+尺码
	$("input[name='commodity_serial_number'],input[name='commodity_color'],input[name='commodity_size']").blur(function(){
		if($("input[name='commodity_serial_number']").val() != "" && $("input[name='commodity_color']").val() != "" && $("input[name='commodity_size']").val() != ""){
			$("input[name='commodity_number']").val($("input[name='commodity_serial_number']").val()+$("input[name='commodity_color']").val()+$("input[name='commodity_size']").val());
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