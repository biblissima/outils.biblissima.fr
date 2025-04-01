(function($) {
	$(function () {

		// enable BS tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl, {html: true}));

    // enable BS popovers
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
		const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl, {
			html: true,
		}));

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

		$('.btn-clear').bind( "click", function(){
			$('#traitement_texte').val(function() {
				return this.defaultValue;
			});
		});
	});
}(jQuery))
