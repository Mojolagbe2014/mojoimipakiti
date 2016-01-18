<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "course-detail");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$courseObj = new Course($dbObj);
$categoryObj = new CourseCategory($dbObj);
$clientObj = new Sponsor($dbObj);
$quoteObj = new Quote($dbObj);
$calendar = new Calendar($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <style type="text/css">img.wp-smiley,img.emoji {display: inline !important;border: none !important;box-shadow: none !important;height: 1em !important;width: 1em !important;margin: 0 .07em !important;vertical-align: -0.1em !important;background: none !important;padding: 0 !important; }</style>
    <link rel='stylesheet' id='themerex-prettyphoto-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/js/prettyphoto/css/prettyPhoto.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='<?php echo SITE_URL; ?>plugins/revslider/rs-plugin/css/settings1dc6.css?ver=4.6.5' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>.tp-caption a{color:#e05100;text-shadow:none; text-decoration:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>
    <link rel='stylesheet' id='wpProQuiz_front_style-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/wp-pro-quiz/css/wpProQuiz_front.min4fde.css?ver=0.28' type='text/css' media='all' />
    <link rel='stylesheet' id='learndash_style-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/assets/style274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce_prettyPhoto_css-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/prettyPhoto274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce-layout3575.css?ver=2.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce-smallscreen3575.css?ver=2.4.7' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce3575.css?ver=2.4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-Roboto-css'  href='http://fonts.googleapis.com/css608f.css?family=Roboto:100,100italic,300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-Love-Ya-Like-A-Sister-css'  href='http://fonts.googleapis.com/css1f9d.css?family=Love+Ya+Like+A+Sister:400&amp;subset=latin' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-fontello-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/fontello/css/fontello.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-main-style-css'  href='<?php echo SITE_URL; ?>themes/education/style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-shortcodes-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/shortcodes/shortcodes.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-animation-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/css/core.animation.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-woo-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/woo-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/tribe-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='learndash-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/learndash-style.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-skin-style-css'  href='<?php echo SITE_URL; ?>themes/education/skins/education/skin.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-custom-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/css/custom-style.min.css' type='text/css' media='all' />
    <style id='themerex-custom-style-inline-css' type='text/css'>.menu_main_wrap .logo{margin-top:33px}</style>
    <link rel='stylesheet' id='themerex-responsive-style-css'  href='<?php echo SITE_URL; ?>themes/education/css/responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-skin-responsive-style-css'  href='<?php echo SITE_URL; ?>themes/education/skins/education/skin-responsive.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mediaelement-css'  href='<?php echo SITE_URL; ?>js/mediaelement/mediaelementplayer.min0392.css?ver=2.17.0' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-mediaelement-css'  href='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-customizer-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/core/core.customizer/front.customizer.min.css' type='text/css' media='all' />
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

    // obj.type : Post Type
    // obj.id : ID of Content to Load
    // obj.aspectratio : The Aspect Ratio of the Container / Media
    // obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content

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
    url:"http://education.themerex.net/wp-admin/admin-ajax.php",
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
    // type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
    // func: the Function Name which is Called once the Item with the Post Type has been clicked
    // killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
    // openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
    }
    }
    },30);
    });
    </script>
    <style>.menu_user_contact_area a{color:#1EAACE}.menu_user_contact_area a:hover{color:#F55C6D;}.inactive{background:#ccc;cursor: not-allowed}.text-center{text-align: center;}</style>
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
                            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                                <a href="index.html">Home</a>&nbsp;&#47;&nbsp;
                                <a href="product-category/courses/index.html">Courses</a>&nbsp;&#47;&nbsp;
                                <a href="product-category/courses/marketing-and-seo/index.html">Marketing and SEO</a>&nbsp;&#47;&nbsp;Video Training for Microsoft products and technologies
                            </nav>
                            <div itemscope itemtype="http://schema.org/Product" id="product-647" class="post-647 product type-product status-publish has-post-thumbnail product_cat-marketing-and-seo product_tag-courses product_tag-marketing product_tag-seo shipping-taxable purchasable product-type-simple product-cat-marketing-and-seo product-tag-courses product-tag-marketing product-tag-seo instock">
                                <div class="images">
                                    <a href="<?php echo SITE_URL; ?>uploads/2014/10/masonry_13.jpg" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto"><img width="350" height="400" src="<?php echo SITE_URL; ?>uploads/2014/10/masonry_13-350x400.jpg" class="attachment-shop_single wp-post-image" alt="masonry_13" title="masonry_13" /></a>
                                </div>

                                <div class="summary entry-summary">
                                    <h1 itemprop="name" class="product_title entry-title">Video Training for Microsoft products and technologies</h1>
                                    <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                        <div class="star-rating" title="Rated 5.00 out of 5">
                                                <span style="width:100%">
                                                        <strong itemprop="ratingValue" class="rating">5.00</strong> out of <span itemprop="bestRating">5</span>				based on <span itemprop="ratingCount" class="rating">1</span> customer rating			</span>
                                        </div>
                                        <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span itemprop="reviewCount" class="count">1</span> customer review)</a>	</div>

                                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                                    <p class="price"><span class="amount">&#36;150.00</span></p>

                                    <meta itemprop="price" content="150" />
                                    <meta itemprop="priceCurrency" content="USD" />
                                    <link itemprop="availability" href="http://schema.org/InStock" />

                                    </div>
                                    <div itemprop="description">
                                    <p>Etiam diam risus, dictum sit amet massa nec, tristique euismod dui. Phasellus risus nisl, suscipit iaculis felis sed, volutpat tincidunt lectus.</p>
                                    </div>

                                    <form class="cart" method="post" enctype='multipart/form-data'>

                                        <div class="quantity"><input type="number" step="1" min="1"  name="quantity" value="1" title="Qty" class="input-text qty text" size="4" /></div>

                                        <input type="hidden" name="add-to-cart" value="647" />

                                        <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>

                                                </form>


                                    <div class="product_meta">



                                    <span class="posted_in">Category: <a href="product-category/courses/marketing-and-seo/index.html" rel="tag">Marketing and SEO</a></span>
                                    <span class="tagged_as">Tags: <a href="product-tag/courses/index.html" rel="tag">courses</a>, <a href="product-tag/marketing/index.html" rel="tag">marketing</a>, <a href="product-tag/seo/index.html" rel="tag">seo</a></span>
                                    <span class="product_id">Product ID: <span>647</span></span>
                                    </div>


                                </div><!-- .summary -->


                                <div class="woocommerce-tabs wc-tabs-wrapper">
                                    <ul class="tabs wc-tabs">
                                                                            <li class="description_tab">
                                                            <a href="#tab-description">Description</a>
                                                    </li>
                                                                            <li class="reviews_tab">
                                                            <a href="#tab-reviews">Reviews (1)</a>
                                                    </li>
                                                            </ul>
                                    <div class="panel entry-content wc-tab" id="tab-description">

                                        <h2>Product Description</h2>

                                        <p>Praesent sit amet est urna. Nam id leo massa. Cras at condimentum nisi, vulputate ultrices turpis. Nunc finibus vestibulum dui a fringilla. Maecenas maximus in massa sit amet maximus. Fusce facilisis nunc neque, ac dapibus dui elementum non. Curabitur sagittis elementum magna ac laoreet. Etiam diam risus, dictum sit amet massa nec, tristique euismod dui. Phasellus risus nisl, suscipit iaculis felis sed, volutpat tincidunt lectus. Vestibulum nisl tellus, pellentesque id sagittis a, imperdiet lacinia massa. Nam scelerisque, augue in condimentum scelerisque, augue purus dictum lectus, in facilisis ex tortor sed erat. Cras tincidunt ligula vel augue dignissim molestie. Vestibulum fermentum molestie augue hendrerit pellentesque. </p>
                                    </div>
                                    <div class="panel entry-content wc-tab" id="tab-reviews">
                                        <div id="reviews">
                                            <div id="comments">
                                                <h2>1 review for Video Training for Microsoft products and technologies</h2>
                                                <ol class="commentlist">
                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment byuser comment-author-trx_admin bypostauthor even thread-even depth-1" id="li-comment-11">

                                <div id="comment-11" class="comment_container">

                                    <img alt='' src='http://2.gravatar.com/avatar/8979720d3c48d311027d086f6e15c72b?s=60&amp;d=mm&amp;r=g' srcset='http://2.gravatar.com/avatar/8979720d3c48d311027d086f6e15c72b?s=120&amp;d=mm&amp;r=g 2x' class='avatar avatar-60 photo' height='60' width='60' />
                                    <div class="comment-text">


                                                    <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="Rated 5 out of 5">
                                                            <span style="width:100%"><strong itemprop="ratingValue">5</strong> out of 5</span>
                                                    </div>



                                                    <p class="meta">
                                                            <strong itemprop="author">TRX_admin</strong> &ndash; <time itemprop="datePublished" datetime="2015-02-13T09:07:34+00:00">February 13, 2015</time>:
                                                    </p>


                                            <div itemprop="description" class="description"><p>Aenean et mi ultrices, luctus sapien ut, luctus nulla. Proin pulvinar erat at urna fermentum, et vestibulum enim porttitor. Etiam vehicula ligula eu mi mollis molestie. Aliquam rutrum in mauris vel posuere. Praesent at dapibus odio. Fusce vitae nisi lectus. Aenean fermentum vehicula tellus, eu volutpat turpis. Cras et sapien consectetur, scelerisque nulla ut, dignissim urna. Nam laoreet diam et lorem viverra tincidunt.</p>
                                </div>
                                    </div>
                                </div>
                                </li><!-- #comment-## -->
                                            </ol>
                                            </div>

                                            <div id="review_form_wrapper">
                                                <div id="review_form">
                                                    <div id="respond" class="comment-respond">
                                                        <h3 id="reply-title" class="comment-reply-title">Add a review 
                                                            <small>
                                                                <a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a>
                                                            </small>
                                                        </h3>
                                                        <form action="http://education.themerex.net/wp-comments-post.php" method="post" id="commentform" class="comment-form">
                                                                                                                                                                                                                                    <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true" /></p>
                                <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
                                                                                                                    <p class="comment-form-rating"><label for="rating">Your Rating</label><select name="rating" id="rating">
                                                                            <option value="">Rate&hellip;</option>
                                                                            <option value="5">Perfect</option>
                                                                            <option value="4">Good</option>
                                                                            <option value="3">Average</option>
                                                                            <option value="2">Not that bad</option>
                                                                            <option value="1">Very Poor</option>
                                                                    </select></p><p class="comment-form-comment"><label for="comment">Your Review</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>						
                                                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Submit" /> <input type='hidden' name='comment_post_ID' value='647' id='comment_post_ID' />
                                <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                </p>					</form>
                                                                            </div><!-- #respond -->
                                                                    </div>
                                    </div>


                                <div class="clear"></div>
                                </div>
                                            </div>
                                </div>


                                <div class="related products">

                                    <h2>Related Products</h2>

                                    <ul class="products">

                                                    <li class="first post-702 product type-product status-publish has-post-thumbnail product_cat-marketing-and-seo product_tag-marketing product_tag-seo sale shipping-taxable purchasable product-type-simple product-cat-marketing-and-seo product-tag-marketing product-tag-seo instock">


                                <a href="../entrepreneurship-101-who-is-your-customer/index.html">

                                                    <div class="post_item_wrap">
                                            <div class="post_featured">
                                                    <div class="post_thumb">
                                                            <a class="hover_icon hover_icon_link" href="../entrepreneurship-101-who-is-your-customer/index.html">

                                <span class="onsale">Sale!</span>
                                <img width="350" height="400" src="uploads/2014/10/masonry_06-350x400.jpg" class="attachment-shop_catalog wp-post-image" alt="masonry_06" />				</a>
                                            </div>
                                    </div>
                                    <div class="post_content">
                                    <h3><a href="../entrepreneurship-101-who-is-your-customer/index.html">Entrepreneurship 101: Who is your customer?</a></h3>


                                <span class="price"><del><span class="amount">&#36;195.00</span></del> <ins><span class="amount">&#36;180.00</span></ins></span>

                                </a>

                                <a href="index63f7.html?add-to-cart=702" rel="nofollow" data-product_id="702" data-product_sku="" data-quantity="1" class="button add_to_cart_button product_type_simple">Add to cart</a>			</div>
                                    </div>

                                </li>


                                                    <li class="last post-703 product type-product status-publish has-post-thumbnail product_cat-language product_tag-courses product_tag-language shipping-taxable purchasable product-type-simple product-cat-language product-tag-courses product-tag-language instock">


                                <a href="../principles-of-written-english-part-1/index.html">

                                                    <div class="post_item_wrap">
                                            <div class="post_featured">
                                                    <div class="post_thumb">
                                                            <a class="hover_icon hover_icon_link" href="../principles-of-written-english-part-1/index.html">
                                    <img width="350" height="400" src="uploads/2014/10/masonry_05-350x400.jpg" class="attachment-shop_catalog wp-post-image" alt="masonry_05" />				</a>
                                            </div>
                                    </div>
                                    <div class="post_content">
                                    <h3><a href="../principles-of-written-english-part-1/index.html">Principles of Written English, Part 1</a></h3>


                                <span class="price"><span class="amount">&#36;85.00</span></span>

                                </a>

                                <a href="indexed1f.html?add-to-cart=703" rel="nofollow" data-product_id="703" data-product_sku="" data-quantity="1" class="button add_to_cart_button product_type_simple">Add to cart</a>			</div>
                                    </div>

                                </li>


                                    </ul>
                                </div>


                                <meta itemprop="url" content="index.html" />

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

    <div class="custom_html_section"></div>
    <script type="text/javascript">jQuery(document).ready(function() {THEMEREX_GLOBALS["strings"] = {bookmark_add: 		"Add the bookmark",bookmark_added:		"Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab \'Bookmarks\'",bookmark_del: 		"Delete this bookmark",bookmark_title:		"Enter bookmark title",bookmark_exists:		"Current page already exists in the bookmarks list",search_error:		"Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.",email_confirm:		"On the e-mail address <b>%s</b> we sent a confirmation email.<br>Please, open it and click on the link.",reviews_vote:		"Thanks for your vote! New average rating is:",reviews_error:		"Error saving your vote! Please, try again later.",error_like:			"Error saving your like! Please, try again later.",error_global:		"Global error text",name_empty:			"The name can\'t be empty",name_long:			"Too long name",email_empty:			"Too short (or empty) email address",email_long:			"Too long email address",email_not_valid:		"Invalid email address",subject_empty:		"The subject can\'t be empty",subject_long:		"Too long subject",text_empty:			"The message text can\'t be empty",text_long:			"Too long message text",send_complete:		"Send message complete!",send_error:			"Transmit failed!",login_empty:			"The Login field can\'t be empty",login_long:			"Too long login field",login_success:		"Login success! The page will be reloaded in 3 sec.",login_failed:		"Login failed!",password_empty:		"The password can\'t be empty and shorter then 4 characters",password_long:		"Too long password",password_not_equal:	"The passwords in both fields are not equal",registration_success:"Registration success! Please log in!",registration_failed:	"Registration failed!",geocode_error:		"Geocode was not successful for the following reason:",googlemap_not_avail:	"Google map API not available!",editor_save_success:	"Post content saved!",editor_save_error:	"Error saving post data!",editor_delete_post:	"You really want to delete the current post?",editor_delete_post_header:"Delete post",editor_delete_success:	"Post deleted!",editor_delete_error:		"Error deleting post!",editor_caption_cancel:	"Cancel",editor_caption_close:	"Close"};});</script><script type="text/javascript">jQuery(document).ready(function() {THEMEREX_GLOBALS['ajax_url']			= '../../wp-admin/admin-ajax.html';THEMEREX_GLOBALS['ajax_nonce']		= '134352e9af';THEMEREX_GLOBALS['ajax_nonce_editor'] = 'f141f3b404';THEMEREX_GLOBALS['site_url']			= '../../index.html';THEMEREX_GLOBALS['vc_edit_mode']		= false;THEMEREX_GLOBALS['theme_font']		= '';THEMEREX_GLOBALS['theme_skin']		= 'education';THEMEREX_GLOBALS['theme_skin_bg']	= '';THEMEREX_GLOBALS['slider_height']	= 100;THEMEREX_GLOBALS['system_message']	= {message: '',status: '',header: ''};THEMEREX_GLOBALS['user_logged_in']	= false;THEMEREX_GLOBALS['toc_menu']		= 'fixed';THEMEREX_GLOBALS['toc_menu_home']	= false;THEMEREX_GLOBALS['toc_menu_top']	= false;THEMEREX_GLOBALS['menu_fixed']		= true;THEMEREX_GLOBALS['menu_relayout']	= 960;THEMEREX_GLOBALS['menu_responsive']	= 800;THEMEREX_GLOBALS['menu_slider']     = true;THEMEREX_GLOBALS['demo_time']		= 0;THEMEREX_GLOBALS['media_elements_enabled'] = true;THEMEREX_GLOBALS['ajax_search_enabled'] 	= true;THEMEREX_GLOBALS['ajax_search_min_length']	= 3;THEMEREX_GLOBALS['ajax_search_delay']		= 200;THEMEREX_GLOBALS['css_animation']      = true;THEMEREX_GLOBALS['menu_animation_in']  = 'bounceIn';THEMEREX_GLOBALS['menu_animation_out'] = 'fadeOut';THEMEREX_GLOBALS['popup_engine']	= 'pretty';THEMEREX_GLOBALS['popup_gallery']	= true;THEMEREX_GLOBALS['email_mask']		= '^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@[a-z0-9_\-]+(\.[a-z0-9_\-]+)*\.[a-z]{2,6}$';THEMEREX_GLOBALS['contacts_maxlength']	= 1000;THEMEREX_GLOBALS['comments_maxlength']	= 1000;THEMEREX_GLOBALS['remember_visitors_settings']	= false;THEMEREX_GLOBALS['admin_mode']			= false;THEMEREX_GLOBALS['isotope_resize_delta']	= 0.3;THEMEREX_GLOBALS['error_message_box']	= null;THEMEREX_GLOBALS['viewmore_busy']		= false;THEMEREX_GLOBALS['video_resize_inited']	= false;THEMEREX_GLOBALS['top_panel_height']		= 0;});</script><script type="text/javascript">jQuery(document).ready(function() {if (THEMEREX_GLOBALS['theme_font']=='') THEMEREX_GLOBALS['theme_font'] = 'Roboto';THEMEREX_GLOBALS['link_color'] = '#1eaace';THEMEREX_GLOBALS['menu_color'] = '#1dbb90';THEMEREX_GLOBALS['user_color'] = '#ffb20e';});</script><link rel='stylesheet' id='themerex-messages-style-css'  href='themes/education/fw/js/core.messages/core.messages.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='sfwd_front_css-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/assets/front274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sfwd_template_css-css'  href='<?php echo SITE_URL; ?>plugins/sfwd-lms/templates/learndash_template_style274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='themerex-swiperslider-style-css'  href='<?php echo SITE_URL; ?>themes/education/fw/js/swiper/idangerous.swiper.min.css' type='text/css' media='all' />
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
</body>
</html>