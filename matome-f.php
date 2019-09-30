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

		include('./classes/matome_str.php');
		$img_dir = './RakutenUp/alpha/';
		$x = 0;

		if (isset($_GET['id']) && $_GET['id'] != '') {
			$id = $_GET['id'];
			$img_dir = '../RakutenUp/'.$id.'/Links/';

		}else{
			$id = '';
		}
	?>

	<div id="wrapper">
		<h2>まとめ 一括マスター登録</h2>
		<form action="./php/to_master_matome.php" method="post" enctype="multipart/form-data">
			<dl>
				<dt>使い方</dt>
				<dd>\\AS3102T-V2\Web\RakutenUpに指定したIDのフォルダができる</dd>
				<dt>楽天まとめID</dt>
				<dd class="notes">例）<strong>mondori</strong></dd>
				<dd>
					<?php
					if (isset($id) && $id != '') {
						echo '<input type="text" name="matomeid" placeholder="mondori" value="'.$id.'">';
					}else{
						echo '<input type="text" name="matomeid" placeholder="mondori" value="'.$id.'">';
					}
					?>
				</dd>
			</dl>
			<div id="edit-area">

			<?php
				for ($i=0; $i < 10; $i++) {
					echo '<div class="img_page">';
					for ($j=0; $j < 4; $j++) {
						//echo '<div class="main_upload" style="background-image:url("'.$img_dir.matome_convert_int_str($x,false).'.jpg")">';
						echo '<div class="main_upload" style="background-image:url('.$img_dir.matome_convert_int_str($x,false).'.jpg);">';
						echo '<p class="upload_text">'.matome_convert_int_str($x,true).'</p>';
						echo '<span class="thumbnail_m"></span>';
						echo '<input type="file" name="image[]"/>';
						echo '<input type="hidden" name="design[]" value = "'.$x.'"/>';
						echo '</div>';
						$x++;
					}
					echo '</div>';
				}
				for ($i=0; $i < 10; $i++) {
					echo '<div class="img_page">';
					for ($j=0; $j < 4; $j++) {
						//echo '<div class="main_upload" style="background-image:url("'.$img_dir.matome_convert_int_str($x,false).'.jpg")">';
						echo '<div class="main_upload" style="background-image:url('.$img_dir.matome_convert_int_str($x,false).'.jpg);">';
						echo '<p class="upload_text">'.matome_convert_int_str($x,true).'</p>';
						echo '<span class="thumbnail_m"></span>';
						echo '<input type="file" name="image[]"/>';
						echo '<input type="hidden" name="design[]" value = "'.$x.'"/>';
						echo '</div>';
						$x++;
					}
					echo '</div>';
				}

			?>

<!-- 				<div class="img_page">
					<div class="main_upload">
						<span class="thumbnail_m"></span>
						<input type="file" name="image"/>
						<p class="upload_text">A</p>
					</div>
					<div class="main_upload">
						<p class="upload_text">A</p>
						<span class="thumbnail_m"></span>
						<input type="file" name="image"/>
					</div>
					<div class="main_upload">
						<p class="upload_text">A</p>
						<span class="thumbnail_m"></span>
						<input type="file" name="image"/>
					</div>
					<div class="main_upload">
						<span class="thumbnail_m"></span>
						<input type="file" name="image"/>
						<p class="upload_text">A</p>
					</div>
				</div> -->


			</div>

			<div>
			  <button type="submit">マスター登録</button>
			</div>
		</form>
	</div>
<script>
	addEventListener('DOMContentLoaded', function () {
		[].forEach.call(document.querySelectorAll('input[type=file]'), function (elm) {
			elm.onchange = function () {
				var url = URL.createObjectURL(elm.files[0])
				elm.previousElementSibling.style.backgroundImage = 'url(' +url+ ')'
			}
		})
	})
</script>
</body>
</html>