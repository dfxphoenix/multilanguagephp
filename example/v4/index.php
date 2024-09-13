<?php
	include 'translations_list.php';
	include('lang/lang.php');
	require_once 'translations/'.$lang.'.php';
?>
<HTML>
<head>
    <title>Multi Language PHP - <?php echo $lang_code; ?></title>
</head>
<body>
    <?php echo $text; ?>
</body>
</HTML>
