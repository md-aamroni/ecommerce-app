( function ( $ ) {
        'use strict';
        const body           = $( 'body' ),
              $window        = $( window ),
              rtl_mode       = body.hasClass( 'rtl' ),
              $ld            = $( '#ld_cl_bar' ),
              window_w       = $window.width(),
              is_smaller_768 = window_w < 768,
              mask           = $( '.mask-overlay' ),
              html           = $( 'html' ),
              touchevents    = Modernizr.touchevents;

        let timeout     = null,
            $nt_js_cart = $( '.nt_js_cart' );

        body.addClass( 'kalles-ready' );

        /*****************************************************************
         * Define Pref
         * ***************************************************************/
        let kallesInitTimzone  = ( T => {
            return {
                ACDT : "+1030", ACST : "+0930", ADT : "-0300", AEDT : "+1100", AEST : "+1000", AHDT : "-0900", AHST : "-1000", AST : "-0400", AT : "-0200", AWDT : "+0900", AWST : "+0800", BAT : "+0300", BDST : "+0200", BET : "-1100", BST : "-0300", BT : "+0300", BZT2 : "-0300", CADT : "+1030", CAST : "+0930", CAT : "-1000", CCT : "+0800", CDT : "-0500", CED : "+0200", CET : "+0100", CEST : "+0200", CST : "-0600", EAST : "+1000", EDT : "-0400", EED : "+0300", EET : "+0200", EEST : "+0300", EST : "-0500", FST : "+0200", FWT : "+0100", GMT : "GMT", GST : "+1000", HDT : "-0900", HST : "-1000", IDLE : "+1200", IDLW : "-1200", IST : "+0530", IT : "+0330", JST : "+0900", JT : "+0700", MDT : "-0600", MED : "+0200", MET : "+0100", MEST : "+0200", MEWT : "+0100", MST : "-0700", MT : "+0800", NDT : "-0230", NFT : "-0330", NT : "-1100", NST : "+0630", NZ : "+1100", NZST : "+1200", NZDT : "+1300", NZT : "+1200", PDT : "-0700", PST : "-0800", ROK : "+0900", SAD : "+1000", SAST : "+0900", SAT : "+0900", SDT : "+1000", SST : "+0200", SWT : "+0100", USZ3 : "+0400", USZ4 : "+0500", USZ5 : "+0600", USZ6 : "+0700", UT : "-0000", UTC : "-0000", UZ10 : "+1100", WAT : "-0100", WET : "-0000", WST : "+0800", YDT : "-0800", YST : "-0900", ZP4 : "+0400", ZP5 : "+0500", ZP6 : "+0600"
            }[ T ] || "UTC"
        } ),
            kallesIsVisible    = ( el, partial, hidden, direction, container ) => {
                if ( el.length < 1 ) return;
                /*Set direction default to 'both'.*/
                direction = direction || 'both';

                var $w = $( window ), $t = el.length > 1 ? el.eq( 0 ) : el,
                    isContained          = typeof container !== 'undefined' && container !== null,
                    $c                   = isContained ? $( container ) : $w,
                    wPosition            = isContained ? $c.position() : 0,
                    t                    = $t.get( 0 ),
                    vpWidth              = $c.outerWidth(),
                    vpHeight             = $c.outerHeight(),
                    clientSize           = hidden === true ? t.offsetWidth * t.offsetHeight : true;

                if ( typeof t.getBoundingClientRect === 'function' ) {

                    /*Use el native browser method, if available.*/
                    var rec      = t.getBoundingClientRect(),
                        tViz     = isContained ?
                            rec.top - wPosition.top >= 0 && rec.top < vpHeight + wPosition.top :
                            rec.top >= 0 && rec.top < vpHeight,
                        bViz     = isContained ?
                            rec.bottom - wPosition.top > 0 && rec.bottom <= vpHeight + wPosition.top :
                            rec.bottom > 0 && rec.bottom <= vpHeight,
                        lViz     = isContained ?
                            rec.left - wPosition.left >= 0 && rec.left < vpWidth + wPosition.left :
                            rec.left >= 0 && rec.left < vpWidth,
                        rViz     = isContained ?
                            rec.right - wPosition.left > 0 && rec.right < vpWidth + wPosition.left :
                            rec.right > 0 && rec.right <= vpWidth,
                        vVisible = partial ? tViz || bViz : tViz && bViz,
                        hVisible = partial ? lViz || rViz : lViz && rViz,
                        vVisible = ( rec.top < 0 && rec.bottom > vpHeight ) ? true : vVisible,
                        hVisible = ( rec.left < 0 && rec.right > vpWidth ) ? true : hVisible;

                    if ( direction === 'both' )
                        return clientSize && vVisible && hVisible;
                    else if ( direction === 'vertical' )
                        return clientSize && vVisible;
                    else if ( direction === 'horizontal' )
                        return clientSize && hVisible;
                } else {

                    var viewTop       = isContained ? 0 : wPosition,
                        viewBottom    = viewTop + vpHeight,
                        viewLeft      = $c.scrollLeft(),
                        viewRight     = viewLeft + vpWidth,
                        position      = $t.position(),
                        _top          = position.top,
                        _bottom       = _top + $t.height(),
                        _left         = position.left,
                        _right        = _left + $t.width(),
                        compareTop    = partial === true ? _bottom : _top,
                        compareBottom = partial === true ? _top : _bottom,
                        compareLeft   = partial === true ? _right : _left,
                        compareRight  = partial === true ? _left : _right;

                    if ( direction === 'both' )
                        return !!clientSize && ( ( compareBottom <= viewBottom ) && ( compareTop >= viewTop ) ) && ( ( compareRight <= viewRight ) && ( compareLeft >= viewLeft ) );
                    else if ( direction === 'vertical' )
                        return !!clientSize && ( ( compareBottom <= viewBottom ) && ( compareTop >= viewTop ) );
                    else if ( direction === 'horizontal' )
                        return !!clientSize && ( ( compareRight <= viewRight ) && ( compareLeft >= viewLeft ) );
                }
            },
            kallesGetRandomInt = ( min, max ) => {
                return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
            },
            kallesIsValidDate  = ( d ) => {
                return d instanceof Date && !isNaN( d );
            };

        /*****************************************************************
         * Register jquery plugins
         * ***************************************************************/
        $.fn.kallesRefresh_flickity = function () {
            $( this ).flickity( JSON.parse( $( this ).attr( "data-flickity" ) || $( this ).attr( "data-flickityjs" ) || '{}' ) );
            return $( this );
        };

        $.fn.kallesFlickityResponsive = function ( bl ) {
            if ( typeof ( $.fn.flickity ) !== 'undefined' ) {
                let $this = $( this );
                if ( bl ) {
                    $this.find( '.swatch__list_js.lazyloaded' ).each( function () {
                        $this.flickity( 'resize' )
                    } );
                }
                $this.find( '.swatch__list_js' ).on( 'lazyincluded', function ( e ) {
                    $this.flickity( 'resize' )
                } );
            }
        }

        $.fn.hTransparent = function () {
            let h_banner = $( this ),
                h_ver    = h_banner.find( '.h__banner' ).attr( 'data-ver' ),
                txt_ver  = 'h_banner_' + h_ver;
            if ( Cookies.get( txt_ver ) === 'closed' ) return;
            body.removeClass( 'h_calc_ready' );
            h_banner.css( "height", "" );
            let mt = h_banner.outerHeight();
            body.addClass( 'h_calc_ready' );
            h_banner.css( { height : 0 } );

            setTimeout( function () {
                h_banner.css( { height : mt } );
            }, 8 );

            setTimeout( function () {
                h_banner.css( { height : 'auto' } );
            }, 800 );
            h_banner.on( 'click', '.h_banner_close', function ( e ) {
                e.preventDefault();
                let mt = h_banner.outerHeight();
                h_banner.css( { height : mt } );
                setTimeout( function () {
                    h_banner.css( { height : 0 } );
                }, 8 );
                let date = parseInt( h_banner.find( '.h__banner' ).attr( 'data-date' ), 10 );
                if ( date ) {
                    Cookies.set( txt_ver, 'closed', { expires : date, path : '/' } )
                }
            } );
        };

        $.fn.bannerCountdown = function () {
            $( this ).each( function () {
                $( this ).countdown( $( this ).data( 'date' ), function ( event ) {
                    $( this ).html( event.strftime( '%D days %H:%M:%S' ) );
                } );
            } );
        };

        $.fn.openMenu = function ( $id ) {
            $( this ).addClass( 'act_current' );
            html.addClass( 'hside_opened' );
            body.addClass( 'pside_opened' );
            $id.addClass( 'act_opened' );
            mask.addClass( 'mask_opened' );
        }

        $.fn.closeMenu = function () {
            $( '.push_side.act_current' ).removeClass( 'act_current' );
            html.removeClass( 'hside_opened' );
            body.removeClass( 'pside_opened' );
            $( '.nt_fk_canvas.act_opened,.nt_fk_full.act_opened' ).removeClass( 'act_opened' );
            mask.removeClass( 'mask_opened' );
        }

        $.fn.kallesFlashSold = function () {
            if ( $( this ).length ) {
                $( this ).each( function () {
                    const $this = $( this ),
                          mins  = $this.data( 'mins' ) || 5,
                          maxs  = $this.data( 'maxs' ) || 25,
                          mint  = $this.data( 'mint' ) || 3,
                          maxt  = $this.data( 'maxt' ) || 24;

                    $this.find( ".nt_pr_sold" ).html( kallesGetRandomInt( mins, maxs ) );
                    $this.find( ".nt_pr_hrs" ).html( kallesGetRandomInt( mint, maxt ) );
                    $this.show();
                } )
            }
        };

        $.fn.kallesAnimation = function () {
            $( this ).each( function () {
                let $this     = $( this ),
                    animation = $this.data( 'ani' ),
                    time      = $this.data( 'time' ) || '5000';
                if ( animation && animation !== 'none' ) {
                    animation                   = `animated ${ animation }`
                    const animationIntervalTime = parseInt( time, 10 ),
                          animTime              = 1000;
                    setInterval( () => {
                        $this.addClass( animation );
                        setTimeout( () => $this.removeClass( animation ), animTime );
                    }, animationIntervalTime );
                }

            } );
        }

        $.fn.initCountdown_pr = function () {
            $( this ).each( function () {
                let $id          = $( this ),
                    text_id      = $id.attr( 'id' ) || 'nt_countdow_ppr',
                    $txt         = $( text_id + "_txt" ),
                    d            = new Date(),
                    dta_time     = $id.data( 'time' ),
                    time_js      = '',
                    arr          = dta_time.split( ',' ),
                    local_date   = d.getFullYear() + '/' + ( "0" + ( d.getMonth() + 1 ) ).slice( -2 ) + '/' + ( "0" + d.getDate() ).slice( -2 ),
                    local_date_2 = d.getFullYear() + ( "0" + ( d.getMonth() + 1 ) ).slice( -2 ) + ( "0" + d.getDate() ).slice( -2 ),
                    local_time   = ( "0" + d.getHours() ).slice( -2 ) + ( "0" + d.getMinutes() ).slice( -2 ) + ( "0" + d.getSeconds() ).slice( -2 ),
                    timezone     = $id.data( 'timezone' ),
                    loop         = $id.data( 'loop' ),
                    last         = arr.length;

                if ( $id.hasClass( 'nt_loop' ) ) {
                    let shoph = ( timezone ) ? $id.data( 'shoph' ) : local_time,
                        shopt = ( timezone ) ? $id.data( 'shopt' ) : local_date,
                        zone  = ( timezone ) ? $id.data( 'zone' ) : '',
                        ck    = false,
                        i, l  = arr.length;

                    for ( i = 0; i < l; i++ ) {
                        if ( parseInt( arr[ i ].replace( /:/g, "" ), 10 ) >= parseInt( shoph, 10 ) ) {
                            /*fix 24:00:00 error ios,safari*/
                            time_js = arr[ i ].replace( "24:00:00", "23:59:59" );
                            break;
                        } else if ( i === last - 1 ) {
                            ck      = true;
                            time_js = arr[ i ].replace( "24:00:00", "23:59:59" );
                        }
                    }

                    local_date = shopt + ' ' + time_js + ' ' + zone;
                    if ( !kallesIsValidDate( new Date( local_date ) ) ) {
                        zone       = kallesInitTimzone( zone );
                        local_date = shopt + ' ' + time_js + ' ' + zone;
                    }
                    if ( loop && ck ) {
                        const plus_date = getToday( 1, 11, shopt + ' ' + zone );
                        local_date      = plus_date + ' ' + time_js + ' ' + zone;
                    }


                } else {
                    let dt      = '',
                        shopt   = ( timezone ) ? $id.data( 'shopt' ) : local_date_2 + local_time,
                        getTime = $id.data( 'timej' ) + '',
                        timej   = getTime.split( ',' ),
                        i, l    = arr.length;

                    for ( i = 0; i < l; i++ ) {
                        if ( parseInt( timej[ i ], 10 ) > parseInt( shopt.toString().slice( 0, timej[ i ].length ), 10 ) ) {
                            /*fix 24:00:00 error ios,safari*/
                            dt = arr[ i ].replace( "24:00:00", "23:59:59" );
                            if ( timezone ) {
                                /*convert shop time to user time*/
                                dt = dt + ' ' + $id.data( 'zone' )
                            }
                            break;
                        }
                    }

                    local_date = dt;

                    if ( !kallesIsValidDate( new Date( local_date ) ) ) {
                        const zone = kallesInitTimzone( zone );
                        local_date = shopt + ' ' + time_js + ' ' + zone;
                    }
                }

                /*install coundown*/
                dta_time      = new Date( local_date );
                const txt_day = $txt.find( '.day' ).text(),
                      txt_hr  = $txt.find( '.hr' ).text(),
                      txt_min = $txt.find( '.min' ).text(),
                      txt_sec = $txt.find( '.sec' ).text();
                $id.countdown( dta_time, { elapse : true } ).on( 'update.countdown', function ( event ) {
                    if ( event.elapsed ) {
                        $id.html( '' );
                        $txt.hide();
                    } else {
                        $txt.find( '.mess_cd' ).show();
                        $id.html( event.strftime( '<div class="block tc"><span class="flip-top">%-D</span><br><span class="label tu">' + txt_day + '</span></div><div class="block tc"><span class="flip-top">%H</span><br><span class="label tu">' + txt_hr + '</span></div><div class="block tc"><span class="flip-top">%M</span><br><span class="label tu">' + txt_min + '</span></div><div class="block tc"><span class="flip-top">%S</span><br><span class="label tu">' + txt_sec + '</span></div>' )
                        );
                    }
                } );
            } );
        }

        $.fn.initCountdown = function () {
            $( this ).each( function () {
                const _this = $( this );
                _this.countdown( _this.data( 'date' ), { elapse : true } ).on( 'update.countdown', function ( event ) {
                    if ( event.elapsed ) {
                        _this.closest( '.pr_deal_dt' ).html( '' ).addClass( 'expired_cdt4' );
                    } else {
                        _this.html( event.strftime( '%D Days %H:%M:%S' ) );
                    }
                } ).addClass( 'done_cd' ).closest( '.pr_deal_dt' ).addClass( 'donetmcd' );
            } );
        };

        $.fn.initSeCountdown = function () {
            $( this ).each( function () {
                const $this = $( this );
                $this.countdown( $this.data( 'date' ), function ( event ) {
                    const template = [];
                    template.push( '<span class="countdown-days">%-D <span>days</span></span>' );
                    template.push( '<span class="countdown-hours">%H <span>hr</span></span>' );
                    template.push( '<span class="countdown-min">%M <span>min</span></span>' );
                    template.push( '<span class="countdown-sec">%S <span>sc</span></span>' );
                    $this.html( event.strftime( template.join( ' ' ) ) );
                } ).addClass( 'done_cd' ).closest( '.sepr_deal_dt' ).addClass( 'donetmcd' );
            } );
        };

        $.fn.catTabs = function () {
            $( this ).click( function ( ev ) {
                ev.preventDefault();
                const _this          = $( this ),
                      bid            = _this.data( 'bid' ),
                      _se            = _this.closest( '.kalles-section' ),
                      _tabActive     = _se.find( '.tab_se_header .tt_active' ),
                      _contentActive = _se.find( '.tab_se_content .ct_active' ),
                      _curentContent = $( '#' + bid ),
                      el             = _curentContent.find( '.js_carousel' );

                _tabActive.removeClass( 'tt_active' );
                _this.addClass( 'tt_active' );

                _contentActive.removeClass( 'ct_active' );
                _curentContent.addClass( 'ct_active' );

                if ( el.length === 0 ) return;
                el.flickity( 'resize' );
            } );
        };

        $.fn.linkTrigger = function () {
            $( this ).click( function ( e ) {
                e.preventDefault();
                $( $( this ).data( 'trigger' ) ).trigger( 'click' );
            } );
        }

        $.fn.linkAcc = function () {
            $( this ).on( "click", ".link_acc", function ( e ) {
                e.preventDefault();
                $( '#nt_login_canvas .is_selected' ).removeClass( 'is_selected' );
                $( $( this ).data( 'id' ) ).addClass( 'is_selected' );
            } );
        }

        $.fn.kallesInitMegaMenu = function () {
            if ( $( window ).width() > 767 ) {
                $( this ).each( function () {
                    let li             = $( this ),
                        $window        = $( window ),
                        h7Check        = body.hasClass( 'des_header_7' ),
                        Menuoffsets    = $( '#nt_menu_id' ).find( ' > li.menu_has_offsets' ),
                        screenWidth    = $window.width(),
                        global_wrapper = $( '#nt_wrapper' ),
                        bodyRight      = global_wrapper.outerWidth() + global_wrapper.offset().left,
                        viewportWidth  = ( body.hasClass( 'wrapper-boxed' ) || body.hasClass( 'wrapper-boxed-small' ) ) ? bodyRight : screenWidth;

                    let nav_dropdown = li.find( ' > .sub-menu' );
                    nav_dropdown.addClass( 'calc_pos' ).attr( 'style', '' );
                    if ( h7Check ) {
                        let bottom         = nav_dropdown.offset().top + nav_dropdown.outerHeight(),
                            viewportBottom = $window.scrollTop() + $window.outerHeight();
                        if ( bottom > viewportBottom ) {
                            nav_dropdown.css( { top : viewportBottom - bottom - 10 } );
                        }
                    }
                    if ( h7Check ) return;

                    let nav_dropdownWidth  = nav_dropdown.outerWidth(),
                        nav_dropdownOffset = nav_dropdown.offset(),
                        extraSpace         = ( li.hasClass( 'menu_wid_full' ) ) ? 0 : 10;

                    if ( !nav_dropdownWidth || !nav_dropdownOffset ) return;
                    let dropdownOffsetRight = screenWidth - nav_dropdownOffset.left - nav_dropdownWidth;

                    if ( nav_dropdownWidth >= 0 && li.hasClass( 'menu_center' ) ) {
                        let toLeft = ( nav_dropdownOffset.left + ( nav_dropdownWidth / 2 ) ) - screenWidth / 2;
                        if ( rtl_mode ) {
                            nav_dropdown.css( { right : toLeft } );
                        } else {
                            nav_dropdown.css( { left : -toLeft } );
                        }

                    } else if ( rtl_mode && ( dropdownOffsetRight + nav_dropdownWidth >= viewportWidth || li.hasClass( 'menu_wid_full' ) ) && li.hasClass( 'menu_has_offsets' ) ) {
                        var toLeft = dropdownOffsetRight + nav_dropdownWidth - viewportWidth;
                        nav_dropdown.css( { right : -toLeft - extraSpace } );
                    } else if ( ( nav_dropdownOffset.left + nav_dropdownWidth >= viewportWidth || li.hasClass( 'menu_wid_full' ) ) && li.hasClass( 'menu_has_offsets' ) ) {
                        var toRight = nav_dropdownOffset.left + nav_dropdownWidth - viewportWidth;
                        nav_dropdown.css( { left : -toRight - extraSpace } );
                    }
                } );
            }
        };

        $.fn.kallesLazyMenu = function () {
            if ( $( this ).length ) {
                $( this ).each( function () {
                    $( this ).closest( 'li.menu_has_offsets' ).kallesInitMegaMenu();
                } );
            }
        }

        $.fn.kallesMobileNav = function () {
            let clickToActive = function ( _parent ) {
                if ( _parent.hasClass( "nt_opended" ) ) {
                    _parent.removeClass( "nt_opended" ).children( "ul" ).slideUp( 200 );
                } else {
                    _parent.addClass( "nt_opended" ).children( "ul" ).slideDown( 200 );
                }
            };
            $( this ).on( 'click', '.menu-item-has-children.only_icon_false>a', function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                clickToActive( $( this ).parent() );
            } );
            $( this ).on( 'click', '.menu-item-has-children .nav_link_icon', function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                clickToActive( $( this ).parent().parent() );
            } );
            $( this ).on( 'click', '.mb_nav_tabs>div', function () {
                if ( $( this ).hasClass( 'active' ) ) return;
                let _this = $( this ), menuID = _this.data( 'id' );
                _this.parent().find( '.active' ).removeClass( 'active' );
                _this.addClass( 'active' );
                $( '.mb_nav_tab' ).removeClass( 'active' );
                $( menuID ).addClass( 'active' );
            } );
        }

        $.fn.kallesBackToTop = function () {
            let debounce_timer = null,
                _this          = $( this );
            $( window ).scroll( function () {
                if ( debounce_timer ) {
                    window.clearTimeout( debounce_timer );
                }
                debounce_timer = window.setTimeout( function () {
                    if ( $( this ).scrollTop() > 100 ) {
                        _this.addClass( 'bkt_show' );
                    } else {
                        _this.removeClass( 'bkt_show' );
                    }
                }, 40 );
            } );

            /*Click event to scroll to top*/
            _this.on( 'click', function () {
                $( 'html, body' ).animate( {
                    scrollTop : 0
                }, 800 );
                return false;
            } );
        }

        $.fn.initStickyMenu = function () {
            if ( body.hasClass( 'header_sticky_false' ) || ( body.hasClass( 'des_header_7' ) && window_w > 1400 ) ) return;
            let $header           = $( '#ntheader' ),
                timeout           = 0,
                check             = false,
                ck_sticky         = true,
                prevScrollpos     = window.pageYOffset,
                isHideOnScroll    = body.hasClass( 'hide_scrolld_true' ),
                headerHeight      = $header.outerHeight(),
                offset            = headerHeight,
                txt_header_banner = '#kalles-section-header_banner';

            init();

            $window.on( 'resize', function () {
                init();
            } );

            $window.on( 'scroll', function () {
                if ( ck_sticky ) return;
                var currentScroll = $( window ).scrollTop();
                if ( currentScroll > offset ) {
                    stickAddclass();
                } else {
                    stickRemoveClass();
                }

                if ( isHideOnScroll ) {
                    var currentScrollPos = window.pageYOffset;
                    if ( prevScrollpos > currentScrollPos && currentScroll > offset ) {
                        $header.addClass( 'h_scroll_up' ).removeClass( 'h_scroll_down' );
                    } else if ( currentScroll <= offset ) {
                        $header.removeClass( 'h_scroll_down h_scroll_up' );
                    } else {
                        $header.addClass( 'h_scroll_down' ).removeClass( 'h_scroll_up' );
                    }
                    prevScrollpos = currentScrollPos;
                }

            } );

            function init () {
                ck_sticky = true;
                $header.removeClass( 'sticky_prepared' ).css( "height", "" );
                if ( headerHeight < $header.outerHeight() ) {
                    headerHeight = $header.outerHeight();
                }
                if ( body.hasClass( 'des_header_7' ) && $( window ).width() > 1024 ) return;
                ck_sticky = false;
                $header.addClass( 'sticky_prepared' ).css( { height : headerHeight } );

                if ( $( txt_header_banner ).length > 0 ) {
                    offset += $( txt_header_banner ).outerHeight();
                }
            }

            function stickAddclass () {
                if ( check ) return
                check = true;
                $header.addClass( 'live_stuck' );
                $header.on( 'animationend webkitAnimationEnd oAnimationEnd', function () {
                    $header.addClass( 'ani_none' );
                } );
            }

            function stickRemoveClass () {
                if ( !check ) return
                check = false;
                $header.addClass( 'trs_stuck' ).removeClass( 'live_stuck h_scroll_down' );
                $header.removeClass( 'ani_none trs_stuck' );
            }
        };

        $.fn.swatchesOnBGGrid = function () {
            const $this    = $( this );
            let imageBg    = $this.data( 'bgset' ),
                paddingImg = $this.data( 'pd' ),
                id         = $this.data( 'id' ),
                vid        = $this.data( 'vid' ),
                product    = $this.parents( '.nt_pr' ),
                image      = product.find( '.main-img' ),
                href       = product.find( '.product-title>a' ).attr( 'href' );
            $this.parents( '.swatch__list_js' ).find( '.current-swatch' ).removeClass( 'current-swatch' );
            $this.addClass( 'current-swatch' );

            product.addClass( 'nt-swatched' );
            if ( $this.hasClass( 'loaded_swatch' ) ) {
                image.addClass( 'hide_ic_lz' );
            } else {
                image.removeClass( 'hide_ic_lz' );
            }

            $this.addClass( 'loaded_swatch' );
            image.attr( 'data-bgset', imageBg ).attr( 'data-id', id );
            product.find( 'a' ).attr( 'href', href.split( '?variant=' )[ 0 ] + '?variant=' + vid );
            product.find( '.nt_add_qv' ).attr( 'data-id', vid );
        }

        $.fn.initHTMLVideo = function () {
            if ( $( this ).length > 0 && Modernizr && Modernizr.video ) {
                $( this ).each( function () {
                    let $this  = $( this ),
                        $image = $this.parent().find( '.img_vid_js' );
                    $this.addClass( 'lazyload' );
                    $this.on( 'lazyloaded', function () {
                        $this[ 0 ].play();
                        $this.addClass( 'vid_ready' );
                        $image.addClass( 'lazyload' );
                    } );
                    $this.on( 'playing', function () {
                        $image.remove();
                    } );
                } );
            }
        };

        $.fn.parallax = function () {
            if ( $( this ).length > 0 ) {
                refresh_parallax();
                $( '.nt_parallax_true:not(.lazyloaded)' ).one( 'lazyloaded', function ( e ) {
                    setTimeout( function () {
                        refresh_parallax();
                    }, 200 );
                } );

                function refresh_parallax ( el ) {
                    var elm = el || $( '.nt_parallax_true.lazyloaded:not(.js_ralax_doned)' );
                    elm.addClass( 'js_ralax_doned' ).jarallax( {
                        speed : elm.attr( 'data-speed' ) || 0.8
                    } );
                }
            }
        };

        $.fn.newsletterPopup = function () {
            if ( $( this ).length ) {
                $( this ).each( function () {
                    var popup = $( this ),
                        stt   = popup.data( 'stt' ),
                        shown = false,
                        pages = Cookies.get( 'kalles_shown_pages' );

                    var showPopup = function () {
                        $.magnificPopup.open( {
                            items        : { src : '#kalles-section-newsletter_pp .popup_new_wrap' },
                            type         : 'inline',
                            removalDelay : 500, //delay removal by X to allow out-animation
                            tClose       : "Close (Esc)",
                            callbacks    : {
                                beforeOpen : function () {
                                    this.st.mainClass = 'mfp-move-horizontal new_pp_wrapper';
                                },
                                open       : function () {
                                    // Will fire when this exact popup is opened
                                    // this - is Magnific Popup object
                                },
                                close      : function () {
                                    Cookies.set( 'kalles_popup', 'shown', { expires : stt.day_next, path : '/' } );
                                }
                            }
                        } );
                    };

                    var showPopup2 = function () {
                        if ( $.magnificPopup.instance.isOpen ) {
                            $.magnificPopup.close();
                            setTimeout( function () {
                                showPopup();
                            }, $.magnificPopup.instance.st.removalDelay + 10 );
                        } else {
                            showPopup();
                        }
                    };

                    $( '.kalles_open_newsletter' ).on( 'click', function ( e ) {
                        e.preventDefault();
                        showPopup2();
                    } );

                    popup.on( 'open_newsletter', function () {
                        showPopup2();
                    } );

                    if ( !pages ) pages = 0;
                    if ( pages < stt.number_pages ) {
                        pages++;
                        Cookies.set( 'kalles_shown_pages', pages, { expires : stt.day_next, path : '/' } );
                        return false;
                    }

                    if ( Cookies.get( 'kalles_popup' ) !== 'shown' ) {
                        if ( stt.after === 'scroll' ) {
                            $( window ).scroll( function () {
                                if ( shown ) return false;
                                if ( $( document ).scrollTop() >= stt.scroll_delay ) {
                                    showPopup2();
                                    shown = true;
                                }
                            } );
                        } else {
                            setTimeout( function () {
                                showPopup2();
                            }, stt.time_delay );
                        }
                    }
                } );
            }
        };

        $.fn.kallesSwatches = function () {
            if ( $( this ).length ) {
                body.on( 'click', '.swatch_pr_item:not(.is-selected)', function ( evt ) {
                    evt.preventDefault();
                    let $this = $( this );
                    $this.addClass( 'is-selected' ).siblings().removeClass( 'is-selected' );
                    if ( $this.data( 'escape' ) ) {
                        $this.closest( '.kalles_swatch_js' ).find( '.user_choose_js,.nt_name_current' ).text( $this.data( 'escape' ) );
                    }
                    if ( $this.data( 'index' ) ) {
                        const $main_slide = $this.closest( '.kalles-section' ).find( '.col_thumb .pr_carousel' ).first();
                        if ( $main_slide ) {
                            $main_slide.flickity().flickity( 'select', $this.data( 'index' ) );
                        }
                    }
                    if ( $this.data( 'filter' ) ) {
                        let $p_thumb  = $this.closest( '.container_cat' ).find( '.p-thumb' ),
                            $p_nav    = $this.closest( '.container_cat' ).find( '.p-nav' ),
                            options   = $this.data( 'filter' ),
                            thumb_nav = [];

                        if ( $p_thumb.length && Array.isArray( options ) ) {

                            let slideSettings    = $p_thumb.data( 'flickity' ) || {},
                                slideSettingsNav = {};

                            options.forEach( p => {
                                thumb_nav.push( `<div class="${ p.class }" data-mdid="${ p.mdid }" data-height="${ p.height }" data-width="${ p.width }" data-ratio="${ p.ratio }" data-mdtype="${ p.mdtype }" data-src="${ p.src }" data-bgset="${ p.bgset }" data-cap="${ p.cap }"></div>` )
                            } );

                            $p_thumb.flickity( 'destroy' ).empty().append( thumb_nav.join( '' ) ).kallesRefresh_flickity();

                            if ( $p_nav.length ) {
                                $p_nav.flickity( 'destroy' ).empty();
                            }

                            setTimeout( () => $( '.kalles_product_thumnb_slide' ).kallesSingleProductThumbnail(), 100 );

                            /* Single product isotope*/
                            $( '.p-thumb.only_owl_mb' ).kallesProductIsotope( !is_smaller_768 );

                            /* Single product thumbnail video*/
                            $( '[data-featured-product-se]' ).kallesInitFeaturedProduct();

                            /* Single product sticky detail*/
                            $( '.pr_sticky_content' ).kallesStickySingleProductDetail( !is_smaller_768 && body.hasClass( 'single-product-template' ) );

                            /*Single thumbnail magnifier*/
                            $( '.sp-single' ).kallesButtonShowGallery();
                        }
                    }
                } )
            }
        }

        $.fn.KallesAgeVerify = function () {
            if ( $( this ).length && Cookies.get( 'kalles_age_verify' ) !== 'confirmed' ) {
                let showPopup = function () {
                    $.magnificPopup.open( {
                        items           : {
                            src : '#kalles-section-age_verify .popup_age_wrap'
                        },
                        type            : 'inline',
                        closeOnBgClick  : false,
                        closeBtnInside  : false,
                        showCloseBtn    : false,
                        enableEscapeKey : false,
                        removalDelay    : 500,
                        tClose          : 'Close (Esc)',
                        callbacks       : {
                            beforeOpen : function () {
                                this.st.mainClass = 'mfp-move-horizontal age_pp_wrapper';
                            },
                        }
                    } );
                };

                showPopup();

                $( this ).on( 'open_age_pp', function () {
                    showPopup();
                } )

                body.on( 'click', '.age_verify_allowed', function ( e ) {
                    e.preventDefault();

                    let popup         = $( this ).closest( '.popup_age_wrap' ),
                        stt           = popup && popup.data( 'stt' ) ? popup.data( 'stt' ) : { day_next : 30, date_of_birth : true, age_limit : 18 },
                        age_limit     = stt && stt.age_limit ? stt.age_limit : 18,
                        date_of_birth = stt && stt.date_of_birth ? stt.date_of_birth : true,
                        day_next      = stt && stt.day_next ? stt.day_next : 30;

                    if ( date_of_birth ) {
                        let year      = parseInt( $( '#ageyear' ).val(), 10 ),
                            month     = parseInt( $( '#agemonth' ).val(), 10 ),
                            day       = parseInt( $( '#ageday' ).val(), 10 ),
                            theirDate = new Date( ( year + age_limit ), month, day ),
                            today     = new Date;

                        if ( ( today.getTime() - theirDate.getTime() ) < 0 ) {
                            popup.addClass( 'animated shake' );
                            window.setTimeout( function () {
                                popup.removeClass( 'animated shake' );
                            }, 1000 );
                        } else {
                            Cookies.set( 'kalles_age_verify', 'confirmed', { expires : parseInt( day_next, 10 ), path : '/' } );
                            $.magnificPopup.close();
                        }
                    } else {
                        Cookies.set( 'kalles_age_verify', 'confirmed', { expires : parseInt( day_next, 10 ), path : '/' } );
                        $.magnificPopup.close();
                    }
                } );

                body.on( 'click', '.age_verify_forbidden', function ( e ) {
                    e.preventDefault();
                    $( this ).closest( '.popup_age_wrap' ).addClass( 'active_forbidden' );
                } );
            }
        };

        $.fn.cookiesLawAnnouncements = function () {
            if ( !$( this ).length || Cookies.get( 'kalles_cookies' ) === 'accepted' ) {

            } else {
                $( this ).each( function () {
                    var popup        = $( this ),
                        popup_parent = popup.parent(),
                        stt          = popup.data( 'stt' ),
                        showPopup    = function () {
                            popup_parent.removeClass( 'pp_onhide' ).addClass( 'pp_onshow' );
                            popup.on( 'click', '.pp_cookies_accept_btn', function ( e ) {
                                e.preventDefault();
                                popup_parent.removeClass( 'pp_onshow' ).addClass( 'pp_onhide' );
                                Cookies.set( 'kalles_cookies', 'accepted', { expires : stt.day_next, path : '/' } );
                            } );
                        };

                    setTimeout( function () {
                        showPopup();
                    }, 2500 );

                    popup.on( 'open_cookies_pp', function () {
                        showPopup();
                    } )
                } );
            }
        };

        $.fn.kallesDisableNavSlider = function () {
            if ( $( this ).length ) {
                $( this ).each( function () {
                    const attrs = $( this ).data( 'flickity' );
                    if ( attrs ) {
                        const selectedCells = attrs.selectedCells ? attrs.selectedCells.length : null;
                        const cells         = attrs.cells ? attrs.cells.length : null;
                        if ( selectedCells && cells && selectedCells === cells ) {
                            $( this ).addClass( 'flickity_prev_disable flickity_next_disable' );
                        } else {
                            $( this ).removeClass( 'flickity_prev_disable flickity_next_disable' );
                        }
                    }
                } );
            }
        }

        $.fn.kallesSingleProductThumbnail = function () {
            if ( $( this ).length ) {

                let $p_btns = $( '.p_group_btns' )

                function initThumbnailsMarkup ( $galleries, $navContainer, navClass ) {
                    let markup  = [],
                        e_imgnv = $( '.p-nav.ratio_imgtrue' ).length > 0;

                    $galleries.find( '.p-item:not(.is_varhide)' ).each( function () {
                        let $this  = $( this ),
                            bgset  = $this.data( 'bgset' ),
                            mdtype = $this.data( 'mdtype' ),
                            mdid   = $this.data( 'mdid' ),
                            ratio  = $this.data( 'ratio' ),
                            style  = '',
                            icon   = 'hide';

                        if ( mdtype === 'video' ) {
                            icon = 'las la-play';
                        } else if ( mdtype === 'external_video' ) {
                            icon = 'lab la-youtube';
                        } else if ( mdtype === 'model' ) {
                            icon = 'las la-cube';
                        }

                        if ( e_imgnv ) {
                            style = ' style="padding-top:' + 1 / ratio * 100 + '%"';
                        }

                        markup.push( '<div class="' + navClass + 'col-3 n-item" data-mdid="' + mdid + '" data-mdtype="' + mdtype + '"><span class="nt_bg_lz lazyload" data-bgset="' + bgset + '"' + style + '><i class="' + icon + '"></i></span></div>' );
                    } );

                    $navContainer.empty().append( markup.join( '' ) );
                    $navContainer.kallesRefresh_flickity();
                    $navContainer.addClass( 'p-nav-ready' );
                }

                $( this ).each( function () {
                    let $el                   = $( this ).find( '.p-nav' ),
                        $mainGallery          = $( this ).find( '.p-thumb' ),
                        navClass              = ( $( '.thumb_left' ).length > 0 || $( '.thumb_right' ).length > 0 ) ? 'col-lg-12 ' : '',
                        $col_nav              = $( '.col_nav' ),
                        timer                 = 400,
                        includedModelOrVideos = $mainGallery.find( '[data-pr-md-tp-model]' ).length > 0 || $mainGallery.find( '[data-pr-md-tp-video]' ).length > 0;

                    $mainGallery.each( function ( index ) {
                        initThumbnailsMarkup( $( this ), $el.length === 1 ? $el : $el.eq( index ), navClass );
                    } );

                    if ( includedModelOrVideos ) {
                        $mainGallery.on( 'select.flickity', function ( event, index ) {
                            let $selectedSlide = $mainGallery.find( '.is-selected' ),
                                mediaType      = $selectedSlide.data( 'mdtype' );

                            $( '.p-thumb [data-pr-md-tp-video] , .p-thumb [data-pr-md-tp-model]' ).trigger( 'mediaHidden' );

                            $p_btns.removeClass( 'nt_hide nt_hide_2' );

                            if ( [ 'video', 'external_video', 'model' ].includes( mediaType ) ) {
                                if ( mediaType === 'model' ) {
                                    $p_btns.addClass( 'nt_hide_2' );
                                    $selectedSlide.find( '[data-pr-md-tp-model]' ).trigger( 'mediaVisible' );
                                } else {
                                    $p_btns.addClass( 'nt_hide' );
                                    $selectedSlide.find( '[data-pr-md-tp-video]' ).trigger( 'mediaVisible' );
                                }
                            }
                        } );
                    }

                    $col_nav.find( '.btn_pnav_next, .btn_pnav_prev' ).off( 'click' ).on( 'click', function ( e ) {
                        let $this            = $( this ),
                            slider_height    = $el.find( '.flickity-slider' ).height(),
                            navHeight        = $el.height(),
                            navCellHeight    = slider_height / $el.find( '.n-item' ).length,
                            currentScrollTop = $el.scrollTop();
                        if ( ( $this.hasClass( 'btn_pnav_prev' ) && currentScrollTop <= 0 ) || ( $this.hasClass( 'btn_pnav_next' ) && currentScrollTop >= slider_height - navHeight ) ) return;
                        let scrollY = ( $this.hasClass( 'btn_pnav_next' ) ) ? currentScrollTop + navCellHeight + 40 : currentScrollTop - navCellHeight - 40;
                        $el.stop().animate( {
                            scrollTop : scrollY
                        }, timer );
                    } );

                } );

            }
        };

        $.fn.kallesInitFeaturedProduct = function () {

            let $objects = $( this ).find( '[data-pr-md-tp-video],[data-pr-md-tp-model]' );

            if ( $objects.length ) {

                const hostFromVideoElement = function ( video ) {
                    let tagName  = video.tagName ? video.tagName.toLocaleLowerCase() : '',
                        hostName = tagName === 'video' ? 'html5' : null;

                    if ( tagName === 'iframe' && video.src && /^(https?:\/\/)?(www\.)?(youtube\.com|youtube-nocookie\.com|youtu\.?be)\/.+$/.test( video.src ) ) {
                        hostName = 'youtube';
                    }

                    return hostName;
                }

                const youtubeSdk = {
                    tagId  : 'youtube-sdk',
                    src    : 'https://www.youtube.com/iframe_api',
                    loaded : false
                };

                const loadYoutubeSdk = function () {
                    if ( youtubeSdk.loaded ) {
                        return Promise.resolve();
                    } else {
                        return new Promise( resolve => {
                            let tag            = document.createElement( 'script' ),
                                firstScriptTag = document.getElementsByTagName( 'script' )[ 0 ];

                            tag.src = youtubeSdk.src;
                            tag.id  = youtubeSdk.tagId;
                            tag.addEventListener( 'load', function () {
                                youtubeSdk.loaded = true;
                                resolve();
                            } );

                            firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );
                        } );
                    }
                }

                const updateDraggableFlickity = function ( flickity, value ) {
                    if ( flickity && flickity.options && flickity.options.draggable !== value ) {
                        flickity.options.draggable = value;
                        flickity.updateDraggable();
                    }
                };

                const createPlayer = function ( media ) {
                    let $carousel = media.container.closest( '.p-thumb' );
                    if ( media.host === 'html5' ) {
                        media.player = new Plyr( media.element, {
                            controls            : [ 'play', 'progress', 'mute', 'volume', 'play-large', 'fullscreen' ],
                            loop                : { active : media.enableLooping },
                            hideControlsOnPause : true,
                            clickToPlay         : true,
                            iconUrl             : 'assets/images/plyr.svg',
                            tooltips            : {
                                controls : false,
                                seek     : true
                            }
                        } );
                        if ( $carousel.length && $carousel.hasClass( 'is-draggable' ) ) {
                            media.player.on( 'play', function () {
                                /*Disable dragging*/
                                updateDraggableFlickity( $carousel.data( 'flickity' ), false );
                            } );
                            media.player.on( 'pause', function () {
                                /*Enables dragging*/
                                updateDraggableFlickity( $carousel.data( 'flickity' ), '>1' );
                            } );
                        }
                    } else if ( media.host === 'youtube' ) {
                        if ( window.hasOwnProperty( 'YT' ) && media.container.data( 'video-id' ) ) {
                            window.YT.ready( function () {
                                media.player = new YT.Player( media.element, {
                                    videoId : media.container.data( 'video-id' ),
                                    events  : {
                                        onStateChange : function ( event ) {
                                            if ( event.data === 0 && enableLooping ) {
                                                event.target.seekTo( 0 );
                                            }
                                        }
                                    }
                                } );
                            } );
                        }
                    } else if ( media.host === 'model' ) {
                        let $wrapModel    = $( "<div>", { class : "kalles-model-viewer-ui kalles-model-viewer-ui--desktop" } ),
                            buttonControl = [];
                        buttonControl.push( '<div class="kalles-model-viewer-ui__controls-overlay">' );
                        buttonControl.push( '<button class="kalles-model-viewer-ui__button kalles-model-viewer-ui__button--poster" aria-label="Play 3D Viewer"> <svg class="kalles-model-viewer-ui__poster-control-icon" viewBox="0 0 60 60"> <path fill="none" d="M0 0h60v60H0z"></path> <path fill="currentColor" d="M40.4 22.57l-8.8-5.14a3.19 3.19 0 00-3.21 0l-8.8 5.14A3.24 3.24 0 0018 25.36v10.28a3.23 3.23 0 001.6 2.79l8.8 5.14a3.2 3.2 0 003.21 0l8.8-5.14A3.23 3.23 0 0042 35.64V25.36a3.24 3.24 0 00-1.6-2.79zM20.6 36.7a1.23 1.23 0 01-.6-1.06V25.36a1.23 1.23 0 01.6-1.06l8.8-5.14a1.19 1.19 0 011.19 0l8.8 5.14a1.2 1.2 0 01.36.34l-9.51 4.89a2.23 2.23 0 00-1.25 2V41.6z"></path> </svg> </button>' )
                        buttonControl.push( '<div class="kalles-model-viewer-ui__controls-area">' )
                        buttonControl.push( '<button class="kalles-model-viewer-ui__button kalles-model-viewer-ui__button--control kalles-model-viewer-ui__button--zoom-in d-none" aria-label="Zoom In"> <svg focusable="false" class="kalles-model-viewer-ui__control-icon" viewBox="0 0 44 44"> <path stroke-opacity=".25" stroke-width="8" stroke="inherit" fill="currentColor" d="M23 15a1 1 0 10-2 0v6h-6a1 1 0 100 2h6v6a1 1 0 102 0v-6h6a1 1 0 100-2h-6v-6z" clip-rule="evenodd" fill-rule="evenodd"></path> </svg> </button>' )
                        buttonControl.push( '<button class="kalles-model-viewer-ui__button kalles-model-viewer-ui__button--control kalles-model-viewer-ui__button--zoom-out d-none" aria-label="Zoom Out"> <svg focusable="false" class="kalles-model-viewer-ui__control-icon" viewBox="0 0 44 44"> <path stroke-opacity=".25" stroke-width="8" stroke="inherit" fill="currentColor" d="M14 22a1 1 0 011-1h14a1 1 0 110 2H15a1 1 0 01-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path> </svg> </button>' )
                        buttonControl.push( '<button class="kalles-model-viewer-ui__button kalles-model-viewer-ui__button--control kalles-model-viewer-ui__button--fullscreen" aria-label="Enter Fullscreen"> <svg focusable="false" class="kalles-model-viewer-ui__control-icon kalles-model-viewer-ui__control-icon--enter-fullscreen" viewBox="0 0 44 44"> <path stroke-width="8" stroke-opacity=".25" stroke="inherit" d="M19 14h-4a1 1 0 00-1 1v4a1 1 0 102 0v-3h3a1 1 0 100-2zm0 14h-3v-3a1 1 0 10-2 0v4a1 1 0 001 1h4a1 1 0 100-2zm10-4a1 1 0 00-1 1v3h-3a1 1 0 100 2h4a1 1 0 001-1v-4a1 1 0 00-1-1zm0-10h-4a1 1 0 100 2h3v3a1 1 0 102 0v-4a1 1 0 00-1-1z" fill="currentColor"></path> </svg> <svg focusable="false" class="kalles-model-viewer-ui__control-icon kalles-model-viewer-ui__control-icon--exit-fullscreen" viewBox="0 0 44 44"> <g stroke-width="8" stroke-opacity=".25" stroke="inherit" fill="currentColor"> <path d="M25 20h4a1 1 0 100-2h-3v-3a1 1 0 10-2 0v4a1 1 0 001 1zM19 24h-4a1 1 0 100 2h3v3a1 1 0 102 0v-4a1 1 0 00-1-1zM29 24h-4a1 1 0 00-1 1v4a1 1 0 102 0v-3h3a1 1 0 100-2zM19 14a1 1 0 00-1 1v3h-3a1 1 0 100 2h4a1 1 0 001-1v-4a1 1 0 00-1-1z"></path> </g> </svg> </button>' )
                        buttonControl.push( '</div>' )
                        buttonControl.push( '</div>' );
                        $wrapModel.append( media.element ).append( buttonControl.join( '' ) );
                        media.container.html( '' ).append( $wrapModel );

                        media.element.addEventListener( 'load', function () {
                            media.container.find( '.kalles-model-viewer-ui__button--poster' ).addClass( 'd-none' );
                            media.container.find( '.kalles-model-viewer-ui__controls-area' ).addClass( 'kalles-model-viewer-ui__controls-area--playing' );
                            $( this ).find( '#userInput' ).css( 'outline', 'none !important' ).addClass( 'logagasd' );
                        } );

                        media.container.on( 'click', '.kalles-model-viewer-ui__button--poster', function ( ev ) {
                            ev.preventDefault();
                            media.element.setAttribute( 'src', media.element.getAttribute( 'data-src' ) )
                        } );

                        media.container.on( 'click', '.kalles-model-viewer-ui__button--fullscreen', function ( evt ) {
                            evt.preventDefault();
                            evt.stopPropagation();
                            if ( $( this ).attr( 'modelFullScreen' ) && $( this ).attr( 'modelFullScreen' ) !== 'off' ) {
                                $( this ).attr( 'modelFullScreen', 'off' );
                                if ( document.exitFullscreen ) {
                                    document.exitFullscreen();
                                } else if ( document.webkitExitFullscreen ) { /* Safari */
                                    document.webkitExitFullscreen();
                                } else if ( document.msExitFullscreen ) { /* IE11 */
                                    document.msExitFullscreen();
                                }
                            } else {
                                $( this ).attr( 'modelFullScreen', 'on' );
                                if ( $wrapModel[ 0 ].requestFullscreen ) {
                                    $wrapModel[ 0 ].requestFullscreen().then( () => setTimeout( () => $wrapModel.addClass( 'kalles-model-viewer-ui--fullscreen' ), 100 ) )
                                } else if ( $wrapModel[ 0 ].webkitRequestFullscreen ) { /* Safari */
                                    $wrapModel[ 0 ].webkitRequestFullscreen().then( () => setTimeout( () => $wrapModel.addClass( 'kalles-model-viewer-ui--fullscreen' ), 100 ) )
                                } else if ( $wrapModel[ 0 ].msRequestFullscreen ) { /* IE11 */
                                    $wrapModel[ 0 ].msRequestFullscreen().then( () => setTimeout( () => $wrapModel.addClass( 'kalles-model-viewer-ui--fullscreen' ), 100 ) )
                                }
                            }
                        } );

                        $( document ).on( 'webkitfullscreenchange mozfullscreenchange fullscreenchange', function ( e ) {
                            $wrapModel.removeClass( 'kalles-model-viewer-ui--fullscreen' );
                        } );
                    }

                    media.container.on( 'mediaHidden xrLaunch', function () {
                        if ( media.host === 'html5' && media.player ) {
                            media.player.pause();
                        } else if ( media.host === 'model' ) {
                            const _data = JSON.parse( $carousel.attr( 'data-flickity' ) );
                            if ( _data.hasOwnProperty( 'draggable' ) && _data[ 'draggable' ] === '>1' ) {
                                /*Enable dragging*/
                                updateDraggableFlickity( $carousel.data( 'flickity' ), '>1' );
                            }
                        } else if ( media.host === 'youtube' && media.player && media.player.pauseVideo ) {
                            media.player.pauseVideo();
                        }
                    } );

                    media.container.on( 'mediaVisible', function () {
                        /*As per guidelines, we only need to autoplay when it's not a touch device, and on desktop only if it's not the initial loading*/
                        if ( !touchevents ) {
                            if ( media.host === 'html5' && media.player ) {
                                media.player.play();
                            } else if ( media.host === 'model' ) {
                                /*Disable dragging*/
                                updateDraggableFlickity( $carousel.data( 'flickity' ), false );
                                if ( !media.element.getAttribute( 'src' ) ) {
                                    setTimeout( () => {
                                        media.element.setAttribute( 'src', media.element.getAttribute( 'data-src' ) )
                                    }, 100 );
                                }
                            } else if ( media.host === 'youtube' && media.player ) {
                                media.player.playVideo();
                            }
                        }
                    } );
                };

                $objects.each( function () {
                    let $this         = $( this ),
                        $element      = $this.find( 'iframe, video , model-viewer' )[ 0 ],
                        isVideoObject = $this[ 0 ].hasAttribute( 'data-pr-md-tp-video' ),
                        media         = {
                            enableLooping : $this.data( 'looping' ),
                            element       : $element,
                            sectionId     : $this.data( 'id' ),
                            container     : $this,
                            host          : isVideoObject ? hostFromVideoElement( $element ) : 'model'
                        }

                    if ( $element ) {
                        if ( media.host === 'youtube' ) {
                            loadYoutubeSdk().then( () => createPlayer( media ) )
                        } else {
                            createPlayer( media );
                        }
                    }
                } );
            }

        };

        $.fn.kallesButtonShowGallery = function () {
            if ( $( this ).length ) {
                let $productGallery   = $( '.product-images' ),
                    $single_thumbnail = $( '.sp-single' ),
                    $mainImages       = $( '.p-thumb' ),
                    img_visible       = $mainImages.find( '.img_ptw:not(.is_varhide)' ),
                    small767          = ( window_w < 768 && $( window ).height() < 768 );

                let getProductItems           = function ( getvl ) {
                    let items   = [],
                        _html   = '',
                        img_url = '{width}x',
                        img;

                    img_visible.each( function () {
                        let $this   = $( this ),
                            src     = $this.data( 'bgset' ),
                            width   = $this.attr( 'data-width' ),
                            height  = $this.attr( 'data-height' ),
                            caption = $this.data( 'cap' ),
                            img     = $this.data( 'bgset' );

                        items.push( {
                            src   : src,
                            w     : width,
                            h     : height,
                            title : caption
                        } );

                        _html += '<div class="pswp_thumb_item"><img class="lazyload" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%20' + width + '%20' + height + '%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="' + img.replace( '1x1', img_url ) + '" data-widths="[50, 100]" data-sizes="auto" alt=""></div>'

                    } );

                    if ( getvl === 'thumb' ) {
                        return _html;
                    } else {
                        return items;
                    }

                };
                let getCurrentGalleryIndex    = function ( e ) {
                    if ( $mainImages.hasClass( 'flickity-enabled' ) )
                        return $mainImages.find( '.js-sl-item.is-selected' ).index();
                    else if ( $( e.currentTarget ).hasClass( 'show_btn_pr_gallery' ) )
                        return 0
                    else return $( e.currentTarget ).index();
                }
                let adjustMobileThumbPosition = function () {
                    if ( !small767 ) return;
                    let selectedThumb      = $( '.pswp_tb_active' )[ 0 ],
                        $pswp__thumb       = $( '.pswp__thumbnails' ),
                        thumbContainer     = $pswp__thumb[ 0 ],
                        thumbBounds        = selectedThumb.getBoundingClientRect(),
                        thumbWrapperBounds = thumbContainer.getBoundingClientRect();

                    if ( thumbBounds.left + thumbBounds.width > thumbWrapperBounds.width ) {
                        $pswp__thumb.animate( { scrollLeft : selectedThumb.offsetLeft + thumbBounds.width - thumbWrapperBounds.width + 10 }, 200 );
                    } else if ( selectedThumb.offsetLeft < thumbContainer.scrollLeft ) {
                        $pswp__thumb.animate( { scrollLeft : selectedThumb.offsetLeft - 10 }, 200 );
                    }
                }
                let callPhotoSwipe            = function ( index, items ) {
                    let pswpElement = document.querySelectorAll( '.pswp' )[ 0 ];
                    $( '.pswp_size_guide' ).removeClass( 'pswp_size_guide' );

                    if ( rtl_mode ) {
                        index = items.length - index - 1;
                        items = items.reverse();
                    }

                    /*define options (if needed)*/
                    let options = {
                        history          : false,
                        maxSpreadZoom    : 1,
                        bgOpacity        : 1,
                        showHideOpacity  : ( $mainImages.hasClass( 'nt_contain' ) || $mainImages.hasClass( 'nt_cover' ) ),
                        index            : index, // start at first slide
                        shareButtons     : [
                            { id : 'facebook', label : 'Share on Facebook', url : 'https://www.facebook.com/sharer/sharer.php?u={{url}}' },
                            { id : 'twitter', label : 'Tweet', url : 'https://twitter.com/intent/tweet?text={{text}}&url={{url}}' },
                            { id : 'pinterest', label : 'Pin it', url : 'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}' }
                        ],
                        getThumbBoundsFn : function ( index ) {
                            let thumbnail                                                                    = $( ".p-thumb .p_ptw:visible" ).eq( index )[ 0 ],
                                pageYScroll = window.pageYOffset || document.documentElement.scrollTop, rect = thumbnail.getBoundingClientRect();
                            return { x : rect.left, y : rect.top + pageYScroll, w : rect.width };
                        }
                    };

                    /*Initializes and opens PhotoSwipe*/
                    let gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options );

                    gallery.init();

                    gallery.listen( 'afterChange', function () {
                        let i = gallery.getCurrentIndex();
                        $( '.pswp_tb_active' ).removeClass( 'pswp_tb_active' );
                        $( '.pswp_thumb_item:eq(' + i + ')' ).addClass( 'pswp_tb_active' );
                        adjustMobileThumbPosition();
                    } );

                    $( '.pswp' ).off( 'click' ).on( 'click', '.pswp_thumb_item', function () {
                        gallery.goTo( $( this ).index() );
                    } );

                    gallery.listen( 'close', function () {
                        setTimeout( () => {
                            $( '.pswp_pp_prs' ).removeClass( 'pswp_pp_prs' );
                            $( '.pswp_t4_js' ).remove( 'pswp--open' );
                        }, 500 );
                        $( '.p-thumb.flickity-enabled' ).flickity( 'select', gallery.getCurrentIndex(), false, true );
                    } );

                };

                $( this ).on( 'click', '.show_btn_pr_gallery', function ( e ) {
                    e.preventDefault();
                    $( '.pswp' ).remove();
                    body.append( '<div class="pswp pswp_t4_js dn pswp_tp_light pswp_pp_prs" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div> <button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div> <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div><div class="pswp__thumbnails"></div></div>' );

                    if ( $( '.thumb_2' ).length > 0 || $( '.thumb_3' ).length > 0 ) {
                        img_visible = $mainImages.find( '.js-sl-item:not(.is_varhide) .img_ptw' );
                    } else {
                        img_visible = $mainImages.find( '.img_ptw:not(.is_varhide)' );
                    }
                    /*build items array*/
                    let items      = getProductItems(),
                        thumb_item = getProductItems( 'thumb' ),
                        p_thumb    = $( '.pswp__thumbnails' ),
                        index      = $mainImages.hasClass( 'isotope_ok' ) ? $( this ).parents().index() : getCurrentGalleryIndex( e );
                    if ( index === -1 ) {
                        index = 0;
                    }

                    callPhotoSwipe( index, items );
                    if ( p_thumb.length > 0 && img_visible.length > 1 ) {
                        p_thumb.html( thumb_item );
                        $( '.pswp_thumb_item:eq(' + index + ')' ).addClass( 'pswp_tb_active' );
                        adjustMobileThumbPosition();
                    }
                } );

                if ( $productGallery.hasClass( 'img_action_zoom' ) && window_w > 1025 ) {
                    let p_thumb     = $mainImages,
                        p_infors    = $( '.product-infors' ),
                        zoom_target = $mainImages.find( '.img_ptw' ),
                        dt_zoom_img = $( '.dt_img_zoom' )[ 0 ],
                        zoom_tpl    = 2,
                        z_magnify   = 2,
                        z_touch     = false;

                    if ( body.hasClass( 'zoom_tp_3' ) ) {
                        zoom_tpl = 3;
                    }

                    if ( zoom_tpl === 2 && ( $( '.thumb_2' ).length > 0 || $( '.thumb_3' ).length > 0 ) ) {
                        zoom_tpl = 1;
                        body.removeClass( 'zoom_tpl_2' ).addClass( 'zoom_tpl_1' );
                    }
                    zoom_target.each( function () {
                        let $this = $( this ),
                            _this = $this[ 0 ],
                            w     = $this.attr( 'data-width' ),
                            h     = $this.attr( 'data-height' );
                        new Drift( _this, {
                            sourceAttribute  : 'data-src',
                            paneContainer    : zoom_tpl === 2 ? dt_zoom_img : _this,
                            zoomFactor       : z_magnify,
                            inlinePane       : zoom_tpl === 3,
                            hoverBoundingBox : zoom_tpl === 2, //false , true
                            handleTouch      : false,
                            onShow           : function onShow () {
                                p_thumb.addClass( 'zoom_fade_ic' );
                                p_infors.addClass( 'zoom_fade_if' );
                            },
                            onHide           : function onHide () {
                                p_thumb.removeClass( 'zoom_fade_ic' );
                                p_infors.removeClass( 'zoom_fade_if' );
                            }
                        } );
                    } );
                }
            }
        }

        $.fn.kallesStickyAddToCart = function () {
            const $trigger   = $( '.entry-summary .variations_form' ),
                  $stickyBtn = $( '.sticky_atc_wrap' );

            if ( $stickyBtn.length && $trigger.length && ( window_w < 768 || !$stickyBtn.hasClass( 'mobile_false' ) ) ) {
                let summaryOffset = $trigger.offset().top + $trigger.outerHeight(),
                    $selector     = $( '.sticky_atc_wrap, #nt_backtop' ),
                    slpr_wrap     = $( '.popup_slpr_wrap' ),
                    _footer       = $( '#nt_footer' ),
                    off_footer    = 0,
                    ck_footer     = _footer.length > 0;

                const stickyAddToCartToggle = function () {
                    let windowScroll   = $( window ).scrollTop(),
                        windowHeight   = $( window ).height(),
                        documentHeight = $( document ).height();
                    if ( ck_footer ) {
                        off_footer = _footer.offset().top - _footer.height();
                    } else {
                        off_footer = windowScroll;
                    }
                    if ( windowScroll + windowHeight === documentHeight || summaryOffset > windowScroll || windowScroll > off_footer ) {
                        $selector.removeClass( 'sticky_atc_shown' );
                        slpr_wrap.removeClass( 'sticky_atc_shown' );
                    } else if ( summaryOffset < windowScroll && windowScroll + windowHeight !== documentHeight ) {
                        $selector.addClass( 'sticky_atc_shown' );
                        slpr_wrap.addClass( 'sticky_atc_shown' );
                    }
                };

                stickyAddToCartToggle();

                $( window ).scroll( stickyAddToCartToggle );

                $( '.sticky_atc_a' ).on( 'click', function ( e ) {
                    e.preventDefault();
                    $( 'html, body' ).animate( {
                        scrollTop : $( '.entry-summary' ).offset().top
                    }, 800 );
                } );

                /*Quantity.*/
                body.on( 'change', '.sticky_atc_wrap .qty', function () {
                    $( '#sp_qty_ppr .qty_pr_js' ).val( $( this ).val() )
                } );

                body.on( 'change', '#sp_qty_ppr .qty_pr_js', function () {
                    $( '.sticky_atc_wrap .qty' ).val( $( this ).val() );
                } );
            }
        };

        $.fn.kallesStickySingleProductDetail = function ( condition ) {
            if ( condition && $( this ).length ) {
                let offset       = 20,
                    $this        = $( this ),
                    $img         = $this.find( '.pr_sticky_img' ),
                    $su          = $this.find( '.pr_sticky_su' ),
                    img_h        = $img.find( '.theiaStickySidebar' ).outerHeight(),
                    su_h         = $su.find( '.theiaStickySidebar' ).outerHeight(),
                    offsetHeight = 0,
                    $el;

                if ( img_h > su_h ) {
                    offsetHeight = img_h - su_h;
                    $el          = $su;
                } else if ( img_h == null ) {
                    offsetHeight = su_h;
                    $el          = $su;
                } else {
                    offsetHeight = su_h - img_h;
                    $el          = $img;
                }

                if ( offsetHeight > 200 ) {
                    if ( body.hasClass( 'header_sticky_true' ) ) {
                        offset = $( '.sp_header_mid' ).outerHeight() + 20;
                    }
                    $el.addClass( 'is_sticky' ).theiaStickySidebar( {
                        additionalMarginTop    : offset,
                        additionalMarginBottom : 20,
                        minWidth               : 768
                    } );
                }
            }
        }

        $.fn.kallesProductIsotope = function ( condition = true ) {
            if ( condition && $( this ).length ) {
                let el     = $( this ),
                    option = el.data( 'prmasonry' ) ? el.data( 'prmasonry' ) : null;
                if ( option ) {
                    el.isotope( option ).addClass( 'isotope_ok' );
                    $window.on( 'resize', function () {
                        if ( $( window ).width() < 768 && el.hasClass( 'isotope_ok' ) ) {
                            el.isotope( 'destroy' ).removeClass( 'isotope_ok' );
                        } else if ( $( window ).width() >= 768 && !el.hasClass( 'isotope_ok' ) ) {
                            el.isotope( option ).addClass( 'isotope_ok' );
                        }
                    } );
                }
            }
        }

        $.fn.kallesDropdownPicker = function () {
            if ( $( this ).length ) {
                $( this ).on( 'click', '.header_picker, .kalles_dropDown_label', function ( e ) {
                    e.preventDefault();
                    e.stopPropagation();

                    let $this = $( this ),
                        pr    = $this.closest( '.nt_lt_fake , .kalles_dropdown_container' );

                    if ( $( pr ).hasClass( 'opended' ) ) {
                        $( pr ).removeClass( 'opended' );
                    } else {
                        $( pr.closest( '.dropdown_picker_js' ) ).find( '.nt_lt_fake.opended ,.kalles_dropdown_container.opended' ).removeClass( 'opended' );
                        $( pr ).addClass( 'opended' );
                    }

                } );

                body.on( 'click', function ( e ) {
                    if ( $( e.target ).hasClass( 'header_picker' ) || $( e.target ).hasClass( 'kalles_dropDown_label' ) ) return;
                    $( '.nt_lt_fake.opended,.kalles_dropdown_container.opended' ).removeClass( 'opended' );
                } );

                body.on( 'click', '.kalles_dropdown_option', function ( e ) {
                    e.preventDefault();
                    e.stopPropagation();
                    let $this = $( this );
                    if ( $this.data( 'label' ) ) {
                        $this.closest( '.kalles_dropdown_container' ).find( '.kalles_dropDown_label .lbl-title' ).html( $this.data( 'label' ) );
                        $this.closest( '.kalles_dropdown_container' ).removeClass( 'opended' );
                    }
                } )
            }
        };

        $.fn.kallesInitProduct360Viewer = function () {

            if ( $( this ).length ) {

                let threesixty,
                    $this      = $( this ),
                    $container = $( '#threesixty_container_js' );

                if ( $container.length ) {
                    $( this ).magnificPopup( {
                        items           : { src : '#pr_360_mfp' },
                        type            : 'inline',
                        tClose          : 'Close (Esc)',
                        mainClass       : 'mfp-fade',
                        removalDelay    : 160,
                        disableOn       : false,
                        preloader       : false,
                        fixedContentPos : false,
                        callbacks       : {
                            beforeOpen  : function () {
                            },
                            open        : function () {
                                if ( !$container.hasClass( 'done' ) ) {
                                    threesixty = $container.ThreeSixty( {
                                        totalFrames       : $this.data( 'total_frames' ),
                                        endFrame          : $this.data( 'end_frame' ),
                                        currentFrame      : 1,
                                        framerate         : $this.data( 'frame_rate' ),
                                        autoplayDirection : $this.data( 'auto_play_direction' ),
                                        imgList           : '.threesixty_imgs',
                                        progress          : '.spinner',
                                        imagePath         : $this.data( 'image_path' ),
                                        filePrefix        : $this.data( 'file_prefix' ),
                                        ext               : $this.data( 'ext' ),
                                        height            : $this.data( 'height' ),
                                        width             : $this.data( 'width' ),
                                        position          : 'bottom-center',
                                        responsive        : true,
                                        navigation        : true
                                        // imgArray          : [image-1.jpg,image-2.jpg],
                                    } );
                                    $container.addClass( 'done' );
                                }
                            },
                            beforeClose : function () {
                                threesixty.stop();
                                $( '.nav_bar_stop' ).removeClass( "nav_bar_stop" ).addClass( "nav_bar_play" );
                            },
                            close       : function () {
                            }
                        },
                    } );
                }
            }
        };

        $.fn.kallesShopMode = function () {
            if ( $( this ).length ) {
                body.on( 'click', '.cat_view a:not(.active)', function ( e ) {
                    e.preventDefault();
                    let $this           = $( this ),
                        collum          = $this.data( 'col' ),
                        device          = $this.data( 'dev' ),
                        $container      = $( '.container_cat .nt_pr' ),
                        $holder         = $( '.container_cat .nt_products_holder' ),
                        $catView_holder = $( '.cat_view,.container_cat .nt_products_holder' );

                    if ( collum === 'listt4' ) {
                        $catView_holder.removeClass( 'on_list_view_false' ).addClass( 'on_list_view_true' )
                    } else {
                        $catView_holder.removeClass( 'on_list_view_false' ).addClass( 'on_list_view_true' )
                    }
                    ( collum === 'listt4' ) ? $catView_holder.removeClass( 'on_list_view_false' ).addClass( 'on_list_view_true' ) : $catView_holder.removeClass( 'on_list_view_true' ).addClass( 'on_list_view_false' );

                    $this.closest( 'div' ).removeClass( 'dev_view_cat' );
                    $this.addClass( 'active' ).siblings().removeClass( 'active' );

                    switch ( device ) {
                        case 'mb':
                            $container.removeClass( 'col-2 col-3 col-4 col-6 col-12 col-15 col-listt4 done' ).addClass( 'done col-' + collum );
                            break;
                        case 'tb':
                            $container.removeClass( 'col-md-2 col-md-3 col-md-4 col-md-6 col-md-12 col-md-15 col-md-listt4 done' ).addClass( 'done col-md-' + collum );
                            break;
                        default:
                            /*desktop*/
                            $container.removeClass( 'col-lg-2 col-lg-3 col-lg-4 col-lg-6 col-lg-12 col-lg-15 col-lg-listt4 done' ).addClass( 'done col-lg-' + collum );
                            break;
                    }

                    if ( $holder.hasClass( 'js_isotope' ) ) {
                        $holder.isotope( 'layout' );
                    }
                } );
            }
        };

        $.fn.KallesInitSidebarFilter = function () {
            if ( $( this ).length ) {
                let $cleanFilterButton = $( '.clear_filter_js' );
                body.on( 'click', '.js_filter', function ( e ) {
                    e.preventDefault();

                    let $this   = $( this ),
                        $filter = $( $this.data( 'id' ) );
                    $this.toggleClass( 'opened' );

                    if ( $filter.is( ":hidden" ) ) {
                        $filter.stop().slideDown( 200 );
                    } else {
                        $filter.slideUp( 200 );
                    }
                } );

                body.on( 'click', '.nt_filter_block li', function ( e ) {
                    e.preventDefault();
                    let $this           = $( this ),
                        filterCondition = $this.closest( '.nt_filter_block' ).data( 'filter_condition' );
                    if ( $this.hasClass( 'active' ) ) {
                        $this.removeClass( 'active' );
                    } else {
                        $this.addClass( 'active' );
                        if ( !filterCondition || filterCondition !== 'and' ) {
                            $this.siblings( '.active' ).removeClass( 'active' );
                        }
                    }
                    body.trigger( 'change-filter-condition' );
                } );

                if ( $cleanFilterButton.length ) {
                    body.on( 'change-filter-condition', function () {
                        let $optionFilterActive = $( '.nt_filter_block>li.active' );
                        if ( $optionFilterActive.length > 0 ) {
                            if ( !$cleanFilterButton.parent().is( ":visible" ) ) {
                                $cleanFilterButton.parent().slideDown( 300 );
                            }
                        } else {
                            if ( $cleanFilterButton.parent().is( ":visible" ) ) {
                                $cleanFilterButton.parent().slideUp( 300 );
                            }
                        }
                    } );

                    body.on( 'click', '.clear_filter_js', function ( e ) {
                        e.preventDefault();
                        $( '.nt_filter_block>li.active' ).removeClass( 'active' );
                        $( this ).parent().slideUp( 300 );
                    } )
                }
            }
        };

        $.fn.kallesRefreshPriceTitle = function () {

            if ( $( this ).length ) {
                function price_slider_create ( values ) {
                    $( '[data-js-minprice]' ).html( formatMoney( parseInt( values[ 0 ], 10 ) ) );
                    $( '[data-js-maxprice]' ).html( formatMoney( parseInt( values[ 1 ], 10 ) ) );
                };

                function defaultTo ( value, defaultValue ) {
                    return value == null || value !== value ? defaultValue : value;
                }

                function formatWithDelimiters ( number, precision, thousands, decimal ) {
                    precision = defaultTo( precision, 2 );
                    thousands = defaultTo( thousands, ',' );
                    decimal   = defaultTo( decimal, '.' );

                    if ( isNaN( number ) || number == null ) {
                        return 0;
                    }

                    number = ( number / 100.0 ).toFixed( precision );

                    let parts         = number.split( '.' ),
                        dollarsAmount = parts[ 0 ].replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1' + thousands ),
                        centsAmount   = parts[ 1 ] ? decimal + parts[ 1 ] : '';

                    return dollarsAmount + centsAmount;
                }

                function formatMoney ( cents, format ) {
                    let remove_currency = false;

                    if ( typeof cents === 'string' ) {
                        cents = cents.replace( '.', '' );
                    }

                    let placeholderRegex = /\{\{\s*(\w+)\s*\}\}/,
                        formatString     = format || '${{amount}}',
                        value            = '';

                    switch ( formatString.match( placeholderRegex )[ 1 ] ) {
                        case 'amount':
                            value = formatWithDelimiters( cents, 2 );
                            break;
                        case 'amount_no_decimals':
                            value = formatWithDelimiters( cents, 0 );
                            break;
                        case 'amount_with_space_separator':
                            value = formatWithDelimiters( cents, 2, ' ', '.' );
                            break;
                        case 'amount_no_decimals_with_comma_separator':
                            value = formatWithDelimiters( cents, 0, ',', '.' );
                            break;
                        case 'amount_no_decimals_with_space_separator':
                            value = formatWithDelimiters( cents, 0, ' ' );
                            break;
                        case 'amount_with_comma_separator':
                            value = formatWithDelimiters( cents, 2, '.', ',' );
                            break;
                    }
                    if ( remove_currency ) {
                        /*remove '00'*/
                        if ( formatString.indexOf( 'with_comma_separator' ) !== -1 ) {
                            return formatString.replace( placeholderRegex, value ).replace( ',00', '' );
                        } else {
                            return formatString.replace( placeholderRegex, value ).replace( '.00', '' );
                        }
                    } else {
                        return formatString.replace( placeholderRegex, value );
                    }
                }

                $( this ).each( function () {
                    $( this ).find( '.filter_title_btn' ).show();
                    let _this             = $( this ).find( '.price_slider_wrapper' )
                        , _amount         = _this.find( '.price_slider_amount' )
                        , _minPrice       = _amount.find( '.min_price' )
                        , _maxPrice       = _amount.find( '.max_price' )
                        , currentUrlPrice = _amount.find( '.url_price' ).val()
                        , minPrice        = _minPrice.data( "min" )
                        , maxPrice        = _maxPrice.data( "max" )
                        , stepPrice       = _amount.data( "step" ) || 1
                        , currentMinPrice = _minPrice.val()
                        , currentMaxPrice = _maxPrice.val();

                    _amount.find( "input.url_price, input.min_price, input.max_price" ).hide();
                    _this.find( ".price_slider, .price_label ,.price_slider_btn" ).show();

                    let $stepsSlider = _this.find( '.price_steps_slider' ),
                        stepsSlider  = $stepsSlider[ 0 ],
                        inputs       = [ "span.from", "span.to" ],
                        inputs2      = [ ".min_price", ".max_price" ],
                        check_dis    = true;

                    if ( $stepsSlider.length < 1 ) return;

                    noUiSlider.create( stepsSlider, {
                        start   : [ currentMinPrice, currentMaxPrice ],
                        connect : true,
                        step    : stepPrice,
                        range   : {
                            'min' : minPrice,
                            'max' : maxPrice
                        }
                    } );

                    stepsSlider.noUiSlider.on( 'update', function ( values, handle ) {
                        let value_curent = parseInt( values[ handle ], 10 );
                        _this.find( inputs[ handle ] ).html( formatMoney( value_curent ) );
                        _amount.find( inputs2[ handle ] ).val( value_curent );
                        if ( check_dis ) {
                            price_slider_create( values );
                            check_dis = false;
                        }
                    } );
                } );
                /*Search product title init*/
            }
        };

        $.fn.KallesGalleryPhotoSwipe = function () {

            if ( $( this ).length ) {

                let callgalleryPhotoSwipe = function ( index, items ) {

                    let pswpElement = document.querySelectorAll( '.pswp' )[ 0 ];

                    if ( rtl_mode ) {
                        index = items.length - index - 1;
                        items = items.reverse();
                    }

                    let options = {
                        history         : false,
                        maxSpreadZoom   : 2,
                        showHideOpacity : true,
                        fullscreenEl    : false,
                        shareEl         : false,
                        counterEl       : false,
                        bgOpacity       : 1,
                        index           : index, // start at first slide
                        shareButtons    : [
                            { id : 'facebook', label : 'Share on Facebook', url : 'https://www.facebook.com/sharer/sharer.php?u={{url}}' },
                            { id : 'twitter', label : 'Tweet', url : 'https://twitter.com/intent/tweet?text={{text}}&url={{url}}' },
                            { id : 'pinterest', label : 'Pin it', url : 'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}' }
                        ],
                    };

                    /*Initializes and opens PhotoSwipe*/
                    let gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options );
                    gallery.init();
                };

                let getGalleryImages = function ( el ) {
                    let items = [];
                    el.find( 'a' ).each( function () {
                        items.push( {
                            src : $( this ).attr( 'data-src' ),
                            w   : $( this ).attr( 'data-w' ),
                            h   : $( this ).attr( 'data-h' )
                        } );
                    } );
                    return items;
                };

                $( document ).on( 'click', '.nt_gallery_item a', function ( e ) {
                    e.preventDefault();
                    $( '.pswp' ).remove();
                    body.append( '<div class="pswp pswp_t4_js dn pswp_tp_light pswp_pp_prs" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div> <button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title="Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div> <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div><div class="pswp__thumbnails"></div></div>' );
                    let $parent = $( this ).parents(),
                        holder  = $( this ).closest( '.type_gallery' ),
                        index   = $parent.index(),
                        items   = getGalleryImages( holder );
                    callgalleryPhotoSwipe( index, items );
                } );

            }
        };

        $.fn.kallesDiscountPromotionPopup = function () {
            const yesHover = Modernizr.hovermq;
            if ( $( this ).length === 0 || window_w < 1025 || !yesHover || ( Cookies.get( 'kalles_age_verify' ) !== 'confirmed' && $( '.popup_age_wrap' ).length > 0 ) || Cookies.get( 'kalles_prpr_pp' ) === 'shown' ) {

            } else {
                let $wrap_popup = $( this ).find( '.popup_prpr_wrap' );
                let $el         = $wrap_popup.find( '.js_carousel' );
                let stt         = $wrap_popup.data( 'stt' );
                let showPopup   = function () {
                    $.magnificPopup.open( {
                        items        : { src : '#kalles-section-promo_pr_pp .popup_prpr_wrap' },
                        type         : 'inline',
                        removalDelay : 500, //delay removal by X to allow out-animation
                        tClose       : 'Close (Esc)',
                        callbacks    : {
                            beforeOpen : function () {
                                this.st.mainClass = 'mfp-move-horizontal prpr_pp_wrapper';
                            },
                            open       : function () {
                                $el.kallesRefresh_flickity();
                                $el.kallesFlickityResponsive( false );
                                $wrap_popup.find( '.pr_coun_dt:not(.done_cd) , .sepr_coun_dt:not(.done_cd)' ).initCountdown();
                                $( document ).off( 'mouseleave.registerexit' );
                                // Will fire when this exact popup is opened
                                // this - is Magnific Popup object
                            },
                            close      : function () {
                                Cookies.set( 'kalles_prpr_pp', 'shown', { expires : stt.day_next, path : '/' } );
                            }
                        }
                    } );
                };

                $( '.kalles_open_promopr' ).on( 'click', function ( e ) {
                    e.preventDefault();
                    showPopup();
                } );

                $wrap_popup.on( 'open_promopr', function () {
                    showPopup();
                } );

                $( document ).on( 'mouseleave.registerexit', function ( e ) {
                    if ( e.clientY < 60 && $( '.mfp-content' ).length === 0 ) {
                        showPopup();
                    }
                } );
            }
        };

        $.fn.kallesLoadQuickView = function () {
            const $btn       = $( this ),
                  $container = $( '#quick-view-tpl' ),
                  data       = $container.length ? $container.html() : null;

            if ( data.length ) {
                $.magnificPopup.open( {
                    items        : {
                        src  : '<div class="mfp-with-anim popup-quick-view" id="content_quickview">' + data + '</div>',
                        type : 'inline'
                    },
                    tClose       : 'Close (Esc)',
                    removalDelay : 500, /*delay removal by X to allow out-animation*/
                    callbacks    : {
                        beforeOpen : function () {
                            this.st.mainClass = 'mfp-move-horizontal';
                        },
                        open       : function () {
                            const el = $( '.nt_carousel_qv' ), option = el.attr( "data-flickity" ) || '{}';
                            el.flickity( JSON.parse( option ) );
                            body.addClass( 'open_ntqv' );
                            $( '.kalles_swatch_js' ).kallesSwatches();
                            $( '#callBackVariant_qv .single_add_to_cart_button' ).kallesAnimation();
                            $( '#nt_countdow_qv' ).initCountdown_pr();
                            $btn.removeClass( 'loading' );
                            $( '.dropdown_picker_js' ).kallesDropdownPicker();
                        },
                        close      : function () {
                            $( '#content_quickview' ).empty();
                            body.removeClass( 'open_ntqv' );
                            $( '.dropdown_picker_js' ).kallesDropdownPicker();
                        }
                    },
                } );
            } else {
                $btn.removeClass( 'loading' );
            }
        }

        $.fn.kallesLoadQuikShop = function () {
            const $btn       = $( this ),
                  $container = $( '#quick-shop-tpl' ),
                  data       = $container.length ? $container.html() : null;

            if ( data.length ) {
                $.magnificPopup.open( {
                    items        : {
                        src  : '<div class="mfp-with-anim pp_qs" id="content_quickview">' + data + '</div>', /* can be a HTML string, jQuery_T4NT object, or CSS selector*/
                        type : 'inline'
                    },
                    tClose       : 'Close (Esc)',
                    removalDelay : 500, /*delay removal by X to allow out-animation*/
                    callbacks    : {
                        beforeOpen : function () {
                            this.st.mainClass = 'mfp-move-vertical';
                        },
                        open       : function () {
                            body.addClass( 'open_ntqs' );
                            $btn.removeClass( 'loading' );
                            const el = $( '.nt_carousel_qs' ), option = el.attr( "data-flickity" ) || '{}';
                            el.flickity( JSON.parse( option ) );
                            $( '.kalles_swatch_js' ).kallesSwatches();
                            $( '.dropdown_picker_js' ).kallesDropdownPicker();
                        },
                        close      : function () {
                            $( '.clicked_ed_js' ).removeClass( 'clicked_ed_js' );
                            $( '#content_quickview' ).empty();
                            body.removeClass( 'open_ntqs' );
                            $( '.dropdown_picker_js' ).kallesDropdownPicker();
                        }
                    }
                } );
            } else {
                $btn.removeClass( 'loading' );
            }
        }

        $.fn.kallesPaymentMethodDropdown = function () {
            if ( $( this ).length ) {
                $( this ).on( 'change', function () {
                    $( this ).closest( '.payment_methods' ).find( '.payment_box' ).slideUp( 300 );
                    $( this ).closest( '.payment_method' ).find( '.payment_box' ).slideDown( 300 );
                    /*$( this ).is( ":checked" )
                     console.log( this.checked );
                     if ( $( this ).is( ":checked" ) ) {
                     console.log( $( this ).attr( 'id' ) );
                     } else if ( $( this ).is( ":not(:checked)" ) ) {
                     console.log( $( this ).attr( 'id' ) );
                     }*/
                } )
            }
        }

        /**********************************************
         * Pin type
         * ********************************************/
        if ( window_w >= 1024 ) {
            body.on( 'click', '.pin_tt_js', function ( e ) {
                e.preventDefault();
                e.stopPropagation();

                var ck    = 0,
                    cl    = 'pin__opened',
                    _this = $( this ).parent( '.pin__type' );
                if ( _this.hasClass( 'pin__opened' ) ) {
                    ck = 1
                }
                $( '.pin__type.pin__opened' ).removeClass( 'pin__opened' );
                $( '.pin__slider.pin_slider_opened' ).removeClass( 'pin_slider_opened' );

                if ( ck ) return;

                var sp_section = $( this ).closest( '.kalles-section' );
                _this.addClass( 'pin__opened' );
                sp_section.find( '.pin__slider' ).addClass( 'pin_slider_opened' );

                if ( _this.hasClass( 'has_calc_pos' ) ) return;

                var pos        = _this.offset(),
                    pin_pp     = _this.find( '.pin__popup' ),
                    pin_parent = _this.find( '.pin_lazy_js' );

                if ( pin_parent.length === 0 ) {
                    pin_parent = pin_pp;
                }

                var w_popup = pin_pp.width() + 20;

                if ( pin_parent.hasClass( 'pin__popup--left' ) ) {
                    if ( pos.left < w_popup ) {
                        var mrRight = w_popup - pos.left + 10;
                        pin_pp.css( "margin-right", '-' + mrRight + 'px' );
                    }
                } else if ( pin_parent.hasClass( 'pin__popup--right' ) ) {
                    var posRight = $( window ).width() - pos.left - _this.width();
                    if ( posRight < w_popup ) {
                        var mrLeft = w_popup - posRight + 10;
                        pin_pp.css( "margin-left", '-' + mrLeft + 'px' );
                    }
                }
                _this.addClass( 'has_calc_pos' )
            } );
            body.on( 'click', function ( e ) {
                let target = $( e.target );
                if ( target.closest( '.pin__type' ).length > 0 || target.closest( '.mfp-wrap' ).length > 0 ) return;
                $( '.pin__type.pin__opened' ).removeClass( 'pin__opened' );
                $( '.pin__slider.pin_slider_opened' ).removeClass( 'pin_slider_opened' );
            } );
        }

        body.on( 'click', '[data-opennt]', function ( e ) {
            var $this     = $( e.currentTarget ),
                data      = $this.data(),
                id        = data.opennt,
                color     = data.color,
                bg        = data.bg,
                position  = data.pos,
                ani       = data.ani || 'has_ntcanvas',
                remove    = data.remove,
                cl        = data.class,
                close     = data.close || false,
                focuslast = data.focuslast || false,
                focus     = $this.attr( 'data-focus' ),
                YOffset   = window.pageYOffset,
                height    = window.height - $( '#kalles-section-header_banner' ).outerHeight() - $( '.ntheader_wrapper' ).outerHeight(),
                nt_scroll = function () {
                    if ( !YOffset ) return;
                    $( 'html, body' ).scrollTop( YOffset );
                }
            $this.addClass( 'current_clicked' );
            $.magnificPopup.open( {
                items          : {
                    src      : id,
                    type     : "inline",
                    tLoading : '<div class="loading-spin dark"></div>'
                },
                tClose         : 'Close (Esc)',
                removalDelay   : 300,
                closeBtnInside : close,
                focus          : focus,
                autoFocusLast  : focuslast,
                callbacks      : {
                    beforeOpen  : function () {
                        this.st.mainClass = ani + " " + color + " " + ani + "_" + position;
                    },
                    open        : function () {
                        html.addClass( ani );
                        html.addClass( ani + "_" + position );
                        cl && $( ".mfp-content" ).addClass( cl );
                        bg && $( ".mfp-bg" ).addClass( bg );
                        body.on( 'click', '.close_pp', function ( e ) {
                            e.preventDefault();
                            $.magnificPopup.close();
                        } );
                        nt_scroll();
                    },
                    beforeClose : function () {
                        html.removeClass( ani );
                    },
                    afterClose  : function () {
                        html.removeClass( ani + "_" + position );
                        $( ".current_clicked" ).removeClass( "current_clicked" );
                        remove && $( id ).removeClass( "mfp-hide" );
                    }
                }
            } );
            e.preventDefault()
        } )

        /**********************************************
         * Top head banner
         * ********************************************/
        $( '#kalles-section-header_banner' ).hTransparent();

        /**********************************************
         * Menu sticky
         * ********************************************/
        body.initStickyMenu();

        /**********************************************
         * Top banner countdown
         * ********************************************/
        $( '.js_kl__countdown' ).bannerCountdown();

        /**********************************************
         * Minicart left side
         * ********************************************/
        body.on( 'click', '.push_side', function ( e ) {
            const _this = $( this ),
                  _id   = _this.data( 'id' ),
                  $id   = $( _id );
            if ( $id.length !== 0 ) {
                e.preventDefault();
                if ( $( body ).hasClass( 'pside_opened' ) ) {
                    $( body ).closeMenu();
                }
                _this.openMenu( $id );
            }
        } );

        body.on( 'click touchstart', '.mask-overlay', function ( e ) {
            $( this ).closeMenu();
        } );

        body.on( 'click', '.act_opened .close_pp', function () {
            $( this ).closeMenu();
        } );

        /**********************************************
         * Add to cart button
         * ********************************************/
        body.on( 'click', '.js_addtc , .single_add_to_cart_button', function ( e ) {
            e.preventDefault();
            e.stopPropagation();
            let mini_cart_block$ = $( '#nt_cart_canvas' ),
                btn$             = $( this );
            if ( mini_cart_block$.length !== 0 ) {
                btn$.addClass( 'loading' );
                if ( $.magnificPopup && $.magnificPopup.instance.isOpen ) {
                    $.magnificPopup.close();
                }
                if ( $( body ).hasClass( 'pside_opened' ) ) {
                    $( body ).closeMenu();
                }
                if ( body.hasClass( 'cart_pos_dropdown' ) ) {
                    setTimeout( () => {
                        $( 'html, body' ).animate( { scrollTop : 0 }, 'slow', () => {
                            mini_cart_block$.addClass( 'current_hover' );
                            btn$.removeClass( 'loading' );
                        } );
                    }, 500 );
                } else {
                    setTimeout( () => {
                        btn$.openMenu( mini_cart_block$ );
                        btn$.removeClass( 'loading' );
                    }, 500 );
                }
            }
        } );

        /**********************************************
         * Wishlist button
         * ********************************************/
        body.on( 'click', '.nt_add_w', function ( e ) {
            e.preventDefault();
            e.stopPropagation();
            let wrap$ = $( this ),
                btn$  = wrap$.find( '.wishlistadd' );
            btn$.addClass( 'loading' );
            setTimeout( () => {
                btn$.removeClass( 'loading' );
                wrap$.toggleClass( 'wis_added' );
            }, 500 );
        } );

        /**********************************************
         * Back to top
         * ********************************************/
        $( '#nt_backtop' ).kallesBackToTop();

        /**********************************************
         * Countdown on products
         * ********************************************/
        $( '.pr_coun_dt:not(.done_cd)' ).initCountdown();

        $( '.sepr_coun_dt:not(.done_cd)' ).initSeCountdown();

        /**********************************************
         * Product quantity ( plus / minus )
         * ********************************************/
        body.on( 'click', 'button.plus , a.plus , button.minus , a.minus', function ( e ) {
            e.preventDefault();
            e.stopPropagation();
            const $inputTag = $( this ).closest( '.quantity' ).find( '.qty_cart_js,.qty_pr_js' );
            if ( $inputTag ) {
                let value = $inputTag.val() ? parseInt( $inputTag.val(), 10 ) : 0,
                    max   = $inputTag.data( 'max' ) || 100,
                    min   = $inputTag.data( 'min' ) || 0,
                    step  = $inputTag.data( 'step' ) || 1;
                if ( $( this ).hasClass( 'plus' ) ) {
                    value = value + step <= max ? value + step : max;
                } else {
                    value = value - step >= min ? value - step : min;
                }
                $inputTag.val( value ).trigger( 'change' );
            }
        } );

        /**********************************************
         * Minicart tools
         * ********************************************/
        body.on( 'click', '.js_cart_tls', function ( e ) {
            e.preventDefault();
            clearTimeout( timeout );
            let id = $( this ).data( 'id' );
            $nt_js_cart.addClass( 'ld_nt_cl ld_cart_tls' );
            $( '.mini_cart_' + id ).addClass( 'is_nt_op' );
            if ( id === 'note' ) {
                timeout = setTimeout( function () {
                    $( '#CartSpecialInstructions' ).focus();
                }, 500 );
            } else if ( id === 'dis' ) {
                timeout = setTimeout( function () {
                    $( '#Cartdiscode' ).focus();
                }, 500 );
            }
        } );

        body.on( 'click', '.js_cart_tls_back', function ( e ) {
            e.preventDefault();
            clearTimeout( timeout );
            $nt_js_cart.removeClass( 'ld_nt_cl ld_cart_tls' );
            $( '.is_nt_op' ).removeClass( 'is_nt_op' );
        } );

        /**********************************************
         * Quick view / Quick Shop
         * ********************************************/
        body.on( 'click', '.js_add_qv , .js__qs', function ( e ) {
            e.preventDefault();
            e.stopPropagation();
            let $this = $( this ),
                delay = 500;
            $this.addClass( 'loading' );
            if ( $.magnificPopup.instance.isOpen ) {
                $.magnificPopup.close();
                delay = $.magnificPopup.instance.st.removalDelay + 10;
            }
            setTimeout( function () {
                if ( $this.hasClass( 'js__qs' ) ) {
                    $this.kallesLoadQuikShop();
                } else {
                    $this.kallesLoadQuickView();
                }
            }, delay );
        } );

        /**********************************************
         * Reply comment form
         * ********************************************/
        if ( $( '.r--reply-form-wrapper' ).length ) {
            const open_comment_form  = ( $wrap_form ) => {
                      $wrap_form.find( '.r--reply-items' ).addClass( 'd-none' );
                      $wrap_form.find( '.r--comment-form-wrap' ).removeClass( 'd-none' );
                      $wrap_form.find( '.r--reply-button' ).addClass( 'd-none' );
                  },
                  close_comment_form = ( $wrap_form ) => {
                      $wrap_form.find( '.r--reply-items' ).removeClass( 'd-none' );
                      $wrap_form.find( '.r--comment-form-wrap' ).addClass( 'd-none' );
                      $wrap_form.find( '.r--reply-button' ).removeClass( 'd-none' );
                  }

            body.on( 'click', '.btn_control_reply_comment', function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                return $( this ).hasClass( 'reply-comment--on' ) ? open_comment_form( $( this ).closest( '.r--reply-form-wrapper' ) ) : close_comment_form( $( this ).closest( '.r--reply-form-wrapper' ) );
            } );
        }

        /**********************************************
         * Mobile toolbar
         * ********************************************/
        $( '#nt_login_canvas' ).linkAcc();

        $( '.dt_trigger_cl' ).linkTrigger();

        /**********************************************
         * Mobile Nav
         * ********************************************/
        $( '#nt_menu_canvas , #nav_header7' ).kallesMobileNav();

        /**********************************************
         * Megamenu
         * ********************************************/
        $( '.lazy_menu:not(.calc_pos)' ).kallesLazyMenu()

        /**********************************************
         * Tabs in cart
         * ********************************************/
        $( 'ul.tab_cat_title li a' ).catTabs();

        body.on( 'click', '.nt_swatch_on_bg:not(.current-swatch)', function () {
            if ( !touchevents ) return;
            $( this ).swatchesOnBGGrid();
        } );

        if ( !touchevents ) {
            body.hoverIntent( {
                selector    : '.nt_swatch_on_bg',
                sensitivity : 6,
                interval    : 100,
                timeout     : 100,
                over        : function ( t ) {
                    $( this ).swatchesOnBGGrid();
                },
                out         : function () {
                }
            } );
        }

        /**********************************************
         * Video html 5 sections
         * ********************************************/
        $( '.vid_nt_js' ).initHTMLVideo();

        /**********************************************
         * Parallax sections
         * ********************************************/
        $( '.nt_parallax_true' ).parallax();

        /**********************************************
         * Footer collapse
         * ********************************************/
        if ( is_smaller_768 && $( '.footer_collapse_true' ).length ) {
            $( '.footer_collapse_true .widget-title' ).off( 'click' ).on( 'click', function () {
                let $title   = $( this ),
                    $widget  = $title.parent(),
                    $content = $widget.find( '> .widget_footer' );

                if ( $widget.hasClass( 'footer_opened' ) ) {
                    $widget.removeClass( 'footer_opened' );
                    $content.stop().slideUp( 200 );
                } else {
                    $widget.addClass( 'footer_opened' );
                    $content.stop().slideDown( 200 );
                }
            } );
        }

        /**********************************************
         * Sticky footer
         * ********************************************/
        if ( $( '.footer_sticky_true' ).length === 0 ) {
            $( '#nt_content' ).css( { marginBottom : 0 } );
        } else {
            if ( $window.width() > 1024 ) {
                let $footer = $( '#nt_footer' ),
                    $page   = $( '#nt_content' );

                if ( $( '.kalles_prefooter' ).length > 0 ) {
                    $page = $( '.kalles_prefooter' );
                }

                const footerOffset = () => {
                    $page.css( { marginBottom : $footer.outerHeight() } );
                };

                $window.on( 'resize', footerOffset );

                footerOffset();
                body.addClass( 'calc_footer_sticky' );

                //Safari fix
                if ( html.hasClass( 'browser-Safari' ) ) {
                    const footerSafariFix = function () {
                        let windowScroll    = $window.scrollTop(),
                            footerOffsetTop = $( document ).outerHeight() - $footer.outerHeight();

                        if ( footerOffsetTop < windowScroll + $footer.outerHeight() + $window.outerHeight() ) {
                            $footer.addClass( 'visible_footer' );
                        } else {
                            $footer.removeClass( 'visible_footer' );
                        }
                    };

                    footerSafariFix();
                    $window.on( 'scroll', footerSafariFix );
                }
            }
        }

        /**********************************************
         * Dropdown mini-cart
         * ********************************************/
        if ( body.hasClass( 'cart_pos_dropdown' ) && !touchevents && !body.hasClass( 'template-cart' ) ) {
            let $cart        = $( '#nt_cart_canvas' ),
                $icon_cart   = $( '.cart_pos_dropdown .icon_cart' ),
                fullHeight   = 60,
                windowHeight = $window.height(),
                windowWidth  = $window.width(),
                offsetTop    = $icon_cart.offset().top,
                right        = ( windowWidth - ( $icon_cart.offset().left + $icon_cart.outerWidth() ) ),
                outerH       = $icon_cart.outerHeight(),
                top          = offsetTop + 40;

            $cart.css( {
                'position' : 'absolute',
                'top'      : top,
                'right'    : right
            } );

            if ( offsetTop < windowHeight ) {
                fullHeight = 100 - ( offsetTop + 40 ) / ( windowHeight / 100 );
            }

            $icon_cart.hoverIntent( {
                sensitivity : 6,
                interval    : 100,
                timeout     : 100,
                over        : function ( t ) {
                    top = $icon_cart.offset().top + 40;
                    body.addClass( 'oped_dropdown_cart' );
                    $cart.css( "top", top ).addClass( "current_hover" );
                },
                out         : function () {
                    if ( $cart.is( ":hover" ) ) return;
                    body.removeClass( 'oped_dropdown_cart' );
                    $cart.removeClass( "current_hover" );
                }
            } );

            $cart.on( "mouseleave", function () {
                body.removeClass( 'oped_dropdown_cart' );
                $cart.removeClass( "current_hover" );
            } );
        }

        /**********************************************
         * Accordion tabs
         * ********************************************/
        if ( $( '.sp-tabs .tab-heading' ).length ) {
            $( document ).on( 'click', '.sp-tabs .tab-heading', function ( e ) {
                e.preventDefault();
                let _this      = $( this ),
                    parent     = _this.closest( '.sp-tab' ),
                    parent_top = _this.closest( '.sp-tabs' ),
                    el         = _this.closest( '.nt_section' ),
                    time       = 300,
                    time2      = time + 50;

                if ( el.length === 0 ) {
                    el = _this.closest( '.kalles-section' )
                }
                parent.addClass( 'clicked_accordion' )
                if ( parent.hasClass( 'active' ) ) {
                    parent.removeClass( 'active' );
                    parent.find( '.sp-tab-content' ).slideUp( time );
                } else {
                    parent_top.find( '.sp-tab' ).removeClass( 'active' );
                    parent.addClass( 'active' );
                    parent_top.find( '.sp-tab-content' ).slideUp( 150 );
                    parent.find( '.sp-tab-content' ).stop( true, true ).slideDown( time );
                    setTimeout( function () {
                        parent.find( '.sp-tab-content .js_packery' ).packery( 'layout' );
                        var el_active = parent_top.find( '.sp-tab.active .js_ck_view' );
                        if ( kallesIsVisible( el_active, true ) ) {
                            return;
                        }
                        var num_height = $( '.ntheader.live_stuck .sp_header_mid' ).height() || 0,
                            of_active  = el.find( ".sp-tab.active" ).offset().top - num_height - 10;
                        $( 'body,html' ).animate( { scrollTop : of_active } );
                    }, 200 );
                }
            } );
        }

        /**********************************************
         * popup newsletter
         * ********************************************/
        $( '.popup_new_wrap' ).newsletterPopup();


        /**********************************************
         * age verify section
         * ********************************************/
        $( '.popup_age_wrap' ).KallesAgeVerify();


        /**********************************************
         * Confirm using cookies
         * ********************************************/
        $( '.popup_cookies_wrap' ).cookiesLawAnnouncements()

        $( '.kalles_swatch_js' ).kallesSwatches();

        $.fn.kallesStickyAddToCart();

        setTimeout( () => $( '.flickity-enabled' ).kallesDisableNavSlider(), 3000 );

        /**********************************************
         * Single product magnifier and thumbnail gallery
         * ********************************************/
        $( '.sp-single' ).kallesButtonShowGallery();

        $( '.kalles-section-pr_summary .single_add_to_cart_button , .sticky_atc_btn .single_add_to_cart_button' ).kallesAnimation();

        $( '.pr_flash_sold' ).kallesFlashSold();


        /**********************************************
         * Init product 360 viewer
         * ********************************************/
        $( '#btn_mfp_360' ).kallesInitProduct360Viewer();

        /**********************************************
         * open popup
         * ********************************************/
        body.on( 'click', '.ajax_pp_js', function ( e ) {
            e.preventDefault();
            e.stopPropagation();
            const $this      = $( this ),
                  content_id = $this.data( 'id' ),
                  html       = content_id !== undefined ? $( content_id ).html() : null;
            if ( html ) {
                $.magnificPopup.open( {
                    items        : {
                        src  : html,
                        type : 'inline'
                    },
                    removalDelay : 500,
                    callbacks    : {
                        beforeOpen : function () {
                            this.st.mainClass = 'mfp-move-horizontal';
                        }
                    },
                } );
            }
        } );

        /**********************************************
         * Single product tabs
         * ********************************************/
        body.on( 'click', '.ul_tabs>.tab_title_block>a', function ( e ) {
            e.preventDefault();
            const _this  = $( this ),
                  parent = _this.closest( '.sp-tabs' );
            parent.find( ".tab_title_block" ).removeClass( "active" );
            _this.closest( "li" ).addClass( "active" ).addClass( "active" );
            parent.find( '.sp-tab.panel' ).hide().removeClass( "active" );
            parent.find( _this.attr( "href" ) ).show().addClass( "active" );
        } )

        /**********************************************
         * Frequently bought together
         * ********************************************/
        if ( $( '#wrap_fbt' ).length ) {
            body.on( 'change', '.js_fbt_ck', function () {
                let $this      = $( this ),
                    $kl_fbt_li = $this.closest( '.kl_fbt_li' );
                if ( $this.is( ':checked' ) ) {
                    if ( $kl_fbt_li.length ) {
                        $kl_fbt_li.addClass( 'kl_fbt_checked' );
                        $kl_fbt_li.find( '.js_fbt_sl' ).prop( 'disabled', false );
                    }
                    if ( $kl_fbt_li.data( 'sl' ) ) {
                        $kl_fbt_li.closest( '.kl_fbt_wrap' ).find( $kl_fbt_li.data( 'sl' ) ).fadeIn( 300 );
                    }
                } else {
                    if ( $kl_fbt_li.length ) {
                        $kl_fbt_li.removeClass( 'kl_fbt_checked' );
                        $kl_fbt_li.find( '.js_fbt_sl' ).prop( 'disabled', true );
                    }
                    if ( $kl_fbt_li.data( 'sl' ) ) {
                        $kl_fbt_li.closest( '.kl_fbt_wrap' ).find( $kl_fbt_li.data( 'sl' ) ).fadeOut( 300 );
                    }

                }
            } );
        }

        /**********************************************
         * Single product thumbnail video
         * ********************************************/
        $( '[data-featured-product-se]' ).kallesInitFeaturedProduct();

        setTimeout( () => $( '.kalles_product_thumnb_slide' ).kallesSingleProductThumbnail(), 100 );

        /**********************************************
         * Single product sticky detail
         * ********************************************/
        $( '.pr_sticky_content' ).kallesStickySingleProductDetail( !is_smaller_768 && body.hasClass( 'single-product-template' ) );

        /**********************************************
         * Single product isotope
         * ********************************************/
        $( '.p-thumb.only_owl_mb' ).kallesProductIsotope( !is_smaller_768 );

        /**********************************************
         * Product countdown
         * ********************************************/
        $( '#nt_countdow_ppr' ).initCountdown_pr();

        /**********************************************
         * Register kalles dropdown
         * ********************************************/
        $( '.dropdown_picker_js,.kalles_dropdown' ).kallesDropdownPicker();

        /**********************************************
         * Change view mode in shop
         * ********************************************/
        $( '.cat_view' ).kallesShopMode();

        /**********************************************
         * Sidebar filter in shop
         * ********************************************/
        $( '.js_filter' ).KallesInitSidebarFilter();
        $( '.filter_area_js, .js_sidebar' ).kallesRefreshPriceTitle();

        /**********************************************
         * load more button in shop
         * ********************************************/
        $( '.nt_cat_lm:not(.jscl_ld)' ).on( 'click', function ( e ) {
            e.preventDefault();
            let $this = $( this );
            $this.addClass( 'jscl_ld' );
            setTimeout( () => $this.removeClass( 'jscl_ld' ), 2000 );
        } );

        /**********************************************
         * Gallery PhotoSwipe
         * ********************************************/
        $( '.nt_gallery_item' ).KallesGalleryPhotoSwipe();

        /**********************************************
         * Promotion popup
         * ********************************************/
        $( '#kalles-section-promo_pr_pp' ).kallesDiscountPromotionPopup();

        /**********************************************
         * Related and crosses slide
         * ********************************************/
        setTimeout( () => {
            let slide$ = $( '.prs_bordered_grid_3 .product-extra [data-flickityjs]' );
            slide$.each( function () {
                const attrs = $( this ).data( 'flickityjs' );
                if ( attrs ) {
                    const selectedCells = attrs.selectedCells ? attrs.selectedCells.length : null;
                    const cells         = attrs.cells ? attrs.cells.length : null;
                    if ( selectedCells && cells && selectedCells === cells ) {
                        $( this ).addClass( 'flickity_prev_disable flickity_next_disable' );
                    } else {
                        $( this ).removeClass( 'flickity_prev_disable flickity_next_disable' );
                    }
                    $( this ).flickity( attrs );
                }
            } );
        }, 1000 );

        /**********************************************
         * Dropdown payment methods
         * ********************************************/
        $( '.payment_methods input[name=payment_method]' ).kallesPaymentMethodDropdown();

        /**********************************************
         * Go to comment
         * ********************************************/
        body.on( 'click', '.rating_sp_kl', function ( evt ) {
            let $this = $( this );
            if ( $this.attr( 'href' ) === '#tab_reviews_product' ) {
                evt.preventDefault();
                evt.stopPropagation();
                let tab$ = $( '.ul_tabs a[href="#tab_reviews_product"]' );
                if ( tab$.length ) {
                    tab$.trigger( "click" );
                    $( 'html, body' ).animate( {
                        scrollTop : $( '#tab_reviews_product' ).offset().top
                    }, 1000 );
                }
            }
        } );

        /**********************************************
         * Remove mini cart
         * ********************************************/
        $nt_js_cart.on( 'click', '.cart_ac_remove', function ( evt ) {
            evt.preventDefault();
            evt.stopPropagation();
            let $this       = $( this ),
                $wrapItem   = $this.closest( '.mini_cart_item' ),
                $processTag = $wrapItem.find( '.ld_cart_bar' );

            $nt_js_cart.addClass( 'ld_nt_cl' );
            if ( $processTag.length ) {
                $processTag.addClass( 'on_star' );
                setTimeout( () => {
                    $processTag.addClass( 'on_end' );
                    $wrapItem.slideUp( 300, 'swing', function () {
                        $( this ).remove()
                        if ( !$nt_js_cart.find( '.mini_cart_item' ).length ) {
                            $nt_js_cart.find( '.mini_cart_items , .mini_cart_tool' ).remove();
                            $nt_js_cart.find( '.empty.tc' ).show( 300, 'swing', function () {
                                $( this ).removeClass( 'dn' )
                            } );
                        }
                        console.log( $nt_js_cart.find( '.mini_cart_item' ).length );
                    } );
                    $nt_js_cart.removeClass( 'ld_nt_cl' );

                }, 1000 );
            } else {
                setTimeout( () => {
                    $wrapItem.slideUp( 300, 'swing', function () {
                        $( this ).remove();
                        if ( !$nt_js_cart.find( '.mini_cart_item' ).length ) {
                            $nt_js_cart.find( '.mini_cart_items , .mini_cart_tool' ).remove();
                            $nt_js_cart.find( '.empty.tc' ).show( 300, 'swing', function () {
                                $( this ).removeClass( 'dn' )
                            } );
                        }
                    } );
                    $nt_js_cart.removeClass( 'ld_nt_cl' );
                }, 1000 );
            }
        } );

        /**********************************************
         * Remove product in wishlist
         * ********************************************/
        body.on( 'click', '.wis_remove', function () {
            let $product = $( this ).closest( '.product' );
            $product.addClass( 'kalles-hidden-product' )
            setTimeout( () => $product.remove(), 500 );
        } )

        /**********************************************
         * Change reset and login form
         * ********************************************/
        body.on( 'click', '.btn-change-login-form', function ( e ) {
            let $this = $( this ),
                href  = $this.attr( 'href' );
            if ( href ) {
                e.preventDefault();
                $this.closest( '.kalles-wrap-form' ).addClass( 'dn' );
                $( href ).removeClass( 'dn' );
            }
        } );

        /**********************************************
         * Settings when window resize
         * ********************************************/
        $( window ).resize( function ( event ) {

            /**********************************************
             * Resize megamenu
             * ********************************************/
            if ( $( window ).width() > 767 ) {
                $( '.calc_pos .lazy_menu' ).kallesInitMegaMenu();
            }

            /**********************************************
             * Reinstall slides
             * ********************************************/
            setTimeout( () => $( '.flickity-enabled' ).kallesDisableNavSlider(), 3000 );
        } );
    }
)
( window.jQuery );
