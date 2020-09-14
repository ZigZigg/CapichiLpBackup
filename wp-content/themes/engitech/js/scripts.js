(function( $ ) {
    "use strict";

    /* ========================================== 
	Sticky Header Default
	========================================== */
    $('.sticky-header').append('<div class="header-clone"></div>');
    $('.header-clone').height($('.site-header .octf-main-header').outerHeight());
    $('.sticky-header .header-clone').hide();   
	$(window).on("scroll", function(){
		if ( $( '#site-header' ).hasClass( "sticky-header" ) ) {
			var site_header = $('#site-header').outerHeight() + 30;	
			
		    if ($(window).scrollTop() >= site_header) {	    	
		        $('.sticky-header .octf-main-header, .mobile-header-sticky .header_mobile').addClass('is-stuck');	
                $('.sticky-header .header-clone').show();        
		    }else {
		        $('.sticky-header .octf-main-header, .mobile-header-sticky .header_mobile').removeClass('is-stuck');		              
                $('.sticky-header .header-clone').hide();        
		    }
		}
	});

    /* ========================================== 
    Search on Header
    ========================================== */
    $('.toggle_search').on("click", function(){
        $(this).toggleClass( "active" );
        $('.h-search-form-field').toggleClass('show');
        if ($(this).find('i').hasClass( "flaticon-search" )) {
            $('.toggle_search > i').removeClass( "flaticon-search" ).addClass("flaticon-close");
        }else{
            $('.toggle_search > i').removeClass( "flaticon-close" ).addClass("flaticon-search");
        }
        $('.h-search-form-inner > form > input.search-field').focus();
    });

    /* ========================================== 
    Back To Top
    ========================================== */
    if ($('#back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        }); 
    }

	/*Gallery Post*/
    $('.gallery-post').each( function () {
        $(this).slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 7000,
            prevArrow: '<button type="button" class="prev-nav"><i class="flaticon-back"></i></button>',
            nextArrow: '<button type="button" class="next-nav"><i class="flaticon-right-arrow-1"></i></button>',
            responsive: []
        });
    });

    /*Popup Video*/
    var $video_play = $('.btn-play');
    if ($video_play.length > 0 ) {
        $video_play.magnificPopup({
            type: 'iframe',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: true,
            callbacks: {
            beforeOpen: function() {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
        });
    }

    /* Widget Instagram Feeds */
    $('.widget-insta-feeds').each( function () {
        var $widgetid   = $(this).data('instafeed-widgetid');
        var $clientId   = $(this).data('instafeed-clientid');
        var $userId   = $(this).data('instafeed-userid');
        var $accessToken   = $(this).data('instafeed-accesstoken');
        var $limit   = $(this).data('instafeed-limit');

        var userFeed = new Instafeed({
            get: 'user',
            userId: $userId,
            clientId: $clientId,
            accessToken: $accessToken,
            resolution: 'standard_resolution',
            template: '<div class="instafeed-item"><a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a></div>',
            sortBy: 'most-recent',
            limit: $limit,
            links: false,
            target: $widgetid,
        });
        userFeed.run();
    }); 

    /*Portfolio Filter*/
    $(window).load( function () {
        if( $('#projects_grid').length > 0 ){
            var $container = $('#projects_grid'); 
            $container.isotope({ 
                itemSelector : '.project-item', 
                layoutMode : 'masonry'
            });

            var $optionSets = $('.project_filters'),
                $optionLinks = $optionSets.find('a');

            $optionLinks.click(function(){
                var $this = $(this);

                if ( $this.hasClass('selected') ) {
                    return false;
                }
                var $optionSet = $this.parents('.project_filters');
                    $optionSets.find('.selected').removeClass('selected');
                    $this.addClass('selected');

                var selector = $(this).attr('data-filter');
                    $container.isotope({ 
                        filter: selector 
                    });
                return false;
            });
        };    

        if( $('.blog-grid').length > 0 ){
            var $container = $('.blog-grid'); 
            $container.isotope({ 
                itemSelector : '.masonry-post-item', 
                layoutMode : 'masonry'
            });
        };
    });

})( jQuery );

