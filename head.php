<!doctype html>
<html>
	<!-- head 부분 -->
	<head>
		<!-- 상단 title -->
		<title>Web Test Site</title>
		<!-- Character set 지정 -->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
		<!-- CSS Style 지정 -->
		<link rel="stylesheet" href="style_head.css" type="text/css">
	</head>
	<body>
		<?php	session_start();	?>
		<!-- 화면 상단 header 부분 -->
		<div id="area_header">
			<h1>Web Test Site</h1>
		</div>
		<!-- 화면 중간 메뉴 부분 -->
		<div id="area_menu">
			<a href="index.php" target="_parent">홈</a>
			| <a href="board/board_list.php" target="_parent">게시판</a>
	<?php	if(!$_SESSION[user_id]): // 로그인 안된 상태일 때 표시 메뉴 ?>
			| <a href="member/member_login.php" target="_parent">로그인</a>
			| <a href="member/member_register.php" target="_parent">회원가입</a>
	<?php	else:  // 로그인 된 상태일 때 표시 메뉴 ?>
			| <a href="member/member_info.php" target="_parent"><?=$_SESSION[nickname]?>님 정보</a>
			| <a href="member/member_nick.php" target="_parent">닉네임수정</a>
			| <a href="member/member_logout.php" target="_parent">로그아웃</a>
	<?php endif; ?>
		</div>
	</body>
</html>
