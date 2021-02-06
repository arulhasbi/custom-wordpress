
        <?php
            get_header();
        ?>
        <div class="container">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        // should call the_post() so the loop stop.
                        the_post();
                        get_template_part('template-parts/content', 'article');
                    }
                }
            ?>
        </div>
        <?php
            get_footer();
        ?>
