<?php
include('../classes/matome_str.php');
include('../classes/generic_txt_class.php');
session_start();
$_SESSION['type'] = array();
$_SESSION['file'] = array();

$post = $_POST;

$flag = '';

// print_r($_FILES['image']['tmp_name']);
// print '<br>';
// var_dump($_FILES);

$matomeid = trim($post['matomeid']);

//作成したいディレクトリ（のパス）
$directory_path = '../../RakutenUp/'.$matomeid;

//「$directory_path」で指定されたディレクトリが存在するか確認
if(file_exists($directory_path)){
		//存在したときの処理アップデートになる
  $flag = 'update';

	// echo "作成しようとしたディレクトリは既に存在します";
}else{
		//存在しないときの処理（「$directory_path」で指定されたディレクトリを作成する）
	if(mkdir($directory_path, 0777)){
			//作成したディレクトリのパーミッションを確実に変更
		chmod($directory_path, 0777);
			//作成に成功した時の処理 新規になる
    $flag = 'new';
		// echo "作成に成功しました";
	}else{
			//作成に失敗した時の処理
		echo "作成に失敗しました";
	}
}

$tempfile = '../RakutenUp/matome_template/matome_template.ai';
$newfile = $directory_path.'/'.$matomeid.'.ai';
if(file_exists($newfile)){
  // print '---すでにファイルあり<br>';
}else{

  if (!copy($tempfile, $newfile)) {
    echo "failed to copy $file...\n";
  }

}

//作成したいディレクトリ（のパス）
$directory_path = '../../RakutenUp/'.$matomeid.'/Links';

//「$directory_path」で指定されたディレクトリが存在するか確認
if(file_exists($directory_path)){
    //存在したときの処理アップデートになる
  $flag = 'update';
  // echo "作成しようとしたディレクトリは既に存在します";
}else{
    //存在しないときの処理（「$directory_path」で指定されたディレクトリを作成する）
  if(mkdir($directory_path, 0777)){
      //作成したディレクトリのパーミッションを確実に変更
    chmod($directory_path, 0777);
      //作成に成功した時の処理 新規になる
      $flag = 'new';
  }else{
      //作成に失敗した時の処理
    echo "作成に失敗しました";
  }
}

//新規作成の場合
if ($flag == 'new') {
  for ($i=0; $i < 40; $i++) {
    copy('../RakutenUp/Links/'.matome_convert_int_str($post['design'][$i],false).'.jpg', '../../RakutenUp/'.$matomeid.'/Links/'.matome_convert_int_str($post['design'][$i],false).'.jpg');
  }
}

for ($i=0; $i < count($_FILES['image']['tmp_name']); $i++) {
  $tempfile = $_FILES['image']['tmp_name'][$i];
  $filename = $_FILES['image']['name'][$i];
  if ($tempfile != '') {
    $_SESSION['type'][] = matome_convert_int_str($post['design'][$i],true);
    $x = strExtractStart('-',$filename);
    $_SESSION['file'][] = strExtractEnd('.',$x);
    // print matome_convert_int_str($post['design'][$i],true);
    // print '---';
    // print $filename;
    // print '<br>';
    $upfile = $directory_path.'/'.matome_convert_int_str($post['design'][$i],false).'.jpg';
    if (is_uploaded_file($tempfile)) {
      move_uploaded_file($tempfile , $upfile );
    }
  }
}

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='../css/master.css'>
  <link rel='stylesheet' type='text/css' href='../css/upload_thum.css'>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <title>一括マスター登録</title>
</head>
<body>
  <a href="">マスター登録</a>
  ※既存のデータはアップデートされる
  <br>
  <?php
  for ($i=0; $i < count($_SESSION['type']); $i++) {
    echo $_SESSION['type'][$i].' | '.$_SESSION['file'][$i];
    print '<br>';
  }
  ?>
</body>
</html>
