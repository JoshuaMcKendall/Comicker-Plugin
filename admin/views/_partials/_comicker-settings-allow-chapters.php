<?php

/**
 * Comicker allow chapters field
 *
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/admin/views/_partials
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/admin/views/_partials
 */

?>



<fieldset>
	<legend class="screen-reader-text">
		<span>Reading direction </span>
	</legend>
	<p>
		<label>
			<input name="comicker_allow_chapters" id="comicker_allow_chapters" type="radio" value="1" <?php  checked(get_option( 'comicker_allow_chapters' ), 1, true ) ?> > 
			On
		</label>
		<br>
		<label>
			<input name="comicker_allow_chapters" id="comicker_allow_chapters" type="radio" value="0" <?php  checked(get_option( 'comicker_allow_chapters' ), 0, true ) ?> > 
			Off
		</label>
	</p>
</fieldset>