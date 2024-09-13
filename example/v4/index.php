<?php
	include 'lang/translations_list.php';
	include('lang/lang.php');
	require_once 'libs/multilanguagephp/translations/'.$lang.'.php';
?>
<HTML>
<head>
    <title>Multi Language PHP - <?php echo $lang_code; ?></title>
</head>
<body>
    <?php echo $text; ?>
</body>
</HTML>
