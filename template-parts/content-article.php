<div class="article-wrapper">
    <div class="article-header">
        <p class="article-title h3">
            <?php
                the_title();
            ?>
        </p>
        <p class="lead">
            <span>
                <i class="bi bi-clock"></i>
                <?php the_date(); ?>
            </span>
            |
            <span>
                <i class="bi bi-chat-text"></i>
                <?php comments_number(); ?>
            </span>
            |
            <?php
                the_tags('<span class="badge badge-secondary"><i class="bi bi-tag-fill"></i>', '</span><span class="badge badge-secondary"><i class="bi bi-tag-fill"></i>', '</span>')
            ?>
        </p>
    </div>
    <div class="article-image text-center">
        <img src="https://images.unsplash.com/photo-1469212044023-0e55b4b9745a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1955&q=80" class="img-thumbnail" alt="Responsive image">
        <p class="lead">Image credit: Short url here</p>
    </div>
    <div class="article-body">
        <p class="article-body-content">
            <?php
                the_content();
            ?>
        </p>
    </div>
    <div class="article-comments">
        <?php
            comments_template();
        ?>
    </div>
</div>
