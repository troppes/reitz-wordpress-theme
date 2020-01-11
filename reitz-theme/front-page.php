<?php get_header(); ?>

    <ul class="sidenav" id="mobile">
        <?php
        wp_nav_menu(array('menu' => 'landing-page-menu'));
        ?>
    </ul>

    <div class="parallax-container valign-wrapper">
        <div class="row center">
            <div class="card-panel col s12 blue-opac">
                <div class="row center">
                    <p class="col s12 flow-text white-text"> Welcome to my personal Webpage.</p>
                </div>
                <div class="row center">
                    <a href="#main_content"
                       class="btn-large waves-effect waves-light light-yellow black-text s12">
                        More information</a>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/background.jpg"
                                   alt="background"></div>
    </div>


    <div class="container section" id="projects">
        <div class="row">
            <div class="col s12 center">
                <h1>Projects</h1>
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
                <div class="col s12 m4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img src="<?php echo $meta['image']; ?>" class="responsive-img" alt="project_image">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?php the_title(); ?><i
                                        class="material-icons right">more_vert</i></span>
                            <?php if ($meta['url'] !== '') { ?>
                                <p><a href="<?php echo $meta['url'] ?>">Click here</a></p>
                            <?php } else { ?>
                                <p><a class="disabled">Link coming soon!</a></p>
                            <?php } ?>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?php the_title(); ?><i
                                        class="material-icons right">close</i></span>
                            <p><?php the_content(); ?></p>
                        </div>
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
                <table>
                    <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $args = array(
                        'post_type' => 'add_skills',
                    );
                    $your_loop = new WP_Query($args);

                    if ($your_loop->have_posts()) : while ($your_loop->have_posts()) :
                        $your_loop->the_post();
                        $meta = get_post_meta($post->ID, 'add_skills', true); ?>
                        <tr>
                            <td><?php the_title(); ?></td>
                            <td><?php the_content(); ?></td>
                        </tr>
                    <?php endwhile; endif;
                    wp_reset_postdata(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php get_footer(); ?>