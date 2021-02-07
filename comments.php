<div class="comments-wrapper">
    <div class="comments">
        <div class="comments-header">
            <h5 class="comment-reply-title">
                <?php
                    if (!have_comments()) {
                        echo "Leave a comment";
                    } else {
                        echo get_comments_count() . " comments";
                    }
                ?>
            </h5>
        </div>
        <div class="comments-inner">
            <div class="comments-wrapper">
                <div class="comments card">
                    <div class="container card-header d-flex">
                        <div class="align-self-start avatar">
                            <img src='<?php echo get_template_directory_uri() . "/assets/images/avatar.png" ?>' alt="avatar-logo" class="img-thumbnail" width="40" height="40">
                        </div>
                        <div class="align-self-center avatar-info">
                            <p class="h6">Arul</p>
                            <p class="lead">March 25, 202 at 8:07 pm</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="lead">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="card-link">Reply</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments-respond">
            <p class="text-right">
                <a href="#target-collapse" data-toggle="collapse" class="card-link" role="button" aria-expanded="false" aria-controls="target-collapse">
                    Share your thought below
                </a>
            </p>
            <div class="collapse text-left" id="target-collapse">
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
