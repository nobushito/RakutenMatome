<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='./css/master.css'>
	<link rel='stylesheet' type='text/css' href='./css/upload_thum.css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<title>まとめ 一括マスター登録</title>
</head>
<body>
	<?php
		print_r($_POST);
		include('./classes/matome_str.php');
		$img_dir = './RakutenUp/apha/';
		$x = 0;
	?>

	<div id="wrapper">
		<h2>まとめ 一括マスター登録</h2>

		<!-- <nav><a href="master.php">マスター登録</a> | <a href="master-gls.php">強化ガラスケース まとめ一括マスター登録</a></nav> -->
		<form name="master-gls" action="./php/to_master_matome.php" method="post">
			<dl>
				<dt>楽天まとめID</dt>
				<dd class="notes">例）glship-<strong>mondori</strong></dd>
				<dd><input type="text" name="matomeid" placeholder="mondori"></dd>
			</dl>
			<div id="edit-area">

			<?php
				for ($i=0; $i < 9; $i++) {
					echo '<div class="img_page">';
					for ($j=0; $j < 4; $j++) {
						//echo '<div class="main_upload" style="background-image:url("'.$img_dir.matome_convert_int_str($x,false).'.jpg")">';
						echo '<div class="main_upload" style="background-image:url('.$img_dir.matome_convert_int_str($x,false).'.jpg);">';
						echo '<p class="upload_text">'.matome_convert_int_str($x,true).'</p>';
						echo '<span class="thumbnail_m"></span>';
						echo '<input type="file" name="image[]"/>';
						echo '</div>';
						$x++;
					}
					echo '</div>';
				}

			?>


			</div>

			<div>
			  <button type="submit">マスター登録</button>
			</div>
		</form>
	</div>
</body>
</html>