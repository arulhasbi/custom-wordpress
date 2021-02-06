<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-quiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Personal website">
        <meta name="author" content="https://linkedin.com">
        <?php
            wp_head();
        ?>
    </head>
    <body>
        <header>
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-light bg-light menus">
                    <a class="navbar-brand" href="#">
                        <?php
                            if (function_exists('the_custom_logo')) {
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id);
                            }
                        ?>
                        <img src="<?php echo $logo[0] ?>" width="40" height="40" alt="UTM Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Works</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Activities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <?php echo get_bloginfo('name') ?>
                        </span>
                    </div>
                </nav>
            </div>
        </header>
