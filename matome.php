<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='./css/top.css'>
	<link rel='stylesheet' type='text/css' href='./css/table.css'>
	<link rel='stylesheet' type='text/css' href='./css/master.css'>
	<link href="css/upload_thum.css" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<title>まとめ 一括マスター登録</title>
</head>
<body>
	<?php
		include('./classes/matome_str.php');
		$dir    = './RakutenUp/img/';
		$files1 = scandir($dir);
		$img_array = array();
		$sku_array = array();
		for ($i=0; $i < count($files1); $i++) {
			if (substr($files1[$i],0,8) == 'brnfipx-') {
				$img_array[] = $files1[$i];
				$x = str_replace('brnfipx-', '', $files1[$i]);
				$sku_array[] = str_replace('.jpg', '', $x);
			}else if(substr($files1[$i],0,8) == 'sppfipx-'){
				$x = str_replace('sppfipx-', '', $files1[$i]);
				$sku_array[] = str_replace('.jpg', '', $x);
			}
		}

		// print_r($img_array);
	?>
	<div id="wrapper">
		<h2>まとめ 一括マスター登録</h2>
		<!-- <nav><a href="master.php">マスター登録</a> | <a href="master-gls.php">強化ガラスケース まとめ一括マスター登録</a></nav> -->
		<form name="master-case" action="./php/to_master_matome.php" method="post">
			<dl>
				<dt>楽天まとめID</dt>
				<dd class="notes">例）glship-<strong>mondori</strong></dd>
				<dd><input type="text" name="matomeid" placeholder="mondori"></dd>
			</dl>
			<dl>
				<dt>デザイン識別子</dt>
				<dd class="notes">
					例）brnhipx-<strong>dnok1-m0000-w</strong>.ai<br>
				</dd>
				<dd class="flex flex1-2">

					<?php
					for ($i=0; $i < count($img_array); $i++) {
						echo '<div class="flexitem">';
						echo '<img src="'.$dir.$img_array[$i].'" width="200px" alt="">';
						echo '<br>';
						$x = matome_convert_int_str($i,true);
						echo $x;
						echo ' ';
						echo '<input type="text" name="'.$x.'" value="'.$sku_array[$i].'">';
						echo '</div>';
					}

					?>

				</dd>
			</dl>

			<div>
			  <button type="submit">マスター登録</button>
			</div>
		</form>
	</div>
</body>
</html>