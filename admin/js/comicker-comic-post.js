(function( $ ) {

	'use strict';


	$(document).ready(function() {

		var $comic_meta_box = $('#comic-meta-box'),
			$comic_meta_box_hndle = $comic_meta_box.find('.hndle'),
			$inside_comic_meta_box = $comic_meta_box.find('.inside'),
			$add_comic_button = $comic_meta_box.find('.add-comic'),
			$remove_comic_button = $comic_meta_box.find('.remove-comic'),
			$comic_page = $('#comic-meta-box .inside .comic-page'),
			$comic_id_input = $inside_comic_meta_box.find('.comic-id'),
			$open_comic_library = $comic_meta_box.find('#open-comic-library'),
			$remove_comic_button,
			selection,
			selected,
			comic_library;


		function init() {

			renderComicEditor();
			openComicLibrary($open_comic_library);
			removeComicFromEditor();

		}

		function openComicLibrary(context) {


			if( !(context instanceof jQuery) ) {

				console.log('Comic uploader selector must be a jQuery object.');
				return;

			}


			context.on('click', function(e) {
				e.preventDefault();

				if(undefined !== comic_library) {
					comic_library.open().trigger('open');
					return;
				}

				comic_library = wp.media.frames.file_frame = wp.media({

					button: { text: 'Insert to Comic Editor'},
					states: [
						new wp.media.controller.Library({
							title: 'Insert Comic',
							library: wp.media.query({ type: 'image' }),
							multiple: false,
							priority: 20,
							filterable: 'uploaded'
						})
					]
				});

				comic_library.on('open', function() {

					if($.trim($comic_id_input.val()).length > 0 && selection == null) {

						selection = comic_library.state().get('selection');
						selection.add(wp.media.attachment($comic_id_input.val()));

					}


					if(selection && selected)
						selection.add(wp.media.attachment(selected.id));

				});

				comic_library.on('select', function(e) {
					selection = comic_library.state().get('selection'),
					selected = selection.toJSON()[0];

					if(selected.type == 'image') {
						
						addComicToEditor(selected);

					}
				});


				comic_library.open();
			});

		}


		function renderComicEditor() {

			$comic_meta_box_hndle.append($remove_comic_button);
			$comic_meta_box_hndle.css('cursor', 'default').unbind('click.postboxes');
			$comic_meta_box.insertBefore( $('#postdivrich') );
			$comic_meta_box.sortable({
				disabled: true
			});

			$comic_meta_box_hndle.css({
				'overflow': 'hidden'
			});
			
			$comic_meta_box_hndle.find('span').css({
				'vertical-align' : 'bottom',
				'top' : '3px',
				'position' : 'relative',
				'margin-right' : '20px'
			});

			$('#comic-meta-box .handlediv').remove();
			$('#comic-meta-box.postbox').removeClass('closed');

			$comic_meta_box.css('visibility', 'visible');

			

		}


		function addComicToEditor(comic) {

			$add_comic_button.removeClass('show').addClass('hidden');
			$remove_comic_button.removeClass('hidden');
			$inside_comic_meta_box.find( $('.no-image') ).removeClass('no-image').addClass('image');
			$comic_page.attr( 'src', comic.url ).removeClass('hidden');
			$comic_id_input.val( comic.id );


		}

		function removeComicFromEditor() {

			$remove_comic_button.on('click', function(e) {
				e.preventDefault();

				if(selection && selected) {
					selection.remove(wp.media.attachment(selected.id));
					selection = null;
					selected = null;
				}


				$comic_page.attr( 'src', '' ).addClass('hidden');
				$comic_id_input.val( '' );
				$add_comic_button.removeClass('hidden').addClass('show');
				$remove_comic_button.addClass('hidden');
				$inside_comic_meta_box.find( $('.image') ).removeClass('image').addClass('no-image');


			});

		}

		// Start everything up.
		init();

	});

})( jQuery );
