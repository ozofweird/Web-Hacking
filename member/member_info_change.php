<?php
		session_start();
		require "../dbconn.php";

		$pw1=$_POST["user_pw1"];
		$pw2=$_POST["user_pw2"];
		$age=$_POST["age"];
		$nick=$_POST["nick"];
		$email=$_POST["email"];
		if(!$nick) $nick=$_SESSION[nickname];

		$strSQL = "update member set nickname='$nick' ";

		if($pw1) $strSQL .= ", u_pass='$pw1'";
		if($age) $strSQL .= ", age=$age";
		if($email) $strSQL .= ", email='$email'"; 

		$strSQL .= " where u_id='$_SESSION[user_id]'";
		$rs = mysql_query($strSQL);
		if($rs){
			$_SESSION[nickname]=$nick;
			header("Location: member_info.php?ch=1");
		}else{
			header("Location: member_info.php?ch=2");
		}

?>