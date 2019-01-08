<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="keywords" content="bb-sz, bbsz,阅读笔记,天空车, SkyCar" />
	<meta name="description" content="记录阅读笔记" />
<link rel="shortcut icon" href="favicon.png"/>
<title>天空车</title>


</head>
<body bgcolor="#999999">

<form action="myphp/main/addType.php" method="post">
  类型: <input type="text" name="types" id="types" />
  <input type="submit" value=" 添 加 "/>
</form>

<form action="myphp/main/insertUrl.php" method="post">
  网址: <input type="text" name="url" id="url" placeholder="输入要收藏的网址URL"/>
  描述: <input type="text" name="desc" id="desc" placeholder="输入对网址的描述文字"/>
  类型:
<?php
header("Content-type:text/txt; charset=utf-8");
$link = mysql_connect('qdm167448572.my3w.com','qdm167448572','jiang0927'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
mysql_select_db("qdm167448572_db") or die('Could not select database');
$sqlTypes= "SELECT * FROM `main_page_tpyes` GROUP BY `name` ORDER BY `type` ASC ";
$typesRes = mysql_query($sqlTypes,$link) or die(mysql_error());
$typesArray = array();
$typeNamesArray = array();
$count=-1;
while($typesRow=mysql_fetch_array($typesRes)){
	echo "<label><input name=\"type\" type=\"radio\" value=\"";
	$count++;
	$typesArray[$count]=$typesRow["type"];
	$typeNamesArray[$count]=$typesRow["name"];
	echo iconv("GB2312","UTF-8",$typesArray[$count]);
	echo "\" />";
	echo iconv("GB2312","UTF-8",$typeNamesArray[$count]);
	echo "</label>";
}

echo "  <input type=\"submit\" value=\" 添 加 \"/>";
echo "</form>";
echo "</p>";
mysql_free_result($typesRes);

#查询显示的内容

for($i=0;$i<=$count;$i++){
echo "<br>";
echo "<br>";
echo "<p>";
echo "<font color='#FF0000'>";
echo iconv("GB2312","UTF-8",$typeNamesArray[$i]);
echo ":</font>";
echo "</p>";

$contentSql="SELECT * FROM `main_page_tabs` WHERE type =$typesArray[$i]  GROUP BY `desc` ORDER BY `desc` ASC";
$contentRes = mysql_query($contentSql,$link) or die(mysql_error());
while($row=mysql_fetch_array($contentRes)){
echo "<a href="; 
echo iconv("GB2312","UTF-8",$row["url"]);
echo " target=_blank"; 
echo ">";
echo iconv("GB2312","UTF-8",$row["desc"]);
echo "</a>";
echo "<br>";
}
mysql_free_result(contentRes);
}

#关闭连接
mysql_close($link);
?>

<p style="text-align:center"><img src="bb.jpg"></p>

<a>粤ICP备15034859号</a>





</body>
</html>


