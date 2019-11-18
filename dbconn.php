<?php
//DB연결(주소,계정,비밀번호 = #mysql -u root -p P@ssw0rd)
	$conn=mysql_connect("localhost", "root", "P@ssw0rd")
		or die("<script>alert('Error!\\n관리자에게 문의하세요~!');history.back();</script>"	);
//DB선택(use webtest)
	$connDB=mysql_select_db("WebTest", $conn)
		or die("<script>alert('Error!\\n관리자에게 문의하세요~!');history.back();</script>"	);
//DB동작 확인(성공 : 1, 실패 : 에러)
//echo $connDB;
?>
