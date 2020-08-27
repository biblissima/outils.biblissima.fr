(function($) {
	$(function () {
		$('[data-toggle="tooltip"]').tooltip({container: 'body'});

		// simple light box

		$('.gallery a').simpleLightbox({
			navText: ['<span class="glyphicon glyphicon-arrow-left"></span>','<span class="glyphicon glyphicon-arrow-right"></span>'],
			closeText: '<span class="glyphicon glyphicon-remove"></span>',
			captionSelector: 'self'
		});

		$(window).on('load', function(e) {
				e.preventDefault();
				scrollToTabs();
		});

		$('#collatinusTabs a').on('click', function(e) {
			e.preventDefault();
			history.replaceState(null, null, $(this).attr('href'));
			$(this).tab('show');
			// scrollToTabs();
		});

		function scrollToTabs() {
			if (!$('body').hasClass('index-lsj')) {
				var hash = location.hash.substr(0);
				var tab = $( 'li a[href="' + hash + '"]' );
				if(tab.length) {
					tab.tab('show');
					$('html, body').stop(true).animate({'scrollTop' : tab.offset().top - 175 }, 500);
				}
			}
		}

	});
}(jQuery))