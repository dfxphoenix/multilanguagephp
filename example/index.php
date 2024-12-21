<?php
	include 'lang/translations_list.php';
	include 'libs/multilanguagephp/multilanguage.php';
	include 'lang/translations/'.$lang.'.php';
?>
<HTML>
<head>
	<title>Multi Language PHP - <?php echo $lang_code; ?></title>
</head>
<body>
	<?php echo $text; ?>
</body>
</HTML>
