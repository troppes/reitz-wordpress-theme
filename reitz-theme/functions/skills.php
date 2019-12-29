<?php

function add_skills() {
    register_post_type( 'add_skills',
        array(
            'labels'       => array(
                'name'       => __( 'Skills' ),
            ),
            'public'       => true,
            'hierarchical' => false,
            'has_archive'  => false,
            'supports'     => array(
                'title',
                'editor'
            )
        )
    );
}
add_action( 'init', 'add_skills' );