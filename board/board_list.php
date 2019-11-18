<!doctype html>
<html>
	<!-- head 부분 -->
	<head>
		<!-- 상단 title -->
		<title>게시판</title>
		<!-- CSS Style 지정 -->
		<link rel="stylesheet" href="../style_contents.css" type="text/css">
	</head>
	<body>
		<!-- 화면 상단 header 부분 -->
		<iframe src="../head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
		<!-- 화면 하단 body 부분 -->
		<div id="board_contents" class="contents">
			<table width="600" border="1">
			<!-- 제목 -->
			<tr>
			<th colspan="5" style="background-color: #323232" >
				<font style="color: white; font-size: 150%;" >게 시 판</font>
			</th>
			</tr>
			<tr bgcolor="#c8c8c8">
				<th width="7%"><font>번호</font></th>
				<th width="41%"><font>제목</font></th>
				<th width="15%"><font>작성자</font></th>
				<th width="30%"><font>등록일</font></th>
				<th width="7%"><font>조회</font></th>
			</tr>
		<?php
			require "../dbconn.php";
			$strSQL = "";
			// 키워드 조회
			if($_GET[keyword]){
				$key = $_GET[keyword];
				$k_s = $_GET[k_s];
				switch($k_s){
					case '1':
						$strSQL="select * from board where strSubject like '%$key%' order by strNumber desc"; break;
					case '2':
						$strSQL="select * from board where strContent like '%$key%' order by strNumber desc"; break;
					case '3':
						$strSQL="select * from board where strName like '%$key%' order by strNumber desc"; break;
					default:
						$strSQL = "select * from board order by strNumber desc";
				}
			}else{
				// 키워드 없으면 전체 조회
				$strSQL = "select * from board order by strNumber desc";
			}
			$rs = mysql_query($strSQL);
			$rs_num = mysql_num_rows($rs);
			mysql_close($conn);

			// 조회된 결과 없을 경우
			if($rs_num == 0): ?>
				<tr>
					<td colspan="5" class="center"><font><b>등록된 게시물이 없습니다.</b></font></td>
				</tr>

		<?php	else:
			// 조회된 결과 있을 경우
				while($rs_arr = mysql_fetch_array($rs)){
					$b_num = $rs_arr["strNumber"];
					$b_name = $rs_arr["strName"];
					$b_email = $rs_arr["strEmail"];
					$b_sub = $rs_arr["strSubject"];
					$b_no = $rs_arr["viewCount"];
					$b_date = $rs_arr["writeDate"];
		?>
					<tr>
						<td width="7%"><font size="2"><?=$b_num;?></font></td>
						<td width="41%"><font size="3"><a href="board_view.php?num=<?=$b_num;?>"><?=$b_sub;?></a></font></td>
						<td width="15%"><font size="3"><?=$b_name;?></font></td>
						<td width="30%"><font size="1"><?=$b_date;?></font></td>
						<td width="7%"><font size="2"><?=$b_no;?></font></td>
					</tr>
		<?php	}
			endif; ?>
			</table>
			<br/>
			<p align="center">
			<!-- 글쓰기 버튼 -->
			<input type="button" value="글쓰기" class="btn_default btn_gray" onclick='location.replace("board_write.php")'>
			<br/>
			<br/>
			<!-- 검색 -->
		<?php
				if($key)
					echo "<font size=2>[$key] 검색 결과입니다.</font>";
				else
					echo "<font size=2>전체 글 검색 결과입니다.</font>";
			?>
			<form action="board_list.php">
				<select name="k_s">
					<option value="1">글제목</option>
					<option value="2">글내용</option>
					<option value="3">작성자</option>
				</select>
				<input type="text" name="keyword">
				<input type="submit" class="btn_default btn_gray" value="검색">
			</form>
			</p>
		</div>
	</body>
</html>
