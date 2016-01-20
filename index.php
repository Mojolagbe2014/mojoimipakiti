<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "home");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$clientObj = new Sponsor($dbObj);
$quoteObj = new Quote($dbObj);
$calendar = new Calendar($dbObj);
$videoObj = new Video($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <style type="text/css">img.wp-smiley,img.emoji {display: inline !important;border: none !important;box-shadow: none !important;height: 1em !important;width: 1em !important;margin: 0 .07em !important;vertical-align: -0.1em !important;background: none !important;padding: 0 !important; }</style>
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='plugins/revslider/rs-plugin/css/settings1dc6.css?ver=4.6.5' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>.tp-caption a{color:#e05100;text-shadow:none; text-decoration:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>
    <link rel='stylesheet' id='wpProQuiz_front_style-css'  href='plugins/sfwd-lms/wp-pro-quiz/css/wpProQuiz_front.min4fde.css?ver=0.28' type='text/css' media='all' />
    <link rel='stylesheet' id='learndash_style-css'  href='plugins/sfwd-lms/assets/style274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'  href='plugins/woocommerce/assets/css/woocommerce-layout3575.css?ver=2.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='plugins/woocommerce/assets/css/woocommerce-smallscreen3575.css?ver=2.4.7' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'  href='plugins/woocommerce/assets/css/woocommerce3575.css?ver=2.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-Roboto-css'  href='http://fonts.googleapis.com/css608f.css?family=Roboto:100,100italic,300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-Love-Ya-Like-A-Sister-css'  href='http://fonts.googleapis.com/css1f9d.css?family=Love+Ya+Like+A+Sister:400&amp;subset=latin' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-fontello-style-css'  href='themes/education/css/fontello/css/fontello.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-main-style-css'  href='themes/education/style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-shortcodes-style-css'  href='themes/education/fw/shortcodes/shortcodes.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-animation-style-css'  href='themes/education/fw/css/core.animation.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-style-css'  href='themes/education/css/tribe-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='learndash-style-css'  href='themes/education/css/learndash-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-skin-style-css'  href='themes/education/skins/education/skin.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-custom-style-css'  href='themes/education/fw/css/custom-style.min.css' type='text/css' media='all' />
    <link href="css/additional-style.css" rel="stylesheet" type="text/css"/>
    <link rel='stylesheet' id='themerex-responsive-style-css'  href='themes/education/css/responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-skin-responsive-style-css'  href='themes/education/skins/education/skin-responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mediaelement-css'  href='js/mediaelement/mediaelementplayer.min0392.css?ver=2.17.0' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-mediaelement-css'  href='js/mediaelement/wp-mediaelement274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-customizer-style-css'  href='themes/education/fw/core/core.customizer/front.customizer.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css'  href='plugins/js_composer/assets/css/js_composere100.css?ver=4.7.2' type='text/css' media='all' />
    <script type='text/javascript' src='js/jquery/jqueryc1d8.js?ver=1.11.3'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
    <script type='text/javascript' src='plugins/revslider/rs-plugin/js/jquery.themepunch.tools.min1dc6.js?ver=4.6.5'></script>
    <script type='text/javascript' src='plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min1dc6.js?ver=4.6.5'></script>
    <script type='text/javascript' src='plugins/woocommerce/assets/js/frontend/add-to-cart.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='plugins/js_composer/assets/js/vendors/woocommerce-add-to-carte100.js?ver=4.7.2'></script>
    <script type='text/javascript' src='themes/education/skins/education/skin.customizer.min.js'></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            // CUSTOM AJAX CONTENT LOADING FUNCTION
            var ajaxRevslider = function(obj) {
                    var content = "";
                    data = {};
                    data.action = 'revslider_ajax_call_front';
                    data.client_action = 'get_slider_html';
                    data.token = '126276abf3';
                    data.type = obj.type;
                    data.id = obj.id;
                    data.aspectratio = obj.aspectratio;
                    // SYNC AJAX REQUEST
                    jQuery.ajax({
                            type:"post",
                            url:"<?php echo SITE_URL; ?>wp-admin/admin-ajax.php",
                            dataType: 'json',
                            data:data,
                            async:false,
                            success: function(ret, textStatus, XMLHttpRequest) {
                                    if(ret.success == true)
                                            content = ret.data;								
                            },
                            error: function(e) {
                                    console.log(e);
                            }
                    });

                     // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
                     return content;						 
            };

            // CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
            var ajaxRemoveRevslider = function(obj) {
                    return jQuery(obj.selector+" .rev_slider").revkill();
            };

            // EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
            var extendessential = setInterval(function() {
                    if (jQuery.fn.tpessential != undefined) {
                            clearInterval(extendessential);
                            if(typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
                                    jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:ajaxRevslider,killfunc:ajaxRemoveRevslider,openAnimationSpeed:0.3});   
                            }
                    }
            },30);
        });
    </script>
    <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
    <noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
    <link href="css/php-calendar.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/twitter.css" rel="stylesheet" type="text/css"/>
