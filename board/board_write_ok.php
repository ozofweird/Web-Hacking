<?php

	$b_name=$_POST["name"];
	$b_pw=$_POST["pw"];
	$b_email=$_POST["email"];
	$b_sub=$_POST["sub"];
	$b_cont=$_POST["cont"];
	$b_tag=$_POST["tag"];

	// html 사용안하는 게시글은 html encoding 처리
	if($b_tag == "F"){
		$b_cont = htmlspecialchars($b_cont);
	}

	// file 정보 받기
	// $_FILES : form 에서 file type으로 넘어오면 여러가지 정보가 넘어오는데 이런 정보를 받아주는 슈퍼글로벌 변수
	$f_error=$_FILES["att_file"]["error"];
	if($f_error==0){
		$f_name=$_FILES["att_file"]["name"];
		$f_path="upload/".$f_name;
		$f_tmp=$_FILES["att_file"]["tmp_name"];
		$f_size=$_FILES["att_file"]["size"];

		// 같은 이름의 파일이 있을 경우 이름 뒤에 숫자 붙이기
		$f_name_only=substr($f_name,0,strrpos($f_name,'.'));	// 파일이름 중 확장자를 제외한 이름
		$f_name_ext=substr($f_name,strrpos($f_name,'.'));	// 파일이름 중 확장자

		for($i=1; is_file($f_path); $i++){	// 같은 이름의 파일이 있으면 i 값을 1씩 증가시키며 반복
			$f_name_only=$f_name_only."(".$i.")";	// 파일이름 뒤에 (번호) 추가
			$f_path="./upload/".$f_name_only.$f_name_ext;	// 파일 경로 재설정
		}
		$f_rename = $f_name_only.$f_name_ext;	//파일이름과 확장자 다시 합치기

	}else if($f_error!=4){
		echo "<script>alert('파일 업로드 실패($f_error)');
			history.back();</script>";
			exit;
	}
	/*
	 echo "file error:".$_FILES['attachFile']['error'];
	************ 오류 코드 ***************************
	 0 : 성공
	 1 : php.ini 의 upload_max_filesize 보다 큽니다.
	 2 : html 폼에서 지정한  max file size 보다 큽니다.
	 3 : 파일이 일부분만 전송되었습니다.
	 4 : 파일이 전송되지 않았습니다.
	 6 : 임시 폴더가 없습니다.
	 7 : 디스크에 파일 쓰기를 실패하였습니다.
	 8 : 확장에 의해 파일 업로드가 중지되었습니다.
	*************************************************
	*/

	require "../dbconn.php";

	$strSQL="insert into board set strName='$b_name', strPassword='$b_pw', strEmail='$b_email', ";
	$strSQL.="strSubject='$b_sub', strContent='$b_cont', htmlTag='$b_tag',writeDate=now() ";
	if($f_error==0)
	{
		$strSQL.=", filename='$f_rename', filesize='$f_size'";
		$f_rs = move_uploaded_file($f_tmp, $f_path);
	}

	$rs = mysql_query($strSQL);
	if($rs){
		echo "<script>alert('글이 성공적으로 등록 되었습니다.');
			location.replace('board_list.php');</script>";
	}else{
		echo "<script>alert('글을 등록하는데 실패하였습니다.');
			history.back();</script>";
	}

?>
