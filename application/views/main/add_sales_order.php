<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/date.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/current_time.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/add_sales_order.js");?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url("public/css/main/add_sales_order.css");?>" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {font-size: 12px}
.STYLE4 {
	font-size: 12px;
	color: #1F4A65;
	font-weight: bold;
}

a:link {
	font-size: 12px;
	color: #06482a;
	text-decoration: none;

}
a:visited {
	font-size: 12px;
	color: #06482a;
	text-decoration: none;
}
a:hover {
	font-size: 12px;
	color: #FF0000;
	text-decoration: underline;
}
a:active {
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.STYLE7 {font-size: 12}

-->
</style>

<script>
var  highlightcolor='#eafcd5';
//此处clickcolor只能用win系统颜色代码才能成功,如果用#xxxxxx的代码就不行,还没搞清楚为什么:(
var  clickcolor='#51b2f6';

function  clickto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=clickcolor&&source.id!="nc")
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=clickcolor;
}
else
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="30"><img src="<?=base_url("public/images/main/tab_03.gif");?>" width="15" height="30" /></td>
        <td width="1101" background="<?=base_url("public/images/main/tab_05.gif");?>"><img src="<?=base_url("public/images/main/311.gif");?>" width="16" height="16" /> <span class="STYLE4">商品管理 >> 销售单管理 >> 新增销售单</span></td>
        <td width="281" background="<?=base_url("public/images/main/tab_05.gif");?>"><table border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              
            </tr>
        </table></td>
        <td width="14"><img src="<?=base_url("public/images/main/tab_07.gif");?>" width="14" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="9" background="<?=base_url("public/images/main/tab_12.gif");?>">&nbsp;</td>
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1">
          <tr>
          	<td bgcolor="#f3ffe3">
          		<input type="hidden" id="app_path" value="<?=site_url();?>" />
          		<div class="div_1">
          			<div class="div_title">
          				<span>新增销售单</span>
          			</div>
          			<!-- app_path -->
          			<input type="hidden" value="<?=site_url();?>" name="app_path" />
          			<!-- app_path End -->
          			<form name="add_storage_order_form" action="<?=site_url("main/add_storage_order/add_order");?>" method="post">
          			<div class="div_content">
          				<div class="div_content_title">
	          				<ul>
	          					<li>销售单号：<input type='text' name='sales_order_number' class='input_1' readonly="readonly" /></li>
	          					<li>日　期：<input type='text' name='sales_date' readonly="readonly" class='input_1' /></li>
	          					<li>会员卡号：<!-- 临时域 --><input type='text' name='serial_number_temp' class='input_1' /><!-- 提交的隐藏域 --><input type='hidden' name='serial_number' /></li>
	          					<li id="sel_serial">
	          						<ul>
	          							<li name="sel_serial_li"><span></span></li>
	          						</ul>
	          					</li>
	          					<li>礼　品：<!-- 临时域 --><input type='text' name='gift_temp' class='input_1' /><!-- 提交的隐藏域 --><input type='hidden' name='gift_name' /></li>
	          					<li id="sel_gift">
	          						<ul>
	          							<li name="sel_gift_li"><span></span></li>
	          						</ul>
	          					</li>
	          				</ul>
	          				<ul>
	          					<li>备　　注：<input type='text' name='remark' class='input_3' /></li>
	          					<li>出货仓库：<select name='warehouse_id' style='width:139px;'>
	          								<?php
	          									if($warehouse_res){
	          										foreach($warehouse_res as $warehouse){
	          											if($warehouse['warehouse_type'] == 1 && $warehouse['warehouse_default'] == 1){
	          												echo "<option value='{$warehouse['id']}' selected='selected'>{$warehouse['warehouse_name']}</option>";
	          											}else{
	          												echo "<option value='{$warehouse['id']}'>{$warehouse['warehouse_name']}</option>";
	          											}
	          										}
	          									}else{
	          										echo "<option value='0'>暂无仓库，请添加！</option>";
	          									}
	          								?>
	          								 </select>
	          					</li>
	          				</ul>
          				</div>
          				<div class="div_content_1">
          					<table class="table_1" cellspacing="0">
          						<tr>
          							<th style='width:40px;'>编号</th><th>商品编号</th><th>商品名称</th><th>品牌</th><th>货号</th><th>颜色</th><th>尺码</th><th>单位</th><th>数量</th><th>吊牌价</th><th>删除</th>
          						</tr>
          						<tr id="tick_tr" style="display:none;"></tr>
          					</table>
          				</div>
          				<div class="div_content_2">
          					<div class="div_content_2_1">
          						<span class="span_2">商品编号：<input type="text" class="input_5" value="请输入商品编号" name="commodity_number" />&nbsp;<a href="javascript:void(0);" id="add_commodity">添加商品</a></span>
          						<span class="span_1">合计数量：<input type="text" class="input_4" name="commodity_num" readonly="readonly" /></span>
          						<span class="span_1">整单金额：<input type="text" class="input_4" name="total_price" readonly="readonly"></span>
          					</div>
          				</div>
          			</div>
          			</form>
          		</div>
          		<div class="div_bottom">
          			<input type="submit" name="storage_submit" class="submit_1" value="提交入库单" />
          		</div>
          	</td>
          </tr>
        </table></td>
        <td width="9" background="<?=base_url("public/images/main/tab_16.gif");?>">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="29"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" height="29"><img src="<?=base_url("public/images/main/tab_20.gif");?>" width="15" height="29" /></td>
        <td background="<?=base_url("public/images/main/tab_21.gif");?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%" height="29" nowrap="nowrap"><span class="STYLE1"></span></td>
            <td width="75%" valign="top" class="STYLE1"><div align="right">
              <table width="352" height="20" border="0" cellpadding="0" cellspacing="0">
                
              </table>
            </div></td>
          </tr>
        </table></td>
        <td width="14"><img src="<?=base_url("public/images/main/tab_22.gif");?>" width="14" height="29" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