</head>

<body class="page page-id-1109 page-template-default themerex_body body_style_fullscreen body_filled theme_skin_education article_style_stretch layout_single-standard template_single-standard top_panel_style_dark top_panel_opacity_transparent top_panel_show top_panel_over menu_right user_menu_show sidebar_hide wpb-js-composer js-comp-ver-4.7.2 vc_responsive">
    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <?php include('includes/header.php'); ?>
            <?php include('includes/homepage-slider.php'); ?>

            <div class="page_content_wrap" >
                <div class="content">
                    <article class="itemscope post_item post_item_single post_featured_default post_format_standard post-1109 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
                    <section class="post_content" itemprop="articleBody">
                        <div class="sc_reviews alignright"><!-- #TRX_REVIEWS_PLACEHOLDER# --></div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper">
                                    <div class="sc_section" data-animation="animated zoomInUp normal">
                                        <div class="sc_content content_wrap" style="margin-top:3em !important;margin-bottom:3em !important;">
                                            <div class="columns_wrap sc_columns columns_fluid sc_columns_count_3">
                                                <div class="column-1_3 sc_column_item sc_column_item_1 odd first" style="text-align:center;">
                                                    <a href="<?php echo SITE_URL.'clients/'; ?>" class="sc_icon icon-graduation sc_icon_shape_round sc_icon_bg_menu menu_dark_color" style="font-size:5em; line-height: 1.2em;"></a>
                                                    <div class="sc_section" style="margin-top:1em !important;font-weight:400;">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                        <p><a class="menu_color" href="<?php echo SITE_URL.'clients/'; ?>">Our Clients</a><br /> We have trained individually and collectively employees of over 300 diverse businesses, spanning all sectors of the Nigerian economy since 2003</p> </div>
                                                    </div>
                                                    </div>
                                                </div><div class="column-1_3 sc_column_item sc_column_item_2 even" style="text-align:center;"><a href="<?php echo MEDIA_FILES_PATH1.'brochure/'.CourseBrochure::getCurrent($dbObj); ?>" class="sc_icon icon-attach-1 sc_icon_shape_round sc_icon_bg_menu menu_dark_color" style="font-size:5em; line-height: 1.2em;"></a>
                                                    <div class="sc_section" style="margin-top:1em !important;font-weight:400;">
                                                        <div class="wpb_text_column wpb_content_element ">
                                                            <div class="wpb_wrapper">
                                                            <p><a class="menu_color" href="<?php echo MEDIA_FILES_PATH1.'brochure/'.CourseBrochure::getCurrent($dbObj); ?>">Download Brochure</a><br /> Download our comprehensive brochure to view all our courses we offer at your convenience round the year and its free.</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><div class="column-1_3 sc_column_item sc_column_item_3 odd" style="text-align:center;">
                                                    <a href="<?php echo SITE_URL.'about/'; ?>" class="sc_icon icon-world-2 sc_icon_shape_round sc_icon_bg_menu menu_dark_color" style="font-size:5em; line-height: 1.2em;"></a>
                                                    <div class="sc_section" style="margin-top:1em !important;font-weight:400;">
                                                        <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><a class="menu_color" href="<?php echo SITE_URL.'about/'; ?>">Our Experience</a><br />Over the decade, we have worked individually and collectively with over three hundred diverse business, spanning all sectors of the Nigerian economy. </p> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper">
                                    <div class="sc_section accent_top rounded_large bg_tint_light" data-animation="animated zoomIn normal" style="background-color:#f4f7f9;">
                                        <div class="sc_section_overlay" style="">
                                            <div class="sc_section_content">
                                                <div class="sc_content content_wrap" style="margin-top:2.5em !important;margin-bottom:2.5em !important;">
                                                    <h2 class="sc_title sc_title_regular sc_align_center" style="margin-top:0px;margin-bottom:0.85em;text-align:center;">Courses Starting Soon</h2>
                                                    <div id="sc_blogger_1219813813" class="sc_blogger layout_courses_3 template_portfolio  sc_blogger_horizontal no_description">
                                                        <div class="isotope_wrap" data-columns="3">	
                                                            <?php 
                                                            foreach ($courseObj->fetchRaw("*", " status = 1 ", " RAND() LIMIT 6") as $course) {
                                                                $courseData = array('id' => 'id', 'name' => 'name', 'code' => 'code', 'image' => 'image', 'media' => 'media', 'amount' => 'amount', 'shortName' => 'short_name', 'category' => 'category', 'startDate' => 'start_date', 'endDate' => 'end_date', 'description' => 'description', 'status' => 'status', 'currency' => 'currency');
                                                                foreach ($courseData as $key => $value){
                                                                    switch ($key) { 
                                                                        case 'image': $courseObj->$key = MEDIA_FILES_PATH1.'course-image/'.$course[$value];break;
                                                                        case 'media': $courseObj->$key = MEDIA_FILES_PATH1.'course/'.$course[$value];break;
                                                                        case 'startDate': $dateParam = explode('-', $course[$value]);
                                                                                          $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                                                          $courseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';;
                                                                                          break;
                                                                        case 'endDate': $dateParam = explode('-', $course[$value]);
                                                                                          $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                                                          $courseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';;
                                                                                          break;
                                                                        default     :   $courseObj->$key = $course[$value]; break; 
                                                                    }
                                                                }
                                                            ?>
                                                            <div class="isotope_item isotope_item_courses isotope_item_courses_3 isotope_column_3						">
                                                                <div class="post_item post_item_courses post_item_courses_3 post_format_standard odd">
                                                                    <div class="post_content isotope_item_content ih-item colored square effect_dir left_to_right">
                                                                        <div class="post_featured img">
                                                                        <a href="<?php echo SITE_URL.'course/'.$courseObj->id.'/'.StringManipulator::slugify($courseObj->name).'/'; ?>"><img class="wp-post-image" width="400" height="400" alt="<?php echo $courseObj->name; ?>" src="<?php echo $courseObj->image; ?>"></a>								
                                                                        <h4 class="post_title"><a href="<?php echo SITE_URL.'course/'.$courseObj->id.'/'.StringManipulator::slugify($courseObj->name).'/'; ?>"><?php echo $courseObj->name; ?></a></h4>
                                                                        <div class="post_descr">
                                                                            <div class="post_price"><span class="post_price_value" style="font-size:14px;font-weight: bold"><?php echo $courseObj->currency.''. number_format($courseObj->amount, 2); ?></span></div>
                                                                        <div class="post_category"><a href="<?php echo SITE_URL.'category/'.$courseObj->category.'/'.StringManipulator::slugify(CourseCategory::getName($dbObj, $courseObj->category)).'/'; ?>"><?php echo CourseCategory::getName($dbObj, $courseObj->category); ?></a></div>
                                                                        </div>
                                                                        </div>

                                                                        <div class="post_info_wrap info"><div class="info-back">

                                                                        <h4 class="post_title"><a href="<?php echo SITE_URL.'course/'.$courseObj->id.'/'.StringManipulator::slugify($courseObj->name).'/'; ?>"><?php echo $courseObj->name; ?></a></h4>	
                                                                        <div class="post_descr">
                                                                            <p style="text-align:justify"><a href="<?php echo SITE_URL.'course/'.$courseObj->id.'/'.StringManipulator::slugify($courseObj->name).'/'; ?>"><?php echo StringManipulator::trimStringToFullWord(160, strip_tags($courseObj->description)); ?>..</a></p><div class="post_buttons">											<div class="post_button"><a href="<?php echo SITE_URL.'course/'.$courseObj->id.'/'.StringManipulator::slugify($courseObj->name).'/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_small">MORE</a></div>
                                                                        <div class="post_button"><a href="<?php echo SITE_URL.'course/'.$courseObj->id.'/'.StringManipulator::slugify($courseObj->name).'/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_small">BOOK NOW</a></div>
                                                                        </div>							</div>
                                                                        </div></div>	<!-- /.info-back /.info -->
                                                                    </div>				<!-- /.post_content -->
                                                                </div>	<!-- /.post_item -->
                                                            </div>						<!-- /.isotope_item -->
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo SITE_URL.'courses/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_menu sc_button_size_small aligncenter  sc_button_iconed icon-graduation" style="margin-top:1em;margin-bottom:4px;width:12em;">VIEW ALL COURSES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper">
                                    <div class="sc_section" data-animation="animated bounceInUp normal">
                                        <div class="sc_content content_wrap" style="margin-top:2.5em !important;margin-bottom:2.5em !important;">
                                            <div class="sc_section aligncenter" style="width:70%;">
                                                <h2 class="sc_title sc_title_regular" style="margin-top:0px;">Our Clients and Partners</h2>
                                                <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                <p>Our courses are built in partnership with technology leaders and are relevant to industry needs. </p>
                                                </div>
                                                </div>
                                            </div>
                                            <div id="sc_section_748132790" class="sc_section" style="margin-top:1.5em !important;margin-bottom:0px !important;height:75px;">
                                                <div id="sc_section_748132790_scroll" class="sc_scroll sc_scroll_horizontal swiper-slider-container scroll-container" style="height:75px;">
                                                    <div class="sc_scroll_wrapper swiper-wrapper">
                                                        <div class="sc_scroll_slide swiper-slide">
                                                            <?php 
                                                            $num =1; $addStyle = '';
                                                            foreach ($clientObj->fetchRaw("*", " status = 1 ", " RAND() ") as $partner) {
                                                                $partnerData = array('id' => 'id', 'name' => 'name', 'logo' => 'logo', 'product' => 'product', 'website' => 'website', 'image' => 'image', 'dateAdded' => 'date_added', 'description' => 'description');
                                                                foreach ($partnerData as $key => $value){
                                                                    switch ($key) { 
                                                                        case 'logo': $clientObj->$key = 'media/sponsor/'.$partner[$value];break;//
                                                                        case 'image': $clientObj->$key = MEDIA_FILES_PATH1.'sponsor-image/'.$partner[$value];break;
                                                                        default     :   $clientObj->$key = $partner[$value]; break; 
                                                                    }
                                                                }
                                                                if($num>1) { $addStyle = 'margin-left:4em !important;'; }
                                                                @$clientObj->logo = new ThumbNail($clientObj->logo, 80, 80);
                                                            ?>
                                                            <figure class="sc_image  alignleft sc_image_shape_square" style="margin-right:0px !important; <?php echo $addStyle; ?>" title="<?php echo $clientObj->name; ?>">
                                                                <a href="<?php echo $clientObj->website; ?>" target="_blank"><img src="<?php echo $clientObj->logo; ?>" alt="<?php echo $clientObj->name; ?>" /></a>
                                                            </figure>
                                                            <?php $num++; } ?>
                                                        </div>
                                                    </div>
                                                    <div id="sc_section_748132790_scroll_bar" class="sc_scroll_bar sc_scroll_bar_horizontal sc_section_748132790_scroll_bar"></div>
                                                        
                                                </div>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper">
                                    <div class="sc_line sc_line_style_solid" style="margin-top:0px;margin-bottom:0px;border-top-style:solid;"></div>
                                    <div class="sc_section" data-animation="animated flipInY normal">
                                        
                                        <div class="sc_content content_wrap" style="margin-top:2.5em !important;margin-bottom:2.5em !important;">
                                            <?php 
                                            foreach ($videoObj->fetchRaw("*", " 1=1 ", " RAND() LIMIT 1") as $video) {
                                                $videoData = array('id' => 'id', 'name' => 'name', 'video' => 'video', 'description' => 'description');
                                                foreach ($videoData as $key => $value){
                                                    switch ($key) { 
                                                        case 'video': $videoObj->$key = MEDIA_FILES_PATH1.'video/'.$video[$value];break;
                                                        default     :   $videoObj->$key = $video[$value]; break; 
                                                    }
                                                }
                                            ?>
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                                    <h3 class="sc_title sc_title_iconed sc_align_left" style="text-align:left;">
                                                        <span class="sc_title_icon sc_title_icon_top  sc_title_icon_medium icon-video-2"></span><?php echo $videoObj->name; ?>
                                                    </h3>
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper" style="margin-top:10px;">
                                                            <p><?php echo StringManipulator::trimStringToFullWord(160, strip_tags($videoObj->description)); ?>..</p>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo SITE_URL.'videos/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_mini  sc_button_iconed inherit" style="margin-top:1em;margin-bottom:4px;margin-left:4px;">BROWSE ALL</a>
                                                </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                                    <div class="sc_video_player sc_video_bordered" style="padding-top:4%;padding-right:3%;padding-bottom:23%;padding-left:13%;background-image: url(<?php echo SITE_URL; ?>uploads/2015/01/post_video_border.png);">
                                                        <div class="sc_video_frame" data-width="100%" data-height="647" style="width:100%;">
                                                            <video width="370" height="270" preload="metadata" controls><source src="<?php echo $videoObj->video; ?>" type="video/mp4"></video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="wpb_wrapper">
                                    <div class="sc_section accent_top rounded_large bg_tint_light" data-animation="animated fadeInUp normal" style="background-color:#f4f7f9;">
                                        <div class="sc_section_overlay" style="">
                                            <div class="sc_section_content">
                                                <div class="sc_content content_wrap" style="margin-top:2.5em !important;margin-bottom:2.5em !important;">
                                                    <h2 class="sc_title sc_title_regular sc_align_center" style="margin-top:0px;margin-bottom:0.85em;text-align:center;">Course Categories</h2>
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3">
                                                        <?php 
                                                        $num = 1; $numOrd = ''; $numClass = ''; $addStyle = '';
                                                        foreach ($categoryObj->fetchRaw("*", " 1=1 ", " RAND() LIMIT 3") as $category) {
                                                            $categoryData = array('id' => 'id', 'name' => 'name', 'image' => 'image', 'description' => 'description');
                                                            foreach ($categoryData as $key => $value){
                                                                switch ($key) { 
                                                                    case 'image': $categoryObj->$key = MEDIA_FILES_PATH1.'category/'.$category[$value];break;
                                                                    default     :   $categoryObj->$key = $category[$value]; break; 
                                                                }
                                                            }
                                                            if($num==1){$numOrd = 'first';}else{$numOrd = '';}
                                                            if($num%2>0){$numClass = 'odd';}else{$numClass = 'even';}
                                                            if($num==2){ $addStyle = 'text-align:center;';}else{$addStyle = '';}
                                                        ?><div class="column-1_3 sc_column_item sc_column_item_<?php echo $num.' '.$numClass.' '. $numOrd; ?>" style="width: 32.3333%;<?php echo $addStyle; ?>">
                                                            <div class="sc_price_block sc_price_block_style_<?php echo $num; ?>" style="width:100%;">
                                                                <div class="sc_price_block_title"><?php echo $categoryObj->name; ?></div>
                                                                <div class="sc_price_block_money">
                                                                    <div class="sc_price"><span class="sc_price_money"><?php echo Course::getSingleCategoryCount($dbObj, $categoryObj->id); ?></span></div> COURSE(S)
                                                                </div><div class="sc_price_block_description"><?php echo StringManipulator::trimStringToFullWord(160, strip_tags($categoryObj->description)); ?>..</div><div class="sc_price_block_link"><a href="<?php echo SITE_URL.'courses/category/'.$categoryObj->id.'/'.StringManipulator::slugify($categoryObj->name).'/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_small">VIEW COURSES</a></div></div></div>
                                                        <?php $num++; } ?>
                                                    </div>
                                                </div>
                                                <div><a href="<?php echo SITE_URL.'course-categories/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_menu sc_button_size_small aligncenter  sc_button_iconed icon-book-2" style="margin-top:1em;margin-bottom:4px;width:12em;"> ALL CATEGORIES</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> <!-- /section class="post_content" itemprop="articleBody" -->
                    </article> <!-- /article class="itemscope post_item post_item_single post_featured_default post_format_standard post-1109 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article" -->	
                    <section class="related_wrap related_wrap_empty"></section>
                </div> <!-- /div class="content" -->			
            </div>		
            <!-- /.page_content_wrap -->
            <?php include('includes/footer.php'); ?>
        </div>	<!-- /.page_wrap -->
    </div><!-- /.body_wrap -->

    <?php include('includes/settings-panel.php'); ?>
    <a href="#" class="scroll_to_top icon-up-2" title="Scroll to top"></a>

    <div class="custom_html_section"></div>

    <script type="text/javascript">jQuery(document).ready(function() {THEMEREX_GLOBALS["strings"] = {bookmark_add: "Add the bookmark",bookmark_added:		"Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab \'Bookmarks\'",bookmark_del: 		"Delete this bookmark",bookmark_title:		"Enter bookmark title",bookmark_exists:		"Current page already exists in the bookmarks list",search_error:		"Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.",email_confirm:		"On the e-mail address <b>%s</b> we sent a confirmation email.<br>Please, open it and click on the link.",reviews_vote:		"Thanks for your vote! New average rating is:",reviews_error:		"Error saving your vote! Please, try again later.",error_like:			"Error saving your like! Please, try again later.",error_global:		"Global error text",name_empty:			"The name can\'t be empty",name_long:			"Too long name",email_empty:			"Too short (or empty) email address",email_long:			"Too long email address",email_not_valid:		"Invalid email address",subject_empty:		"The subject can\'t be empty",subject_long:		"Too long subject",text_empty:			"The message text can\'t be empty",text_long:			"Too long message text",send_complete:		"Send message complete!",send_error:			"Transmit failed!",login_empty:			"The Login field can\'t be empty",login_long:			"Too long login field",login_success:		"Login success! The page will be reloaded in 3 sec.",login_failed:		"Login failed!",password_empty:		"The password can\'t be empty and shorter then 4 characters",password_long:		"Too long password",password_not_equal:	"The passwords in both fields are not equal",registration_success:"Registration success! Please log in!",registration_failed:	"Registration failed!",geocode_error:		"Geocode was not successful for the following reason:",googlemap_not_avail:	"Google map API not available!",editor_save_success:	"Post content saved!",editor_save_error:	"Error saving post data!",editor_delete_post:	"You really want to delete the current post?",editor_delete_post_header:"Delete post",editor_delete_success:	"Post deleted!",editor_delete_error:		"Error deleting post!",editor_caption_cancel:	"Cancel",editor_caption_close:	"Close"};});</script><script type="text/javascript">jQuery(document).ready(function() {THEMEREX_GLOBALS['ajax_url']			= '../wp-admin/admin-ajax.html';THEMEREX_GLOBALS['ajax_nonce']		= '134352e9af';THEMEREX_GLOBALS['ajax_nonce_editor'] = 'f141f3b404';THEMEREX_GLOBALS['site_url']			= '../index.html';THEMEREX_GLOBALS['vc_edit_mode']		= false;THEMEREX_GLOBALS['theme_font']		= '';THEMEREX_GLOBALS['theme_skin']		= 'education';THEMEREX_GLOBALS['theme_skin_bg']	= '';THEMEREX_GLOBALS['slider_height']	= 630;THEMEREX_GLOBALS['system_message']	= {message: '',status: '',header: ''};THEMEREX_GLOBALS['user_logged_in']	= false;THEMEREX_GLOBALS['toc_menu']		= 'fixed';THEMEREX_GLOBALS['toc_menu_home']	= false;THEMEREX_GLOBALS['toc_menu_top']	= false;THEMEREX_GLOBALS['menu_fixed']		= true;THEMEREX_GLOBALS['menu_relayout']	= 960;THEMEREX_GLOBALS['menu_responsive']	= 800;THEMEREX_GLOBALS['menu_slider']     = true;THEMEREX_GLOBALS['demo_time']		= 0;THEMEREX_GLOBALS['media_elements_enabled'] = true;THEMEREX_GLOBALS['ajax_search_enabled'] 	= true;THEMEREX_GLOBALS['ajax_search_min_length']	= 3;THEMEREX_GLOBALS['ajax_search_delay']		= 200;THEMEREX_GLOBALS['css_animation']      = true;THEMEREX_GLOBALS['menu_animation_in']  = 'bounceIn';THEMEREX_GLOBALS['menu_animation_out'] = 'fadeOut';THEMEREX_GLOBALS['popup_engine']	= 'pretty';THEMEREX_GLOBALS['popup_gallery']	= true;THEMEREX_GLOBALS['email_mask']		= '^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@[a-z0-9_\-]+(\.[a-z0-9_\-]+)*\.[a-z]{2,6}$';THEMEREX_GLOBALS['contacts_maxlength']	= 1000;THEMEREX_GLOBALS['comments_maxlength']	= 1000;THEMEREX_GLOBALS['remember_visitors_settings']	= false;THEMEREX_GLOBALS['admin_mode']			= false;THEMEREX_GLOBALS['isotope_resize_delta']	= 0.3;THEMEREX_GLOBALS['error_message_box']	= null;THEMEREX_GLOBALS['viewmore_busy']		= false;THEMEREX_GLOBALS['video_resize_inited']	= false;THEMEREX_GLOBALS['top_panel_height']		= 0;});</script><script type="text/javascript">jQuery(document).ready(function() {if (THEMEREX_GLOBALS['theme_font']=='') THEMEREX_GLOBALS['theme_font'] = 'Roboto';THEMEREX_GLOBALS['link_color'] = '#f55c6d';THEMEREX_GLOBALS['menu_color'] = '#26c3d6';THEMEREX_GLOBALS['user_color'] = '#2d3e50';});</script><link rel='stylesheet' id='themerex-messages-style-css'  href='themes/education/fw/js/core.messages/core.messages.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='sfwd_front_css-css'  href='plugins/sfwd-lms/assets/front274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sfwd_template_css-css'  href='plugins/sfwd-lms/templates/learndash_template_style274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-portfolio-style-css'  href='themes/education/fw/css/core.portfolio.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-swiperslider-style-css'  href='themes/education/fw/js/swiper/idangerous.swiper.min.css' type='text/css' media='all' />
    <script type='text/javascript' src='plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
    <script type='text/javascript' src='plugins/woocommerce/assets/js/frontend/woocommerce.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
    <script type='text/javascript' src='plugins/woocommerce/assets/js/frontend/cart-fragments.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='themes/education/fw/js/superfish.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/js/jquery.slidemenu.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/js/core.utils.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/js/core.init.min.js'></script>
    <script type='text/javascript' src='js/mediaelement/mediaelement-and-player.min0392.js?ver=2.17.0'></script>
    <script type='text/javascript' src='js/mediaelement/wp-mediaelement274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='js/comment-reply.min274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='themes/education/fw/core/core.customizer/front.customizer.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/js/core.messages/core.messages.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/shortcodes/shortcodes.min.js'></script>
    <script type='text/javascript' src='plugins/sfwd-lms/templates/learndash_template_script274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='plugins/js_composer/assets/js/js_composer_fronte100.js?ver=4.7.2'></script>
    <script type='text/javascript' src='plugins/js_composer/assets/lib/bower/isotope/dist/isotope.pkgd.mine100.js?ver=4.7.2'></script>
    <script type='text/javascript' src='themes/education/fw/js/hover/jquery.hoverdir.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/js/swiper/idangerous.swiper-2.7.min.js'></script>
    <script type='text/javascript' src='themes/education/fw/js/swiper/idangerous.swiper.scrollbar-2.4.min.js'></script>
    <script type="text/javascript">/* <![CDATA[ */(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();/* ]]> */ </script>
</body>
</html>