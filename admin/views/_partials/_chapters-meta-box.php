<?php

/**
 * The Chapters meta box.
 *
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/admin/views/_partials
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/admin/views/_partials
 */

?>

<div id="taxonomy-category" class="categorydiv">
	<ul id="category-tabs" class="category-tabs">
		<li class="tabs"><a href="#category-all">All Chapters</a></li>
	</ul>

	<div id="category-all" class="tabs-panel">
		<input type="hidden" name="comic_chapter[]" value="0">
		<ul id="categorychecklist" data-wp-lists="list:category" class="categorychecklist form-no-clear">
			<?php 

				$chapters = get_terms('chapter', array('hide_empty' => false ) );

				foreach($chapters as $key => $chapter) {

					echo '

						<li id="chapter-'.$key.'" class="chapter">
							<label class="selectit">
								<input value="'.$chapter->ID.'" type="radio" name="comic_chapter[]" id="in-chapter-'.$chapter->ID.'"> 
								'.$chapter->name.'
							</label>
						</li> 

						';
				}
			 ?>
		</ul>
	</div>

	<div id="category-adder" class="wp-hidden-children">
		<a id="category-add-toggle" href="#chapter-add" class="hide-if-no-js taxonomy-add-new">+ Add New Chapter</a>

		<p id="category-add" class="category-add wp-hidden-child">
			<label class="screen-reader-text" for="newcategory">Add New Chapter</label>
			<input type="text" name="newcategory" id="newcategory" class="form-required form-input-tip" value="New Chapter Title" aria-required="true">
			<input type="button" id="category-add-submit" data-wp-lists="add:categorychecklist:category-add" class="button category-add-submit" value="Add New Chapter">
			<input type="hidden" id="_ajax_nonce-add-category" name="_ajax_nonce-add-category" value="bbedaeadff">				<span id="category-ajax-response"></span>
		</p>
	</div>
</div>