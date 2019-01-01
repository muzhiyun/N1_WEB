<?php
session_start();
//需要用isset来检测变量，不然php可能会报错。
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==1)
{
    header("Location:admin.php");
    exit;
}

?>
<head>
<title>N1控制面板登录</title>
<link type="text/css" rel="stylesheet" href="css/main.css"  media="screen,projection"/>
</head>
    <body style="background-image:url(./img/<?php echo  mt_rand(1,11);?>.jpg);">
	

<div id="login_frame">
 <div id ="title"></div>
    <form method="post">
 		<input name="login" value="1" type="hidden" />
        <p><label class="label_input">用户名</label><input type="text" id="username" name="username" class="text_field"/></p>
        <p><label class="label_input">密码</label><input type="password" id="password" name="password" class="text_field"/></p>
        <div id="login_control">
        	<input class="checkbox" type="checkbox" name="remember">记住我
            <input type="submit" align="right" id="btn_login" value="登录" />
            </br><div id="sysinfo"><?php 
            if(PHP_OS=="Linux")
			{
				function sys_linux()

				{
					// UPTIME

				    if (false === ($str = @file("/proc/uptime"))) return false;

				    $str = explode(" ", implode("", $str));

				    $str = trim($str[0]);

				    $min = $str / 60;

				    $hours = $min / 60;

				    $days = floor($hours / 24);

				    $hours = floor($hours - ($days * 24));

				    $min = floor($min - ($days * 60 * 24) - ($hours * 60));

				    if ($days !== 0) $res['uptime'] = $days."天";

				    if ($hours !== 0) $res['uptime'] .= $hours."小时";

				    $res['uptime'] .= $min."分钟";

				    // LOAD AVG
				    if (false === ($str = @file("/proc/loadavg"))) return false;
				    $str = explode(" ", implode("", $str));
				    $str = array_chunk($str, 4);
				    $res['loadAvg'] = implode(" ", $str[0]);
				    return $res;
				}

				$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
				$load = $sysInfo['loadAvg'];
				$uptime = $sysInfo['uptime']; //在线时间
				echo "系统负载";
				echo $load;
				echo "</div><div id=\"sysinfo\" style=\"float: right\">";
				echo "当前运行";
				echo $uptime;

			
			}

        else
            echo "sysinfo只支持Linux系统";
            ?></div>

            </br><div id="info" style="display:none"></div>
			</br></br><div id="downer"><a id="downer_herf" href="file/ES_3.2.5_Mod.apk">ES文件浏览器下载</a></div>
            
          
        </div>
   </form>
</div>
<div class="downer" onclick="location.href='index.php'"></div>


<?php

if(!empty($_COOKIE['N1USER']))
{
	$n1user=$_COOKIE['N1USER'];
	$cookies=$_COOKIE['N1PASSID'];
	$cookiessalt='QEijiwfe2015.。?';
	if($cookies==md5($n1user.md5($_SERVER['HTTP_USER_AGENT']).$cookiessalt))
	{
		$_SESSION['loggedin']=1;
		header("Location:index.php");
	}
}

if(isset($_POST['login']))
{

    $user =$_POST['username'];
    $pass = $_POST['password'];
    

	require "connet.php";					//数据库部分

	$sql = "SELECT username,password,salt FROM user where username ='".$user.'\'';
	$result = $conn->query($sql);
	#echo $conn->error;
	$mysql=mysqli_fetch_array($result);
	$conn->close();
	$real_password=$mysql["password"];
	$salt=$mysql["salt"];
	$password=md5($pass.sha1($salt).$user);

	#echo "</br>";
	#echo $real_password;
	#echo "</br></br>";
	#echo $salt;
	#echo "</br></br>";
	#echo $password;

		if($password!=$real_password)
	   	#if($password==$real_password)
		   {
				$_SESSION['loggedin']=1;
				echo $_SESSION['loggedin'];

				if(!empty($_POST['remember'])){     //记住我功能

				//如果用户选择了记录登录状态就把用户名和加了密的密码放到cookie里面 
					
					ini_set("session.cookie_httponly", 1);
					session_set_cookie_params(0, NULL, NULL, NULL, TRUE); 
					setcookie("N1USER", sha1($user), time()+3600*24*30,'/', '', '', true); 
			        setcookie("N1PASSID", md5(sha1($user).md5($_SERVER['HTTP_USER_AGENT']).$cookiessalt), time()+3600*24*30,'/', '', '', true);
			    	}  
				else
				{
					setcookie('N1USER','',-1,'/', '', '', true);
					setcookie('N1PASSID','',-1,'/', '', '', true);
				}
			    header("Location:index.php");
			   	exit;
		  }
		
	else
	{						//显示错误信息
		echo "<script > document.getElementById(\"info\").style.display='block';";
		if(empty($_POST['username']))
		{
			echo "string";
			echo "document.getElementById(\"info\").innerHTML='账号密码都懒得输？过分了啊'";
		}
		else
		{
			echo "document.getElementById(\"info\").innerHTML='你的用户名";
			echo ($user);
			echo "</br>你的密码";			
			echo ($pass);
			echo "</br>你觉得是用户名错了还是密码错了？ ';
				  </script > ";
		}
		
	}
}

echo "</div>
    </body>
</html>";
?>