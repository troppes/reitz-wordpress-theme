<?php get_header(); ?>

<div class="container">

    <div class="row">
        <div class="col s9 blog-main">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content', get_post_format());
            endwhile; endif;
            ?>
        </div>
        <div class="col s3 hide-on-small-and-down sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <ul class="pagination">
        <li class="waves-effect"><a href="<?php next_posts_link('Previous'); ?>"><i class="material-icons">chevron_left</i></a>
        </li>
        <li class="waves-effect"><a href="<?php previous_posts_link('Next'); ?>"><i class="material-icons">chevron_right</i></a>
        </li>
    </ul>
</div>


<?php get_footer(); ?>
