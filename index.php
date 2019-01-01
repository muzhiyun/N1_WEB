<?php
session_start();
//需要用isset来检测变量，不然php可能会报错。
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==1)
{
    header("Location:admin.php");
    exit;
}

//require("../header.html");
?>
    <body style="background:url(./img/<?php echo  mt_rand(1,11);?>.jpg) no-repeat;background-size:100% 100%;">
  <div>
    <div>
      <form  method="post">
        <h3>N1-后台管理</h3>
        <div id="info" style="display:none"></div>
        <input name="login" value="1" type="hidden" />
        <br />
        <input id="username" name="username" placeholder="Username" type="text" />
        <br />
        <input id="password" name="password" placeholder="Password" type="password" />
        <br />
        <!---- <span><a href="#" alt="未开放注册！">注册</a></span> ---->
        <input type="submit" style="float:left;" value="登录" />
      </form>
	  <a id="btn_login" href="file/ES_3.2.5_Mod.apk">ES文件浏览器下载</a> 
    </div>

<?php
if(isset($_POST['login']))
{
    $user =$_POST['username'];
    $password = $_POST['password'];
	
	
    //connect to mysql
    #$dbc = new mysqli('localhost','user','password','upload');
    #$query = "SELECT count(*) FROM user where name ='".$user."' and
	#password = '".sha1($password)."'";							//使用 sha1（）对密码进行了加密
    #$result = mysqli_query($dbc,$query);
	   //if($user=="admin")
	   //{
			 
	   #     echo "数据查询失败！";
	   #     exit;
	   # }
	   # $row = mysqli_fetch_row($result);
	   # $count = $row[0];											//数据库中不应该使用多个相同的用户，所以这里返回的只能是 0或者1
	   if($user=="admin"&&$password=="2017" )
		   {
				echo "密码正确";
				echo $_SESSION['loggedin'];
				echo "</br>";
				$_SESSION['loggedin']=1;
				echo $_SESSION['loggedin'];
				
				
			     header("Location:index.php");
			   exit;
		  }
		/* else
			{
				//echo $_SESSION['loggedin'];
				
			} */
		//} 
		
	else
	{
	echo ("</br>你的用户名");
	echo ($user);
	echo "</br>你的密码";
	echo ($password);											//显示错误信息
	echo" <script > document.getElementById(\"info\").style.display='block';
		  document.getElementById(\"info\").innerHTML='你觉得是用户名错了还是密码错了？ ';
		  </script > ";
	
	}
}

echo "</div>
    </body>
</html>";
?>