<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/kindeditor/kindeditor-min.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/date.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/add_new_member.js");?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url("public/css/main/add_new_employee.css");?>" />
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
        <td width="1101" background="<?=base_url("public/images/main/tab_05.gif");?>"><img src="<?=base_url("public/images/main/311.gif");?>" width="16" height="16" /> <span class="STYLE4">系统管理 >> 会员管理 >> 添加新会员</span></td>
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
          		<div class="div_1">
          			<div class="div_title">
          				<span>添加新会员</span>
          			</div>
          			<form action="<?=site_url("main/add_new_member/add_member");?>" method="post">
		          		<ul class="ul_1">
		          			<li>姓　　名：<input type="text" name="name" class="input_1" /><span class="span_1"> * 必须</span></li>
		          			<li>性　　别：<select name="sex"><option value="男">　男　 </option><option value="女" selected="selected">　女　 </option></select></li>
		          			<li>年　　龄：<input type="text" name="age" class="input_1" /></li>
		          			<li>会员卡号：<input type="text" name="serial_number" class="input_1" /><span class="span_1"> * 必须</span></li>
		          			<li>电　　话：<input type="text" name="tel" class="input_1" /></li>
		          			<li>生　　日：<input type="text" name="birthday" class="input_1" /></li>
		          			<li>备　　注：</li>
		          			<li style="height:160px;">
		          				<textarea class="textarea_1" name="remark"></textarea>
		          			</li>
		          			<li style="text-align:center;width:510px;margin-top:10px;">
		          				<input type="submit" name="submit_1" value="添加会员" />
		          			</li>
		          		</ul>
	          		</form>
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
