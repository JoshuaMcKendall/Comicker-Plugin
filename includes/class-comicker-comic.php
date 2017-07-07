<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/includes/
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/includes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Comicker
 * @subpackage Comicker/includes
 * @author     Joshua McKendall <comicker@joshuamckendall.com>
 */

	// private $comic_attachment_id;

	// private $comic_attachment_path;

	// private $comic_attachment_file_name;

	// private $comic_attachment_file_type;


					// update_post_meta( $post_id, '_comic_id', $comic_id );

					// $comic->save();


// } elseif ( $update && ( !isset( $_POST['_comic_id'] ) || empty( $_POST['_comic_id'] ) ) ) {

// 					$comic_id = get_post_meta( $post_id, '_comic_id', true );

// 					delete_post_meta( $post_id, '_comic_id', $comic_id );


class Comicker_Comic {

	private $comic_post_id;

	private $comic_attachment = [];

	private $comic_chapter_id;

	private $comic_frames = [];

	private $can_be_saved = FALSE;

	private $is_update = FALSE;



	public function __construct( $comic_post_id, $comic_attachment_id, $options ) {

		$this->set_comic_post($comic_post_id);
		$this->set_comic_attachment($comic_attachment_id);
		$this->set_comic_chapter($options['chapter_id']);
		$this->set_comic_frames($options['frames']);

	}

	public function set_comic_post($comic_post_id) {



	}

	public function set_comic_attachment($comic_attachment_id) {

		$post_type = get_post_type( $this->$comic_post_id );

		if($post_type == 'comic') {

			$this->$comic_attachment['id'] = (int) $comic_attachment_id;
			$this->$comic_attachment['file_path'] = get_attached_file( $comic_id );
			$this->$comic_attachment['file_name'] = basename( $this->$comic_attachment['file_path'] );
			$this->$comic_attachment['file_type'] = wp_check_filetype( $this->$comic_attachment['file_name'], null );

		}



	}

	public function set_comic_chapter($chapter_id) {

		$chapter_exists = term_exists( $chapter_id, 'chapter' );
		$user_allows_chapters = get_option('comicker_allow_chapters');


		if($chapter_exists && $user_allows_chapters) {

			$this-$comic_chapter_id = $chapter_id;

		} else {

			$this->$comic_chapter_id = NULL;

		}

	}

	public function set_comic_frames($comic_frames) {

		$frames = $callback[0]->$callback[1]($frames);

	}

	public function get_comic($comic_id) {

		$comic_attachment; // array ( ['id'] => id, ['file_path'] => path, ['file_name'] => name, ['file_type'] => type)

		return array(

			'id' => $comic_id,
			'attachment' => $comic_attachment,
			'chapter' => $comic_chapter,
			'frames' => $comic_frames,
			'status' => $comic_status

			);

	}

	public function delete_comic_attachment($comic_id) {



	}

	public function save() {

		if($this->$can_be_saved) {

			// Yay, here we go!
			update_post_meta( $this->$comic_post_id, '_comic_id', $this->$comic_page_id );

		}

	}
}