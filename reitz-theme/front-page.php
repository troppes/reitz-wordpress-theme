<?php get_header(); ?>
    <nav>
        <div class="nav-wrapper myblack">
            <a href="#" class="brand-logo right"><img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/img/logo_light.svg" alt="Logo" width="55px"></a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <?php
                    wp_nav_menu( array('menu' => 'landing-page-menu'));
                ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile">
	    <?php
	    wp_nav_menu( array('menu' => 'landing-page-menu'));
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
                            <a href="#me" id="download-button" class="btn-large waves-effect waves-light myyellow myblack-text">More information</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="<?php echo get_bloginfo( 'template_directory' );?>/assets/img/background.jpg" alt="Unsplashed background img 1"></div>
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
                $your_loop = new WP_Query( $args );

                if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post();
                    $meta = get_post_meta( $post->ID, 'add_project', true ); ?>
            <div class="col s4">
                    <div class="card medium myblue">
                        <div class="card-image">
                            <img src="<?php echo $meta['image']; ?>" class="responsive-img">
                            <span class="card-title" id="project-dark"><?php the_title(); ?></span>
                        </div>
                        <div class="card-content grey-text text-lighten-4">
                            <p><?php the_content(); ?></p>
                        </div>
                        <?php
                         if($meta['url'] !== ''){
                        ?>
                             <div class="card-action myyellow-text">
                                 <a href="<?php echo $meta['url'] ?>">Click here</a>
                             </div>
                         <?php
                         }else{
                             ?>
                             <div class="card-action">
                                 <a class="disabled">Link coming soon!</a>
                             </div>
                         <?php
                         }
                        ?>
                    </div>
            </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>


        </div>
    </div>

    <div class="container section" id="me">
        <div class="row">
            <div class="col m6 s12 hide-on-med-and-up"><img class="materialboxed responsive-img circle" src="<?php echo get_bloginfo( 'template_directory' );?>/assets/img/flo.jpg" alt="Flo"></div>
            <div class="col m6 s12">
                <h1>Florian Reitz</h1>
                <p>Hello, my name is Florian. I currently study computer science at the university of applied science at Trier.
                    For more information see <a href="https://www.linkedin.com/in/florian-reitz-16a10b150/">LinkedIn.</a></p>
            </div>
            <div class="col m6 hide-on-small-only"><img class="responsive-img circle" src="<?php echo get_bloginfo( 'template_directory' );?>/assets/img/flo.jpg" alt="Flo"></div>
        </div>
    </div>

    <div class="container section" id="skills">
        <div class="row">
            <div class="col s12">
                <table>
                    <thead>
                        <tr>
                            <th>Skills</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr><td>Java, C#</td><td>Photoshop, Illustrator</td></tr>
                    <tr><td>HTML, CSS, PHP, Javascript, NodeJS, Symfony</td><td>vSphere Hypervisor</td></tr>
                    <tr><td>MariaDB, Solr</td><td>LaTeX</td></tr>
                    <tr><td>Server maintenance</td><td>Docker</td></tr>
                    <tr><td>Englisch (fluent)</td><td>CI/CD</td></tr>
                    <tr><td>Spanish (beginner)</td><td>Version Control (Git)</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php get_footer(); ?>