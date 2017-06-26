<?php

/**
 * The Chapters page for Chapters submenu
 *
 *
 * @link       https://github.com/JoshuaMcKendall/Comicker-Plugin/admin/views
 * @since      1.0.0
 *
 * @package    Comicker
 * @subpackage Comicker/admin/partials
 */

?>

<div class="wrap nosubsub">
<h1 class="wp-heading-inline">Chapters</h1>


<hr class="wp-header-end">

<div id="ajax-response"></div>

<form class="search-form wp-clearfix" method="get">
<input type="hidden" name="taxonomy" value="post_tag">
<input type="hidden" name="post_type" value="comic">

<p class="search-box">
	<label class="screen-reader-text" for="tag-search-input">Search Chapters:</label>
	<input type="search" id="tag-search-input" name="s" value="">
	<input type="submit" id="search-submit" class="button" value="Search Chapters"></p>

</form>

<div id="col-container" class="wp-clearfix">

<div id="col-left">
<div class="col-wrap">


<div class="form-wrap">
<h2>Add New Chapter</h2>
<form id="addtag" method="post" action="edit-tags.php" class="validate">
<input type="hidden" name="action" value="add-tag">
<input type="hidden" name="screen" value="edit-post_tag">
<input type="hidden" name="taxonomy" value="post_tag">
<input type="hidden" name="post_type" value="comic">
<input type="hidden" id="_wpnonce_add-tag" name="_wpnonce_add-tag" value="2be340ed3d"><input type="hidden" name="_wp_http_referer" value="/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic">
<div class="form-field form-required term-name-wrap">
	<label for="tag-name">Name</label>
	<input name="tag-name" id="tag-name" type="text" value="" size="40" aria-required="true">
	<p>The name is how it appears on your site.</p>
</div>
<div class="form-field term-slug-wrap">
	<label for="tag-slug">Slug</label>
	<input name="slug" id="tag-slug" type="text" value="" size="40">
	<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
</div>
<div class="form-field term-description-wrap">
	<label for="tag-description">Description</label>
	<textarea name="description" id="tag-description" rows="5" cols="40"></textarea>
	<p>The description is not prominent by default; however, some themes may show it.</p>
</div>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add New Tag"></p></form></div>

</div>
</div><!-- /col-left -->

<div id="col-right">
<div class="col-wrap">
<form id="posts-filter" method="post">
<input type="hidden" name="taxonomy" value="post_tag">
<input type="hidden" name="post_type" value="comic">

<input type="hidden" id="_wpnonce" name="_wpnonce" value="3c37923f51"><input type="hidden" name="_wp_http_referer" value="/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic">	<div class="tablenav top">

				<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label><select name="action" id="bulk-action-selector-top">
<option value="-1">Bulk Actions</option>
	<option value="delete">Delete</option>
</select>
<input type="submit" id="doaction" class="button action" value="Apply">
		</div>
		<div class="tablenav-pages no-pages"><span class="displaying-num">0 items</span>
<span class="pagination-links"><span class="tablenav-pages-navspan" aria-hidden="true">«</span>
<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
<span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" id="current-page-selector" type="text" name="paged" value="1" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages">0</span></span></span>
<a class="next-page" href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;paged=0"><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
<a class="last-page" href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;paged=0"><span class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span></div>
		<br class="clear">
	</div>
<h2 class="screen-reader-text">Tags list</h2><table class="wp-list-table widefat fixed striped tags">
	<thead>
	<tr>
		<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td><th scope="col" id="name" class="manage-column column-name column-primary sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=name&amp;order=asc"><span>Name</span><span class="sorting-indicator"></span></a></th><th scope="col" id="description" class="manage-column column-description sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=description&amp;order=asc"><span>Description</span><span class="sorting-indicator"></span></a></th><th scope="col" id="slug" class="manage-column column-slug sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=slug&amp;order=asc"><span>Slug</span><span class="sorting-indicator"></span></a></th><th scope="col" id="posts" class="manage-column column-posts num sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=count&amp;order=asc"><span>Count</span><span class="sorting-indicator"></span></a></th>	</tr>
	</thead>

	<tbody id="the-list" data-wp-lists="list:tag">
		<tr class="no-items"><td class="colspanchange" colspan="5">No tags found.</td></tr>	</tbody>

	<tfoot>
	<tr>
		<td class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></td><th scope="col" class="manage-column column-name column-primary sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=name&amp;order=asc"><span>Name</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-description sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=description&amp;order=asc"><span>Description</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-slug sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=slug&amp;order=asc"><span>Slug</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-posts num sortable desc"><a href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;orderby=count&amp;order=asc"><span>Count</span><span class="sorting-indicator"></span></a></th>	</tr>
	</tfoot>

</table>
	<div class="tablenav bottom">

				<div class="alignleft actions bulkactions">
			<label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="action2" id="bulk-action-selector-bottom">
<option value="-1">Bulk Actions</option>
	<option value="delete">Delete</option>
</select>
<input type="submit" id="doaction2" class="button action" value="Apply">
		</div>
		<div class="tablenav-pages no-pages"><span class="displaying-num">0 items</span>
<span class="pagination-links"><span class="tablenav-pages-navspan" aria-hidden="true">«</span>
<span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
<span class="screen-reader-text">Current Page</span><span id="table-paging" class="paging-input"><span class="tablenav-paging-text">1 of <span class="total-pages">0</span></span></span>
<a class="next-page" href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;paged=0"><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
<a class="last-page" href="http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=post_tag&amp;post_type=comic&amp;paged=0"><span class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span></div>
		<br class="clear">
	</div>

</form>

<div class="form-wrap edit-term-notes">
<p>Tags can be selectively converted to categories using the <a href="http://localhost/wordpress/wp-admin/import.php">tag to category converter</a>.</p>
</div>

</div>
</div><!-- /col-right -->

</div><!-- /col-container -->
</div>

<?php