<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $setting['setting_description']; ?>">
    <meta name="keywords" content="<?php echo $setting['setting_keyword']; ?>">

    <!-- TAG og facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:title" content="<?php echo $setting['setting_title']; ?>" />
    <meta property="og:description" content="<?php echo  $setting['setting_description']; ?>" />
    <meta property="og:image" content="<?php echo $setting['setting_img']; ?>" />

    <!-- TAG og Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo $setting['setting_title']; ?>" />
    <meta name="twitter:description" content="<?php echo  $setting['setting_description']; ?>" />
    <meta name="twitter:image" content="<?php echo $setting['setting_img']; ?>" />
    <meta name="twitter:site" content="@ondemandacademy" />

    <title><?php echo $setting['setting_title']; ?></title>

    <link rel="icon" type="image/png" href="<?= $path_setting . $setting['setting_icon'] ?>" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Bootstrap core CSS -->
    <script src="<?= $document_root ?>assets/vendor/jquery/jquery.min.js"></script>
    <link href="<?= $document_root ?>assets/vendor/bootstrap/css/bootstrap.min.css?v=1" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=$document_root?>assets/css/app.css?v=1.4" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <?php

        if (!empty($setting['setting_header'])) {
        echo base64_decode($setting['setting_header']);
        }

    ?>
</head>

<body>

    <header>
        <div class="logo-bar">
            <div class="container">
                <a href="<?php echo base_url() ?>">
                 <img class="logo" src="<?= $path_setting . $setting['setting_logo'] ?> ">
                </a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg menu-bar">
            <div class="container">
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul>
                        <li class="<?= $chk_act['home'] ?>" ><a href="<?php echo base_url() ?>">หนัง</a></li>
                        <li class="<?= $chk_act['anime'] ?>" ><a href="/anime">อนิเมะ</a></li>
                        <li class="<?= $chk_act['contract'] ?>" ><a href="/contract">ติดต่อ | ขอหนัง</a></li>
                    </ul>
                </div>
                <div id="searchicon" class="search">
                    <i class="fas fa-search"></i>
                    <div class="search-form">
                        <form id="movie-formsearch">
                        <?php
                            if (!empty($keyword)) {
                                $value = $keyword;
                            } else {
                                $value = '';
                            }
                        ?>
                            <input type="text" id="movie-search" placeholder="Search..." value="<?php echo $value ?>" autocomplete="off">
                            <button class="btn">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    </header>