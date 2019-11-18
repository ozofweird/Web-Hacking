<?php
		session_start();

		if($_SESSION["user_id"] != ""){
			session_destroy();
			echo "<script>
				alert('로그아웃 되었습니다.');
				location.replace('member_login.php')				
			</script>";
		}
		else{
			echo "<script>
				alert('로그인 상태가 아닙니다.');
				history.back();
			</script>";
		}	
?>