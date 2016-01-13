<header class="top_panel_wrap bg_tint_dark" >
                <div class="menu_user_wrap">
                    <div class="content_wrap clearfix">
                        <div class="menu_user_area menu_user_right menu_user_nav_area">
                            <ul id="menu_user" class="menu_user_nav">
                                <li class="menu_user_bookmarks"><a href="#" class="bookmarks_show icon-star-1" title="Show bookmarks"></a>
                                    <ul class="bookmarks_list">
                                    <li><a href="#" class="bookmarks_add icon-star-empty" title="Add the current page into bookmarks">Add bookmark</a></li>
                                </ul>
                                </li>
                                <li class="menu_user_login"><a href="#popup_login" class="popup_link popup_login_link">Login</a>
                                    <div id="popup_login" class="popup_wrap popup_login bg_tint_light">
                                        <a href="#" class="popup_close"></a>
                                        <div class="form_wrap">
                                            <div class="form_left">
                                                <form action="wp-login.php" method="post" name="login_form" class="popup_form login_form">
                                                    <input type="hidden" name="redirect_to" value="">
                                                    <div class="popup_form_field login_field iconed_field icon-user-2"><input type="text" id="log" name="log" value="" placeholder="Login or Email"></div>
                                                    <div class="popup_form_field password_field iconed_field icon-lock-1"><input type="password" id="password" name="pwd" value="" placeholder="Password"></div>
                                                    <div class="popup_form_field remember_field">
                                                    <a href="../my-account/lost-password/index.html" class="forgot_password">Forgot password?</a>
                                                    <input type="checkbox" value="forever" id="rememberme" name="rememberme">
                                                    <label for="rememberme">Remember me</label>
                                                    </div>
                                                    <div class="popup_form_field submit_field"><input type="submit" class="submit_button" value="Login"></div>
                                                </form>
                                            </div>
                                            <div class="form_right">
                                                <div class="login_socials_title">You can login using your social profile</div>
                                                <div class="login_socials_list sc_socials sc_socials_size_tiny">
                                                <div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_facebook" style="background-image: url(themes/education/fw/images/socials/facebook.png);"><span class="sc_socials_hover" style="background-image: url(themes/education/fw/images/socials/facebook.png);"></span></a></div><div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_twitter" style="background-image: url(themes/education/fw/images/socials/twitter.png);"><span class="sc_socials_hover" style="background-image: url(themes/education/fw/images/socials/twitter.png);"></span></a></div><div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_gplus" style="background-image: url(themes/education/fw/images/socials/gplus.png);"><span class="sc_socials_hover" style="background-image: url(themes/education/fw/images/socials/gplus.png);"></span></a></div>			</div>
                                                <div class="login_socials_problem"><a href="#">Problem with login?</a></div>
                                                <div class="result message_block"></div>
                                            </div>
                                        </div>	<!-- /.login_wrap -->
                                    </div>		<!-- /.popup_login -->
                                </li>
                            </ul>
                        </div>
                        <div class="menu_user_area menu_user_left menu_user_contact_area">
                            Contact us on <a href="tel:<?php echo COMPANY_HOTLINE; ?>"><?php echo COMPANY_HOTLINE; ?></a> or 
                            <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><span class="__cf_email__" data-cfemail=""><?php echo COMPANY_EMAIL; ?></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu_main_wrap logo_left">
                    <div class="content_wrap clearfix">
                        <div class="logo">
                            <a href="<?php echo SITE_URL; ?>"><img src="<?php echo SITE_URL; ?>images/logo-white.png" class="logo_main" alt=""><img src="<?php echo SITE_URL; ?>images/logo-resized.png" class="logo_fixed" alt=""></a>
                        </div>

                        <div class="search_wrap search_style_regular search_ajax" title="Open/close search form">
                            <a href="#" class="search_icon icon-search-2"></a>
                            <div class="search_form_wrap">
                                <form role="search" method="get" class="search_form" action="">
                                    <button type="submit" class="search_submit icon-zoom-1" title="Start search"></button>
                                    <input type="text" class="search_field" placeholder="" value="" name="s" title="" />
                                </form>
                            </div>
                            <div class="search_results widget_area bg_tint_light"><a class="search_results_close icon-delete-2"></a>
                                <div class="search_results_content"></div>
                            </div>
                        </div>		
                        <a href="#" class="menu_main_responsive_button icon-menu-1"></a>

                        <nav role="navigation" class="menu_main_nav_area">
                            <ul id="menu_main" class="menu_main_nav">
                                <li id="menu-item-860" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $thisPage->active($_SERVER['SCRIPT_NAME'], 'index', 'current-menu-item  current_page_item'); ?> menu-item-has-children menu-item-860"><a href="<?php echo SITE_URL; ?>">Homepage</a></li>
                                <li id="menu-item-641" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-641"><a href="<?php echo SITE_URL.'courses/'; ?>">Courses</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-1397" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1397"><a href="<?php echo SITE_URL.'courses/'; ?>">Courses</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-830" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-830"><a href="<?php echo SITE_URL.'courses/'; ?>">All courses</a></li>
                                                <li id="menu-item-1210" class="menu-item menu-item-type-post_type menu-item-object-courses menu-item-1210"><a href="<?php echo SITE_URL.'courses/private-sector/'; ?>">Private Sector Courses</a></li>
                                                <li id="menu-item-1154" class="menu-item menu-item-type-post_type menu-item-object-courses menu-item-1154"><a href="<?php echo SITE_URL.'courses/public-sector/'; ?>">Public Sector Courses</a></li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-1398" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1398"><a href="<?php echo SITE_URL.'course-categories/'; ?>">Course Categories</a>
                                            <ul class="sub-menu">
                                                <?php 
                                                $menuCatObj = new CourseCategory($dbObj);
                                                foreach($menuCatObj->fetchRaw("*", " 1=1 ", " name ASC ")as $menuCategory) { 
                                                ?>
                                                <li id="menu-item-1399" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1399"><a href="<?php echo SITE_URL.'category/'.$menuCategory['id'].'/'.StringManipulator::slugify($menuCategory['name']).'/'; ?>"><?php echo $menuCategory['name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-829" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-829"><a href="<?php echo SITE_URL.'members/' ?>">Teachers</a></li>
                                <li id="menu-item-179" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-179"><a href="#">About</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-536" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-536"><a href="<?php echo SITE_URL.'courses/'; ?>">All Courses</a></li>
                                        <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-178"><a href="<?php echo SITE_URL.'categories/'; ?>">Course Categories</a></li>
                                        <li id="menu-item-1254" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1254"><a href="<?php echo SITE_URL.'courses/'; ?>">Private Sector</a></li>
                                        <li id="menu-item-1150" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1150"><a href="<?php echo SITE_URL.'courses/'; ?>">Public Sector</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-13"><a href="../blog-streampage/index.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-167" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-167"><a href="#">Post Formats</a>
                                            <ul class="sub-menu">
                                            <li id="menu-item-51" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-51"><a href="../category/post-formats/post-formats-with-sidebar/index.html">With Sidebar</a></li>
                                            <li id="menu-item-50" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-50"><a href="../category/post-formats/index.html">Without sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-168" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-168"><a href="#">Masonry tiles</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-169" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-169"><a href="../category/masonry-2-columns/index.html">Masonry (2 columns)</a></li>
                                                <li id="menu-item-170" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-170"><a href="../category/masonry-2-columns/masonry-3-columns/index.html">Masonry (3 columns)</a></li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-173" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-173"><a href="#">Portfolio tiles</a>
                                            <ul class="sub-menu">
                                                <li id="menu-item-174" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-174"><a href="../category/portfolio-2-columns/index.html">Portfolio (2 columns)</a></li>
                                                <li id="menu-item-175" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-175"><a href="../category/portfolio-2-columns/portfolio-3-columns/index.html">Portfolio (3 columns)</a></li>
                                                <li id="menu-item-902" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-902"><a href="#">Portfolio hovers</a>
                                                    <ul class="sub-menu">
                                                        <li id="menu-item-908" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-908"><a href="../portfolio-hovers-circle/index.html">Circle, Part 1</a></li>
                                                        <li id="menu-item-904" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-904"><a href="../portfolio-hovers-circle-part-2/index.html">Circle, Part 2</a></li>
                                                        <li id="menu-item-903" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-903"><a href="../portfolio-hovers-circle-part-3/index.html">Circle, Part 3</a></li>
                                                        <li id="menu-item-907" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-907"><a href="../portfolio-hovers-square/index.html">Square, Part 1</a></li>
                                                        <li id="menu-item-906" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-906"><a href="../portfolio-hovers-square-part-2/index.html">Square, Part 2</a></li>
                                                        <li id="menu-item-905" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-905"><a href="../portfolio-hovers-square-part-3/index.html">Square, Part 3</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-item-755" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-755"><a href="../product-category/products/index.html">Shop</a></li>
                            </ul>						
                        </nav>
                    </div>
                </div>
            </header>