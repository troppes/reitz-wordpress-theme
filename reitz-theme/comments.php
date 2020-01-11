<?php if ( post_password_required() ) {
    return;
} ?>
<div class="comment-area">
    <?php if ( have_comments() ) : ?>
        <h3 class="comment-title flow-text">
            <?php
            printf( _nx( 'One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title'),
                number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h3>
        <ul class="comment-list container">
            <?php
            wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 50,
            ) );
            ?>
        </ul>
    <?php endif; ?>
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">
            <?php _e( 'Comments are closed.' ); ?>
        </p>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>