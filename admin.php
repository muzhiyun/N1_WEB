			<?php
			session_start();
			$logout=@$_GET['logout'];
			if($logout ==1)  
			{
				$_SESSION['loggedin']=0;
				setcookie('N1USER','',-1,'/', '', '', true);
				setcookie('N1PASSID','',-1,'/', '', '', true);
			}
			if($_SESSION['loggedin']!=1)
			{
				echo "<p align=center>" ;
				echo "<font color=#ff0000 size=5><strong><big>" ;
				echo "你没有登录,请<a href='index.php'>登录</a>!" ;
				echo "</big></strong></font></p>" ;
				header("Location:index.php");
				exit;
			}
			?>
<head>
<title>N1控制面板</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style type="text/css">
nav{
	background-color:#26a69a;
}
.btn, .btn-large, .btn-small, .btn-flat {
	text-transform:capitalize;
}
</style>
</head>
<body>

 <nav>
    <div class="nav-wrapper">
      <a href="#" class="leftbrand-logo">&emsp;NAS管理</a>
      <ul id="nav-mobile" class="right">
        <li><a href="?logout=1">退出</a></li>
        <!-----<li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
		---->
      </ul>
    </div>
  </nav>
<table class="responsive-table">
        <thead class="centered">
          <tr>
              <th>控制台</th> 
          </tr>
        </thead>
        <tbody>
          <tr>
			<?php
			$url=$_SERVER['HTTP_HOST'];
			#echo ($url);
			echo"<td><a href=\"http://$url:8080\" target=\"_blank\" class=\"waves-effect waves-light btn\">后台管理</a></td>";
			echo"<td><a href=\"https://$url:4200\" target=\"_blank\" class=\"waves-effect waves-light btn\">webshell</a></td>";
			echo"<td><a href=\"http://$url:8080/mysql/\" target=\"_blank\" class=\"waves-effect waves-light btn\">mysql</a></td>";
			?>
          </tr>

          </tbody>
		  
		<thead>
			<tr>
				<th>资源&emsp;</th> 
			</tr>
		</thead>
		  <tbody>
          <tr>
           <?php
		   echo"<td><a href=\"http://$url:8000\" target=\"_blank\" class=\"waves-effect waves-light btn\">局域网云盘</a></td>
			
			<td><a href=\"ftp://$url\" target=\"_blank\" class=\"waves-effect waves-light btn\">局域网ftp</a></td>";
			?>
			<td><a href="http://pt.xsyu.edu.cn/torrents.php" target="_blank" class="waves-effect waves-light btn">柚子pt站</a>
			<td><a href="https://npupt.com/index.php" target="_blank" class="waves-effect waves-light btn">蒲公英pt站</a></td>
			</tr>
			<tr>
			<td><a href="http://hdhome.org/torrents.php" target="_blank" class="waves-effect waves-light btn">HDhome</a></td>
			<td><a href="https://www.bdys.co/" target="_blank" class="waves-effect waves-light btn">BD影视</a></td>
			<td><a href="http://iptv.xsyu.edu.cn" target="_blank" class="waves-effect waves-light btn">石大在线电视</a></td>
          </tr>
		  </tbody>
		  
		  <thead>
			<tr>
				<th>下载&emsp;</th> 
			</tr>
		</thead>
		   <tbody>
          <tr>
           <?php
		echo"<td><a href=\"http://$url/ariaNg/\" target=\"_blank\" class=\"waves-effect waves-light btn\">AriaNg磁力普通下载</a></td>";
		echo"<td><a href=\"http://$url:9091/transmission/web/\" target=\"_blank\" class=\"waves-effect waves-light btn\">种子下载</a></td>";
			?>
          </tr>
		  
		 
		 <thead>
			<tr>
				<th>工具&emsp;</th> 
			</tr>
		</thead>
		 <tbody>
          <tr>
		  <?php
			echo"<td><a href=\"http://$url/about.php\" target=\"_blank\" class=\"waves-effect waves-light btn\">php_info()</a></td>";
          	echo"<td><a href=\"http://$url/tz.php\" target=\"_blank\" class=\"waves-effect waves-light btn\">探针</a></td>";
			?>
			<td><a href="http://geoip.neu6.edu.cn/" target="_blank" class="waves-effect waves-light btn">ipv6测试</a></td>
          </tr>
         </tbody>
      </table>
<?php
#echo"<a href=\"http://$url\" target=\"_blank\" class=\"waves-effect waves-light btn\">管理界面</a></br></br>";
#echo"<a href=\"http://$url\" target=\"_blank\" class=\"waves-effect waves-light btn\">管理界面</a></br></br>";
#echo"<a href=\"http://$url\" target=\"_blank\" class=\"waves-effect waves-light btn\">管理界面</a></br></br>";
#echo "</div>";
echo "<script type=\"text/javascript\" src=\"js/materialize.min.js\"></script>";
echo "</body>";
?>