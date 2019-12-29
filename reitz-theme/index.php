<?php get_header(); ?>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title"><a href="<?php echo get_bloginfo('wpurl'); ?>"><?php echo get_bloginfo('name'); ?></a>
        </h1>
        <p class="lead blog-description"><?php echo get_bloginfo('description'); ?></p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">

            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content', get_post_format());
            endwhile; endif;
            ?>

        </div> <!-- /.blog-main -->

        <?php get_sidebar(); ?>
    </div> <!-- /.row -->
    <ul class="pagination">
        <li class="waves-effect"><a href="<?php next_posts_link('Previous'); ?>"><i class="material-icons">chevron_left</i></a>
        </li>
        <li class="waves-effect"><a href="<?php previous_posts_link('Next'); ?>"><i class="material-icons">chevron_right</i></a>
        </li>
    </ul>
</div>


<?php get_footer(); ?>
