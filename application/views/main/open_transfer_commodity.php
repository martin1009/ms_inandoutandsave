<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>选择商品</title>
<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/date.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/open_transfer_commodity.js");?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url("public/css/main/open_selection_commodity.css");?>" />
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
        <td width="1101" background="<?=base_url("public/images/main/tab_05.gif");?>"><span class="STYLE4"></span></td>
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
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" style="margin:auto;">
          <tr>
          	<td bgcolor="#f3ffe3">
          		<!-- 内容开始 -->
          		<div class="div_1">
          			<div class="div_title">
          				<span>选择商品</span>
          			</div>
          			<!-- 项目地址 -->
          			<input type='hidden' value='<?=site_url();?>' id='app_path' />
          			<!-- 项目地址End -->
          			<div class="div_content">
          				<div class="div_content_top">
          					<span>商品编号：<input type="text" name="commodity_number" /></span>
          				</div>
          				<div class="div_content_1">
          					<table cellspacing="0" class="table_1" id="commodity_table">
          						<tr id="storage_tr">
          							<th style='width:40px;'>状态</th><th>商品编号</th><th>商品名称</th><th>单位</th><th>品牌</th><th>货号</th><th>颜色</th><th>尺码</th><th>出货仓库</th><th>库存数量</th><!-- <th>库存</th> -->
          						</tr>
          						<?php
          							if($commodity_res){
          								foreach($commodity_res as $commodity){
	          								echo "<tr name='tr_state' id='tr_{$commodity['id']}'>";
	          								echo "<td style='text-align:center;'><input type='radio' name='state' id='state_{$commodity['id']}' value='{$commodity['id']}' /></td>";  //状态
	          								echo "<td style='text-align:center;' id='commodity_number_{$commodity['id']}'>{$commodity['commodity_number']}</td>";  //商品编号
	          								echo "<td id='commodity_name_{$commodity['id']}'>{$commodity['commodity_name']}</td>";  //商品名称
	          								echo "<td style='text-align:center;' id='dan_wei_{$commodity['id']}'>{$commodity['dan_wei']}</td>";  //单位
	          								echo "<td id='brand_{$commodity['id']}'>{$commodity['brand']}</td>";  //品牌
	          								echo "<td style='text-align:right;' id='commodity_serial_number_{$commodity['id']}'>{$commodity['commodity_serial_number']}</td>";  //货号
	          								echo "<td id='commodity_color_{$commodity['id']}'>{$commodity['commodity_color']}</td>";  //颜色
	          								echo "<td style='text-align:right;' id='commodity_size_{$commodity['id']}'>{$commodity['commodity_size']}</td>";  //尺码
	          								echo "<td style='text-align:right;' id='warehouse_name_{$commodity['id']}'>{$out_warehouse_name}</td>";  //出货仓库
	          								echo "<td style='text-align:right;' id='inventory_number_{$commodity['id']}'>{$commodity['inventory_number']}</td>";  //库存
	          								echo "</tr>";
          								}
          							}else{
          								echo "<tr>";
          								echo "<td colspan='10' style='text-align:center;'>没有找到相关商品,请检查后重新输入！</td>";
          								echo "</tr>";
          							}
          						?>
          					</table>
          				</div>
          				<div>
          					<input type="button" name="add_commodity_quit" value="取　消" class="button_1" />
          					<input type="button" name="add_commodity_enter" value="确　定" class="button_1" />
          				</div>
          			</div>
          		</div>
          		<!-- 内容结束 End -->
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
