<div class="comments-wrapper">
    <div class="comments">
        <div class="comments-header">
            <h5 class="comment-reply-title">
                <?php
                    if (!have_comments()) {
                        echo "";
                    } else {
                        echo get_comments_number() . " comments";
                    }
                ?>
            </h5>
        </div>
        <div class="comments-inner">
            <?php
                wp_list_comments(
                    array(
                        'style' => 'div',
                        'walker' => new comment_walker
                    )
                );
            ?>
        </div>
        <div class="comments-respond">
            <div>
                <?php
                    if (comments_open()) {
                        comment_form(
                            array(
                                'class_form' => '',
                                'title_reply_before' => '<h5 class="comment-reply-title">',
                                'title_reply_after' => '</h5>'
                            )
                        );
                    }
                ?>
            </div>
        </div>
    </div>
</div>
