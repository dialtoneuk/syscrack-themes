<?php

use Framework\Application\Render;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= @$pagetitle ?></title>

    <!--Fav Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="Syscrack">
    <meta name="application-name" content="Syscrack">
    <meta name="theme-color" content="#ffffff">



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
</head>