/**
 * BitFlow js main file
 * 
 * Functions are organise like the page sections (from top to bottom)
 */
$( document ).ready(function(){
    var $body     = $( 'body' ),
        masthead = $( '#masthead' ),
        topMenu  = $( '.navbar.navbar-theme' );

    /**
     * Controls the jumb to section menu
     */
    function menuControl() {
        var lastId,
            menuNav = $( '#main-menu' ),
            menuNavHeight = topMenu.outerHeight(),
            menuLinks = menuNav.find( 'a' );

            scrollItems = menuLinks.map(function() {
                var item = $( $( this).attr( 'href' ) );
                if ( item.length ) {
                    return item; 
                }
            });

        menuLinks.click( function( e ) {

            var href = $( this ).attr( 'href' ),
                offsetTop = href === '#' ? 0 : $( href ).offset().top - menuNavHeight + 1;

            $( 'html, body' ).stop().animate({
                scrollTop: offsetTop
            }, 1000 );

            e.preventDefault();
        });

        // Indicate active menu for the section
        $( window ).scroll( function() {
            var fromTop = $( this ).scrollTop() + menuNavHeight + 300;
            var cur = scrollItems.map( function() {
                if ( $( this ).offset().top < fromTop )
                    return this;
            });

            cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";
        
            if (lastId !== id) {
                lastId = id;
                menuLinks
                    .parent().removeClass( 'active' )
                    .end().filter('[href=#' + id + ']').parent().addClass( 'active' );
            }
        });

        // Make the navigation stick to top when scrolling
        $( window ).on( 'scroll', function() {
			if ( $( window ).scrollTop() >= 500 ) {
                topMenu.addClass( 'affix' );
            } else {
                topMenu.removeClass( 'affix' );
            }
        });
        
        /**
         * Recalculate the padding top of slider-contents 
         * to allow better positioning of the top menu on screens larger
         * than 768px.
         */
        function rePosition() {

            var menuHeight = topMenu.outerHeight();

            // If we are not on screens lower than 768px and there is navigation menu
            if( 'none' == $( '.navbar-toggle' ).css( 'display' ) && 0 != menuHeight ) {
                
                // Set new padding top on these element
                $( '.header-slider-content, .header-video-content' ).css( 'padding-top', menuHeight + 180 + 'px' );
            } else {
                // Reset padding top when on smaller screen
                $( '.header-slider-content, .header-video-content' ).css( 'padding-top', '60px' );
            }
        }

        rePosition();
        $( window ).on( 'resize', rePosition );
    }
    menuControl();

    /**
     * Quick toggle between the sign in and sign up modal
     */
    function toggleUserForm() {
        $( '#reg' ).on( 'click', function( e ) {

            e.preventDefault();
            $('#sign-in').modal('hide');

            // Has the modal been hidden successfuly
            $('#sign-in').on('hidden.bs.modal', function( e ) {
                $('#sign-up').modal('show');

                // Dettach event
                $( this ).off( 'hidden.bs.modal' );
            })
        })

        $( '#log' ).on( 'click', function( e ) {

            e.preventDefault();
            $('#sign-up').modal('hide');

            // Has the modal be hidden successfuly
            $('#sign-up').on( 'hidden.bs.modal', function( e ) {
                $( '#sign-in' ).modal( 'show' );

                // Dettach event
                $( this ).off( 'hidden.bs.modal' );
            })
        })
    }
    toggleUserForm();

    /**
     * Initiate sliding event on the header image content
     * 
     * @uses slick.min.js - https://github.com/kenwheeler/slick
     */
    function slideHeaderContent() {
        // Event for this slider elements animation
        $( '#header-slider' ).on( 'afterChange', function( event, slick, currentSlide ) {

            var activeSlide         = $( '#header-slider .header-slider-content' ).eq( currentSlide ),
                activeSlideChildren = activeSlide.find( '.container' ).children();

            // Animate this elements via its "data-slide-animate-effect"
            $( activeSlideChildren ).each( function() {
                var slideChild = $( this );

                if( slideChild.data( 'slide-animate-effect' ) ) {

                    var animateEffect = slideChild.data( 'slide-animate-effect' );
                    slideChild.css( 'visibility', 'visible' ).addClass( animateEffect + ' animated' );
                }
            })

            var inActiveSlide         = activeSlide.siblings(),
                inActiveSlideChildren = inActiveSlide.find( '.container' ).children();

            // Reset elements for re-animation
            $( inActiveSlideChildren ).each( function() {
                var slideChild = $( this );

                if( slideChild.data( 'slide-animate-effect' ) ) {
                    var animateEffect = slideChild.data( 'slide-animate-effect' );
                    slideChild.removeClass( animateEffect + ' animated' ).css( 'visibility', 'hidden' );
                }
            })

        });

        $( '#header-slider' ).slick({
            'arrows'           : false, // Enable Next/Prev arrows
            'autoplay'         : true, // Enables auto play of slides
            'dots'             : true, // Current slide indicator dots
            'dotsClass'        : 'header-slider-dots', // dot selector class
            'cssEase'          : 'linear',   // CSS3 easing
            'autoplaySpeed'    : 5000, // Auto play change interval
            'adaptiveHeight'   : true, // Adapts slider height to the current slide
            'fade'             : true,  // Enables fade Animation Effet
            'pauseOnFocus'     : false,  // Pauses autoplay when slider is focussed
            'pauseOnHover'     : false,  // Pauses autoplay on hover
            'pauseOnDotsHover' : false, // Pauses autoplay when a dot is hovered
            'draggable'        : false // enables desktop dragging
        }).removeClass( 'not-visible' );
    }
    // Call function
    slideHeaderContent();

    /**
     * Initiate Number counter on the numbers count
     * 
     * @uses jquery.waypoint.js
     * @uses jquery.countTo.js
     */
    function successCounter() {
		if ( $( '#numbers' ).length > 0 ) {
			$('#numbers').waypoint( function( direction ) {

                var counter = function() {
                    $( '.count' ).countTo({
                        formatter: function( value, options ) {
                            return value.toFixed( options.decimals );
                        },
                    });
                };
										
				if( 'down' === direction && ! $( this.element ).hasClass( 'count-done' ) ) {
                    setTimeout( counter , 200 );
                    $( this.element ).addClass( 'count-done' );
				}
			} , { offset: '70%' } );
		}
    };
    // invoke function
    successCounter();

    /**
     * Initiate sliding event on the reviews content
     * 
     * @uses slick.min.js - https://github.com/kenwheeler/slick
     */
    $( '#reviews-inner' ).slick({
        'arrows'       : false,     // Enable Next/Prev arrows
        'autoplay'     : true,     // Enables auto play of slides
        'dots'         : true,         // Current slide indicator dots
        'dotsClass'    : 'reviews-slider-dots', // dot selector class
        'cssEase'      : 'linear',  // CSS3 easing
        'autoplaySpeed': 5000 // Auto play change interval
    }).removeClass( 'not-visible' );

    /**
     * The dynamic tooltip hover effect used on network links in the -contact- section
     * 
     * @uses bootstrap.min.js
     */
    $( '[data-toggle="tooltip"]' ).tooltip();

    /**
     * Back to top button
     */
    var $scrollup_object = $( '#btt-btn' );

	if ( $scrollup_object.length > 0 ) {
		$( window ).scroll( function() {
			if ( $( this ).scrollTop() > 100 ) {
				$scrollup_object.fadeIn();
			} else { 
				$scrollup_object.fadeOut();
			}
		});

		$scrollup_object.click( function() {
			$( 'html, body' ).animate({ scrollTop: 0 }, 600 );
			return false;
		});
    }
    
    /**
     * Scroll animate effect on the page
     * 
     * @uses jquery.waypoint.js - http://imakewebthings.com/waypoints
     */
    function scrollAnimate() {
        // Check if scroll event is enabled
        var enabledAnimation = $( '[data-enable-scroll-animate="true"]' );

        // Collect every element to animate
        var $elementAnimate = enabledAnimation.find( '[data-scroll-animate]' );

        $elementAnimate.addClass( 'not-visible' );

        $( $elementAnimate ).waypoint( function( direction ) {
            // Get current element
            var thisElement = $( this.element );

            if( 'down' === direction && ! thisElement.hasClass( 'animation-done' ) ) {
                setTimeout( function() {
                    var $animateEffect = thisElement.data( 'scroll-animate' );
                    var animationDone = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

                    thisElement
                        .removeClass( 'not-visible' )
                        .addClass( $animateEffect + ' animated animation-done' )
                        // After animation is done remove animation effects classess
                        .one( animationDone, function() {
                            thisElement.removeClass( $animateEffect + ' animated' )
                                .removeAttr( 'data-scroll-animate' );
                        });
                }, 100 , 'easeInOutExpo' )
            }
        }, { offset : '70%' } );
    }
    // Call function
    scrollAnimate();
});