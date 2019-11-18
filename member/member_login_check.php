<?php
		session_start();
		require "../dbconn.php";
	
		$id=$_REQUEST["user_id"];
		$pw=$_REQUEST["user_pw"];

		if($id=="" && $pw==""){
			echo "<script>
				alert('아이디와 패스워드를 모두 입력해주세요.');
				history.back();
				</script>";
			exit();
		}

		$strSQL="select * from member where u_id='".$id."' and u_pass='".$pw."';";
		$rs=mysql_query($strSQL,$conn);
		$rs_arr=mysql_fetch_array($rs);		
		mysql_close($conn);

		if($rs_arr){			
			$_SESSION[user_id]=$rs_arr[u_id];
			$_SESSION[nickname]=$rs_arr[nickname];
			echo "<script>
				alert('로그인 되었습니다.');
				location.replace('../index.php');
				</script>";
		}
		else{
			echo "<script>
				alert('아이디 또는 패스워드가 일치하지 않습니다.');
				history.back();
				</script>";
		}
?>
