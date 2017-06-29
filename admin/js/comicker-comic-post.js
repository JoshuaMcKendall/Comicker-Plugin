(function( $ ) {

	'use strict';

	function init() {

	}

	function createComicUploader() {

	}

	function openComicUploader() {
		
	}

	function renderComicEditor() {

	}

	function addComicToEditor() {

	}

	function removeComicFromEditor() {

	}

	$(document).ready(function() {
		var $comic_meta_box = $('#comic-meta-box'),
			$comic_meta_box_hndle = $comic_meta_box.find('.hndle'),
			$inside_comic_meta_box = $comic_meta_box.find('.inside'),
			$add_comic_button = $comic_meta_box_hndle.find('.add-comic'),
			$remove_comic_button = $comic_meta_box_hndle.find('.remove-comic'),
			$comic_page = $('#comic-meta-box .inside .comic-page'),
			comic_uploader;

		
		$comic_meta_box.insertBefore( $('#postdivrich') );
		$comic_meta_box.css('visibility', 'visible');
		$comic_meta_box.sortable({
			disabled: true
		});


		$comic_meta_box_hndle.css('cursor', 'default').unbind('click.postboxes');
		$comic_meta_box_hndle.find('span').css({
			'vertical-align' : 'bottom',
			'bottom' : '6px',
			'position' : 'relative',
			'margin-right' : '20px'
		});
		$comic_meta_box_hndle.append('<div id="mceu_1" class="mce-widget mce-btn" tabindex="-1" role="button" aria-label="Bold"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div>');
		$('#comic-meta-box .handlediv').remove();
		$('#comic-meta-box.postbox').removeClass('closed');

		$add_comic_button.on('click', function(e) {
			e.preventDefault();

			if(undefined !== comic_uploader) {
				comic_uploader.open();
				return;
			}

			comic_uploader = wp.media.frames.file_frame = wp.media({

				button: { text: 'Insert to Comic Editor'},
				states: [
					new wp.media.controller.Library({
						title: 'Insert Comic',
						library: wp.media.query({ type: 'image' }),
						multiple: false,
						priority: 20,
						filterable: 'all'
					})
				]
			});

			comic_uploader.open().trigger('open');

			comic_uploader.on('open', function() {
				console.log('Comic Frame Opened');
			});

			comic_uploader.on('close', function() {
				console.log('Comic Frame Closed');
			});

			comic_uploader.on('select', function(e) {
				var selection = comic_uploader.state().get('selection');

				selection.map( function(attachment) {

					attachment = attachment.toJSON();

					if(attachment.type == 'image') {
						$add_comic_button.removeClass('show').addClass('hidden');
						$inside_comic_meta_box.find( $('.no-image') ).removeClass('no-image').addClass('image');
						$comic_page.attr( 'src', attachment.url ).removeClass('hidden');
					}
				});
			});
		});
	});

})( jQuery );
