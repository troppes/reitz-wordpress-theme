<?php get_header(); ?>


    <ul class="sidenav" id="mobile">
        <?php
        wp_nav_menu(array('menu' => 'landing-page-menu'));
        ?>
    </ul>

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <br><br><br>
            <div class="container">
                <div class="row center ">
                    <div class="card-panel col s6 offset-s3 myblueOpac">
                        <h1 class="center white-text">Welcome</h1>
                        <div class="row center">
                            <p class="col s12 white-text">to my personal Webpage.</p>
                        </div>
                        <div class="row center">
                            <a href="#main_content" id="download-button"
                               class="btn-large waves-effect waves-light myyellow myblack-text">More information</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/background.jpg"
                                   alt="Unsplashed background img 1"></div>
    </div>

    <div class="container section" id="projects">
        <div class="row">
            <div class="col s12 center">
                <h1 class="myblack-text">Projects</h1>
            </div>
        </div>
        <div class="row">

            <?php

            $args = array(
                'post_type' => 'add_project',
            );
            $your_loop = new WP_Query($args);

            if ($your_loop->have_posts()) : while ($your_loop->have_posts()) : $your_loop->the_post();
                $meta = get_post_meta($post->ID, 'add_project', true); ?>
                <div class="col s4">
                    <div class="card medium myblue">
                        <div class="card-image">
                            <img src="<?php echo $meta['image']; ?>" class="responsive-img" alt="project_image">
                            <span class="card-title" id="project-dark"><?php the_title(); ?></span>
                        </div>
                        <div class="card-content grey-text text-lighten-4">
                            <p><?php the_content(); ?></p>
                        </div>
                        <?php
                        if ($meta['url'] !== '') {
                            ?>
                            <div class="card-action myyellow-text">
                                <a href="<?php echo $meta['url'] ?>">Click here</a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="card-action">
                                <a class="disabled">Link coming soon!</a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php endwhile; endif;
            wp_reset_postdata(); ?>


        </div>
    </div>

    <div class="container section" id="main_content">
        <div class="row">
            <?php the_content() ?>
        </div>
    </div>

    <div class="container section" id="skills">
        <div class="row">
            <div class="col s12">
                <?php
                $args = array(
                    'post_type' => 'add_skills',
                );
                $your_loop = new WP_Query($args);

                if ($your_loop->have_posts()) : while ($your_loop->have_posts()) :
                $your_loop->the_post();
                $meta = get_post_meta($post->ID, 'add_skills', true); ?>
                <table>
                    <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php the_title(); ?></td>
                        <td><?php the_content(); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>

        </div>
    </div>

<?php get_footer(); ?>