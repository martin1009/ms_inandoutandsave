$(document).ready(function(){
	//生成调库单号
	var rand_number = Math.floor(Math.random()*10);
	$("input[name='transfer_order_number']").val("dk-"+_year+_month+_day+_hours+_minute+_sec+rand_number);
	
	//日期单击事件
	$("input[name='transfer_date']").click(function(){
		new Calendar().show(this);
	});
	
	//商品编号框单击事件
	$("input[name='commodity_number']").click(function(){
		if($(this).val() == "请输入商品编号"){
			$(this).val("");  //清空文本框
			$(this).css("color","#000000");  //设置文字颜色
		}
	});
	
	//商品编号框失去焦点事件
	$("input[name='commodity_number']").blur(function(){
		if($(this).val() == ""){
			$(this).val("请输入商品编号");  //设置文本框
			$(this).css("color","#999999");  //设置文字颜色
		}
	});
	
	//商品数量框失去焦点事件
	$("input[name='num[]']").live("blur",function(){
		//商品数量超过库存数量时提示
		var id_str = $(this).attr("id");
		var id = id_str.match(/\d+/g);
		if($(this).val() > parseInt($("#out_warehouse_"+id).html())){
			alert("商品数量超过库存数量！");
			$(this).val("");
			$(this).focus();
			return false;
		}
		//算出整单商品数量
		var total_num = 0;
		$("input[name='num[]']").each(function(){
			if($(this).val() != ""){
				total_num += parseInt($(this).val());
			}
		});
		$("input[name='commodity_num']").val(total_num);
	});
	
	//删除商品事件
	$("a[name='del_commodity']").live("click",function(){
		var id_str = $(this).attr("id");
		var id = id_str.match(/\d+/g);
		if(confirm("您确定要删除此行商品吗？")){
			$("#"+id).detach();
		}
		//合计数量
		var commodity_num = 0;
		$("input[name='num[]']").each(function(){
			commodity_num += parseInt($(this).val());
		});
		$("input[name='commodity_num']").val(commodity_num);
	});
	
	//添加商品单击事件
	$("#add_commodity").click(function(){
		if($("select[name='in_warehouse_id']").val() == $("select[name='out_warehouse_id']").val()){
			alert("调库必须为两个不同的仓库");
			$("select[name='out_warehouse_id']").focus();
			return false;
		}
		var commodity_number = $("input[name='commodity_number']").val();
		if(commodity_number == "请输入商品编号" || commodity_number == ""){
			commodity_number = "-";
		}
		window.open($("#app_path").val()+"/main/add_new_transfer/open_selection_commodity/"+commodity_number+"/"+$("select[name='out_warehouse_id']").val()+"/"+$("select[name='in_warehouse_id']").val()+"/"+Math.random(),"add_storage_order_open_selection_commodity","location=no,menubar=no,resizable=no,scrollbars=no,toolbar=no,width=800px,height=480px,left="+(($(parent.window).width()/2)-400)+"px,top="+(($(parent.parent.window).height()/2)-240)+"px");
	});
	
	//提交订单
	$("input[name='storage_submit']").click(function(){
		//日期防空验证
		if($("input[name='transfer_date']").val() == ""){
			alert("日期不能为空！");
			return false;
		}
		//数量防空验证
		var num = true;
		$("input[name='num[]']").each(function(){
			if($(this).val() == ""){
				num = false;
				alert("商品数量不能为空！");
				$(this).focus();
				return false;
			}
		});
		if(!num){
			return false;
		}
		//提交表单
		$("form[name='add_transfer_order_form']").submit();
	});
});