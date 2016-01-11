<div id="sidebar" class="col-md-3 normal-sidebar">
    <div class="row">
        <div id="search-4" class=" col-md-12  widget widget_search">
            <div class=" widget-inner">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo SITE_URL; ?>search">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" placeholder="SEARCH" name="s" id="s"  required="required"/>
                        <input type="submit" id="searchsubmit" value="Search" />
                    </div>
                </form>
            </div>
        </div>
        <div id="advanced-latest-event-3" class=" col-md-12  widget event_listing_widget">
            <div class=" widget-inner">
                <div class="uni-lastest">
                    <h2 class="widget-title maincolor2">Courses Overview</h2>
                    <?php 
                    $sideCourseObj = new Course($dbObj);
                    foreach ($sideCourseObj->fetchRaw("*", " status =1 ", " RAND() LIMIT 6 ") as $sideCourse) {
                        $courseData = array('id' => 'id', 'name' => 'name', 'code' => 'code', 'image' => 'image', 'media' => 'media', 'amount' => 'amount', 'shortName' => 'short_name', 'category' => 'category', 'startDate' => 'start_date', 'endDate' => 'end_date', 'description' => 'description', 'status' => 'status');
                        foreach ($courseData as $key => $value){
                            switch ($key) { 
                                case 'image': $sideCourseObj->$key = MEDIA_FILES_PATH1.'course-image/'.$sideCourse[$value];break;
                                case 'media': $sideCourseObj->$key = MEDIA_FILES_PATH1.'course/'.$sideCourse[$value];break;
                                case 'startDate': $dateParam = explode('-', $sideCourse[$value]);
                                                  $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                  $sideCourseObj->$key = '<i class="fa fa-calendar"></i> '.$dateParam[2].' '.substr($dateObj->format('F'), 0, 3).', '.$dateParam[0].'.';;
                                                  break;
                                case 'endDate': $dateParam = explode('-', $sideCourse[$value]);
                                                  $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                                  $sideCourseObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';;
                                                  break;
                                default     :   $sideCourseObj->$key = $sideCourse[$value]; break; 
                            }
                        }
                    ?>
                    <div class="item">
                        <div class="thumb item-thumbnail">
                            <a href="<?php echo SITE_URL; ?>course/<?php echo $sideCourseObj->id."/".StringManipulator::slugify($sideCourseObj->name); ?>/" title="<?php echo $sideCourseObj->name; ?>">
                                <div class="item-thumbnail">
                                    <img width="80" height="80" style="width:80px;height:80px" src="<?php echo $sideCourseObj->image; ?>" class="attachment-thumb_80x80 wp-post-image" alt="<?php echo $sideCourseObj->name; ?>" />
                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                    <div class="thumbnail-hoverlay-cross"></div>
                                </div>
                            </a>
                        </div>
                        <div class="u-details item-content">
                            <h5><a href="<?php echo SITE_URL; ?>course/<?php echo $sideCourseObj->id."/".StringManipulator::slugify($sideCourseObj->name); ?>/" title="<?php echo $sideCourseObj->name; ?>" class="main-color-1-hover"><?php echo $sideCourseObj->name; ?></a></h5><span><?php echo $sideCourseObj->startDate; ?></span>
                        </div>
                        <div class="clearfix"></div>
                            
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="advanced-recent-posts-2" class=" col-md-12  widget advanced_recent_posts_widget">
            <div class=" widget-inner">
                <div class="uni-lastest">
                    <h2 class="widget-title maincolor2">Upcoming Events</h2>
                    <?php 
                    $sideEventObj = new Event($dbObj);
                    foreach ($sideEventObj->fetchRaw("*", " NOW() <= date_time AND status = 1 ", " RAND() LIMIT 4 ") as $sideEvent) {
                        $dateTimeObj = explode(' ', $sideEvent['date_time']);
                        $dateParam = explode('/', $dateTimeObj[0]);
                        $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                        $sideEvent['date_time'] = '<i class="fa fa-calendar"></i> '.$dateParam[2].' '.substr($dateObj->format('F'), 0, 3).', '.$dateParam[0].'. <br/><i class="fa fa-clock-o"></i> '.$dateTimeObj[1];
                    ?>
                    <div class="item">
                        <div class="thumb item-thumbnail">
                            <a href="<?php echo SITE_URL; ?>event/<?php echo $sideEvent['id'].'/'.StringManipulator::slugify($sideEvent['name']); ?>/" title="<?php echo $sideEvent['name']; ?>">
                                    <div class="item-thumbnail">
                                        <img width="80" height="80" style="width:80px;height:80px" src="<?php echo MEDIA_FILES_PATH1; ?>event/<?php echo $sideEvent['image']; ?>" class="attachment-thumb_80x80 wp-post-image" alt="<?php echo $sideEvent['name']; ?>" />
                                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                            <div class="thumbnail-hoverlay-cross"></div>
                                    </div>
                            </a>
                        </div>
                        <div class="u-details item-content">
                            <h5><a href="<?php echo SITE_URL; ?>event/<?php echo $sideEvent['id'].'/'.StringManipulator::slugify($sideEvent['name']); ?>/" title="<?php echo $sideEvent['name']; ?>" class="main-color-1-hover"><?php echo $sideEvent['name']; ?></a></h5>
                            <span><?php echo $sideEvent['date_time']; ?></span>
                        </div>
                        <div class="clearfix"></div>
                            
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
            
    </div>
</div><!--#sidebar-->