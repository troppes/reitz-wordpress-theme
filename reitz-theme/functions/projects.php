<?php

function add_project() {
    register_post_type( 'add_project',
        array(
            'labels'       => array(
                'name'       => __( 'Projects' ),
            ),
            'public'       => true,
            'hierarchical' => false,
            'has_archive'  => false,
            'supports'     => array(
                'title',
                'editor',
                'add_project'
            )
        )
    );
}
add_action( 'init', 'add_project' );

function project_meta_fields() {
    add_meta_box(
        'project_meta_box', // $id
        'Project Fields', // $title
        'project_callback', // $callback
        'add_project', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'project_meta_fields' );

function project_callback() {
    global $post;
    $meta = get_post_meta( $post->ID, 'add_project', true ); ?>

    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <p>
        <label for="add_project[url]">URL</label>
        <br>
        <input type="url" name="add_project[url]" id="add_project[url]" class="regular-text" value="<?php echo $meta['url']; ?>">
    </p>
    <p>
        <label for="add_project[image]">Card Image</label><br>
        <input type="text" name="add_project[image]" id="add_project[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>
    <div class="image-preview"><img alt='project_image' src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>
    <script>
        jQuery(document).ready(function ($) {
            // Instantiates the variable that holds the media library frame.
            let meta_image_frame;
            // Runs when the image button is clicked.
            $('.image-upload').click(function (e) {
                // Get preview pane
                let meta_image_preview = $(this).parent().parent().children('.image-preview');
                // Prevents the default action from occuring.
                e.preventDefault();
                let meta_image = $(this).parent().children('.meta-image');
                // If the frame already exists, re-open it.
                if (meta_image_frame) {
                    meta_image_frame.open();
                    return;
                }
                // Sets up the media library frame
                meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: meta_image.title,
                    button: {
                        text: meta_image.button
                    }
                });
                // Runs when an image is selected.
                meta_image_frame.on('select', function () {
                    // Grabs the attachment selection and creates a JSON representation of the model.
                    let media_attachment = meta_image_frame.state().get('selection').first().toJSON();
                    // Sends the attachment URL to our custom image input field.
                    meta_image.val(media_attachment.url);
                    meta_image_preview.children('img').attr('src', media_attachment.url);
                });
                // Opens the media library frame.
                meta_image_frame.open();
            });
        });
    </script>

<?php }

function save_your_fields_meta( $post_id ) {
    // verify nonce
    if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id;
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    }

    $old = get_post_meta( $post_id, 'add_project', true );
    $new = $_POST['add_project'];

    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'add_project', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'add_project', $old );
    }
}
add_action( 'save_post', 'save_your_fields_meta' );