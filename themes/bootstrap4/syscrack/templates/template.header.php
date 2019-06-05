<?php
    use Framework\Application\Render;

    if ( isset( $model->pagetitle ) )
    {
        ?>
            <title><?=$model->pagetitle?></title>
        <?php
    }
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
	if (isset( $assets["css"] ))
		foreach ($assets["css"]as $style)
			echo "<link href='" . $style . "' rel='stylesheet'>";
?>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php
	if (isset( $assets["js_header"] ))
		foreach ( $assets["js_header"] as $script)
			echo "<script src='" . $script . "'></script>";

?>