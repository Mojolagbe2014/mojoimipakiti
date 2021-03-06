<?php session_start(); ?>
<?php
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
    <title>Manage Team Members  - Impact Training &amp; Management Consulting</title>
    <link href="assets/js/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="images/icons/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
    <link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <style> th, td { white-space: nowrap; } </style>
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
                                <h3><i class="fa fa-group"></i> All Team Members</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="tutorslist" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="select-checkbox" id="multi-action-box" /></th>
                                                <th>ID</th>
                                                <th>Actions &nbsp; 
                                                    <button  class="btn btn-success btn-sm multi-activate-tutor multi-select" title="Change selected tutor status"><i class="btn-icon-only icon-check"> </i></button> 
                                                    <button class="btn btn-danger btn-sm multi-delete-tutor multi-select" title="Delete Selected"><i class="btn-icon-only icon-trash"> </i></button>
                                                </th>
                                                <th>Picture</th>
                                                <th>Member Name</th>
                                                <th>Qualification</th>
                                                <th>Area of Specialization</th>
                                                <th>Bio</th>
                                                <th>Email</th>
                                                <th>Website</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success hidden" id="hiddenUpdateForm">
                            <div class="panel-heading">
                                <h3><i class="fa fa-user"></i> Edit Member Details</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="UpdateTutor" name="UpdateTutor" action="../REST/manage-tutors.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Full Name:</label>
                                        <div class="controls">
                                            <input type="hidden" id="id" name="id" value=""/> <input type="hidden" id="oldPicture" name="oldPicture" value=""/>
                                            <input type="text" id="name" name="name" placeholder="Member full name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="qualification">Qualifications:</label>
                                        <div class="controls">
                                            <input data-title="Qualification" type="text" placeholder="Qualifications" id="qualification" name="qualification" data-original-title="Qualification" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="field">Specialization:</label>
                                        <div class="controls">
                                            <textarea id="field" name="field" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="bio">Bio:</label>
                                        <div class="controls">
                                            <textarea class="span5" id="bio" name="bio" class="form-control"></textarea>
                                            <script>
                                                CKEDITOR.replace('bio');
                                            </script>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="picture">Picture:</label>
                                        <div class="controls">
                                            <input data-title="tutor picture" type="file" placeholder="member picture" id="picture" name="picture" data-original-title="Tutor picture" class="form-control">
                                            <br/><span>Old Picture: <strong id="oldPictureComment"></strong></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="email">Email:</label>
                                        <div class="controls">
                                            <input data-title="tutor's email" type="email" placeholder="member's email" id="email" name="email" data-original-title="Tutor's email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="website">Website:</label>
                                        <div class="controls">
                                            <input data-title="website" type="url" placeholder="website" id="website" name="website" data-original-title="website" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="hidden" name="updateThisTutor" id="updateThisTutor" value="updateThisTutor"/>
                                            <button type="submit" name="submitUpdateTutor" id="submitUpdateTutor" class="btn btn-danger">Update Details</button> &nbsp; &nbsp;
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
    <script src="assets/js/jquery.scrollTo.min.js" type="text/javascript"></script>
    <script src="assets/js/gritter/js/jquery.gritter.min.js" type="text/javascript"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/manage-tutors.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
