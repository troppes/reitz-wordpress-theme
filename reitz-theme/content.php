<!-- loaded for every post -->
<div class="row">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p><?php the_date(); ?> by <?php the_author(); ?></p>
    <?php the_excerpt(); ?>
    <a href="<?php comments_link(); ?>">
        <?php
        printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n(get_comments_number())); ?>
    </a>
</div>
<hr>