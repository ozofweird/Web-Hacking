<?php
		session_start();
		$nick = $_GET[nick];
		if(!$nick){
			echo "<script>alert('닉네임을 입력하세요');
				history.back();</script>";
			exit;
		}
		require "../dbconn.php";
		$strSQL="update member set nickname='$nick' where u_id='$_SESSION[user_id]'";
		$rs = mysql_query($strSQL);
		if($rs){
			$_SESSION[nickname]=$nick;
			header("Location: member_nick.php?ch=1");
		}else{
			header("Location: member_nick.php?ch=2");
		}

?>