<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script charset="utf-8" src="<?=base_url("public/js/jquery.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/paging.js");?>"></script>
<script charset="utf-8" src="<?=base_url("public/js/main/view_commodity_information.js");?>"></script>
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
function  changeto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=highlightcolor&&source.id!="nc"&&cs[1].style.backgroundColor!=clickcolor)
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=highlightcolor;
}
}

function  changeback(){
if  (event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="nc")
return
if  (event.toElement!=source&&cs[1].style.backgroundColor!=clickcolor)
//source.style.backgroundColor=originalcolor
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}

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
        <td width="1101" background="<?=base_url("public/images/main/tab_05.gif");?>"><img src="<?=base_url("public/images/main/311.gif");?>" width="16" height="16" /> <span class="STYLE4">商品管理 >> 商品信息管理 >> 查看所有商品</span></td>
        <td width="281" background="<?=base_url("public/images/main/tab_05.gif");?>"><table border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td width="60"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center">
                        <input type="checkbox" name="checkbox62" value="checkbox" />
                    </div></td>
                    <td class="STYLE1"><div align="center">全选</div></td>
                  </tr>
              </table></td>
              <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="http://localhost/new_inandout/public/images/main/001.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center">新增</div></td>
                  </tr>
              </table></td>
              <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="http://localhost/new_inandout/public/images/main/114.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center">修改</div></td>
                  </tr>
              </table></td>
              <td width="52"><table width="88%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="http://localhost/new_inandout/public/images/main/083.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center">删除</div></td>
                  </tr>
              </table></td>
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
        <td bgcolor="#f3ffe3"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#c0de98" onmouseover="changeto()"  onmouseout="changeback()">
          <tr>
            <td width="6%" height="26" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">选择</div></td>
            <td width="8%" height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">序号</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">商品编号</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">货　号</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">名　称</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">颜　色</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">尺　码</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">单　位</div></td>
            <td height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2 STYLE1">吊牌价</div></td>
            <td width="7%" height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2">编辑</div></td>
            <td width="7%" height="18" background="<?=base_url("public/images/main/tab_14.gif");?>" class="STYLE1"><div align="center" class="STYLE2">删除</div></td>
          </tr>
            <?php
            	if($commodity_res){
            		$i=0;
            		foreach($commodity_res as $commodity){
            			$i++;
            			echo '<tr>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE1"><input name="select" type="checkbox" class="STYLE2" value="'.$commodity['id'].'" /></div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF" class="STYLE2"><div align="center" class="STYLE2 STYLE1">'.$i.'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['commodity_number'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['commodity_serial_number'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['commodity_name'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['commodity_color'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['commodity_size'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['dan_wei'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center" class="STYLE2 STYLE1">'.$commodity['tag_price'].'</div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center"><img src="'.base_url("public/images/main/037.gif").'" width="9" height="9" /><span class="STYLE1"> [</span><a href="'.site_url("main/view_commodity_information/edit_commodity_page/".$commodity['id']).'">编辑</a><span class="STYLE1">]</span></div></td>';
            			echo '<td height="18" bgcolor="#FFFFFF"><div align="center"><span class="STYLE2"><img src="'.base_url("public/images/main/010.gif").'" width="9" height="9" /> </span><span class="STYLE1">[</span><a href="'.site_url("main/view_commodity_information/del_commodity/".$commodity['id']).'" name="del_commodity">删除</a><span class="STYLE1">]</span></div></td>';
            			echo '</tr>';
            		}
            	}else{
            		echo "<tr>";
            		echo "<td colspan='11' style='text-align:center;'>暂无商品信息！</td>";
            		echo "</tr>";
            	}
            ?>
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
            <td width="25%" height="29" nowrap="nowrap"><span class="STYLE1">共<?=$page_data['num_row'];?>条纪录，当前第<?=$page_data['page'];?>/<?=$page_data['page_num'];?>页，每页<?=$page_data['page_row'];?>条纪录</span></td>
            <td width="75%" valign="top" class="STYLE1"><div align="right">
              <table width="352" height="20" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="62" height="22" valign="middle"><div align="right"><img src="<?=base_url("public/images/main/first.gif");?>" width="37" height="15" name="paging" lang="<?=site_url("main/view_commodity_information/index/1");?>" style="cursor: pointer;" /></div></td>
                  <td width="50" height="22" valign="middle"><div align="right"><img src="<?=base_url("public/images/main/back.gif");?>" width="43" height="15" name="paging" lang="<?=site_url("main/view_commodity_information/index/".($page_data['page']-1));?>" style="cursor: pointer;" /></div></td>
                  <td width="54" height="22" valign="middle"><div align="right"><img src="<?=base_url("public/images/main/next.gif");?>" width="43" height="15" name="paging" lang="<?=site_url("main/view_commodity_information/index/".($page_data['page']+1));?>" style="cursor: pointer;" /></div></td>
                  <td width="49" height="22" valign="middle"><div align="right"><img src="<?=base_url("public/images/main/last.gif");?>" width="37" height="15" name="paging" lang="<?=site_url("main/view_commodity_information/index/".$page_data['page_num']);?>" style="cursor: pointer;" /></div></td>
                  <td width="59" height="22" valign="middle"><div align="right">转到第</div></td>
                  <td width="25" height="22" valign="middle"><span class="STYLE7">
                    <input name="page" type="text" class="STYLE1" style="height:10px; width:25px;" size="5" />
                  </span></td>
                  <td width="23" height="22" valign="middle">页</td>
                  <td width="30" height="22" valign="middle"><img src="<?=base_url("public/images/main/go.gif");?>" name="go" lang="<?=site_url("main/view_commodity_information/index");?>" width="37" height="15" style="cursor:pointer;" /></td>
                </tr>
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
