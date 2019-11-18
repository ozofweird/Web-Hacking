<!doctype html>
<html>
	<!-- head 부분 -->
	<head>
		<!-- 상단 title -->
		<title>게시판</title>
		<!-- CSS Style 지정 -->
		<link rel="stylesheet" href="../style_contents.css" type="text/css">
		<script>
			function ck(){
				if(document.dform.b_pass.value==""){
					alert("비밀번호를 입력해주세요.");
					document.dform.b_pass.focus();
					return false;
				}
				document.dform.submit();
			}
		</script>
	</head>
	<body>
		<!-- 화면 상단 header 부분 -->
		<iframe src="../head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
		<!-- 화면 하단 body 부분 -->
		<div id="board_contents" class="contents">
		<?php
			session_start();
			require("../dbconn.php");

			// 글 조회 수 증가 시키기
			$r_num = $_GET["num"];
			$strSQL = "update board set viewCount=viewCount+1 where strNumber=".$r_num.";";
			mysql_query($strSQL);

			// 글 내용 조회 해오기
			$strSQL = "select * from board where strNumber=".$r_num.";";
			$rs = mysql_query($strSQL);
			$rs_arr = mysql_fetch_array($rs);

			$b_num = $rs_arr["strNumber"];
			$b_name = $rs_arr["strName"];
			$b_email = $rs_arr["strEmail"];
			$b_sub = $rs_arr["strSubject"];
			$b_cont = $rs_arr["strContent"];
			$b_tag = $rs_arr["htmlTag"];
			$b_no = $rs_arr["viewCount"];
			$b_date = $rs_arr["writeDate"];
			$b_fname = $rs_arr["filename"];
			$b_fsize = $rs_arr["filesize"];

			// html 사용안하는 게시글은 html encoding 처리
			if($b_tag == "F"){
				$b_cont = htmlspecialchars($b_cont);
			}
		?>

		<!--게시글 표시 테이블 -->
		<table width="600" border="1" cellpadding="2" class="grayColor">
			<tr>
				<th colspan="5" style="background-color: #323232" >
					<font style="color: white; font-size: 150%;" >내용 보기</font>
				</th>
			</tr>
			<tr>
				<th width="15%"><font>이름</font></th>
				<td width="35%"><font><?=$b_name;?></font></td>
				<th width="15%"><font>등록일</font></th>
				<td width="35%"><font><?=$b_date;?></font></td>
			</tr>
			<tr>
				<th width="15%"><font>이메일</font></th>
				<td width="35%"><font><a href="mailto:<?=$b_email;?>"><?=$b_email;?></a></font></td>
				<th width="15%"><font>조회</font></th>
				<td width="35%"><font><?=$b_no;?></font></td>
			</tr>
			<tr>
				<th width="15%"><font>제목</font></th>
				<td colspan="3"><font><?=$b_sub;?></font></td>
			</tr>
			<tr>
				<th width="15%"><font>내용</font></th>
				<td colspan="4" style="padding:15px 0;"><font><?=$b_cont;?></font></td>
			</tr>
			<tr>
				<th width="15%"><font><b>첨부 파일</b></font></th>
				<td colspan="3"><font>
		<?php
			// 첨부 파일 다운로드
			if($b_fname != ""){ ?>
					<a href="board_file_download.php?filename=<?php echo urlencode($b_fname);?>"><?=$b_fname;?>&nbsp;&nbsp;(<?=$b_fsize;?>바이트)</a>
		<?php	} ?>
				</font></td>
			</tr>
		</table>
		<br/>
		<p align="center">
			<form name="dform" method="post" action="board_delete_ok.php?num=<?=$r_num;?>">
				<font>비밀번호</font>
				<input type="password" name="b_pass" size="20">
				<input type="button" value="삭제" class="btn_default btn_gray" onclick="ck();">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" value="목록" class="btn_default btn_gray" onclick="history.back();">
		</p>
		</div>
	</body>
</html>
