<?php

/**
 * The comic meta box partial
 *
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/admin/views/_partials
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/admin/views/_partials
 */

global $post;

$upload_link = esc_url( get_upload_iframe_src('image', $post->ID) );

$img_id = get_post_meta( $post->ID, '_comic_id', true );

$img_src = wp_get_attachment_image_src( $img_id, 'full' );

$have_img = is_array( $img_src );

?>

<a href="#open-comic-library" id="open-comic-library" >
	<div id="comicker-comic-area" class="<?php if( !$have_img ) { echo 'no-image'; } else { echo 'image'; } ?>">
		<button id="add-comic-button" class="add-comic button <?php if( $have_img ) { echo 'hidden'; } else { echo 'show'; } ?>" ><?php _e('Choose or Upload a Comic', 'comicker') ?></button>
		<img id="comic-page" class="comic-page <?php if( !$have_img ) { echo 'hidden'; } ?>" src="<?php if( $have_img ) { echo esc_url( $img_src[0] ); } ?>">

		<input type="number" name="_comic_id" class="comic-id hidden tags-list" type="hidden" value="<?php echo esc_attr( $img_id ); ?>">
		<textarea class="hidden"></textarea>
		<?php wp_nonce_field( 'save_comic_page', 'comic_editor_nonce' ); ?>
	</div>
</a>

<button class="remove-comic button <?php if( !$have_img ) { echo 'hidden'; } ?>"><?php _e('Remove Comic', 'comicker'); ?></button>