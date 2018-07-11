<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site Web de Resplend">
    <meta name="author" content="Maison Sagan - Gabriel Paquin, gpaquin@maisonsagan.com">
    <meta name='copyright' content='Maison Sagan'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title><?php echo $this->title ?></title>
    <!--<link rel='stylesheet' type='text/css' href='{{ niveau }}css/jquery.fancybox.css' />-->
    <link rel='stylesheet' type='text/css' href='<?php echo $this->niveau ?>/css/app.css' />
    <link rel="icon" type="image/png" href="<?php echo $this->niveau ?>/images/favicon.png" />

</head>
<body>
<div class="m-scene">
    <div class="overlay_elements">
        <div class="overlay_element pratician_info">
            <p><?php echo _('Find your pratician by calling this number'); ?></p>
            <p>+33 1 88 32 10 75</p>
        </div>
        <div class="overlay_element pratician_contact">
            <p>resplend@smile.com</p>
            <p>+33 1 88 32 10 75</p>
        </div>
        <div class="overlay_bg"></div>
    </div>
    <header>
        <nav class="nav nav-meta">
            <div class="nav-wrapper">
                <p>
                    <a class="btn_pratician" data-trigger="pratician_info" href=""><?php echo _('Find your pratician'); ?></a>
                </p>
                <ul>
                    <li>
                        <a <?php if($this->lang=='fr'){ echo 'class=active';} ?> href="?lang=fr">Fr</a>
                    </li>
                    <li>
                        <a <?php if($this->lang=='en'){ echo 'class=active';} ?> href="?lang=en">En</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="nav nav-main">
            <div class="logo">
                <a href="<?php echo $this->niveau ?>/index.php?lang=<?php echo $this->lang; ?>">
                    <img src="<?php echo $this->niveau ?>/images/logo.svg" alt="Logo de Resplend">
                </a>
            </div>
            <div id="btn_hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-list">
                <div class="wrapper">
                    <li class="nav-el"><a href="<?php echo $this->niveau ?>/about.php?lang=<?php echo $this->lang; ?>"><?php echo _('About'); ?></a></li>
                    <li class="nav-el"><a href="<?php echo $this->niveau ?>/technique.php?lang=<?php echo $this->lang; ?>"><?php echo _('Technique'); ?></a></li>
                    <li class="nav-el"><a href=""  data-trigger="pratician_contact"><?php echo _('Contact'); ?></a></li>
                    <li class="nav-el mobile"><a href="#" data-trigger="pratician_info"><?php echo _('Find your pratician'); ?></a></li>
                    <li class="nav-el mobile">
                        <ul>
                            <li>
                                <a <?php if($this->lang=='fr'){ echo 'class=active';} ?> href="?lang=fr">Fr</a>
                            </li>
                            <li>
                                <a <?php if($this->lang=='en'){ echo 'class=active';} ?> href="?lang=en">En</a>
                            </li>
                        </ul>
                    </li>
                </div>
            </ul>
        </nav>
    </header>