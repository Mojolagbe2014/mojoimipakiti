<div id="top-nav" class="dark-div nav-style-2">
                    <nav class="navbar navbar-inverse main-color-1-bg" role="navigation">
                        <div class="container">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="top-menu">
                                <ul class="nav navbar-nav hidden-xs"> </ul>
                                <button type="button" class="mobile-menu-toggle visible-xs"> <span class="sr-only">Menu</span> <i class="fa fa-bars"></i> </button>
                                <a class="navbar-right search-toggle collapsed" data-toggle="collapse" data-target="#nav-search" href="#"><i class="fa fa-search"></i></a>
                                <div class="navbar-right topnav-sidebar">
                                    <div id="text-17" class=" col-md-12  widget_text">
                                        <div class=" widget-inner">			
                                            <div class="textwidget">
                                                <a target="_blank" href="<?php echo FACEBOOK_LINK; ?>"><i class="fa fa-facebook"></i></a>
                                                <a target="_blank" href="<?php echo YOUTUBE_LINK; ?>"><i class="fa fa-youtube"></i></a>
                                                <a target="_blank" href="<?php echo LINKEDIN_LINK; ?>"><i class="fa fa-linkedin-square"></i></a>
                                                <a target="_blank" href="<?php echo TWITTER_LINK; ?>"><i class="fa fa-twitter"></i></a>
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                                <div id="nav-search" class="collapse dark-div">
                                    <div class="container">
                                        <form action="<?php echo SITE_URL; ?>search">
                                            <div class="input-group">
                                                <input type="text" name="s" class="form-control search-field" placeholder="Search Here" autocomplete="off" required="required">
                                            <span class="input-group-btn">
                                                <button type="submit"><i class="fa fa-search fa-4x"></i>&nbsp;</button>
                                            </span>
                                            <span class="input-group-btn hidden-xs">
                                                <button type="button" data-toggle="collapse" data-target="#nav-search">&nbsp;<i class="fa fa-times fa-2x"></i></button>
                                            </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div><!--/top-nap-->
                <div id="main-nav" class="dark-div nav-style-2">
                    <nav class="navbar navbar-inverse main-color-2-bg" role="navigation">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <a class="logo" href="<?php echo SITE_URL; ?>index" title="<?php echo WEBSITE_AUTHOR; ?>"><img src="<?php echo SITE_URL; ?>uploads/2015/10/tsi-logo-nw1.fw_-e1446722849135.png" alt="<?php echo WEBSITE_AUTHOR; ?>"/></a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="main-menu hidden-xs  " data-spy="affix" data-offset-top="500">
                                <ul class="nav navbar-nav navbar-right">
                                    <li id=" nav-menu-item-3033" class="<?php echo $thisPage->active($_SERVER['SCRIPT_NAME'], 'index', 'current-menu-item  current_page_item'); ?> main-menu-item menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom  menu-item-home"><a href="<?php echo SITE_URL; ?>" class="menu-link  main-menu-link"><i class="fa fa-home"></i>  Home <span class="menu-description">Home Page</span> </a></li>
                                    <li id="nav-menu-item-1268" class="<?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'course', 'current-menu-item  current_page_item'); ?>main-menu-item menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children parent"><a href="<?php echo SITE_URL; ?>courses/" class="menu-link dropdown-toggle disabled main-menu-link">  Courses <span class="menu-description">All Courses</span></a></li>
                                    <li id="nav-menu-item-3110" class="<?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'about-us', 'current-menu-item  current_page_item'); ?>main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo SITE_URL; ?>about-us/" class="menu-link  main-menu-link">About </a></li>
                                    <li id="nav-menu-item-32" class="<?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'gallery', 'current-menu-item  current_page_item'); ?>main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo SITE_URL; ?>gallery/" class="menu-link  main-menu-link">Gallery </a></li>
                                    <li id="nav-menu-item-3110" class="<?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'contact-us', 'current-menu-item  current_page_item'); ?>main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo SITE_URL; ?>contact-us/" class="menu-link  main-menu-link">Contact </a></li>
                                    <li id="nav-menu-item-1269" class="<?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'member', 'current-menu-item ').$thisPage->active($_SERVER['REQUEST_URI'], 'partner', 'current-menu-item ').$thisPage->active($_SERVER['REQUEST_URI'], 'event', 'current-menu-item '); ?>main-menu-item menu-item-depth-0 sub-menu-left menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children parent dropdown"><a href="#" class="menu-link dropdown-toggle disabled main-menu-link" data-toggle="dropdown">  More <i class="fa fa-angle-down"></i><span class="menu-description">More Pages</span></a>
                                        <ul class="dropdown-menu menu-depth-1">
                                            <li id="nav-menu-item-1502" class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page current_page_parent"><a href="<?php echo SITE_URL; ?>members/" class="menu-link  sub-menu-link">Team Members </a></li>
                                            <li id="nav-menu-item-31" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo SITE_URL; ?>partners/" class="menu-link  main-menu-link">Partners </a></li>
                                            <li id="nav-menu-item-31" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo SITE_URL; ?>events/" class="menu-link  main-menu-link">Upcoming Events </a></li>
                                            <li id="nav-menu-item-31" class="main-menu-item menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo SITE_URL; ?>faqs/" class="menu-link  main-menu-link">FAQs </a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <a href="#top" class="sticky-gototop main-color-1-hover"><i class="fa fa-angle-up"></i></a>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div><!-- #main-nav -->