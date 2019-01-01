<?php
			session_start();
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
<?php
phpinfo();
?>