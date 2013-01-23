$(document).ready(function(){
	//生成入库单号
	var rand_number = Math.floor(Math.random()*10);
	$("input[name='purchase_order_number']").val("ms-"+_year+_month+_day+_hours+_minute+_sec+rand_number);
	
	//日期单击事件
	$("input[name='purchase_date']").click(function(){
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
	
	//进价，数量，总价
	$("input[name='purchase_price[]'],input[name='num[]']").live("blur",function(){
		var id = $(this).attr("id");
		id = id.match(/\d+/g);
		if($("#purchase_price_"+id).val() != "" && $("#num_"+id).val() != ""){
			//计算单行进货价
			var purchase_price = parseFloat($("#purchase_price_"+id).val());
			var num = parseInt($("#num_"+id).val());
			$("#total_"+id).html(parseFloat(purchase_price*num));
			//合计数量
			var commodity_num = 0;
			$("input[name='num[]']").each(function(){
				commodity_num += parseInt($(this).val());
			});
			$("input[name='commodity_num']").val(commodity_num);
			//整单金额
			var total_price = 0;
			$("td[name='total']").each(function(){
				total_price += parseFloat($(this).html());
			});
			$("input[name='total_price']").val(total_price);
		}
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
		//整单金额
		var total_price = 0;
		$("td[name='total']").each(function(){
			total_price += parseFloat($(this).html());
		});
		$("input[name='total_price']").val(total_price);
	});
	
	//添加商品单击事件
	$("#add_commodity").click(function(){
		var commodity_number = $("input[name='commodity_number']").val();
		if(commodity_number == "请输入商品编号" || commodity_number == ""){
			commodity_number = "-";
		}
		window.open($("#app_path").val()+"/main/add_storage_order/open_selection_commodity/"+commodity_number+"/"+Math.random(),"add_storage_order_open_selection_commodity","location=no,menubar=no,resizable=no,scrollbars=no,toolbar=no,width=800px,height=480px,left="+(($(parent.window).width()/2)-400)+"px,top="+(($(parent.parent.window).height()/2)-240)+"px");
	});
	
	//提交订单
	$("input[name='storage_submit']").click(function(){
		//日期防空验证
		if($("input[name='purchase_date']").val() == ""){
			alert("日期不能为空！");
			return false;
		}
		//单价防空验证
		var purchase_price = true;
		$("input[name='purchase_price[]']").each(function(){
			if($(this).val() == ""){
				purchase_price = false;
				alert("商品单价不能为空！");
				$(this).focus();
				return false;
			}
		});
		if(!purchase_price){
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
		$("form[name='add_storage_order_form']").submit();
	});
});