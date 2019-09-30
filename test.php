<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Amazon出荷表</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
<?php

$str = 'asdfasdfasdfsa/abcde/abcde-1.jpg';
print $str;
print '<br>';

$str = str_replace('asdfasdfasdfsa/','',$str);
print $str;
print '<br>';
$strat = strpos($str, '/');
$rstrat = strrpos($str, '-');
$front = substr($str, 0,$strat);
print '全面:'.$front;
$back = substr($str, $rstrat);
print '後面:'.$back;
print '<br>';

?>

</body>
</html>

