<!doctype html>
<html>
	<!-- head 부분 -->
	<head> 
		<!-- 상단 title -->
		<title>Web Test Site</title>
		<!-- CSS Style 지정 -->
		<link rel="stylesheet" href="style_contents.css" type="text/css">
	</head>
	<body>
		<!-- 화면 상단 header 부분 -->
			<iframe src="head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
		<!-- 화면 하단 body 부분 -->
		<div id="main_contents" class="contents">
			<h1>
			<?php 
				session_start();
				if($_SESSION[nickname])
					echo $_SESSION[nickname]."님 ";
			?>환영합니다~!!^^</h1>
			<font color="#323232" size="4em">
			웹 해킹을 공부하고 싶은데 연습할 곳이 없으시다구요?<br>
			실제 사이트에 연습하다가는 <strong>!!철컹철컹!!</strong> 아시죠?<br>
			이곳은 Web Hacking 연습을 위한 Test 사이트 입니다.<br>
			이곳에서는 마음껏 연습하세요~!!^^<br>
			</font>
		</div>
	</body>
</html>