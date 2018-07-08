<?php echo $this->header; ?>
<main id="home" class="home">
    <div id="slideshows_wrapper">
        <div class="slideshow img" data-animation="slide">
            <ul class="slides">
                <li class="slide">
                    <div class="wrapper">
                        <div class="content">
                            <img src="<?php echo $this->niveau ?>/images/slide1.jpg" alt="Jeune fille qui sourie">
                        </div>
                    </div>

                </li>
                <li class="slide">
                    <div class="wrapper">
                        <div class="content">
                            <img src="<?php echo $this->niveau ?>/images/slide2.jpg" alt="Jeune fille qui sourie">
                        </div>
                    </div>

                </li>
                <li class="slide">
                    <div class="wrapper">
                        <div class="content">
                            <img src="<?php echo $this->niveau ?>/images/slide3.jpg" alt="Pierre précieuse">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="slideshow title" data-animation="fade">
            <ul class="slides">
                <li class="slide">
                    <div class="wrapper">
                        <div class="content">
                            <h2 class="slide-title"><?php echo _('Feel good <br>Be beautiful'); ?></h2>
                            <a href="<?php echo $this->niveau ?>/contact.php?lang=<?php echo $this->lang; ?>"><?php echo _('Click to view more') ?></a>
                            <span class="slide-counter"><span class="current">1</span>/3<span class="total"></span></span>
                        </div>
                    </div>
                </li>
                <li class="slide">
                    <div class="wrapper">
                        <div class="content">
                            <h2 class="slide-title"><?php echo _('Shine through <br>your smile'); ?></h2>
                            <a href="<?php echo $this->niveau ?>/contact.php?lang=<?php echo $this->lang; ?>"><?php echo _('Click to view more') ?></a>
                            <span class="slide-counter"><span class="current">2</span>/3<span class="total"></span></span>
                        </div>
                    </div>

                </li>
                <li class="slide">
                    <div class="wrapper">
                        <div class="content">
                            <h2 class="slide-title"><?php echo _('Ever so <br>natural'); ?></h2>
                            <a href="<?php echo $this->niveau ?>/contact.php?lang=<?php echo $this->lang; ?>"><?php echo _('Click to view more') ?></a>
                            <span class="slide-counter"><span class="current">3</span>/3<span class="total"></span></span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--<div class="video">
        <iframe src="https://player.vimeo.com/video/110831599"
                frameborder="0"
                webkitallowfullscreen
                mozallowfullscreen
                allowfullscreen>
        </iframe>
    </div>-->
    <div class="overview">
        <div class="chapo">
            <h2><?php echo _('Overview'); ?></h2>
            <p>
                <?php
                echo _('Using the latest breakthrough in dental esthetics, Resplend aims to deliver no preparation prosthetics. No preparation means no tooth reduction. That’s right. We respect where you come from and want to help you through with our solution, but if ever you want to go back you can. It’s still guarantedd to last. Resplend intends to bring you through a true long lasting process. Made to fit each indivudual smile, following a rigorous process, each tooth perfectly adapts to your mouth in order to help you get the smile you always should’ve had.');
                ?>
            </p>
        </div>
        <div class="blocs">
            <div class="bloc position-left">
                <div class="wrapper">
                    <p class="exergue paroller" data-parollerdirection="-1" data-parolleraxis="y" data-parollerspeed="0.2">
                        <?php echo _('glance'); ?>
                    </p>
                    <div class="text">
                        <h3><?php echo _('Getting your smile back'); ?></h3>
                        <p><?php
                            echo _('We believe that wether it’s been through an accident, or if you feel that your smile could look better, you deserve a chance to feel better with yourself. Don’t be shy, smile outloud!');
                            ?>
                        </p>
                    </div>
                    <div class="bloc-img">
                        <img src="<?php echo $this->niveau ?>/images/bloc1.jpg" alt="Une jeune fille rousse qui sourie.">
                    </div>
                </div>
            </div>
            <div class="bloc position-right">
                <div class="wrapper">
                    <p class="exergue paroller" data-parollerdirection="1" data-parolleraxis="y" data-parollerspeed="0.2">
                        <?php echo _('Quick'); ?>
                    </p>
                    <div class="bloc-img">
                        <img src="<?php echo $this->niveau ?>/images/bloc2.jpg" alt="Une tête de squellette faite de diamant.">
                    </div>
                    <div class="text">
                        <h3><?php echo _('A non invasive technique'); ?></h3>
                        <p><?php
                            echo _('Resplend’s conviction is that esthetic care shouldn’t imply attacking physical integrity. Our technique portects dental integrity, it preserves tissue integrity as well. Your dream smile without pain thanks to the most advanced collage technique.')
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="bloc position-left">
                <div class="wrapper">
                    <div class="text">
                        <h3><?php echo _('Custom made and unique'); ?></h3>
                        <p><?php
                            echo _('your face is unique, so is your smile. A true revelator of your own unique beauty, a smile can only be custom made. No shortcut here. This is why everything starts with, and our technique will take you where you want. Not the other way around.');
                            ?>
                        </p>
                    </div>
                    <div class="bloc-img">
                        <img src="<?php echo $this->niveau ?>/images/bloc3.jpg" alt="Des diamants précieux mauves.">
                    </div>
                </div>
            </div>
        </div>
        <div class="instagram_feed">
            <div class="wrapper">
                <p class="exergue paroller" data-parollerdirection="1"  data-parolleraxis="x" data-parollerspeed="0.2"><?php echo _('Recent'); ?></p>
                <p class="exergue paroller" data-parollerdirection="-1" data-parolleraxis="x" data-parollerspeed="0.2"><?php echo _('Instagram'); ?></p>
                <h3 class="mobile_title"><?php echo _('Recent instagram'); ?></h3>
                <ul>
                    <?php foreach ($this->instagram_array as $pic):?>
                    <li class="slide-in--element">
                        <div class="img-wrapper">
                            <a href="<?php echo $pic['link'] ?>" target="_blank">
                                <img src="<?php echo $pic['src'] ?>" alt="<?php echo $pic['alt'] ?>">
                            </a>
                        </div>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</main>
<?php echo $this->footer; ?>