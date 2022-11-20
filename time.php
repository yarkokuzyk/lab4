<?php $_SESSION['u']+=1;
			echo "You Enter ".$_SESSION['u']."Time Wrong  UID and Password";
			echo "<br><a href='index.php'>Try Again</a>";
			if($_SESSION['u']>2)
			{
				header('location:time.php');
			}
?>