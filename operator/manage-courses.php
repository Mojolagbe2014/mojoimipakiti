<?php 
session_start(); 
define("CONST_FILE_PATH", "../includes/constants.php");
include ('../classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$adminObj = new Admin($dbObj); // Create an object of Admin class
$errorArr = array(); //Array of errors
?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Courses  - TSI Group Limited</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="images/icons/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
    <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <style>
        th, td { white-space: nowrap; }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include('includes/top-bar.php'); ?> 
        <!-- /. NAV TOP  -->
        <?php include('includes/side-bar.php'); ?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="messageBox"></div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3>All Available Courses</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="courseslist" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Course Name</th>
                                                <th>Short Name</th>
                                                <th>Course Category</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Course Code</th>
                                                <th>Description</th>
                                                <th>Media</th>
                                                <th>Amount (<span class="naira">N</span>)</th>
                                                <th>Course Image</th>
                                                <th>Date Registered</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success hidden" id="hiddenUpdateForm">
                            <div class="panel-heading">
                                <h3>Edit Course Details</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="UpdateCourse" name="UpdateCourse" action="../REST/manage-courses.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Full Name:</label>
                                        <div class="controls">
                                            <input type="hidden" id="id" name="id" value=""/> <input type="hidden" id="oldFile" name="oldFile" value=""/>
                                            
                                            <input type="text" id="name" name="name" placeholder="admin full name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="shortName">Short Name:</label>
                                        <div class="controls">
                                            <input data-title="Short Name" type="text" placeholder="short name" id="shortName" name="shortName" data-original-title="Short name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="category">Category:</label>
                                        <div class="controls">
                                            <select tabindex="1" name="category" id="category" data-placeholder="Select a category.." class="form-control">
                                                <option value="">Select a category..</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="startDate">Start Date:</label>
                                        <div class="controls">
                                            <input data-title="start date" type="text" placeholder="YYYY/MM/DD" id="startDate" name="startDate" data-original-title="Start DAte" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="endDate">End Date:</label>
                                        <div class="controls">
                                            <input data-title="end date" type="text" placeholder="YYYY/MM/DD" id="endDate" name="endDate" data-original-title="End Date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="code">Course Code:</label>
                                        <div class="controls">
                                            <input data-title="course code" type="text" placeholder="course code" id="code" name="code" data-original-title="Course Code" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="description">Description:</label>
                                        <div class="controls">
                                            <textarea class="span5" id="description" name="description" class="form-control"></textarea>
                                            <script>
                                                var ckeditor = CKEDITOR.replace('description');
                                            </script>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="image">Course Image:</label> <span><strong id="oldImageComment"></strong></span>
                                        <div class="controls">
                                            <input data-title="course image" type="file" placeholder="course image" value="" id="image" name="image" data-original-title="Course image" class="form-control">
                                            <input type="hidden" id="oldImage" name="oldImage" value=""/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="file">Media:</label>
                                        <div class="controls">
                                            <input data-title="course media" type="file" placeholder="course media" value="" id="file" name="file" data-original-title="Course media" class="form-control">
                                            <span>Old media: <strong id="oldFileComment"></strong></span>
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label class="control-label" for="amount">Price (<span class="naira">N</span>):</label>
                                        <div class="controls">
                                            <input data-title="course amount" type="number" placeholder="course amount" id="amount" name="amount" data-original-title="Course amount" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="hidden" name="updateThisCourse" id="updateThisCourse" value="updateThisCourse"/>
                                            <button type="submit" name="submitUpdateCourse" id="submitUpdateCourse" class="btn btn-danger">Update Course</button> &nbsp; &nbsp;
                                            <button type="button" class="btn btn-info" id="cancelEdit">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="messageBox"></div>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="../js/jquery-ui.1.11.4.js"></script>
    <script src="assets/js/common-handler.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/manage-courses.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
