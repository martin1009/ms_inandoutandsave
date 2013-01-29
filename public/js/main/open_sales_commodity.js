$(document).ready(function(){
	//输入商品编号时触发ajax搜索
	var input_content = "";
	$("input[name='commodity_number']").keyup(function(){
		if($(this).val() != input_content && $(this).val() != ""){
			input_content = $(this).val();
			//清空选择商品表格
			$("#commodity_table").html("<tr id='storage_tr'>"+$("#storage_tr").html()+"</tr>");
			$.post($("#app_path").val()+"/main/add_storage_order/ajax_sel_commodity/"+Math.random(),{commodity_number: $(this).val()},function(data){
				$("#storage_tr").after(data);
			});
		}
	});
	//鼠标经过行时
	$("tr[name='tr_state']").live("mouseover",function(){
		$(this).css("background","#E1E1E1");
	});
	//鼠标单击行时
	$("tr[name='tr_state']").live("click",function(){
		var id_str = $(this).attr("id");
		var id =id_str.match(/\d+/g);  //获取ID号
		$("#state_"+id).attr("checked","checked");
	});
	//鼠标移出行时
	$("tr[name='tr_state']").live("mouseout",function(){
		$(this).css("background","#fff");
	});
	//确定添加商品
	$("input[name='add_commodity_enter']").click(function(){
		if($("input[name='state']:checked").length > 0){
			var id = $("input[name='state']:checked").val();
			//检查商品是否被添加过
			var check = false;
			$("tr[name='content_tr']",opener.document).each(function(){
				if($(this).attr("id") == id){
					check = true;
					alert("此商品已被添加过,请重新选择！");
					return false;
				}
			});
			if(check){
				return false;
			}
			var index = parseInt($("tr[name='content_tr']",opener.document).length)+1;
			var commodity_str = "<tr name='content_tr' id='"+id+"'>";
			commodity_str += "<td align='center'>"+index+"</td>";
			commodity_str += "<td>"+$("#commodity_number_"+id).html()+"</td>";  //商品编号
			commodity_str += "<td>"+$("#commodity_name_"+id).html()+"</td>";  //商品名称
			commodity_str += "<td>"+$("#brand_"+id).html()+"</td>";  //品牌
			commodity_str += "<td>"+$("#commodity_color_"+id).html()+"</td>";  //颜色
			commodity_str += "<td>"+$("#commodity_size_"+id).html()+"</td>";  //尺码
			commodity_str += "<td>"+$("#dan_wei_"+id).html()+"</td>";  //单位
			commodity_str += "<td style='width:65px;padding:0px;'><input type='hidden' name='commodity_id[]' value='"+id+"' /><input type='text' class='input_6' id='num_"+id+"' name='num[]' /></td>";  //数量
			commodity_str += "<td style='width:65px;padding:0px;'><input type='text' class='input_6' id='tag_price_"+id+"' value='"+$("#tag_price_"+id).html()+"' name='tag_price[]' /></td>";  //吊牌价
			commodity_str += "<td name='total' id='total_"+id+"' align='right'>&nbsp;</td>";  //总价
			commodity_str += "<td align='center'><a href='javascript:void();' name='del_commodity' id='del_"+id+"'>删除</a></td>";
			commodity_str += "</tr>";
			$("#tick_tr",opener.document).before(commodity_str);
			window.close();
		}else{
			alert("请选择商品！");
		}
	});
	//取消添加
	$("input[name='add_commodity_quit']").click(function(){
		window.close();
	});
});