<!doctype html>
<html>
	<!-- head 부분 -->
	<head> 
		<!-- 상단 title -->
		<title>로그인</title>
		<!-- CSS Style 지정 -->
		<link rel="stylesheet" href="../style_contents.css" type="text/css">			
	</head>
	<body>
		<!-- 화면 상단 header 부분 -->
			<iframe src="../head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
		<!-- 화면 하단 body 부분 -->
		<div id="login_contents" class="contents">	
		<?php 
			session_start();
			if($_SESSION[user_id])
			{
				echo "<script>
				alert('이미 로그인 된 상태입니다.');
				location.replace('../index.php')				
				</script>";
				exit;
		 	}else{	?>

		<form method="post" action="member_login_check.php">
		<table>
			<tr>
				<th colspan="2" style="background-color: #323232" >
					<font style="color: white; font-size: 150%;" >LOGIN</font>
				</th>

			</tr>
			
			<tr>
				<th>ID</th>
				<td class="input"><input type="text" name="user_id" style="border: 0;" maxlength="12"></td>
			</tr>
			<tr>
				<th>PASSWORD</th>
				<td class="input"><input type="password" name="user_pw" style="border: 0;" maxlength="20"></td>
			</tr>			
		</table>
		<p>
			<input type="submit" value="로그인" class="btn_default btn_gray" >		
		</p>
		</form>
	<?php }	?>
		</div>
	</body>
</html>


