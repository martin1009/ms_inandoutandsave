<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/left.js");?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url("public/css/main/left.css");?>" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE2 {color: #43860c; font-size: 12px; }

a:link {font-size:12px; text-decoration:none; color:#43860c;}
a:visited {font-size:12px; text-decoration:none; color:#43860c;}
a:hover{font-size:12px; text-decoration:none; color:#FF0000;}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('<?=base_url("public/images/main/main_26_1.gif");?>','<?=base_url("public/images/main/main_29_1.gif");?>','<?=base_url("public/images/main/main_31_1.gif");?>')">
<table width="177" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed">
      <tr>
        <td height="26" background="<?=base_url("public/images/main/main_21.gif");?>">&nbsp;</td>
      </tr>
      <tr>
        <td height="80" style="background-image:url(<?=base_url("public/images/main/main_23.gif");?>); background-repeat:repeat-x;"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="45"><div align="center"><a href="#"><img src="<?=base_url("public/images/main/main_26.gif");?>" name="Image1" width="40" height="40" border="0" id="Image1" onmouseover="MM_swapImage('Image1','','<?=base_url("public/images/main/main_26_1.gif");?>',1)" onmouseout="MM_swapImgRestore()" /></a></div></td>
            <td><div align="center"><a href="#"><img src="<?=base_url("public/images/main/main_28.gif");?>" name="Image2" width="40" height="40" border="0" id="Image2" onmouseover="MM_swapImage('Image2','','<?=base_url("public/images/main/main_29_1.gif");?>',1)" onmouseout="MM_swapImgRestore()" /></a></div></td>
            <td><div align="center"><a href="#"><img src="<?=base_url("public/images/main/main_31.gif");?>" name="Image3" width="40" height="40" border="0" id="Image3" onmouseover="MM_swapImage('Image3','','<?=base_url("public/images/main/main_31_1.gif");?>',1)" onmouseout="MM_swapImgRestore()" /></a></div></td>
          </tr>
          <tr>
            <td height="25"><div align="center" class="STYLE2"><a href="#">系统管理</a></div></td>
            <td><div align="center" class="STYLE2"><a href="#">日志管理</a></div></td>
            <td><div align="center" class="STYLE2"><a href="#">数据分析</a></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  style="line-height:4px; background:url(<?=base_url("public/images/main/main_38.gif");?>)">&nbsp;</td>
      </tr>
      <tr>
        <td>
        	<!-- 商品管理开始 -->
        	<dl class="dl_1">
        		<dt class="dt_1"><span>商品管理</span></dt>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="sales_order"><span><a href="javascript:void(0);">销售单管理</a></span></div>
        			<ul class="ul_1" name="sales_order">
        				<li class="li_1"><div class="li_div_1"><span><a href="javascript:void(0);">新增销售单</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="javascript:void(0);">查看销售单</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="storage_order"><span><a href="javascript:void(0);">入库单管理</a></span></div>
        			<ul class="ul_1" name="storage_order">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_storage_order/index/".rand(0,100));?>" target="content">新增入库单</a></span></div></li>
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/wait_storage_information/index/1/".rand(0,100));?>" target="content">未结算入库单列表</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_settle_accounts_information/index/1/".rand(0,100));?>" target="content">已结算入库单列表</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="commodity"><span><a href="javascript:void(0);">商品信息管理</a></span></div>
        			<ul class="ul_1" name="commodity">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_commodity/index/".rand(0,100));?>" target="content">添加新商品</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_commodity_information/index/1/".rand(0,100));?>" target="content">查看所有商品信息</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="gift"><span><a href="javascript:void(0);">礼品资料管理</a></span></div>
        			<ul class="ul_1" name="gift">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_gift/index/".rand(0,100));?>" target="content">添加新礼品</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_gift_information/index/1/".rand(0,100));?>" target="content">查看所有礼品信息</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="switch_warehouse"><span><a href="javascript:void(0);">商品调库管理</a></span></div>
        			<ul class="ul_1" name="switch_warehouse">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_transfer/index/".rand(0,100));?>" target="content">新增调库单</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_transfer_information/index/1/".rand(0,100));?>" target="content">查看所有调库单</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_3">
        			<div class="dd_div_2"><span><a href="<?=site_url("main/initial_input/index/".rand(0,100));?>" target="content">期初库存录入</a></span></div>
        		</dd>
        		<dd class="dd_3">
        			<div class="dd_div_2"><span><a href="<?=site_url("main/view_commodity_warehouse/index/1/".rand(0,100));?>" target="content">查看所有商品库存</a></span></div>
        		</dd>
        		<!-- 商品管理结束 End -->
        		
        		<!-- 系统管理开始 -->
        		<dt class="dt_2"><span>系统管理</span></dt>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="staff"><span><a href="javascript:void(0);">员工管理</a></span></div>
        			<ul class="ul_1" name="staff">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_employee/index/".rand(0,100));?>" target="content">添加新员工</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_employee_information/index/1/".rand(0,100));?>" target="content">查看所有员工</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="member"><span><a href="javascript:void(0);">会员管理</a></span></div>
        			<ul class="ul_1" name="member">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_member/index/".rand(0,100));?>" target="content">添加新会员</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_member_information/index/1/".rand(0,100));?>" target="content">查看所有会员</a></span></div></li>
        			</ul>
        		</dd>
        		<dd class="dd_1">
        			<div class="dd_div_1" name="fu_menu" id="warehouse"><span><a href="javascript:void(0);">仓库管理</a></span></div>
        			<ul class="ul_1" name="warehouse">
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_warehouse/index/".rand(0,100));?>" target="content">添加新仓库</a></span></div></li>
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/view_warehouse_information/index/1/".rand(0,100));?>" target="content">查看所有仓库</a></span></div></li>
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_cabinet/index/".rand(0,100));?>" target="content">添加新仓储柜</a></span></div></li>
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/view_cabinet_information/index/1/".rand(0,100));?>" target="content">查看所有仓储柜</a></span></div></li>
        				<li class="li_1"><div class="li_div_1"><span><a href="<?=site_url("main/add_new_lattice/index/".rand(0,100));?>" target="content">添加新格子</a></span></div></li>
        				<li class="li_1"><div class="li_div_2"><span><a href="<?=site_url("main/view_lattice_information/index/1/".rand(0,100));?>" target="content">查看所有格子</a></span></div></li>
        			</ul>
        		</dd>
        		<!-- 系统管理结束 End -->
        		
        		<dd class="dd_1">
        			<div class="dd_div_2"><span><a href="javascript:void(0);">修改用户名和密码</a></span></div>
        		</dd>
        		<dd class="dd_2">
        			<div class="dd_div_2"><span><a href="javascript:void(0);">退出系统</a></span></div>
        		</dd>
        	</dl>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
