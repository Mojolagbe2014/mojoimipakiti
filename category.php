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
$calendar = new Calendar();

include('includes/other-settings.php');
require('includes/page-properties.php');
?>
<link href="css/php-calendar.css" rel="stylesheet" type="text/css"/>
<?php
                            echo $calendar->show();
                            ?>