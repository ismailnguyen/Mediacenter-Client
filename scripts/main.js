$(document).ready(function () {
	
	$('.new-item-btn').on('click', function () {
		$('.new-item')[
				$('.new-item').is(':visible')
				? 'hide'
				: 'show'
		]();
	});
	
	$('#searchbox').keyup(function () {
		var query = $(this).val().toLowerCase();
		
		$('.grid-element').each(function () {
			if (($(this).find('.btn').text().toLowerCase()).indexOf(query) < 0) {
				$(this).hide();
			} else {
				$(this).show();
			}
		});
	});
	
	$('.grid-element').hover(function() {
		$(this).find('.button-hover').show();
	},
	function() {
		$(this).find('.button-hover').hide();
	});
	
	$('.button-delete').click(function () {
		if (confirm('Are you sure to remove ?')) {
			$.post(window.location.href, { remove: $(this).attr('name') })
			.done(function () {
				window.location.reload();
			});
		}
	});
	
	$('.button-add').click(function () {
		$.post(window.location.href, { add: $(this).attr('name') })
		.done(function () {
			window.location.reload();
		});
	});
	
	$('#link-musics').click(function () {
		$('#link-albums')[
				$('#link-albums').is(':visible')
				? 'hide'
				: 'show'
			]();
			
		$('#link-songs')[
				$('#link-songs').is(':visible')
				? 'hide'
				: 'show'
			]();
	});
});