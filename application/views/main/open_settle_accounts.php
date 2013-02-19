<html>
	<head>
		<title>结算销售单</title>
		<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
		<script charset="utf-8" src="<?=base_url("public/js/main/open_settle_accounts.js");?>"></script>
		<link rel="stylesheet" type="text/css" href="<?=base_url("public/css/main/open_settle_accounts.css");?>" />
	</head>
	<body>
		<div class="div_1">
			<span class="span_1">收银信息</span>
		</div>
		<div class="div_2">
			<span class="span_2">应付金额：</span><input type="text" class="input_1" name="amount_payable" readonly="readonly" value="<?=$total_price;?>" />
		</div>
		<div class="div_2">
			<span class="span_2">实收金额：</span><input type="text" class="input_1" name="paid_in_amount" />
		</div>
		<div class="div_2">
			<span class="span_2">找　　零：</span><input type="text" class="input_1" name="give_change" readonly="readonly" />
		</div>
		<div class="div_bottom">
          	<input type="submit" name="submit" class="submit_1" value="确定(Enter)" />
          	<input type="submit" name="esc" class="submit_1" value="取消(Esc)" />
        </div>
	</body>
</html>