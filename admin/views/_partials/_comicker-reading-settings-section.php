<?php

/**
 * Comicker reading settings section
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
			<input name="comicker_reading_direction" id="comicker_reading_direction" type="radio" value="1" <?php  checked(get_option( 'comicker_reading_direction' ), 1, true ) ?> > 
			Left to right
		</label>
		<br>
		<label>
			<input name="comicker_reading_direction" id="comicker_reading_direction" type="radio" value="0" <?php  checked(get_option( 'comicker_reading_direction' ), 0, true ) ?> > 
			Right to left
		</label>
	</p>
</fieldset>