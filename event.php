<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "event-detail");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$eventObj = new Event($dbObj);
$quoteObj = new Quote($dbObj);
$eventTime = '';

include('includes/other-settings.php');
require('includes/page-properties.php');

//get the course id; if failed redirect to course-categories page
$thisEventId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : $thisPage->redirectTo('index');
foreach ($eventObj->fetchRaw("*", " id = $thisEventId ") as $event) {
    $eventData = array('id' => 'id', 'name' => 'name', 'image' => 'image', 'description' => 'description', 'location' => 'location',  'dateTime' => 'date_time', 'status' => 'status' );
    foreach ($eventData as $key => $value){
        switch ($key) { 
            case 'image': $eventObj->$key = MEDIA_FILES_PATH1.'event/'.$event[$value];break;
            case 'status': if($event[$value]==0){$thisPage->redirectTo('index');}break;
            case 'dateTime':    $dateTimeParam = explode(' ', $event[$value]);
                                $eventTime = $dateTimeParam[1];
                                $dateParam = explode('/', $dateTimeParam[0]);
                                $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                $eventObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';
                                break;
            default     :   $eventObj->$key = $event[$value]; break; 
        }
    }
}
//Override page-properties
$thisPage->title = StringManipulator::trimStringToFullWord(62, stripslashes(strip_tags($eventObj->name." - ". WEBSITE_AUTHOR)));
$thisPage->description = StringManipulator::trimStringToFullWord(150, trim(stripslashes(strip_tags($eventObj->description))));
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <style type="text/css">img.wp-smiley,img.emoji {display: inline !important;border: none !important;box-shadow: none !important;height: 1em !important;width: 1em !important;margin: 0 .07em !important;vertical-align: -0.1em !important;background: none !important;padding: 0 !important; }</style>
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='<?php echo SITE_URL; ?>plugins/revslider/rs-plugin/css/settings1dc6.css?ver=4.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-prettyphoto-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/js/prettyphoto/css/prettyPhoto.min.css' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>.tp-caption a{color:#e05100;text-shadow:none; text-decoration:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>
    <link rel='stylesheet' id='wpProQuiz_front_style-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/wp-pro-quiz/css/wpProQuiz_front.min4fde.css?ver=0.28' type='text/css' media='all' />
    <link rel='stylesheet' id='learndash_style-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/assets/style274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce_prettyPhoto_css-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/prettyPhoto274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce-layout3575.css?ver=2.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce-smallscreen3575.css?ver=2.4.7' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce3575.css?ver=2.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-Roboto-css'  href='<?php echo SITE_URL; ?>http://fonts.googleapis.com/css608f.css?family=Roboto:100,100italic,300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-Love-Ya-Like-A-Sister-css'  href='<?php echo SITE_URL; ?>http://fonts.googleapis.com/css1f9d.css?family=Love+Ya+Like+A+Sister:400&amp;subset=latin' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-fontello-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/fontello/css/fontello.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-main-style-css'  href='<?php echo SITE_URL; ?>themes/education/style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-shortcodes-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/shortcodes/shortcodes.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-animation-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/css/core.animation.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-woo-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/woo-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/tribe-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='learndash-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/learndash-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-skin-style-css'  href='<?php echo SITE_URL; ?>themes/education/skins/education/skin.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-custom-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/css/custom-style.min.css' type='text/css' media='all' />
    <link href="<?php echo SITE_URL; ?>css/additional-style.css" rel="stylesheet" type="text/css"/>
    <link rel='stylesheet' id='themerex-responsive-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-skin-responsive-style-css'  href='<?php echo SITE_URL; ?>themes/education/skins/education/skin-responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mediaelement-css'  href='<?php echo SITE_URL; ?>js/mediaelement/mediaelementplayer.min0392.css?ver=2.17.0' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-mediaelement-css'  href='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-customizer-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/core/core.customizer/front.customizer.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css'  href='<?php echo SITE_URL; ?>plugins/js_composer/assets/css/js_composere100.css?ver=4.7.2' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jqueryc1d8.js?ver=1.11.3'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/revslider/rs-plugin/js/jquery.themepunch.tools.min1dc6.js?ver=4.6.5'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min1dc6.js?ver=4.6.5'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/frontend/add-to-cart.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/js_composer/assets/js/vendors/woocommerce-add-to-carte100.js?ver=4.7.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/skins/education/skin.customizer.min.js'></script>
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
    <style>.menu_user_contact_area a{color:#1EAACE}.menu_user_contact_area a:hover{color:#F55C6D;}.inactive{background:#ccc;cursor: not-allowed}.text-center{text-align: center;}</style>
    <link rel='stylesheet' id='sfwd_front_css-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/assets/front274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sfwd_template_css-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/templates/learndash_template_style274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-swiperslider-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/js/swiper/idangerous.swiper.min.css' type='text/css' media='all' />
    <link href="<?php echo SITE_URL; ?>css/facebox.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/twitter.css" rel="stylesheet" type="text/css"/>
<!--    <script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>-->
    <script src="<?php echo SITE_URL; ?>js/jquery.tools.min.js" type="text/javascript"></script>
</head>

<body class="single single-product postid-647 themerex_body body_style_wide body_filled theme_skin_education article_style_boxed layout_single-standard template_single-standard top_panel_style_light top_panel_opacity_solid top_panel_show top_panel_above menu_right user_menu_show sidebar_show sidebar_right woocommerce woocommerce-page wpb-js-composer js-comp-ver-4.7.2 vc_responsive">
    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <?php include('includes/header.php'); ?>
            
            <?php include('includes/bread-crumb.php'); ?>

            <div class="page_content_wrap">
                <div class="content_wrap">
                    <div class="content">
                        <article class="post_item post_item_single post_item_product">
                            <div itemscope itemtype="http://schema.org/Product" id="product-647" class="post-647 product type-product status-publish has-post-thumbnail product_cat-marketing-and-seo product_tag-courses product_tag-marketing product_tag-seo shipping-taxable purchasable product-type-simple product-cat-marketing-and-seo product-tag-courses product-tag-marketing product-tag-seo instock">
                                <div class="images">
                                    <a href="<?php echo $eventObj->image; ?>" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto"><img width="350" height="400" src="<?php echo $eventObj->image; ?>" class="attachment-shop_single wp-post-image" alt="<?php echo $eventObj->name; ?>" title="<?php echo $eventObj->name; ?>" /></a>
                                </div>

                                <div class="summary entry-summary">
                                    <div class="product_meta">
                                        <span class="posted_in">Date: <a href="javascript:;" rel="tag"><?php echo $eventObj->dateTime; ?></a></span>
                                        <span class="product_id">Time: <span><a href="javascript:;"><?php echo $eventTime; ?></a></span></span>
                                        <span class="product_id">Venue/Location: <span><a href="https://www.google.com?q=<?php echo $eventObj->location; ?>"><?php echo $eventObj->location; ?></a></span></span>
                                        <span class="product_id">Email: <span><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a></span></span>
                                        <span class="product_id">Hotline: <span><a href="sms:<?php echo COMPANY_HOTLINE; ?>"><?php echo COMPANY_HOTLINE; ?></a></span></span>
                                    </div>
                                </div><!-- .summary -->

                                <div class="woocommerce-tabs wc-tabs-wrapper">
                                    <ul class="tabs wc-tabs">
                                        <li class="description_tab">
                                            <a href="#tab-description">Description</a>
                                        </li>
                                    </ul>
                                    <div class="panel entry-content wc-tab" id="tab-description">
                                        <p><?php echo $eventObj->description; ?></p>
                                    </div>
                                </div>
                            </div><!-- #product-647 -->
                        </article>	<!-- .post_item -->
                    </div> <!-- /div class="content" -->	
                    
                    <?php include('includes/sidebar.php'); ?>
                </div> <!-- /div class="content_wrap" -->			
            </div>		<!-- /.page_content_wrap -->
            <?php include('includes/footer.php'); ?>
        </div>	<!-- /.page_wrap -->
    </div>		<!-- /.body_wrap -->

    <?php include('includes/settings-panel.php'); ?>
    <a href="#" class="scroll_to_top icon-up-2" title="Scroll to top"></a>
    <div id="facebox" class="et_pb_module et_pb_contact_form_container clearfix  et_pb_contact_form_0">
        <div class="et_pb_contact">
            <h4 class="et_pb_contact_main_title text-center">Book for <?php echo $eventObj->name; ?></h4>
            <form action="" method="POST">
                <div class="et_pb_contact_left">
                    <input type="hidden" name="course" value="<?php echo $eventObj->name; ?>"/>
                    <p class="clearfix"><input name="name" type="text" value="" placeholder="Full Name" size="44" required /></p>
                    <p class="clearfix"><input name="email" type="email" placeholder="Enter your email" size="44" required /></p>
                    <p class="clearfix"><input name="phone" type="text" placeholder="Enter your phone number" size="44" required /></p>
                    <p class="clearfix"><input name="address" type="text" placeholder="Enter your address" size="44" required /></p>
                    <p class="clearfix"><textarea name="message" placeholder="Enter your message" cols="42" required="required"></textarea></p>
                    <input type="submit" name="submit" value="Book Now"/> &nbsp; &nbsp; &nbsp; <input type="button" class="close btn btn-danger btn-sm" value="Close"/>
                </div>

            </form>
        </div>
    </div>
    

    <div class="custom_html_section"></div>
         <script src="<?php echo SITE_URL; ?>js/jquery/jqueryc1d8.js?ver=1.11.3" type="text/javascript"></script>

    <script type="text/javascript">jQuery(document).ready(function() {THEMEREX_GLOBALS["strings"] = {bookmark_add: 		"Add the bookmark",bookmark_added:		"Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab \'Bookmarks\'",bookmark_del: 		"Delete this bookmark",bookmark_title:		"Enter bookmark title",bookmark_exists:		"Current page already exists in the bookmarks list",search_error:		"Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.",email_confirm:		"On the e-mail address <b>%s</b> we sent a confirmation email.<br>Please, open it and click on the link.",reviews_vote:		"Thanks for your vote! New average rating is:",reviews_error:		"Error saving your vote! Please, try again later.",error_like:			"Error saving your like! Please, try again later.",error_global:		"Global error text",name_empty:			"The name can\'t be empty",name_long:			"Too long name",email_empty:			"Too short (or empty) email address",email_long:			"Too long email address",email_not_valid:		"Invalid email address",subject_empty:		"The subject can\'t be empty",subject_long:		"Too long subject",text_empty:			"The message text can\'t be empty",text_long:			"Too long message text",send_complete:		"Send message complete!",send_error:			"Transmit failed!",login_empty:			"The Login field can\'t be empty",login_long:			"Too long login field",login_success:		"Login success! The page will be reloaded in 3 sec.",login_failed:		"Login failed!",password_empty:		"The password can\'t be empty and shorter then 4 characters",password_long:		"Too long password",password_not_equal:	"The passwords in both fields are not equal",registration_success:"Registration success! Please log in!",registration_failed:	"Registration failed!",geocode_error:		"Geocode was not successful for the following reason:",googlemap_not_avail:	"Google map API not available!",editor_save_success:	"Post content saved!",editor_save_error:	"Error saving post data!",editor_delete_post:	"You really want to delete the current post?",editor_delete_post_header:"Delete post",editor_delete_success:	"Post deleted!",editor_delete_error:		"Error deleting post!",editor_caption_cancel:	"Cancel",editor_caption_close:	"Close"};});</script><script type="text/javascript">jQuery(document).ready(function() {THEMEREX_GLOBALS['ajax_url']			= '../../wp-admin/admin-ajax.html';THEMEREX_GLOBALS['ajax_nonce']		= '134352e9af';THEMEREX_GLOBALS['ajax_nonce_editor'] = 'f141f3b404';THEMEREX_GLOBALS['site_url']			= '../../index.html';THEMEREX_GLOBALS['vc_edit_mode']		= false;THEMEREX_GLOBALS['theme_font']		= '';THEMEREX_GLOBALS['theme_skin']		= 'education';THEMEREX_GLOBALS['theme_skin_bg']	= '';THEMEREX_GLOBALS['slider_height']	= 100;THEMEREX_GLOBALS['system_message']	= {message: '',status: '',header: ''};THEMEREX_GLOBALS['user_logged_in']	= false;THEMEREX_GLOBALS['toc_menu']		= 'fixed';THEMEREX_GLOBALS['toc_menu_home']	= false;THEMEREX_GLOBALS['toc_menu_top']	= false;THEMEREX_GLOBALS['menu_fixed']		= true;THEMEREX_GLOBALS['menu_relayout']	= 960;THEMEREX_GLOBALS['menu_responsive']	= 800;THEMEREX_GLOBALS['menu_slider']     = true;THEMEREX_GLOBALS['demo_time']		= 0;THEMEREX_GLOBALS['media_elements_enabled'] = true;THEMEREX_GLOBALS['ajax_search_enabled'] 	= true;THEMEREX_GLOBALS['ajax_search_min_length']	= 3;THEMEREX_GLOBALS['ajax_search_delay']		= 200;THEMEREX_GLOBALS['css_animation']      = true;THEMEREX_GLOBALS['menu_animation_in']  = 'bounceIn';THEMEREX_GLOBALS['menu_animation_out'] = 'fadeOut';THEMEREX_GLOBALS['popup_engine']	= 'pretty';THEMEREX_GLOBALS['popup_gallery']	= true;THEMEREX_GLOBALS['email_mask']		= '^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@[a-z0-9_\-]+(\.[a-z0-9_\-]+)*\.[a-z]{2,6}$';THEMEREX_GLOBALS['contacts_maxlength']	= 1000;THEMEREX_GLOBALS['comments_maxlength']	= 1000;THEMEREX_GLOBALS['remember_visitors_settings']	= false;THEMEREX_GLOBALS['admin_mode']			= false;THEMEREX_GLOBALS['isotope_resize_delta']	= 0.3;THEMEREX_GLOBALS['error_message_box']	= null;THEMEREX_GLOBALS['viewmore_busy']		= false;THEMEREX_GLOBALS['video_resize_inited']	= false;THEMEREX_GLOBALS['top_panel_height']		= 0;});</script><script type="text/javascript">jQuery(document).ready(function() {if (THEMEREX_GLOBALS['theme_font']=='') THEMEREX_GLOBALS['theme_font'] = 'Roboto';THEMEREX_GLOBALS['link_color'] = '#1eaace';THEMEREX_GLOBALS['menu_color'] = '#1dbb90';THEMEREX_GLOBALS['user_color'] = '#ffb20e';});</script><link rel='stylesheet' id='themerex-messages-style-css'  href='themes/education/fw/js/core.messages/core.messages.min.css' type='text/css' media='all' />
    
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/prettyphoto/jquery.prettyPhoto.minca7f.js?ver=no-compose'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min005e.js?ver=3.1.6'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.init.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript'>/* <![CDATA[ */ var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes"}; /* ]]> */ </script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/frontend/single-product.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/frontend/woocommerce.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/frontend/cart-fragments.min3575.js?ver=2.4.7'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/superfish.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/jquery.slidemenu.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/core.reviews.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/core.utils.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/core.init.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/mediaelement-and-player.min0392.js?ver=2.17.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/comment-reply.min274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/core/core.customizer/front.customizer.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/core.messages/core.messages.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/shortcodes/shortcodes.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/sfwd-lms/templates/learndash_template_script274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/swiper/idangerous.swiper-2.7.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/education/fw/js/swiper/idangerous.swiper.scrollbar-2.4.min.js'></script>
    <script type="text/javascript">/* <![CDATA[ */(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();/* ]]> */ </script>
    <?php if(!empty($msg)) {  $swalTitle = 'Message Sent!'; if($msgStatus!='success'){ $swalTitle = 'Message Not Sent!';}     ?>
    <script src="<?php echo SITE_URL; ?>sweet-alert/sweetalert.min.js" type="text/javascript"></script>
    <script>
        swal({
            title: '<?php echo $swalTitle; ?>',
            text: '<?php echo $msg; ?>',
            confirmButtonText: "Okay",
            customClass: 'facebook',
            html: true,
            type: '<?php echo $msgStatus; ?>'
        });
    </script>
    <?php  $msg =''; $msgStatus ='';  } ?>
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            jQuery("#book-now").click(function() {
                $("#facebox").overlay().load();
            });
            // select the overlay element - and "make it an overlay"
            $("#facebox").overlay({
                top: 80,// custom top position
                mask: {// some mask tweaks suitable for facebox-looking dialogs
                color: '#000',// you might also consider a "transparent" color for the mask
                loadSpeed: 200,// load mask a little faster
                opacity: 0.5 // very transparent
                },
                closeOnClick: true,// disable this for modal dialog-type of overlays
                load: false // load it immediately after the construction
            });
        });	
    </script>
    
</body>
</html>