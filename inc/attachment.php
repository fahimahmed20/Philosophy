<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function philosophy_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'philosophy' )    // label to display
    ),
	  );
   $args = array(
		'label'      => 'Gallery Images',                       // unique field name
		'post_type' => array('post'),
		'filetype' => array('image'),
		'note' => 'Add gallery image',
		'button_text' => __('Attach files','philosophy'),
		'fields' => $fields
    );

  $attachments->register( 'gallery', $args ); // unique instance name
}

add_action( 'attachments_register', 'philosophy_attachments' );



