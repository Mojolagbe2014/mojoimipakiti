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
                                <?php //include('login-section.php'); ?>
                            </ul>
                        </div>
                        <div class="menu_user_area menu_user_left menu_user_contact_area" <?php echo strpos($_SERVER['SCRIPT_NAME'],'index.php') ? '' : 'style="color:#000"'; ?>>
                            Contact us on <a href="tel:<?php echo COMPANY_HOTLINE; ?>"><?php echo COMPANY_HOTLINE; ?></a> or 
                            <a href="mailto:<?php echo COMPANY_EMAIL; ?>"><span class="__cf_email__" data-cfemail=""><?php echo COMPANY_EMAIL; ?></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu_main_wrap logo_left">
                    <div class="content_wrap clearfix">
                        <div class="logo">
                            <a href="<?php echo SITE_URL; ?>"><img src="<?php echo strpos($_SERVER['SCRIPT_NAME'],'index.php') ? SITE_URL.'images/logo-white.png' : SITE_URL.'images/logo-dark.jpg'; ?>" class="logo_main" alt=""><img src="<?php echo strpos($_SERVER['SCRIPT_NAME'],'index.php') ? SITE_URL.'images/logo-white.png' : SITE_URL.'images/logo-dark.jpg'; ?>" class="logo_fixed" alt=""></a>
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
                                <li id="menu-item-641" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'course', 'current-menu-item  current_page_item'); ?> menu-item-has-children menu-item-641"><a href="<?php echo SITE_URL.'courses/'; ?>">Courses</a>
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
                                <li id="menu-item-829" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'member', 'current-menu-item  current_page_item'); ?> menu-item-has-children menu-item-829"><a href="<?php echo SITE_URL.'members/'; ?>">Teachers</a></li>
                                <li id="menu-item-179" class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'about', 'current-menu-item  current_page_item'); ?> menu-item-has-children menu-item-179"><a href="<?php echo SITE_URL.'about/'; ?>">About</a></li>
                                <li id="menu-item-755" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'gallery', 'current-menu-item  current_page_item'); ?> menu-item-755"><a href="<?php echo SITE_URL.'gallery/'; ?>">Gallery</a></li>
                                <li id="menu-item-755" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'contact', 'current-menu-item  current_page_item'); ?> menu-item-755"><a href="<?php echo SITE_URL.'contact/'; ?>">Contact</a></li>
                                <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-13 <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'faq', 'current-menu-item  current_page_item'); ?>"><a href="javascript:;">More</a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-167" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167"><a href="<?php echo SITE_URL.'clients/'; ?>">Clients/Partners</a></li>
                                        <li id="menu-item-167" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167"><a href="<?php echo SITE_URL.'faqs/'; ?>">FAQs</a></li>
                                        <li id="menu-item-167" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-167"><a href="<?php echo SITE_URL.'events/'; ?>">Upcoming Events</a></li>
                                    </ul>
                                </li>
                            </ul>						
                        </nav>
                    </div>
                </div>
            </header>