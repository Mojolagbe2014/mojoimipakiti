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
    <title>Manage Quotes  - TSI Group Limited</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="images/icons/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3><i class="fa fa-quote-left"></i> All Quotes <i class="fa fa-quote-right"></i></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="quotelist" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Content</th>
                                                <th>Author</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="messageBox"></div>
                        <div class="panel panel-info" id="hiddenUpdateForm">
                            <div class="panel-heading">
                                <h3>Add/Edit Quote</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="CreateQuote" name="CreateQuote" action="../REST/manage-quotes.php"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label" for="author">Author:</label>
                                        <div class="controls">
                                            <input type="hidden" id="id" name="id"> <input type="hidden" id="oldFile" name="oldFile" value=""/>
                                            <input type="text" id="author" name="author" placeholder="Quote Author" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="content">Quote Content:</label>
                                        <div class="controls">
                                            <textarea id="content" name="content" placeholder="Quote Content" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="image">Quote Image:</label> <span><strong id="oldFileComment"></strong></span>
                                        <div class="controls">
                                            <input type="file" id="image" name="image"class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="hidden" name="addNewQuote" id="addNewQuote" value="addNewQuote"/>
                                            <button type="submit" class="btn btn-success" id="multi-action-catAddEdit">Add Quote</button> &nbsp; &nbsp;
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
    <script src="assets/js/common-handler.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/manage-quotes.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
